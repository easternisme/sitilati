<?php 


// Koneksi ke MySQL dengan PDO
// $host = 'localhost'; // Nama hostnya
// $username = 'oemahco1_sio'; // Username
// $password = 'timoeryulis14'; // Password (Isi jika menggunakan password)

$host = 'localhost'; // Nama hostnya
$username = 'root'; // Username
$password = ''; // Password (Isi jika menggunakan password)
$database = 'db_sitilati';

$koneksi = mysqli_connect($host, $username, $password, $database);
if(!$koneksi){
	die('Koneksi Error : '.mysqli_connect_errno().
    ' - '.mysqli_connect_error());
} 



 ?>