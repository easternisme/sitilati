<?php 

if(isset($_POST['masuk'])){
	session_start();
	include('koneksi_database.php');
	include('fungsi.php');

	if($_SESSION["Captcha"]!=$_POST["nilaiCaptcha"]){
	
		$keterangan = "Captcha Salah...";
		
		 echo  "<script > 
	 	window.alert('Kode Captcha Anda salah');   
		window.location='./.';
     	</script>";
	} else {


	
	
		
		$username =  $_POST['username'];
		$password =  sha1($_POST['pass']);
		$query = "SELECT * FROM tb_users_bawaslu WHERE username ='$username' AND password = '$password' AND flag_del = '0' ";
		$query2 = "SELECT * FROM tb_akses WHERE username ='$username' ";
	//	print_r($username);die();
		//$alamat_ip = "172.18.2.44";
	    $sql = mysqli_query($koneksi,$query);
	    $sql2 = mysqli_query($koneksi,$query2);
		$data = mysqli_fetch_assoc($sql);
		$data2 = mysqli_fetch_assoc($sql2);
		$hasil = mysqli_num_rows($sql);
		$hasil2 = mysqli_num_rows($sql2);
		if($hasil==0 && $hasil2==0){						
			echo " <script>window.alert('Username dan Password anda salah....');window.location='./.'</script>";
		} else {
			if($data2['status']=="1"){
				session_start();
				$_SESSION["username"]  	= $data['username'];
				$_SESSION["login"] 		= "sukses";
				$_SESSION["hak_akses"]  = $data2['hak_akses'];
				//$keterangan = "Login Berhasil....";
				if($data2['hak_akses']=="admin"){
					echo " <script>window.alert('Selamat Datang ".$data['username']."');window.location='admin/.'</script>";
				} else if ($data2['hak_akses']=="pusat"){
					echo " <script>window.alert('Selamat Datang ".$data['username']."');window.location='pusat/.'</script>";
				} else if ($data2['hak_akses']=="user"){
					echo " <script>window.alert('Selamat Datang ".$data['username']."');window.location='page/.'</script>";
				} else {
					echo " <script>window.alert('Username tidak memiliki akses....');window.location='./.'</script>";
				}
			} else {
				
				echo " <script>window.alert('Username anda terblokir, hubungi Administrator !');window.location='./.'</script>";
			
			}


	  }
			}

	}




 ?>