 <?php require'../koneksi_database.php';
      //$koneksi = buka_koneksi();
      $id_audit = $_GET['detail_id'];
      $query = "SELECT m.*,u.* FROM tb_monitor_tindak_lanjut m,tb_users_bawaslu u WHERE m.auditee = u.username AND m.flag_del = 0 AND m.id_audit = '$id_audit' ";
      //print_r($query);
      $sql = mysqli_query($koneksi,$query);
      $data = mysqli_fetch_assoc($sql); 
      $status = $data['status'];
       ?>

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo $data['pengguna'] ?></h4>
    </div>
    <div class="modal-body">

              
                      <div class="wrapper">
                
                        </div>
                        <div class="panel wrapper panel-success">
                          <div class="row">
                            <div class="col-xs-6">
                              <a href="#">
                                <span class="m-b-xs h4 block">Ketua Tim Audit</span>
                                <small class="text-muted"><?php echo $data['ketua_tim_audit'] ?></small>
                              </a>
                            </div>
                            <div class="col-xs-6">
                              <a href="#">
                                <span class="m-b-xs h4 block">Status Temuan</span>
                                <?php if($status=="proses") {?>
                                <small class="text-muted" style="color: red">Proses</small> 
                                <?php } else { ?>
                                <small class="text-muted" style="color: green">Selesai</small> <?php } ?>
                              </a>
                            </div>
                           
                          </div>
                        </div>
                       
                        <div>
                          <small class="text-uc text-xs text-muted">Tanggal Mulai</small>
                          <p><?php echo date('d-m-Y',strtotime($data['tanggal_audit_mulai'])); ?></p>
                          <small class="text-uc text-xs text-muted">Tanggal Selesai</small>
                          <p><?php if($data['tanggal_audit_selesai']==NULL){echo " - ";} else {echo date('d-m-Y',strtotime($data['tanggal_audit_selesai']));} ?></p>
                          <small class="text-uc text-xs text-muted">Temuan</small>
                          <p><?php echo $data['temuan'] ?></p>
                          <small class="text-uc text-xs text-muted">Kondisi</small>
                          <p><?php echo $data['kondisi'] ?></p>
                          <small class="text-uc text-xs text-muted">Akibat</small>
                          <p><?php echo $data['akibat'] ?></p>
                          <small class="text-uc text-xs text-muted">Sebab</small>
                          <p><?php echo $data['sebab'] ?></p>
                          <small class="text-uc text-xs text-muted">Tindak Lanjut</small>
                          <p><?php echo $data['tindak_lanjut'] ?></p>
                          <small class="text-uc text-xs text-muted">Progres Tindak Lanjut</small>
                          <p><?php echo $data['progres_tindak_lanjut'] ?></p>
                          <small class="text-uc text-xs text-muted">Tanggal Jatuh Tempo</small>
                          <p><?php echo date('d-m-Y',strtotime($data['tgl_jatuh_tempo'])); ?></p>

                        

                        </div>
                      </div>
                  

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

              <script src="../js/jquery.min.js"></script>
 <script src="../js/bootstrap.js"></script>
  <!-- <script src="../js/app.js"></script> -->
  <script src="../js/app.plugin.js"></script>
  <script src="../js/slimscroll/jquery.slimscroll.min.js"></script>
<script src="../js/datepicker/bootstrap-datepicker.js"></script>
<script src="../js/file-input/bootstrap-filestyle.min.js"></script>
<!-- file input -->  
<script src="../js/file-input/bootstrap-filestyle.min.js"></script>
<!-- combodate -->
<script src="../js/libs/moment.min.js"></script>
<script src="../js/combodate/combodate.js"></script>