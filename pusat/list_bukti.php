  <?php require'../koneksi_database.php';
      $id_audit = $_GET['edit_id'];
      $query = "SELECT * FROM tb_monitor_tindak_lanjut WHERE id_audit = '$id_audit' ";
      $sql = mysqli_query($koneksi,$query);
      $data = mysqli_fetch_assoc($sql); 
      //$koneksi = buka_koneksi(); ?>

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">List Bukti</h4>
    </div>
    <div class="modal-body">

     
     
                
                    <input type="hidden" name="id_audit" value="<?php echo $data['id_audit']; ?>">
                    <input type="hidden" name="auditee" value="<?php echo $data['auditee']; ?>">
                     

              <!--   <div class="form-group">
                  <label>Auditee</label>
                  <input type="hidden" name="id_audit" value="<?php echo $data['id_audit']; ?>">
                  <input type="text" class="form-control" value="<?php echo $data['auditee']; ?>"  name="auditee">
                </div> -->
                <div class="form-group">
                  <a href="#">
                    <span class="m-b-xs h4 block">Temuan :</span>
                    <small class="text-muted"><?php echo $data['temuan'] ?></small>
                  </a>
                </div>
                <div class="form-group">
                  <a href="#">
                    <span class="m-b-xs h4 block">Ketua Tim Audit :</span>
                    <small class="text-muted"><?php echo $data['ketua_tim_audit'] ?></small>
                  </a>
                </div>
                 <!-- /////////////////////////////////////////// Tabel //////////////////////////////////////////////////////////// -->
                 <div class="form-group">
                    <section class="panel panel-default">
                      <div class="panel-body">
                         
                         <?php 
                          //$auditee = $_SESSION['username'];
                          $nomor = 1;
                          $query = "SELECT m.*,b.* FROM tb_monitor_tindak_lanjut m,tb_bukti b WHERE m.id_audit = b.id_audit AND m.id_audit = '$id_audit' AND m.flag_del = 0 ORDER BY id_bukti ASC";              
                          $sql = mysqli_query($koneksi,$query);
                          ?>
                        <table class="table table-striped table-bordered data">
                      <thead>
                        <tr>
                          <th >No</th>                          
                          <th >Nama File</th>
                          <th >Tgl.Upload</th>
                        </tr>
                      </thead>
                    
                      
                 
                      <tbody>
                         <?php 
                         
                      while ($data = mysqli_fetch_assoc($sql)){
                            ?>
                      <tr>
                      <td><?php echo $nomor++; ?></td>
                    
                      <td><a href="<?php echo $data['file']; ?>"><?php echo $data['nama_file']; ?>.<?php echo $data['tipe_file']; ?></a></td>
                      <td> <?php echo date('d-m-Y',strtotime($data['tanggal_upload'])); ?> </td>
                      </tr><?php } ?>
                      </tbody>
                    </table>
                        

                      </div>
                    </section>
                  </div>
         
                
               
    <div class="modal-footer">
      <a href="#" class="btn btn-default" data-dismiss="modal">Tutup</a>

    
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->



 <div class="modal fade" id="modal-form">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6 b-r">
              
                          <!-- <label>
                          <input type="checkbox"> Remember me
                          </label> -->
                        </div>  
            </div>
          </div>         
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

              <script src="../assets/js/jquery.min.js"></script>
 <script src="../assets/js/bootstrap.js"></script>
  <!-- <script src="../js/app.js"></script> -->
  <script src="../assets/js/app.plugin.js"></script>
  <script src="../assets/js/slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/js/datepicker/bootstrap-datepicker.js"></script>
<script src="../assets/js/file-input/bootstrap-filestyle.min.js"></script>
<!-- file input -->  
<script src="../assets/js/file-input/bootstrap-filestyle.min.js"></script>
<!-- combodate -->
<script src="../assets/js/libs/moment.min.js"></script>
<script src="../assets/js/combodate/combodate.js"></script>
<script>$(function() {
    $('.datepicker').datepicker();
    });</script>