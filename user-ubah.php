<?php
include_once 'header.php';
$idptgs = isset($_GET['idptgs']) ? $_GET['idptgs'] : die('ERROR: missing ID.');

include_once 'includes/user.inc.php';
$eks = new User($db);

$eks->idptgs = $idptgs;

$eks->readOne();

if($_POST){

    $eks->nptgs = $_POST['nptgs'];
    $eks->aptgs = $_POST['aptgs'];
    $eks->tptgs = $_POST['tptgs'];
    $eks->sptgs = $_POST['sptgs'];
    $eks->jptgs = $_POST['jptgs'];
    $eks->un = $_POST['un'];
    $eks->pw = md5($_POST['pw']);
    
    if($eks->update()){
        echo "<script>location.href='user.php'</script>";
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
              <h3>Ubah Pengguna</h3>
            </div>
            
                <form method="post">
                  <div class="form-group">
                    <label for="nptgs">Nama Petugas</label>
                    <input type="text" class="form-control" id="nptgs" name="nptgs" value="<?php echo $eks->nptgs; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="aptgs">Alamat</label>
                    <input type="text" class="form-control" id="aptgs" name="aptgs" value="<?php echo $eks->aptgs; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="tptgs">Telepon</label>
                    <input type="text" class="form-control" id="tptgs" name="tptgs" value="<?php echo $eks->tptgs; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="sptgs">Status</label>
                    <select id="sptgs" name="sptgs" class="form-control" value="<?php echo $eks->sptgs; ?>">
                    <option value="<?php echo $eks->sptgs; ?>"><?php echo $eks->sptgs; ?></option>
                    <option value="Admin">Admin</option>
                    <option value="Petugas">Petugas</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="jptgs">Jenis Kelamin</label>
                    <select id="jptgs" name="jptgs" class="form-control" value="<?php echo $eks->jptgs; ?>">
                    <option value="<?php echo $eks->jptgs; ?>"><?php echo $eks->jptgs; ?></option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="un">Username</label>
                    <input type="text" class="form-control" id="un" name="un" value="<?php echo $eks->un; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="pw">Password</label>
                    <input type="password" class="form-control" id="pw" name="pw" value="<?php echo $eks->pw; ?>" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Ubah</button>
                  <button type="button" onclick="location.href='user.php'" class="btn btn-success">Kembali</button>
                </form>
              
          </div></div>
          <div class="container"></div>
        <?php
include_once 'footer.php';
?>