
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
                         <li class="active">Personel</li>
                      
                      </ul>
                      <div class="row">

        <!-- /////////////////////////////////////////// Tabel //////////////////////////////////////////////////////////// -->
                        <div class="col-md-8">
                         
                        </div>
        <!-- /////////////////////////////////////////// Tabel //////////////////////////////////////////////////////////// -->
                       <div class="col-lg-12">
                          <section class="panel panel-default">
                            <div class="panel-body">
                               <a href="tambah_personel.php" class="btn btn-info tbh"  data-toggle="ajaxModal">Tambah Personel</a>
                               <?php 
                                $nomor = 1;
                                $query = "SELECT * FROM tb_personel ORDER BY id_personel ASC";              
                                $sql = mysqli_query($koneksi,$query);
                                ?>
                              <table class="table table-striped table-bordered data">
                            <thead>
                              <tr>
                                <th >No</th>
                                <th >Nama</th>
                                <th >Pangkat</th>
                                <th >NRP</th>
                                <th >Jabatan</th>
                                <th >Kesatuan</th>
                                <th >Tempat, Tgl Lahir</th>
                                <th >Alamat</th>
                                <th >No Hp</th>
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
                            <td><?php echo $data['jabatan']; ?></td>
                            <td><?php echo $data['kesatuan'] ?></td>
                            <td><?php echo $data['tempat_lahir'].", ".date('d-m-Y',strtotime($data['tgl_lahir'])); ?></td>
                            <td><?php echo $data['alamat']; ?></td>
                            <td><?php echo $data['no_hp']; ?></td>
                           

                            <td>                   
                            <a href="edit_data_personel.php?edit_id=<?php echo enkripsi($data['id_personel']) ;?>" data-toggle="ajaxModal"  ><span class="text-info"><i class="fa fa-pencil" title="Update Data"></i></span></a>
                           
                            <a onclick="return confirm('Apakah Anda Yakin ingin menghapus data <?php echo $data['nama_dosen'] ?> ?')" href="proses.php?id_dosen=<?php echo $data['nik'] ?>" ><span class="text-danger"><i class="fa fa-trash-o" title="Hapus"></i></span></a>
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