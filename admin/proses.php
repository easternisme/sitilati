<?php 

require '../koneksi_database.php';
/////////////////////////TAMBAH PENGGUNA//////////////////////////////////////////////////////
if(isset($_POST['tambah_pengguna'])){

	$pengguna = $_POST['pengguna'];
	$username = $_POST['username'];
	$hak_akses = $_POST['hak_akses'];
	$password = sha1($_POST['password']);
	$re_password = sha1($_POST['re_password']);
	$status = "1";
	$flag_del = 0;
	if($password != $re_password){echo " <script>window.alert('Password & Retype Password tidak sama... !');window.location='./.'</script>";}
	$query = "INSERT INTO tb_users_bawaslu(
	pengguna,
	username,
	password,
	flag_del	
	) VALUES (
	'$pengguna',
	'$username',
	'$password',
	'$flag_del')";
	$query2 = "INSERT INTO tb_akses(
	username,
	hak_akses,
	status	
	) VALUES (
	'$username',
	'$hak_akses',
	'$status')";

	//print_r($query);die();
	$hasil = mysqli_query($koneksi,$query) && mysqli_query($koneksi,$query2);
	if(!$hasil){
		die("Gagal menambahkan data! Error: ".$query.". - ".$query2."./".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Data Pengguna Berhasil Ditambahkan...');window.location='./index.php';</script>" ;
	}

}
/////////////////////////TAMBAH PENGGUNA//////////////////////////////////////////////////////

///////////////////////////////////////////UPDATE PENGGUNA/////////////////////////////////////////////////
if(isset($_POST['update_pengguna'])){
	$id_user = $_POST['id_user'];
	$pengguna = $_POST['pengguna'];
	$hak_akses = $_POST['hak_akses'];
	$username = $_POST['username'];

	$query = "UPDATE tb_users_bawaslu SET
	pengguna = '$pengguna' 
	WHERE id_user = '$id_user'";
	$query2 = "UPDATE tb_akses SET
	hak_akses = '$hak_akses' 
	WHERE username = '$username'";

 //print_r($query2);die();
	$hasil = mysqli_query($koneksi,$query) && mysqli_query($koneksi,$query2);
	if(!$hasil){
		die("Update data gagal! Error: ".$query.". ".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Data Pengguna Berhasil Diperbaharui...');window.location='./index.php';</script>" ;
	}
}
///////////////////////////////////////////UPDATE PENGGUNA/////////////////////////////////////////////////
///////////////////////////////////////////UPDATE PASSWORD/////////////////////////////////////////////////
if(isset($_POST['update_password'])){
	$id_user = $_POST['id_user'];
	
	$password = sha1($_POST['password']);
	$re_password = sha1($_POST['re_password']);

	if($password != $re_password){echo " <script>window.alert('Password & Retype Password tidak sama... !');window.location='./.'</script>";}

	$query = "UPDATE tb_users_bawaslu SET
	password = '$password'
	WHERE id_user = '$id_user'";

//print_r($query);die();
	$hasil = mysqli_query($koneksi,$query);
	if(!$hasil){
		die("Gagal update data! Error: ".$query.". ".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Password berhasil diperbarui...');window.location='./index.php';</script>" ;
	}
}
///////////////////////////////////////////UPDATE PASSWORD/////////////////////////////////////////////////
///////////////////////////////////////////SUSPEND AKUN/////////////////////////////////////////////////
if(isset($_POST['suspend_akun'])){
	$username = $_POST['username'];
	$status = $_POST['status'];


	$query = "UPDATE tb_akses SET
	status = '$status'
	WHERE username = '$username'";

//print_r($query);die();
	$hasil = mysqli_query($koneksi,$query);
	if(!$hasil){
		die("Gagal blokir! Error: ".$query.". ".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Berhasil...');window.location='./index.php';</script>" ;
	}
}
///////////////////////////////////////////SUSPEND AKUN/////////////////////////////////////////////////

////////////////////// HAPUS PENGGUNA/////////////////////////////////////////////////
if(isset($_GET['id_hapus'])){
	$id_user = $_GET['id_hapus'];
	$flag_del = 1;
	//echo $id_perkuliahan;
	$query = "UPDATE tb_users_bawaslu SET
	flag_del = '$flag_del'
	WHERE id_user = '$id_user'";

	$hasil = mysqli_query($koneksi,$query);
	if(!$hasil){
		die("Gagal Hapus data pengguna! Error: ".$query.". ".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Berhasil Hapus Data Pengguna...');window.location='./index.php';</script>" ;
	}
}

 ?>