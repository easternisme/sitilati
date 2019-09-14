  <?php //include ("chained_script.php") ?>

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Update Data Temuan</h4>
    </div>
    <div class="modal-body">

     
      <?php require'../koneksi_database.php';
      $id_audit = $_GET['edit_id'];
      $query = "SELECT * FROM tb_monitor_tindak_lanjut WHERE id_audit = '$id_audit' ";
      $sql = mysqli_query($koneksi,$query);
      $data = mysqli_fetch_assoc($sql); 
      //$koneksi = buka_koneksi(); ?>
              <form role="form" action="proses.php" method="POST" enctype="multipart/form-data">
                 <div class="form-group">
                   <label>Auditee</label>
                    <input type="hidden" name="id_audit" value="<?php echo $data['id_audit']; ?>">
                     <select name="auditee" style="width: 100%" class="form-control m-b">
                           <?php 
                      $query_auditee = "SELECT u.*,a.* FROM tb_users_bawaslu u, tb_akses a WHERE a.username = u.username AND a.hak_akses = 'user' ORDER BY u.id_user ASC";
                      
                      $sql_auditee = mysqli_query($koneksi,$query_auditee);

                      while($data_auditee = mysqli_fetch_assoc($sql_auditee)) { 

                        if($data['auditee']==$data_auditee['username']) { ?>

                      <option selected value= "<?php echo $data_auditee['username'];?>"><?php echo $data_auditee['pengguna']; ?></option>    
                      <?php } else {?>

                      <option value="<?php echo $data_auditee['username'];?>"><?php echo $data_auditee['pengguna'] ;?></option>
                      <?php } }?>
                      </select>
                 </div>

              <!--   <div class="form-group">
                  <label>Auditee</label>
                  <input type="hidden" name="id_audit" value="<?php echo $data['id_audit']; ?>">
                  <input type="text" class="form-control" value="<?php echo $data['auditee']; ?>"  name="auditee">
                </div> -->
                <div class="form-group">
                  <label>Ketua Tim Audit</label>
                  <input type="text" class="form-control" value="<?php echo $data['ketua_tim_audit']; ?>" name="ketua_tim_audit">
                </div>
                <div class="form-group">
                      <label >Tanggal Audit Mulai</label> <br>                    
                        <input class="input-sm input-s datepicker-input form-control" size="16" type="text" name="tanggal_audit_mulai" data-date-format="dd-mm-yyyy" id="end" value="<?php echo date('d-m-Y',strtotime($data['tanggal_audit_mulai'])); ?>">                      
                </div>
                <div class="form-group">
                      <label >Tanggal Audit Selesai</label> <br>                    
                        <input class="input-sm input-s datepicker-input form-control" size="16" type="text" name="tanggal_audit_selesai" data-date-format="dd-mm-yyyy" id="middle" value="<?php echo date('d-m-Y',strtotime($data['tanggal_audit_selesai'])); ?>">                      
                </div> 
                <div class="form-group">
                      <label >Tanggal Jatuh Tempo</label> <br>                    
                        <input class="input-sm input-s datepicker-input form-control" size="16" type="text" name="tgl_jatuh_tempo" data-date-format="dd-mm-yyyy" id="beginn" value="<?php echo date('d-m-Y',strtotime($data['tgl_jatuh_tempo'])); ?>">                      
                </div>
               
                <div class="form-group">
                  <label>Temuan </label>
                  <textarea class="form-control" placeholder=" Temuan" name="temuan"><?php echo $data['temuan']; ?></textarea>                 
                </div>
                <div class="form-group">
                  <label>Kondisi </label>
                  <textarea class="form-control" placeholder=" Kondisi" name="kondisi"><?php echo $data['kondisi']; ?></textarea>                 
                </div>
                <div class="form-group">
                  <label>Akibat </label>
                  <textarea class="form-control" placeholder=" Akibat" name="akibat"><?php echo $data['akibat']; ?></textarea>                 
                </div>
                <div class="form-group">
                  <label>Sebab </label>
                  <textarea class="form-control" placeholder=" Sebab" name="sebab"><?php echo $data['sebab']; ?></textarea>                 
                </div>
                <div class="form-group">
                  <label>Tindak Lanjut </label>
                  <textarea class="form-control" placeholder=" Tindak Lanjut" name="tindak_lanjut"><?php echo $data['tindak_lanjut']; ?></textarea>                 
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