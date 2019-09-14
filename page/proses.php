<?php 

require '../koneksi_database.php';


///////////////////////////////////////////UPDATE TEMUAN/////////////////////////////////////////////////
if(isset($_POST['update_temuan'])){
	$id_audit = $_POST['id_audit'];
	$auditee = $_POST['auditee'];
	$ketua_tim_audit = $_POST['ketua_tim_audit'];	
	$progres_tindak_lanjut = $_POST['progres_tindak_lanjut'];	

	$query = "UPDATE tb_monitor_tindak_lanjut SET	
	progres_tindak_lanjut = '$progres_tindak_lanjut' 
	WHERE id_audit = '$id_audit'";

// print_r($query);die();
	$hasil = mysqli_query($koneksi,$query);
	if(!$hasil){
		die("Gagal menambahkan data! Error: ".$query.". ".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Data Progres Berhasil Diperbaharui...');window.location='./index.php';</script>" ;
	}
///////////////////////////////////////////UPDATE TEMUAN/////////////////////////////////////////////////

}

if(isset($_POST['upload_bukti'])){
				
				$allowed_ext	= array('jpg', 'jpeg',  'pdf','JPG', 'JPEG');
				$auditee		= $_POST['auditee'];
				$file_name		= $_FILES['file']['name'];
				$file_ext		= strtolower(end(explode('.', $file_name)));
				$file_size		= $_FILES['file']['size'];
				$file_tmp		= $_FILES['file']['tmp_name'];
				$nama_file		= $_POST['nama_file']."_".$auditee;
				$tgl			= date("Y-m-d");
				$id_audit		= $_POST['id_audit'];
				$flag_del		= "0";

				if(in_array($file_ext, $allowed_ext) === true){
					if($file_size < 20000000){

						$lokasi = '../bukti/'.$nama_file.'.'.$file_ext;
						print_r($lokasi);
						move_uploaded_file($file_tmp, $lokasi);
						$in = mysqli_query($koneksi,"INSERT INTO tb_bukti(
							id_audit,
							nama_file,
							tipe_file,
							ukuran_file,
							file,
							tanggal_upload,
							flag_del) VALUES('$id_audit', '$nama_file', '$file_ext', '$file_size', '$lokasi','$tgl','$flag_del')");
					
						if($in){
							echo "<script> window.alert('Data Berhasil diupload');window.location='./.';</script>";
						}else{
							echo "<script> window.alert('ERROR: Gagal upload file!');</script>"; 
						}
					}else{
						echo "<script> window.alert('ERROR: Besar ukuran file (file size) maksimal 20 Mb!');</script>";
					}
				}else{
					echo "<script> window.alert('ERROR: Ekstensi file tidak di izinkan!');</script>";
				}
}

////////////////////// HAPUS PENGGUNA/////////////////////////////////////////////////
if(isset($_GET['id_hapus'])){
	$id_bukti = $_GET['id_hapus'];
	$flag_del = 1;
	//echo $id_perkuliahan;
	$query = "UPDATE tb_bukti SET
	flag_del = '$flag_del'
	WHERE id_bukti = '$id_bukti'";
	$hasil = mysqli_query($koneksi,$query);
	if(!$hasil){
		die("Gagal Hapus data pengguna! Error: ".$query.". ".mysqli_error($koneksi));
	} else {
		echo "<script> window.alert('Berhasil Hapus File...');window.location='./index.php';</script>" ;
	}
}





 ?>