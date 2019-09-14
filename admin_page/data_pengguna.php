
<?php 
include('../koneksi_database.php');
include('../fungsi.php'); 
include('head.php');
include('header.php'); ?>



    <section>
      <section class="hbox stretch">
        <?php include('side_bar.php') ?>

        <?php
        $username = decrypt($_SESSION['username']);
        $query =  mysqli_prepare($koneksi,"SELECT u.*,p.*,t.*,a.ip_address,a.date_created FROM tb_user u,tb_akses_user a,tb_personel p,tb_tipe_user t WHERE u.username = ? AND u.id_user = a.id_user AND p.id_personel = a.id_personel AND t.id_tipe_user = a.id_tipe_user  ");
        mysqli_stmt_bind_param($query,"s",$username);
        mysqli_stmt_execute($query);
        $hasil = mysqli_stmt_get_result($query);
        $data = mysqli_fetch_assoc($hasil);
          ?>

        <section id="content">
          <section class="vbox">
           <!--  <header class="header bg-white b-b b-light">
              <p>Home / Data / Personel</p>
            </header> -->
            <section class="scrollable">
              <section class="hbox stretch">
               
               <!--  <aside class="bg-white"> -->
                  <section class="vbox">
                   


                    <section class="scrollable padder">
              
                       <ul class="breadcrumb no-border no-radius b-b b-light pull-in garis"  >
                         <li ><a href="index.html"><i class="fa fa-users"></i> Data</a></li>
                         <li class="active">Pengguna</li>
                      
                      </ul>
                      <div class="row">

        <!-- /////////////////////////////////////////// Tabel //////////////////////////////////////////////////////////// -->
                        <div class="col-md-8">
                         
                        </div>
        <!-- /////////////////////////////////////////// Tabel //////////////////////////////////////////////////////////// -->
                       <div class="col-lg-12">
                          <section class="panel panel-default">
                            <div class="panel-body">
                               <a href="tambah_pengguna.php" class="btn btn-info tbh"  data-toggle="ajaxModal">Tambah Pengguna</a>
                               <?php 
                                $nomor = 1;
                                $query = "SELECT u.*,p.*,t.*,a.id_akses_user,a.ip_address,a.date_created FROM tb_user u,tb_akses_user a,tb_personel p,tb_tipe_user t WHERE u.id_user = a.id_user AND p.id_personel = a.id_personel AND t.id_tipe_user = a.id_tipe_user ORDER BY a.id_akses_user ASC ";              
                                $sql = mysqli_query($koneksi,$query);
                                ?>
                              <table class="table table-striped table-bordered data">
                            <thead>
                              <tr>
                                <th >No</th>
                                <th >Nama</th>
                                <th >Pangkat</th>
                                <th >NRP</th>
                                <th >Kesatuan</th>
                                <th >Username</th>
                                <th >Hak Akses</th>                                
                                <th >Pilihan</th>
                              </tr>
                            </thead>
                          
                            
                       
                            <tbody>
                               <?php 
                               
                                 while ($data = mysqli_fetch_assoc($sql)){
                                  ?>
                            <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['pangkat']; ?></td>
                            <td><?php echo $data['nrp']; ?></td>
                            <td><?php echo $data['kesatuan']; ?></td>
                            <td><?php echo $data['username'] ?><br>
                              IP : <?php if($data['ip_address']=="::1"){echo "localhost";} else{ echo $data['ip_address'];} ?></td>
                            <td><?php echo $data['tipe_user']; ?></td>
                           

                            <td>                   
                            <a href="edit_data_pengguna.php?id_update=<?php echo enkripsi($data['id_user']); ?>" data-toggle="ajaxModal"  ><span class="text-info"><i class="fa fa-key" title="Reset Password"></i></span></a>

                            <a href="update_pengguna.php?id_akses=<?php echo enkripsi($data['id_akses_user']); ?>" data-toggle="ajaxModal"  ><span class="text-success"><i class="fa fa-pencil" title="Edit User"></i></span></a>

                            <?php if($data['status']=="1"){ ?>

                            <a onclick="return confirm('Suspend akun <?php echo $data['username'] ?> ?')" href="proses.php?suspend=<?php echo enkripsi($data['id_user']); ?>" ><span class="text-warning"><i class="fa fa-lock" title="Suspend"></i></span></a>
                            <?php } else { ?>
                            <a onclick="return confirm('Unsuspend akun <?php echo $data['username'] ?> ?')" href="proses.php?unsuspend=<?php echo enkripsi($data['id_user']); ?>" ><span class="text-success"><i class="fa fa-lock" title="Unuspend"></i></span></a>
                            <?php } ?>
                           
                            <a onclick="return confirm('Apakah Anda Yakin ingin menghapus data <?php echo $data['username'] ?> ?')" href="proses.php?hapus_pengguna=<?php echo $data['id_user'] ?>" ><span class="text-danger"><i class="fa fa-trash-o" title="Hapus"></i></span></a>


                          </td>
                            </tr><?php } ?>
                            </tbody>
                          </table>
                              

                            </div>
                          </section>
                        </div>

                      </div>
  

                    <!-- </section> -->
                  </section>




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
  <script src="../lib/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../lib/js/bootstrap.js"></script>
  <!-- App -->
  <script src="../lib/js/app.js"></script>
  <script src="../lib/js/app.plugin.js"></script>
  <script src="../lib/js/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../lib/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="../lib/js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="../lib/js/charts/flot/jquery.flot.min.js"></script>
  <script src="../lib/js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="../lib/js/charts/flot/jquery.flot.resize.js"></script>
  <script src="../lib/js/charts/flot/jquery.flot.grow.js"></script>
  <script src="../lib/js/charts/flot/demo.js"></script>

  <script src="../lib/js/calendar/bootstrap_calendar.js"></script>
  <script src="../lib/js/calendar/demo.js"></script>

  <script src="../lib/js/sortable/jquery.sortable.js"></script>
  <!-- datatables -->
<script src="../lib/js/datatables/dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>

</body>
</html>