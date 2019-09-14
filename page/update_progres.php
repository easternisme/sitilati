  <?php //include ("chained_script.php") ?>

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Update Progres Temuan</h4>
    </div>
    <div class="modal-body">

     
      <?php require'../koneksi_database.php';
      $id_audit = $_GET['edit_id'];
      $query = "SELECT * FROM tb_monitor_tindak_lanjut WHERE id_audit = '$id_audit' ";
      $sql = mysqli_query($koneksi,$query);
      $data = mysqli_fetch_assoc($sql); 
      //$koneksi = buka_koneksi(); ?>
              <form role="form" action="proses.php" method="POST" enctype="multipart/form-data">
                 
                    <input type="hidden" name="id_audit" value="<?php echo $data['id_audit']; ?>">
                    
              <!--   <div class="form-group">
                  <label>Auditee</label>
                  <input type="hidden" name="id_audit" value="<?php echo $data['id_audit']; ?>">
                  <input type="text" class="form-control" value="<?php echo $data['auditee']; ?>"  name="auditee">
                </div> -->
                <div class="form-group">
                  <label>Ketua Tim Audit</label>
                  <input type="text" class="form-control" value="<?php echo $data['ketua_tim_audit']; ?>" name="ketua_tim_audit" readonly>
                </div>
              
                <div class="form-group">
                      <label >Tanggal Jatuh Tempo</label> <br>                    
                        <input class="input-sm input-s datepicker-input form-control" size="16" type="text" name="tgl_jatuh_tempo" data-date-format="dd-mm-yyyy" id="beginn" value="<?php echo date('d-m-Y',strtotime($data['tgl_jatuh_tempo'])); ?>" readonly>                      
                </div>
               
              
                <div class="form-group">
                  <label>Progres Tindak Lanjut </label>
                  <textarea class="form-control" placeholder=" Progres Tindak Lanjut" name="progres_tindak_lanjut"><?php echo $data['progres_tindak_lanjut']; ?></textarea>                 
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
     <button type="submit" name="update_temuan" class="btn btn-success">
      <strong>Update</strong>
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