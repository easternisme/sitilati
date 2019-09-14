
<?php 
include('../koneksi_database.php');
//$koneksi = buka_koneksi(); 
include('head.php');

include('header.php'); ?>



    <section>
      <section class="hbox stretch">
        <?php include('side_bar.php') ?>

      

        <section id="content">
          <section class="vbox">
            <header class="header bg-white b-b b-light">
              <p>Page / Data Pengguna SI - TILATI</p>
            </header>
            <section class="scrollable">
              <section class="hbox stretch">
               
               <!--  <aside class="bg-white"> -->
                  <section class="vbox">
                    <section class="scrollable padder">
              
                     
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
                                $query = "SELECT u.*,a.* FROM tb_users_bawaslu u, tb_akses a WHERE u.flag_del = 0 AND u.username = a.username ORDER BY u.id_user ASC";              
                                $sql = mysqli_query($koneksi,$query);
                                ?>
                              <table class="table table-striped table-bordered data">
                            <thead>
                              <tr>
                                <th >No</th>
                                <th >Pengguna</th>
                                <th >Username</th>
                                <th >Hak Akses</th>
                                <th >Status</th>                               
                                <th >Pilihan</th>
                              </tr>
                            </thead>
                          
                            
                       
                            <tbody>
                               <?php 
                               
                            while ($data = mysqli_fetch_assoc($sql)){
                              if($data['status']=="1"){$status="Aktif";} else {$status="Suspended";}
                                  ?>
                            <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $data['pengguna']; ?></td>
                            <td><?php echo $data['username']; ?></td> 
                            <td><?php echo ucfirst($data['hak_akses']); ?></td>                          
                            <td><?php echo $status; ?></td>     
                            <td>  
                            <a href="edit_pengguna.php?edit_id=<?php echo $data['id_user'] ?>" data-toggle="ajaxModal"  ><span class="text-info"><i class="fa fa-pencil" title="Edit Pengguna"></i></span></a>

                            <a href="update_password.php?password_id=<?php echo $data['id_user'] ?>" data-toggle="ajaxModal"  ><span class="text-success"><i class="fa fa-key" title="Reset Password"></i></span></a>
                            <?php if($status=="Aktif"){$text="text-warning";$kata="Blokir";$logo="fa fa-lock";$order="0"; } else {$text="text-success";$kata="Buka Blokir";$logo="fa fa-unlock";$order="1";}?>

                            <a href="suspend_user.php?suspend_id=<?php echo $data['id_user']?>&order=<?php echo $order ?>" data-toggle="ajaxModal"  ><span class="<?php echo $text; ?>"><i class="<?php echo $logo; ?>" title="<?php echo $kata; ?> Pengguna"></i></span></a>
                           
                            <a onclick="return confirm('Apakah Anda Yakin ingin menghapus akun <?php echo $data['username'] ?> ?')" href="proses.php?id_hapus=<?php echo $data['id_user'] ?>" ><span class="text-danger"><i class="fa fa-trash-o" title="Hapus Pengguna"></i></span></a>
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
  <script src="../assets/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../assets/js/bootstrap.js"></script>
  <!-- App -->
  <script src="../assets/js/app.js"></script>
  <script src="../assets/js/app.plugin.js"></script>
  <script src="../assets/js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="../assets/js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="../assets/js/charts/flot/jquery.flot.min.js"></script>
  <script src="../assets/js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="../assets/js/charts/flot/jquery.flot.resize.js"></script>
  <script src="../assets/js/charts/flot/jquery.flot.grow.js"></script>
  <script src="../assets/js/charts/flot/demo.js"></script>

  <script src="../assets/js/calendar/bootstrap_calendar.js"></script>
  <script src="../assets/js/calendar/demo.js"></script>

  <script src="../assets/js/sortable/jquery.sortable.js"></script>
   <!-- datatables -->
  <script src="../assets/js/datatables/datatables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.data').DataTable();
    });
  </script>

</body>
</html>