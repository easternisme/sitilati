  <?php //include ("chained_script.php") ?>

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Suspend Akun</h4>
    </div>
    <div class="modal-body">

     
      <?php require'../koneksi_database.php';
      $id_user = $_GET['suspend_id'];     
      $status = $_GET['order'];   
      $query = "SELECT * FROM tb_users_bawaslu WHERE id_user='$id_user' ";
      //print_r($query);die();
      $sql = mysqli_query($koneksi,$query);
      $data = mysqli_fetch_assoc($sql); 
      //$koneksi = buka_koneksi(); ?>
              <form role="form" action="proses.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                 
                  <input type="hidden" name="username" value="<?php echo $data['username']; ?>">
                   <input type="hidden" name="status" value="<?php echo $status; ?>">
                  
                </div>
                <?php if($status=="0"){ ?>
               <h4>Apakah anda yakin mensuspend akun <?php echo $data['username'] ;?> ?</h4>
             <?php } else { ?>
               <h4>Apakah anda yakin unsuspend akun <?php echo $data['username'] ;?> ?</h4>
             <?php } ?>
               
    <div class="modal-footer">
      <a href="#" class="btn btn-default" data-dismiss="modal">Tidak</a>
     <button type="submit" name="suspend_akun" class="btn btn-danger">
      <strong>Ya</strong>
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