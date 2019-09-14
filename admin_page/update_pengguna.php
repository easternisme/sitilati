  <?php //include ("chained_script.php") ?>

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Edit Data User</h4>
    </div>
    <div class="modal-body">
     
      <?php require'../koneksi_database.php';
      include('../fungsi.php');
      $id_akses_user = dekripsi($_GET['id_akses']);
      $query = "SELECT u.*,p.*,t.*,a.id_akses_user,a.ip_address,a.date_created FROM tb_user u,tb_akses_user a,tb_personel p,tb_tipe_user t WHERE u.id_user = a.id_user AND p.id_personel = a.id_personel AND t.id_tipe_user = a.id_tipe_user AND a.id_akses_user = '$id_akses_user' ";
      //print_r($query);
      $sql = mysqli_query($koneksi,$query);
      $data = mysqli_fetch_assoc($sql); 
       ?>
              <form role="form" action="proses.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Username</label>
                  <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
                  <input type="hidden" name="id_akses_user" value="<?php echo $data['id_akses_user']; ?>">
                  <input type="text" class="form-control" value="<?php echo $data['username']; ?>" name="username">
                </div>
               


                <div class="form-group">
                  <label>Personel Pengguna</label>
                
                    <select name="id_personel" class="form-control m-b">
                      <?php 
                      $query_personel = "SELECT * FROM tb_personel ";
                      
                      $sql_personel = mysqli_query($koneksi,$query_personel);

                      while($data_personel = mysqli_fetch_assoc($sql_personel)) { 

                        if($data['id_personel']==$data_personel['id_personel']) { ?>

                      <option selected value= "<?php echo $data_personel['id_personel'];?>"><?php echo $data_personel['pangkat']."  ".$data_personel['korps']." ".$data_personel['nama']." / ".$data_personel['kesatuan']; ?></option>    
                      <?php } else {?>
                     <option value= "<?php echo $data_personel['id_personel'];?>"><?php echo $data_personel['pangkat']."  ".$data_personel['korps']." ".$data_personel['nama']." / ".$data_personel['kesatuan']; ?></option>
                      <?php } }?>
                    </select> 
                </div>

                 <div class="form-group">
                  <label>Personel Pengguna</label>
                
                    <select name="id_tipe_user" class="form-control m-b">
                      <?php 
                      $query_personel = "SELECT * FROM tb_tipe_user ";
                      
                      $sql_personel = mysqli_query($koneksi,$query_personel);

                      while($data_personel = mysqli_fetch_assoc($sql_personel)) { 

                        if($data['id_tipe_user']==$data_personel['id_tipe_user']) { ?>

                      <option selected value= "<?php echo $data_personel['id_tipe_user'];?>"><?php echo $data_personel['tipe_user']; ?></option>    
                      <?php } else {?>
                     <option value= "<?php echo $data_personel['id_tipe_user'];?>"><?php echo $data_personel['tipe_user']; ?></option>
                      <?php } }?>
                    </select> 
                </div>

                <div class="form-group">
                  <label>IP Address</label>
                  <input type="text" class="form-control" value="<?php echo $data['ip_address']; ?>" name="username">
                </div>

                <div class="form-group">
              
    <div class="modal-footer">
      <a href="#" class="btn btn-default" data-dismiss="modal">Tutup</a>
     <button type="submit" name="reset_password" class="btn btn-success">
      <strong>Perbarui</strong>
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

<script src="../lib/js/jquery.min.js"></script>
<script src="../lib/js/bootstrap.js"></script>
<!-- <script src="../js/app.js"></script> -->
<script src="../lib/js/app.plugin.js"></script>
<script src="../lib/js/slimscroll/jquery.slimscroll.min.js"></script>
<script src="../lib/js/datepicker/bootstrap-datepicker.js"></script>
<script src="../lib/js/file-input/bootstrap-filestyle.min.js"></script>
<!-- file input -->  
<script src="../lib/js/file-input/bootstrap-filestyle.min.js"></script>
<!-- combodate -->
<script src="../lib/js/libs/moment.min.js"></script>
<script src="../lib/js/combodate/combodate.js"></script>