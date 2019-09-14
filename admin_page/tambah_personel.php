  <?php //include ("chained_script.php") ?>

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Tambah Data Personel</h4>
    </div>
    <div class="modal-body">
     
      <?php require'../koneksi_database.php';
      $koneksi = buka_koneksi(); ?>
              <form role="form" action="proses.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" placeholder="Nama" name="nama">
                </div>

                <div class="form-group">
                  <label>Pangkat</label>
                  <select name="pangkat" class="form-control m-b">
                    <option value="" disabled selected>--Pilih Pangkat--</option>
                    <option value="Prada">Prada</option>
                    <option value="Pratu">Pratu</option>
                    <option value="Praka">Praka</option>
                    <option value="Kopda">Kopda</option>
                    <option value="Koptu">Koptu</option>
                    <option value="Kopka">Kopka</option>
                    <option value="Serda">Serda</option>
                    <option value="Sertu">Sertu</option>
                    <option value="Serka">Serka</option>
                    <option value="Serma">Serma</option>
                    <option value="Pelda">Pelda</option>
                    <option value="Peltu">Peltu</option>
                    <option value="Letda">Letda</option>
                    <option value="Lettu">Lettu</option>
                    <option value="Kapten">Kapten</option>
                    <option value="Mayor">Mayor</option>
                     <option value="Letkol">Letkol</option>
                    <option value="Kolonel">Kolonel</option>
                    <option value="Brigjen">Brigjend</option>
                    <option value="Mayjend">Mayjend</option>
                    <option value="Letjend">Letjend</option>
                    <option value="Jendral">Jendral</option>
                  </select>   
                </div>

             
                <div class="form-group">
                  <label>NRP </label>
                  <input type="text" class="form-control" placeholder="NRP" name="nrp" >
                </div>
                
                
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir">
                </div>

                <div class="form-group">
                      <label >Tanggal Lahir</label> <br>                    
                        <input class="input-sm input-s datepicker-input form-control" size="16" type="text" name="tgl_lahir" data-date-format="dd-mm-yyyy" >
                      
                </div>

                <div class="form-group">
                  <label>Kesatuan</label>
                  <input type="text" class="form-control" placeholder="Kesatuan" name="kesatuan">
                </div>

                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" class="form-control" placeholder="Jabatan" name="jabatan">
                </div>

                <div class="form-group">
                <label>Jenis Kelamin : </label><br>
                <div class="btn-group" data-toggle="buttons">

                      <label class="btn btn-sm btn-danger ">
                        <input type="radio" name="jenis_kelamin" id="option1" value="Pria"><i class="fa fa-check text-active"></i> Pria
                      </label>
                      <label class="btn btn-sm btn-warning">
                        <input type="radio" name="jenis_kelamin" id="option2" value="Wanita"><i class="fa fa-check text-active"></i> Wanita
                      </label>                     
                </div>
                </div>

                 <div class="form-group">
                  <label>Golongan Darah</label>
                  <select name="gol_darah" class="form-control m-b">
                    <option value="" disabled selected>--Pilih Golongan Darah--</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>                   
                  </select>   
                </div>

                <div class="form-group">
                <label>Status Keluarga : </label><br>
                <div class="btn-group" data-toggle="buttons">

                      <label class="btn btn-sm btn-success ">
                        <input type="radio" name="status_keluarga" id="option1" value="Kawin"><i class="fa fa-check text-active"></i> Kawin
                      </label>
                      <label class="btn btn-sm btn-warning">
                        <input type="radio" name="status_keluarga" id="option2" value="Tidak Kawin"><i class="fa fa-check text-active"></i> Tidak Kawin
                      </label>                     
                </div>
                </div>

                <div class="form-group">
                  <label>Alamat </label>
                  <textarea class="form-control" placeholder=" Alamat" name="alamat"></textarea>
                 
                </div>
                <div class="form-group">
                  <label>No HP</label>
                  <input type="text" class="form-control" placeholder="No HP" name="no_hp">
                </div>

                 <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" placeholder="email" name="email">
                </div>

                <!--  <div class="form-group">
                      <label class="col-sm-2 control-label">Foto</label>
                      
                        <input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline input-s">
                      
                    </div> -->
    <div class="modal-footer">
      <a href="#" class="btn btn-default" data-dismiss="modal">Tutup</a>
     <button type="submit" name="tambah_personel" class="btn btn-success">
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