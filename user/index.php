
<?php 
include('../koneksi_database.php');
$koneksi = buka_koneksi(); 
include('head.php');
include('header.php'); ?>



    <section>
      <section class="hbox stretch">
        <?php include('side_bar.php') ?>

        <?php
        $username = $_SESSION['username'];
        $query = "SELECT u.*,a.*,p.* FROM tb_user u,tb_akses a,tb_personel p WHERE u.username ='$username' AND u.id_user = a.id_user AND a.id_personel = p.id_personel  ";
        //print_r($query);die();
        $hasil = mysqli_query($koneksi,$query);
        $data = mysqli_fetch_assoc($hasil);
          ?>

        <section id="content">
          <section class="vbox">
            <header class="header bg-white b-b b-light">
              <p>Home / <?php echo $data['nama'] ?>'s profile</p>
            </header>
            <section class="scrollable">
              <section class="hbox stretch">
                <aside class="aside-lg bg-light lter b-r">
                  <section class="vbox">
                    <section class="scrollable">
                      <div class="wrapper">
                        <div class="clearfix m-b">
                          <a href="#" class="pull-left thumb m-r">
                            <img src="../images/user.png" class="img-circle">
                          </a>
                          <div class="clear">
                            <div class="h3 m-t-xs m-b-xs"><?php echo $data['nama'] ?></div>
                          <!--   <small class="text-muted"><i class="fa fa-map-marker"></i> <?php echo $data['alamat'] ?></small> -->
                          </div>                
                        </div>
                        <div class="panel wrapper panel-success">
                          <div class="row">
                            <div class="col-xs-6">
                              <a href="#">
                                <span class="m-b-xs h4 block">Satker</span>
                                <small class="text-muted"><?php echo $data['kesatuan'] ?></small>
                              </a>
                            </div>
                            <div class="col-xs-6">
                              <a href="#">
                                <span class="m-b-xs h4 block">Jabatan</span>
                                <small class="text-muted"><?php echo $data['jabatan'] ?></small>
                              </a>
                            </div>
                           
                          </div>
                        </div>
                       
                        <div>
                          <small class="text-uc text-xs text-muted">Pangkat, Korps</small>
                          <p><?php echo $data['pangkat'] ?>, <?php echo $data['korps'] ?></p>
                          <small class="text-uc text-xs text-muted">NRP</small>
                          <p><?php echo $data['nrp'] ?></p>
                          <small class="text-uc text-xs text-muted">Tempat, tgl Lahir</small>
                          <p><?php echo $data['tempat_lahir'] ?>, <?php echo date('d-m-Y',strtotime($data['tgl_lahir'])) ?></p>
                          <small class="text-uc text-xs text-muted">Golongan Darah</small>
                          <p><?php echo $data['gol_darah'] ?></p>
                          <small class="text-uc text-xs text-muted">Agama</small>
                          <p><?php echo $data['agama'] ?></p>
                          <small class="text-uc text-xs text-muted">Jenis Kelamin</small>
                          <p><?php echo $data['jenis_kelamin'] ?></p>
                          <small class="text-uc text-xs text-muted">Status Keluarga</small>
                          <p><?php echo $data['status_keluarga'] ?></p>

                        
                          <small class="text-uc text-xs text-muted">Alamat</small>
                          <p><?php echo $data['alamat'] ?></p>
                         
                          <div class="line"></div>
                          <small class="text-uc text-xs text-muted">connection</small>
                          <br>
                          <small class="text-uc text-xs text-muted">No Hp</small>
                          <p><?php echo $data['no_hp'] ?></p>
                          <small class="text-uc text-xs text-muted">E-mail</small>
                          <p><?php echo $data['email'] ?></p>
                        </div>
                      </div>
                    </section>
                  </section>
                </aside>
               <!--  <aside class="bg-white"> -->
                  <section class="vbox">
                    <br>
                    <div class="col-md-8">
                      <section class="panel b-light">
                        <header class="panel-heading bg-primary dker no-border"><strong>Kalender</strong></header>
                        <div id="calendar" class="bg-primary m-l-n-xxs m-r-n-xxs"></div>
                       <!--  <div class="list-group">
                          <a href="#" class="list-group-item text-ellipsis">
                            <span class="badge bg-danger">7:30</span> 
                            Meet a friend
                          </a>
                          <a href="#" class="list-group-item text-ellipsis"> 
                            <span class="badge bg-success">9:30</span> 
                            Have a kick off meeting with .inc company
                          </a>
                          <a href="#" class="list-group-item text-ellipsis">
                            <span class="badge bg-light">19:30</span>
                            Milestone release
                          </a>
                        </div> -->
                      </section>                  
                    </div>

                  </section>
                <!-- </aside> -->

              </section>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>




        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
      </section>
    </section>
  </section>
  <script src="../js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../js/bootstrap.js"></script>
  <!-- App -->
  <script src="../js/app.js"></script>
  <script src="../js/app.plugin.js"></script>
  <script src="../js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="../js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.resize.js"></script>
  <script src="../js/charts/flot/jquery.flot.grow.js"></script>
  <script src="../js/charts/flot/demo.js"></script>

  <script src="../js/calendar/bootstrap_calendar.js"></script>
  <script src="../js/calendar/demo.js"></script>

  <script src="../js/sortable/jquery.sortable.js"></script>
     <!-- datatables -->
  <script src="../assets/js/datatables/datatables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.data').DataTable();
    });
  </script>

</body>
</html>