<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>Sisfo TNI</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../js/calendar/bootstrap_calendar.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />
  <link rel="stylesheet" href="../js/datatables/datatables.css" type="text/css"/>
  <link rel="stylesheet" href="js/datepicker/datepicker.css" type="text/css" />
  <style>

    .datepicker{z-index:1151;}

    </style>
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body>
   <?php 
 session_start(); 
    if (!isset($_SESSION['login']) && $_SESSION['login']!=="sukses" ) {
         echo  "<script > 
    window.alert('Silahkan Log In !!!');   
    window.location='../login.php';
     </script>";

    }