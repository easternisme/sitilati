<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
  <meta charset="utf-8" />
  <title>SI-TILATI</title>
  <link rel="shortcut icon" href="images/Bawaslu.png"/>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css" />
   <link rel="stylesheet" href="assets/css/animate.css" type="text/css" /> 
  <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css" /> 
  <link rel="stylesheet" href="assets/css/font.css" type="text/css" /> 
    <link rel="stylesheet" href="assets/css/app.css" type="text/css" />
     <link rel="stylesheet" href="assets/css/login.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
   <style>
   #video { position: absolute;width: 100%;height: 100%; z-index: 1; }
 </style>
</head>
<body>
 <div class="vid-container">
  <video id="Video1" class="bgvid back" autoplay="true" muted="muted" preload="auto" loop>
      <source src="images/background2.MP4" type="video/mp4">
  </video>

      <section id="content" class="m-t-lg wrapper-md animated fadeInUp " >

        <div class="container aside-xxl">
          
          <section class="panel panel-default bg-white m-t-lg " > 
             <header class="panel-heading text-center"><strong>Sistem Informasi Tindak Lanjut Temuan Internal</strong></header>
           
          <center>  <a href="../."><img src="images/Bawaslu.png" style="width: 300px"></a></center>
           <form action="proses_login.php" method="POST" class="panel-body wrapper-lg">
            <div class="form-group">
              <label class="control-label">Username</label>
              <input name="username" type="text" placeholder="Username" class="form-control input-lg">
            </div>

            <div class="form-group"> 
              <label class="control-label">Password</label>
              <input name="pass" type="password" id="inputPassword" placeholder="Password" class="form-control input-lg">
            </div>

            <div class="form-group">
              <label class="control-label" style="color: white">Captcha</label>
             <img src="gambar.php" alt="Captcha">
            </div>
             <div class="form-group">
              <label class="control-label" style="color: white">Isikan Captcha</label>
              <input type="text" placeholder="Captcha" value="" maxlength="6" class="form-control input-lg" name="nilaiCaptcha">
            </div>

           <button type="submit" name="masuk" class="btn btn-primary">Masuk</button>
           <div class="line line-dashed"></div>
         </form>
                              
          </section>
        </div>
  </section>

  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small style="color: yellow">Beta Version<br>Copyright : www.oemah-codding.com</small>
      </p>
    </div>
  </footer>
</div>
  <!-- / footer -->
  <script src="assets/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="assets/js/bootstrap.js"></script>
  <!-- App -->
  <script src="assets/js/app.js"></script>
  <script src="assets/images/login.js"></script>
 <!--  <script src="js/app.plugin.js"></script>
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script> -->
  
</body>
</html>