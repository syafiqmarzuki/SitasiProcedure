<?php
include_once 'header2.php';
include_once 'includes/siswa.inc.php';
$pgn = new Siswa($db);
if($_POST){
  
  include_once 'includes/trans.inc.php';
  $eks = new Transaksi($db);

  $eks->nissw = $_POST['nissw'];
  $eks->deb = $_POST['deb'];
  $eks->idptgs = $_POST['idptgs'];
  
  
  if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="transaksi_setor.php">lihat semua data</a>.
</div>
<?php
  }
  
  else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Tambah Data!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
  }
}
?>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
		  <div class="well">
            <div class="page-header">
              <h3>Tambah Data Setoran</h3>
            </div>
            
                <form method="post">
                  <div class="form-group">
                    <label for="nissw">NIS Siswa</label>
                    <select class="form-control" id="nissw" name="nissw">
                      <option>Pilih NIS Siswa</option>
                      <?php
                    $stmt2 = $pgn->readAll();
                    while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                      extract($row2);
                      echo "<option value='{$nis}'>{$nis}</option>";
                    }
                      ?>
                    </select>
                  </div>
                  <div class="form-group has-feedback">
                    <label for="deb">Jumlah Setoran</label>
                    <input type="text" pattern="^[_0-9]{1,}$" class="form-control" id="deb" name="deb" data-error="Harap isi dengan angka!" required>
                    
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="idptgs">ID Petugas</label>
                    <input type="text" class="form-control" id="idptgs" name="idptgs" readonly value="<?php echo $_SESSION['id_ptgs'] ?>" required>
                  </div>
 
                  
                  
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="button" onclick="location.href='transaksi_setor.php'" class="btn btn-success">Kembali</button>
                </form>
              
          </div></div>
          <div class="container">
            
        </div><br><br><br>
        <?php
include_once 'footer.php';
?>