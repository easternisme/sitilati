    <?php require'../koneksi_database.php';
      $id_audit = $_GET['selesai_id'];
      $query = "SELECT m.*,u.* FROM tb_monitor_tindak_lanjut m,tb_users_bawaslu u WHERE m.auditee = u.username AND m.flag_del = 0 AND m.id_audit = '$id_audit' ";
      $sql = mysqli_query($koneksi,$query);
      $data = mysqli_fetch_assoc($sql); 
      //$koneksi = buka_koneksi(); ?>

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Konfirmasi</h4>
    </div>
    <div class="modal-body">

     
    
              <form role="form" action="proses.php" method="POST" enctype="multipart/form-data">
              
                <div class="form-group">
                 
                  <input type="hidden" name="id_audit" value="<?php echo $data['id_audit']; ?>">
                   <h4 class="modal-title">Apakah anda yakin temuan <?php echo $data['pengguna'] ?> dengan Ketua Tim <?php echo $data['ketua_tim_audit'] ?> dinyatakan selesai ???</h4>
                </div>
               

             
              
               
              
               

             
              

               <!--  <div class="form-group">
                <label>Status Temuan : </label><br>
                <div class="btn-group" data-toggle="buttons">

                      <label class="btn btn-sm btn-danger ">
                        <input type="radio" name="status" id="option1" value="proses"><i class="fa fa-check text-active"></i> Proses
                      </label>
                      <label class="btn btn-sm btn-success">
                        <input type="radio" name="status" id="option2" value="selesai"><i class="fa fa-check text-active"></i> Selesai
                      </label>                     
                </div>
                </div> -->

                
             
                <!--  <div class="form-group">
                      <label class="col-sm-2 control-label">Foto</label>
                      
                        <input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline input-s">
                      
                    </div> -->
    <div class="modal-footer">
      <a href="#" class="btn btn-default" data-dismiss="modal">Tutup</a>
     <button type="submit" name="selesai_temuan" class="btn btn-success">
      <strong>Simpan</strong>
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