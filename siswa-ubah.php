<?php
include_once 'header2.php';
$idsw = isset($_GET['idsw']) ? $_GET['idsw'] : die('ERROR: missing ID.');

include_once 'includes/siswa.inc.php';
$eks = new Siswa($db);

$eks->idsw = $idsw;

$eks->readOne();

if($_POST){

  $eks->nissw = $_POST['nissw'];
  $eks->nmsw = $_POST['nmsw'];
  $eks->almtsw = $_POST['almtsw'];
  $eks->tglsw = $_POST['tglsw'];
  $eks->jsw = $_POST['jsw'];
  $eks->nmotsw = $_POST['nmotsw'];
  $eks->telsw = $_POST['telsw'];
  $eks->kelsw = $_POST['kelsw'];
    
    if($eks->update()){
        echo "<script>location.href='siswa.php'</script>";
    } else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Ubah Data!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
    }
}
?>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
		  <div class="well">
            <div class="page-header">
              <h3>Ubah Data Siswa</h3>
            </div>
            
                <form method="post">
                  <div class="form-group">
                    <label for="nissw">NIS</label>
                    <input type="text" class="form-control" id="nissw" name="nissw" value="<?php echo $eks->nissw; ?>" readonly="true" required>
                  </div>
                  <div class="form-group">
                    <label for="nmsw">Nama Siswa</label>
                    <input type="text" class="form-control" id="nmsw" name="nmsw" value="<?php echo $eks->nmsw; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="aptgs">Alamat</label>
                    <input type="text" class="form-control" id="almtsw" name="almtsw" value="<?php echo $eks->almtsw; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="tglsw">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tglsw" name="tglsw" value="<?php echo $eks->tglsw; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="jsw">Jenis Kelamin</label>
                    <select id="jsw" name="jsw" class="form-control">
                    <option value="<?php echo $eks->jsw; ?>"><?php echo $eks->jsw; ?></option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nmotsw">Nama Orang Tua</label>
                    <input type="text" class="form-control" id="nmotsw" name="nmotsw" 
                   value="<?php echo $eks->nmotsw; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="telsw">Telepon</label>
                    <input type="text" class="form-control" id="telsw" name="telsw" value="<?php echo $eks->telsw; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="kelsw">Kelompok</label>
                    <select id="kelsw" name="kelsw" class="form-control">
                    <option value="<?php echo $eks->kelsw; ?>"><?php echo $eks->kelsw; ?></option>
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="A3">A3</option>
                    <option value="B1">B1</option>
                    <option value="B2">B2</option>
                    <option value="B3">B3</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                    <option value="C3">C3</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Ubah</button>
                  <button type="button" onclick="location.href='siswa.php'" class="btn btn-success">Kembali</button>
                </form>
              
          </div></div>
          <div class="container"></div><br><br><br>
        <?php
include_once 'footer.php';
?>