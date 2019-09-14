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
      <h4 class="modal-title">Upload Bukti Temuan</h4>
    </div>
    <div class="modal-body">

     
     
              <form role="form" action="proses.php" method="POST" enctype="multipart/form-data">
                
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
                <div class="form-group">
                  <label >Nama File Bukti</label><br>                  
                    <input type="text" name="nama_file" class="form-control">
                 
                </div>
                 <div class="form-group">
                  <label >File Input (PDF / JPEG)</label><br>                  
                    <input type="file" name="file" required data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline input-s">
                 
                </div>
               
                
               
    <div class="modal-footer">
      <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
     <button type="submit" name="upload_bukti" class="btn btn-success">
      <strong>Upload</strong>
      </button>  
    </form> 
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