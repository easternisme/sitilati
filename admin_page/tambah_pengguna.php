
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Tambah Data Personel</h4>
    </div>
    <div class="modal-body">     
      <?php require'../koneksi_database.php'; ?>
              <form role="form" action="proses.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" placeholder="Username" name="username">
                </div>

                <div class="form-group">
                <label>Hak Akses : </label><br>
                <div class="btn-group" data-toggle="buttons">

                      <label class="btn btn-sm btn-danger ">
                        <input type="radio" name="hak_akses" id="option1" value="Admin"><i class="fa fa-check text-active"></i> Admin
                      </label>
                      <label class="btn btn-sm btn-warning">
                        <input type="radio" name="hak_akses" id="option2" value="User"><i class="fa fa-check text-active"></i> User
                      </label>                     
                </div>
                </div>

                <div class="form-group">
                  <label>Nama Personel</label>
                
                    <select name="id_personel" class="form-control m-b">
                      <option>--Pilih Personel--</option>
                      <?php 
                      $query = "SELECT * FROM tb_personel ORDER BY id_personel ASC";
                      
                      $sql = mysqli_query($koneksi,$query);
                      while($data = mysqli_fetch_array($sql)){ ?>
                      <option value = "<?php echo $data['id_personel']?>"><?php echo $data['pangkat']." ".$data['nama']." / ".$data['kesatuan']; ?></option>    
                      <?php } ?>
                    </select> 
                </div>

               
             
                <div class="form-group">
                  <label>Password </label>
                  <input type="password" class="form-control" placeholder="Password" name="password" >
                </div>
                
                
              
                <div class="form-group">
                <label>Status Pengguna : </label><br>
                <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-sm btn-success ">
                    <input type="radio" name="status" id="option1" value="1"><i class="fa fa-check text-active"></i> Aktif
                  </label>
                  <label class="btn btn-sm btn-danger">
                    <input type="radio" name="status" id="option2" value="0"><i class="fa fa-check text-active"></i> Suspend
                  </label>                     
                </div>
                </div>

    <div class="modal-footer">
      <a href="#" class="btn btn-default" data-dismiss="modal">Tutup</a>
     <button type="submit" name="tambah_pengguna" class="btn btn-success">
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