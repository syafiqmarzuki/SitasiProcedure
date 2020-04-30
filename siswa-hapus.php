<?php
include_once "includes/config.php";
$database = new Config();
$db = $database->getConnection();

	include_once 'includes/siswa.inc.php';

	$pro = new Siswa($db);
	
	$id = isset($_GET['idsw']) ? $_GET['idsw'] : die('ERROR: missing ID.');
	$pro->idsw = $id;
	
	if($pro->delete()){
		echo "<script>alert('Berhasil Hapus Data');location.href='siswa.php';</script>";
	}
	
	else{
		echo "<script>alert('Gagal Hapus Data');location.href='siswa.php';</script>";
		
	}
?>
