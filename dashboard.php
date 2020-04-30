<?php
include "header.php";
include_once "includes/config.php";

?>

<div class="well">
<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Dashboard</h3>
            </div>
            <div class="panel-body">
               <div class="jumbotron">
                  <h2>Selamat Datang Admin <?php echo $_SESSION['nama_ptgs'] ?></h2>
                  <p>SITASI ( Sistem Informasi Tabungan Siswa )</p>
               </div>
            </div>
      </div>
      </div>


<?php include "footer.php"; ?>