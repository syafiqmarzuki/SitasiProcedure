<?php
include_once 'includes/config.php';

$config = new Config();
$db = $config->getConnection();


if($_POST){
  
  include_once 'includes/login.inc.php';
  $login = new Login($db);
  
  $login->userid = $_POST['username'];
  $login->passid = md5($_POST['password']);
  $doinsert = $login->insert();
  if($login->login()){
    echo "<script>location.href='dashboard.php'</script>";
    $doinsert->execute();
  }
  elseif($login->login_ptgs()){
    echo "<script>location.href='dashboard2.php'</script>";
    $doinsert->execute();
  }
  

  else{
    echo "<script>alert('Login gagal, Silahkan ulangi pastikan username dan password Anda benar.')</script>";
  }
}
?>

<!DOCTYPE html>
<!-- saved from url=(0037)https://www.sitasi.klampis.com/profil -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Sistem Informasi Tabungan adalah sistem yang mengelola kegiatan tabungan pada suatu lembaga pendidikan. Di dalam sistem tabungan terdapat sistem yang saling mendukung dalam rangka mencapai tujuan dalam pengelolaan tabungan.&lt;br&gt; Sistem tabungan dirancang menyesuaikan dengan visi dan misi agar mampu mendukung dalam pencapaian tujuan lembaga pendidikan yang dalam hal ini dikhususkan pada sekolah.">
    <meta name="author" content="DS">

    <title>SITASI</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container center">
        <form class="form-signin" method="post" accept-charset="utf-8">
          <div class="panel panel-primary2">
              <div class="panel-heading">
                  <h3 class="form-signin-heading text-center" style="text-decoration: none; color: #fff;">
                      LOGIN
                  </h3>
                  <h4 class="text-center" ><a href="index.html" style="text-decoration: none; color: #2c3e50;">Sistem Informasi Tabungan Siswa</a> </h4>
              </div>
              <div class="panel-body">
                
                  <label for="InputUsername1" class="sr-only">Username</label>
                  <input type="text" id="InputUsername1" class="form-control" placeholder="Username" name="username" required="" autofocus="">
                  <br>
                  <label for="InputPassword1" class="sr-only">Password</label>
                  <input type="password" id="InputPassword1" class="form-control" placeholder="Password" name="password" required="">
                  <h5><a href="forgot.php">Lupa Password?</a></h5>
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
              </div>
          </div>
        </form>    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  


</body></html>