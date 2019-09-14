<?php 
require '../koneksi_database.php';
include('../fungsi.php');

///////////////// TAMBAH PERSONEL /////////////////////////////////
if(isset($_POST['tambah_personel'])){
	$nama = $_POST['nama'];
	$nrp = $_POST['nrp'];
	$pangkat = $_POST['pangkat'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tgl_lahir = date('Y-m-d',strtotime($_POST['tgl_lahir']));
	$kesatuan = $_POST['kesatuan'];
	$jabatan = $_POST['jabatan'];
	$jenis_kelamin = $_POST['jenis_kelamin'];	
	$gol_darah = $_POST['gol_darah'];
	$status_keluarga = $_POST['status_keluarga'];
	$alamat = $_POST['alamat'];	
	$no_hp = $_POST['no_hp'];
	$email = $_POST['email'];

	$query = "INSERT INTO tb_personel(
	nama,
	pangkat,
	nrp,
	tempat_lahir,
	tgl_lahir,
	kesatuan,
	jabatan,
	jenis_kelamin,
	gol_darah,
	status_keluarga,
	alamat,
	no_hp,
	email
	) VALUES (
	'$nama',
	'$pangkat',
	'$nrp',
	'$tempat_lahir',
	'$tgl_lahir',
	'$kesatuan',
	'$jabatan',
	'$jenis_kelamin',
	'$gol_darah',
	'$status_keluarga',
	'$alamat',
	'$no_hp',
	'$email')";
	//print_r($query);die();
	$hasil = mysqli_query($koneksi,$query);
	if(!$hasil){
		die("Gagal menambahkan data! Error: ".$query.". ".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Data Berhasil Ditambahkan...');window.location='./data_personel.php';</script>" ;
	}
}

///////////////// TAMBAH PERSONEL /////////////////////////////////


/////////////////////////// TAMBAH PENGGUNA /////////////////////////////////////////////////

if(isset($_POST['tambah_pengguna'])){
	$username = $_POST['username'];
	$hak_akses = $_POST['hak_akses'];
	$id_personel = $_POST['id_personel'];
	$password = sha1($_POST['password']);
	$status = $_POST['status'];

	$query_user = "INSERT INTO tb_user(
	username,
	password,
	status) VALUES (
	'$username',
	'$password',
	'$status')";

	$query_id_user = "SELECT id_user FROM tb_user WHERE username = '$username' AND password = '$password' AND status = '$status' ";
	$hasil = mysqli_query($koneksi,$query_id_user);
    $data = mysqli_fetch_assoc($hasil);
    $id_user = $data['id_user'];

	$query_akses = "INSERT INTO tb_akses(
	id_personel,
	id_user,
	hak_akses) VALUES (
	'$id_personel',
	'$id_user',
	'$hak_akses')";
	//print_r($query_user." / ".$query_akses);die();
	$hasil_akhir = mysqli_query($koneksi,$query_user) && mysqli_query($koneksi,$query_akses);
	
	
	if(!$hasil_akhir){
		die("Gagal menambahkan data! Error: ".$query_user.". ".$query_akses.". ".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Data Berhasil Ditambahkan...');window.location='./data_pengguna.php';</script>" ;
	}
}

/////////////////////////// TAMBAH PENGGUNA /////////////////////////////////////////////////

