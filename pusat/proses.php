<?php 

require '../koneksi_database.php';
/////////////////////////TAMBAH TEMUAN//////////////////////////////////////////////////////
if(isset($_POST['tambah_temuan'])){

	$auditee = $_POST['auditee'];
	$ketua_tim_audit = $_POST['ketua_tim_audit'];
	$tanggal_audit_mulai = date('Y-m-d',strtotime($_POST['tanggal_audit_mulai']));
	$tgl_jatuh_tempo = date('Y-m-d',strtotime($_POST['tgl_jatuh_tempo']));
	$temuan = $_POST['temuan'];
	$kondisi = $_POST['kondisi'];
	$akibat = $_POST['akibat'];	
	$sebab = $_POST['sebab'];
	$tindak_lanjut = $_POST['tindak_lanjut'];
	$tanggal_audit_selesai = date('Y-m-d',strtotime($_POST['tanggal_audit_selesai']));	
	$status = "proses";
	$flag_del = 0;

	$query = "INSERT INTO tb_monitor_tindak_lanjut(
	auditee,
	ketua_tim_audit,
	tanggal_audit_mulai,
	tgl_jatuh_tempo,
	temuan,
	kondisi,
	akibat,
	sebab,
	tindak_lanjut,
	tanggal_audit_selesai,
	status,
	flag_del
	
	) VALUES (
	'$auditee',
	'$ketua_tim_audit',
	'$tanggal_audit_mulai',
	'$tgl_jatuh_tempo',
	'$temuan',
	'$kondisi',
	'$akibat',
	'$sebab',
	'$tindak_lanjut',
	'$tanggal_audit_selesai',
	'$status',
	'$flag_del')";

		//print_r($query);die();
	$hasil = mysqli_query($koneksi,$query);
	if(!$hasil){
		die("Gagal menambahkan data! Error: ".$query.". ".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Data Temuan Berhasil Ditambahkan...');window.location='./index.php';</script>" ;
	}

}
/////////////////////////TAMBAH TEMUAN//////////////////////////////////////////////////////

///////////////////////////////////////////UPDATE TEMUAN/////////////////////////////////////////////////
if(isset($_POST['update_temuan'])){
	$id_audit = $_POST['id_audit'];
	$auditee = $_POST['auditee'];
	$ketua_tim_audit = $_POST['ketua_tim_audit'];
	$tanggal_audit_mulai = date('Y-m-d',strtotime($_POST['tanggal_audit_mulai']));
	$tgl_jatuh_tempo = date('Y-m-d',strtotime($_POST['tgl_jatuh_tempo']));
	$temuan = $_POST['temuan'];
	$kondisi = $_POST['kondisi'];
	$akibat = $_POST['akibat'];	
	$sebab = $_POST['sebab'];
	$tindak_lanjut = $_POST['tindak_lanjut'];
	$progres_tindak_lanjut = $_POST['progres_tindak_lanjut'];	
	$tanggal_audit_selesai = date('Y-m-d',strtotime($_POST['tanggal_audit_selesai']));

	$query = "UPDATE tb_monitor_tindak_lanjut SET
	auditee = '$auditee',
	ketua_tim_audit = '$ketua_tim_audit',
	tanggal_audit_mulai = '$tanggal_audit_mulai',
	tgl_jatuh_tempo = '$tgl_jatuh_tempo',
	temuan = '$temuan',
	kondisi = '$kondisi',
	akibat = '$akibat',
	sebab = '$sebab',
	tindak_lanjut = '$tindak_lanjut',
	tanggal_audit_selesai = '$tanggal_audit_selesai',
	progres_tindak_lanjut = '$progres_tindak_lanjut' 
	WHERE id_audit = '$id_audit'";

// print_r($query);die();
	$hasil = mysqli_query($koneksi,$query);
	if(!$hasil){
		die("Gagal menambahkan data! Error: ".$query.". ".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Data Temuan Berhasil Diperbaharui...');window.location='./index.php';</script>" ;
	}
///////////////////////////////////////////UPDATE TEMUAN/////////////////////////////////////////////////

}

///////////////////////////////////////////SELESAI TEMUAN/////////////////////////////////////////////////
if(isset($_POST['selesai_temuan'])){
	$id_audit = $_POST['id_audit'];
	
	
	$status = "selesai";

	$query = "UPDATE tb_monitor_tindak_lanjut SET
	status = '$status' 
	WHERE id_audit = '$id_audit'";

//print_r($query);die();
	$hasil = mysqli_query($koneksi,$query);
	if(!$hasil){
		die("Gagal menambahkan data! Error: ".$query.". ".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Data Temuan Selesai Diproses...');window.location='./index.php';</script>" ;
	}
///////////////////////////////////////////SELESAI TEMUAN/////////////////////////////////////////////////

}

////////////////////// HAPUS PENGGUNA/////////////////////////////////////////////////
if(isset($_GET['id_hapus'])){
	$id_audit = $_GET['id_hapus'];
	$flag_del = 1;
	//echo $id_perkuliahan;
	$query = "UPDATE tb_monitor_tindak_lanjut SET
	flag_del = '$flag_del'
	WHERE id_audit = '$id_audit'";
	$hasil = mysqli_query($koneksi,$query);
	if(!$hasil){
		die("Gagal Hapus data pengguna! Error: ".$query.". ".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Berhasil Hapus Data Temuan...');window.location='./index.php';</script>" ;
	}
}

 ?>