  <?php //include ("chained_script.php") ?>

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Update Pengguna</h4>
    </div>
    <div class="modal-body">

     
      <?php require'../koneksi_database.php';
      $id_user = $_GET['edit_id'];      
      $query = "SELECT u.*,a.* FROM tb_users_bawaslu u, tb_akses a WHERE u.flag_del = 0 AND u.username = a.username AND u.id_user='$id_user' ";
      //print_r($query);die();
      $sql = mysqli_query($koneksi,$query);
      $data = mysqli_fetch_assoc($sql); 
      //$koneksi = buka_koneksi(); ?>
              <form role="form" action="proses.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Nama Pengguna</label>
                  <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                  <input type="text" class="form-control" value="<?php echo $data['pengguna']; ?>"  name="pengguna">
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" value="<?php echo $data['username']; ?>" name="username" readonly>
                </div>
                 <div class="form-group">
                  <label>Hak Akses</label>
                  <select name="hak_akses" class="form-control m-b">
                    <option value="" disabled selected>--Pilih Hak Akses--</option>
                    <option value="admin" <?php if($data['hak_akses']=="admin"){echo "selected";} ?>>Admin</option>     
                    <option value="pusat" <?php if($data['hak_akses']=="pusat"){echo "selected";} ?>>Pusat</option>
                    <option value="user" <?php if($data['hak_akses']=="user"){echo "selected";} ?>>User</option>                         
                  </select>   
                </div>
             
               
    <div class="modal-footer">
      <a href="#" class="btn btn-default" data-dismiss="modal">Tutup</a>
     <button type="submit" name="update_pengguna" class="btn btn-success">
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