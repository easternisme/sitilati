
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
              <p>Page / Monitoring Tindak Lanjut</p>
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
                               <a href="tambah_temuan.php" class="btn btn-info tbh"  data-toggle="ajaxModal">Tambah Temuan</a>
                               <?php 
                                $nomor = 1;
                                $query = "SELECT m.*,u.* FROM tb_monitor_tindak_lanjut m,tb_users_bawaslu u WHERE m.auditee = u.username AND m.flag_del = 0 ORDER BY id_audit ASC";              
                                $sql = mysqli_query($koneksi,$query);
                                ?>
                              <table class="table table-striped table-bordered data">
                            <thead>
                              <tr>
                                <th >No</th>
                                <th >Auditee</th>
                                <th >Ketua Tim Audit</th>
                                <th >Tgl.Pemeriksaan</th>
                                <th >Temuan</th>
                                <th >Tindak Lanjut</th>
                                <th >Progres</th>
                                <th >Countdown</th>
                                <th >Pilihan</th>
                              </tr>
                            </thead>
                          
                            
                       
                            <tbody>
                               <?php 
                               
                            while ($data = mysqli_fetch_assoc($sql)){
                                  ?>
                            <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $data['pengguna']; ?></td>
                            <td><?php echo $data['ketua_tim_audit']; ?></td>
                            <td>Mulai : <?php echo date('d-m-Y',strtotime($data['tanggal_audit_mulai'])); ?>
                              
                              <br>Selesai : <?php if($data['tanggal_audit_selesai']==NULL){echo " - ";} else {echo date('d-m-Y',strtotime($data['tanggal_audit_selesai']));} ?>
                            </td>
                            <td><?php echo $data['temuan']; ?></td>
                            <td><?php echo $data['tindak_lanjut']; ?></td>
                            <td><?php echo $data['progres_tindak_lanjut']; ?></td>
                            <td>
                              Tempo : <?php echo date('d-m-Y',strtotime($data['tgl_jatuh_tempo'])); ?>
                              <br>
                              <?php
                              $status = $data['status'];
                              if ($status=="proses"){echo '<b style="color:red">'.ucfirst($status).'</b>';} else {
                                echo '<b style="color:green">'.ucfirst($status).'</b>';} ?> <br>
                              <?php 
                              if($data['status']=="selesai"){echo " - ";} 
                              else{
                              $jatuh_tempo = new DateTime($data['tgl_jatuh_tempo']);
                              $sekarang    = new DateTime();
                              $countdown   = $sekarang->diff($jatuh_tempo);                              
                              $tahun       = $countdown->y;
                              $bulan       = $countdown->m;
                              $hari        = $countdown->d;
                              if($sekarang >= $jatuh_tempo){
                                  if($tahun==0){$tahun = " - ";} else {$tahun = $tahun;}
                                  if($bulan==0){$bulan = " - ";} else {$bulan = $bulan;}
                                  if($hari==0){$hari = " - ";} else {$hari = $hari;}
                                 echo '<strong style="color:red"> (+) '.$tahun.' Tahun / '.$bulan.' Bulan / '.$hari.' Hari</strong>';
                              } else {
                                  if($tahun==0){$tahun = " - ";} else {$tahun = $tahun;}
                                  if($bulan==0){$bulan = " - ";} else {$bulan = $bulan;}
                                  if($hari==0){$hari = " - ";} else {$hari = $hari;}
                                 echo '<strong style="color:blue"> (-) '.$tahun.' Tahun / '.$bulan.' Bulan / '.$hari.' Hari</strong>';
                                }
                              }
                             
                              
                              // if ($tahun > 0){echo " - ".$tahun." Tahun / ".$bulan." Bulan / ".$hari." Hari";}
                              // else if ($tahun == 0){echo " - ".$bulan." Bulan / ".$hari." Hari";}
                             
                               ?>
                            </td>
                           

                            <td>  
                            <a href="detail_temuan.php?detail_id=<?php echo $data['id_audit'] ?>" data-toggle="ajaxModal"  ><span class="text-success"><i class="fa fa-book" title="Detail Temuan"></i></span></a>

                            <a href="edit_temuan.php?edit_id=<?php echo $data['id_audit'] ?>" data-toggle="ajaxModal"  ><span class="text-info"><i class="fa fa-pencil" title="Update Temuan"></i></span></a>

                            <a href="selesai_temuan.php?selesai_id=<?php echo $data['id_audit'] ?>" data-toggle="ajaxModal"  ><span class="text-warning"><i class="fa fa-check" title="Selesai"></i></span></a>
                           
                            <a onclick="return confirm('Apakah Anda Yakin ingin menghapus data temuan <?php echo $data['auditee'] ?> ?')" href="proses.php?id_hapus=<?php echo $data['id_audit'] ?>" ><span class="text-danger"><i class="fa fa-trash-o" title="Hapus"></i></span></a>

                             <a href="list_bukti.php?edit_id=<?php echo $data['id_audit'] ?>" data-toggle="ajaxModal"  ><span class="text-success"><i class="fa fa-folder-open" title="List Bukti"></i></span></a>
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