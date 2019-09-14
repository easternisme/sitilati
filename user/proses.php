<?php 
require '../koneksi_database.php';
$koneksi = buka_koneksi();

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
	$email = "email";

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

 ?>