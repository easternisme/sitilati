<?php
include ('koneksi_database.php');
//$koneksi = buka_koneksi();
session_start();

// remove all session variables
session_unset();

// destroy the session 
session_destroy();
 
echo  "<script > 
    window.alert('Anda telah keluar dari aplikasi....');   
    window.location='./.';
     </script>";

?>