////////////////////// SUSPEND PENGGUNA/////////////////////////////////////////////////
if(isset($_GET['suspend'])){
	$id_user = $_GET['suspend'];
	$status = "0";
	//echo $id_perkuliahan;
	$query = "UPDATE tb_user SET status = '$status' WHERE id_user = '$id_user' ";
	$hasil = mysqli_query($koneksi,$query);
	if(!$hasil){
		die("Gagal suspend data! Error: ".$query.". ".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Suspend Akun Berhasil...');window.location='data_pengguna.php';</script>" ;
	}
}

////////////////////// SUSPEND PENGGUNA/////////////////////////////////////////////////

////////////////////// UNSUSPEND PENGGUNA/////////////////////////////////////////////////
if(isset($_GET['unsuspend'])){
	$id_user = $_GET['unsuspend'];
	$status = "1";
	//echo $id_perkuliahan;
	$query = "UPDATE tb_user SET status = '$status' WHERE id_user = '$id_user' ";
	$hasil = mysqli_query($koneksi,$query);
	if(!$hasil){
		die("Gagal suspend data! Error: ".$query.". ".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Unsuspend Akun Berhasil...');window.location='data_pengguna.php';</script>" ;
	}
}

////////////////////// UNSUSPEND PENGGUNA/////////////////////////////////////////////////

////////////////////// HAPUS PENGGUNA/////////////////////////////////////////////////
if(isset($_GET['hapus_pengguna'])){
	$id_user = $_GET['hapus_pengguna'];
	$status = "0";
	//echo $id_perkuliahan;
	$query = "DELETE FROM tb_akses WHERE id_user = '$id_user' ";
	$query2 = "DELETE FROM tb_user WHERE id_user = '$id_user' ";
	$hasil = mysqli_query($koneksi,$query)&&mysqli_query($koneksi,$query2);
	if(!$hasil){
		die("Gagal Hapus data pengguna! Error: ".$query.". ".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Berhasil Hapus Data Pengguna...');window.location='data_pengguna.php';</script>" ;
	}
}

////////////////////// SUSPEND PENGGUNA/////////////////////////////////////////////////

/////////////////////////////////////////////////////// UPDATE PERSONEL ///////////////////////////////////////////////////

if(isset($_POST['update_personel'])){

	$id_personel = dekripsi($_POST['id_personel']);
	$nama = $_POST['nama'];
	$nrp = $_POST['nrp'];
	$pangkat = $_POST['pangkat'];
	$korps   = $_POST['korps'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tgl_lahir = date('Y-m-d',strtotime($_POST['tgl_lahir']));
	$kesatuan = $_POST['kesatuan'];
	$jabatan = $_POST['jabatan'];
	$jenis_kelamin = $_POST['jenis_kelamin'];	
	$gol_darah = $_POST['gol_darah'];
	$status_keluarga = $_POST['status_keluarga'];
	$alamat = $_POST['alamat'];	
	$no_hp = $_POST['no_hp'];
	$email = $_POST['email'];

	$query = mysqli_prepare($koneksi,"UPDATE tb_personel SET 
	nama = ?,
	pangkat = ? ,
	korps = ? ,
	nrp = ? ,
	tempat_lahir = ? ,
	tgl_lahir = ? ,
	kesatuan = ? ,
	jabatan = ? ,
	jenis_kelamin = ? ,
	gol_darah = ? ,
	status_keluarga = ? ,
	alamat = ? ,
	no_hp = ? ,
	email = ? 
	WHERE id_personel =? 
	 ");

	 //print_r($query);die();
	 	mysqli_stmt_bind_param($query,"ssssssssssssssi",$nama,$pangkat,$korps,$nrp,$tempat_lahir,$tgl_lahir,$kesatuan,$jabatan,$jenis_kelamin, $gol_darah, $status_keluarga, $alamat, $no_hp, $email, $id_personel);
        mysqli_stmt_execute($query);
        $hasil = mysqli_stmt_get_result($query);
        //print_r($hasil);die();
	//$hasil = mysqli_query($koneksi,$query);
	// if(!$hasil){
	// 	echo "<script> window.alert('Gagal merubah data...');window.location='./data_personel.php';</script>" ;
	// } else {
		echo "<script> window.alert('Data berhasil dirubah...');window.location='./data_personel.php';</script>" ;
	//}

}

/////////////////////////////////////////////////////// UPDATE PERSONEL ///////////////////////////////////////////////////


//////////////////////////////////////////////////////RESET PASSWORD////////////////////////////////////////////////////

if(isset($_POST['reset_password'])){

	//$username = $_POST['username'];
	$id_user  = $_POST['id_user'];
	$password = sha1($_POST['password']);

	$query = "UPDATE tb_user SET password = '$password' WHERE id_user = '$id_user' ";
	$hasil = mysqli_query($koneksi,$query);
	if(!$hasil){
		die("Gagal mengupdate data! Error: ".$query.". ".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Data berhasil dirubah...');window.location='./data_pengguna.php';</script>" ;
	}
}

//////////////////////////////////////////////////////RESET PASSWORD////////////////////////////////////////////////////

 ?>