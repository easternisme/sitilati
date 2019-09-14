  <?php //include ("chained_script.php") ?>

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Tambah Data Personel</h4>
    </div>
    <div class="modal-body">
     
      <?php require'../koneksi_database.php';
      include('../fungsi.php');
      $id_personel = dekripsi($_GET['edit_id']);
      //print_r(dekripsi($id_personel));die();
      $query = mysqli_prepare($koneksi,"SELECT * FROM tb_personel WHERE id_personel = ? ");
      mysqli_stmt_bind_param($query,"s",$id_personel);
      mysqli_stmt_execute($query);
      $hasil = mysqli_stmt_get_result($query);
      $data = mysqli_fetch_assoc($hasil); 
       ?>
              <form role="form" action="proses.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="hidden" name="id_personel" value="<?php echo enkripsi($data['id_personel']); ?>">
                  <input type="text" class="form-control" value="<?php echo $data['nama']; ?>" name="nama">
                </div>

                <div class="form-group">
                  <label>Pangkat</label>
                  <select name="pangkat" class="form-control m-b">
                    <option value="" disabled selected>--Pilih Pangkat--</option>
                    <option value="Prada" <?php if($data['pangkat']=="Prada"){echo "selected";} ?> >Prada</option>
                    <option value="Pratu" <?php if($data['pangkat']=="Pratu"){echo "selected";} ?> >Pratu</option>
                    <option value="Praka" <?php if($data['pangkat']=="Praka"){echo "selected";} ?> >Praka</option>
                    <option value="Kopda" <?php if($data['pangkat']=="Kopda"){echo "selected";} ?> >Kopda</option>
                    <option value="Koptu" <?php if($data['pangkat']=="Koptu"){echo "selected";} ?> >Koptu</option>
                    <option value="Kopka" <?php if($data['pangkat']=="Kopka"){echo "selected";} ?> >Kopka</option>
                    <option value="Serda" <?php if($data['pangkat']=="Serda"){echo "selected";} ?> >Serda</option>
                    <option value="Sertu" <?php if($data['pangkat']=="Sertu"){echo "selected";} ?> >Sertu</option>
                    <option value="Serka" <?php if($data['pangkat']=="Serka"){echo "selected";} ?> >Serka</option>
                    <option value="Serma" <?php if($data['pangkat']=="Serma"){echo "selected";} ?> >Serma</option>
                    <option value="Pelda" <?php if($data['pangkat']=="Pelda"){echo "selected";} ?> >Pelda</option>
                    <option value="Peltu" <?php if($data['pangkat']=="Peltu"){echo "selected";} ?> >Peltu</option>
                    <option value="Letda" <?php if($data['pangkat']=="Letda"){echo "selected";} ?> >Letda</option>
                    <option value="Lettu" <?php if($data['pangkat']=="Lettu"){echo "selected";} ?> >Lettu</option>
                    <option value="Kapten" <?php if($data['pangkat']=="Kapten"){echo "selected";} ?> >Kapten</option>
                    <option value="Mayor" <?php if($data['pangkat']=="Mayor"){echo "selected";} ?> >Mayor</option>
                     <option value="Letkol" <?php if($data['pangkat']=="Letkol"){echo "selected";} ?> >Letkol</option>
                    <option value="Kolonel" <?php if($data['pangkat']=="Kolonel"){echo "selected";} ?> >Kolonel</option>
                    <option value="Brigjen" <?php if($data['pangkat']=="Brigjen"){echo "selected";} ?> >Brigjend</option>
                    <option value="Mayjend" <?php if($data['pangkat']=="Mayjend"){echo "selected";} ?> >Mayjend</option>
                    <option value="Letjend" <?php if($data['pangkat']=="Letjend"){echo "selected";} ?> >Letjend</option>
                    <option value="Jendral" <?php if($data['pangkat']=="Jendral"){echo "selected";} ?> >Jendral</option>
                  </select>   
                </div>

                <div class="form-group">
                  <label>Korps </label>
                  <input type="text" class="form-control" value="<?php echo $data['korps']; ?>" name="korps" >
                </div>

                <div class="form-group">
                  <label>NRP </label>
                  <input type="text" class="form-control" value="<?php echo $data['nrp']; ?>" name="nrp" >
                </div>

                 <div class="form-group">
                  <label>Kesatuan</label>
                  <input type="text" class="form-control" value="<?php echo $data['kesatuan']; ?>" name="kesatuan">
                </div>

                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" class="form-control" value="<?php echo $data['jabatan']; ?>" name="jabatan">
                </div>
                
                
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" value="<?php echo $data['tempat_lahir']; ?>" name="tempat_lahir">
                </div>

                <div class="form-group">
                      <label >Tanggal Lahir</label> <br>                    
                        <input class="input-sm input-s datepicker-input form-control" size="16" type="text" name="tgl_lahir" data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y',strtotime($data['tgl_lahir'])); ?>">             
                </div>

               

                <div class="form-group">
                <label>Jenis Kelamin : </label><br>
                <div class="btn-group" data-toggle="buttons">

                      <label class="btn btn-sm btn-danger  <?php if ($data['jenis_kelamin']=="Pria"){echo "active";} ?>">
                        <input type="radio" name="jenis_kelamin" id="option1" value="Pria" <?php if ($data['jenis_kelamin']=="Pria"){echo "checked";} ?> ><i class="fa fa-check text-active"></i> Pria
                      </label>
                      <label class="btn btn-sm btn-warning <?php if ($data['jenis_kelamin']=="Wanita"){echo "active";} ?>">
                        <input type="radio" name="jenis_kelamin" id="option2" value="Wanita" <?php if ($data['jenis_kelamin']=="Wanita"){echo "checked";} ?> ><i class="fa fa-check text-active"></i> Wanita
                      </label>                     
                </div>
                </div>

                 <div class="form-group">
                  <label>Golongan Darah</label>
                  <select name="gol_darah" class="form-control m-b">
                    <option value="" disabled selected>--Pilih Golongan Darah--</option>
                    <option value="A" <?php if($data['gol_darah']=="A"){echo "selected";} ?> >A</option>
                    <option value="B" <?php if($data['gol_darah']=="B"){echo "selected";} ?> >B</option>
                    <option value="AB" <?php if($data['gol_darah']=="AB"){echo "selected";} ?> >AB</option>
                    <option value="O" <?php if($data['gol_darah']=="O"){echo "selected";} ?> >O</option>                   
                  </select>   
                </div>

                <div class="form-group">
                <label>Status Keluarga : </label><br>
                <div class="btn-group" data-toggle="buttons">

                      <label class="btn btn-sm btn-success <?php if ($data['status_keluarga']=="Kawin"){echo "active";} ?> ">
                        <input type="radio" name="status_keluarga" id="option1" value="Kawin" <?php if ($data['status_keluarga']=="Kawin"){echo "checked";} ?>><i class="fa fa-check text-active"></i> Kawin
                      </label>
                      <label class="btn btn-sm btn-warning <?php if ($data['status_keluarga']=="Tidak Kawin"){echo "active";} ?>">
                        <input type="radio" name="status_keluarga" id="option2" value="Tidak Kawin" <?php if ($data['status_keluarga']=="Tidak Kawin"){echo "checked";} ?> ><i class="fa fa-check text-active"></i> Tidak Kawin
                      </label>                     
                </div>
                </div>

                <div class="form-group">
                  <label>Alamat </label>
                  <textarea class="form-control" name="alamat"><?php echo $data['alamat']; ?></textarea>
                 
                </div>
                <div class="form-group">
                  <label>No HP</label>
                  <input type="text" class="form-control" value="<?php echo $data['no_hp']; ?>" name="no_hp">
                </div>

                 <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" value="<?php echo $data['email']; ?>" name="email">
                </div>

                <!--  <div class="form-group">
                      <label class="col-sm-2 control-label">Foto</label>
                      
                        <input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline input-s">
                      
                    </div> -->
    <div class="modal-footer">
      <a href="#" class="btn btn-default" data-dismiss="modal">Tutup</a>
     <button type="submit" name="update_personel" class="btn btn-success">
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