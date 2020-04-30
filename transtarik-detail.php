<?php
include_once 'header2.php';


$idtrans = isset($_GET['idtrans']) ? $_GET['idtrans'] : die('ERROR: missing ID.');

include_once 'includes/trans.inc.php';
$eks = new Transaksi($db);

$eks->idtrans = $idtrans;

$eks->readOne();

?>
<div class="well">
    <div class="row">
        <div class="col-md-6 text-left">
            
        </div>
        
    </div>
    <br/>
    <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Laporan Detail Transaksi Kredit</h3>
            </div>
            <div class="panel-body">
               <div class="col-sm-6">
    <h4>* Detail Data Siswa</h4>
    <table class="table table-bordered">
        <tr>
            <th width="150px">NIS</th>
            <td><?php echo $eks->nissw; ?></td>
        </tr>
        <tr>
            <th width="150px">Nama</th>
            <td><?php echo $eks->nmsw; ?></td>
        </tr>
        <tr>
            <th width="150px">Alamat</th>
            <td><?php echo $eks->almtsw; ?></td>
        </tr>
        <tr>
            <th width="150px">Tanggal Lahir</th>
            <td><?php echo $eks->tglsw; ?></td>
        </tr>
        <tr>
            <th width="150px">Jenis Kelamin</th>
            <td><?php echo $eks->jsw; ?></td>
        </tr>
        <tr>
            <th width="150px">Nama Ortu</th>
            <td><?php echo $eks->nmotsw; ?></td>
        </tr>
        <tr>
            <th width="150px">Telepon</th>
            <td><?php echo $eks->telsw; ?></td>
        </tr>
        <tr>
            <th width="150px">Kelompok Siswa</th>
            <td><?php echo $eks->kelsw; ?></td>
        </tr>
        
    </table><br><br>

              
          
          <h4>* Detail Data Transaksi Debit Siswa</h4>
            <table class="table table-bordered">
            
            <tr>
              <th width="150px">ID Transaksi</th>
              <td><?php echo $eks->idtrans; ?></td>
            </tr>
            <tr>
                <th width="150px">Tanggal</th>
                <td><?php echo $eks->tgltrans;; ?></td>
            </tr>
            <tr>
                <th width="150px">Jumlah Penarikan</th>
                <td><?php echo "Rp. " . number_format( $eks->kre , 2 , ',' , '.'); ?></td>
                
            </tr>  
              
            </table><br><br>
          
          <h4>* Detail Data Petugas</h4>
            <table class="table table-bordered">
            
            <tr>
              <th width="150px">ID Petugas</th>
              <td><?php echo $eks->idptgstrans; ?></td>
            </tr>
            <tr>
                <th width="150px">Nama Petugas</th>
                <td><?php echo $eks->namaptgstrans; ?></td>
            </tr>
            <tr>
                <th width="150px">Alamat Petugas</th>
                <td><?php echo $eks->alamatptgstrans; ?></td>
                
            </tr>
            <tr>
                <th width="150px">No. Telp Petugas</th>
                <td><?php echo $eks->teleponptgstrans; ?></td>
                
            </tr>   
              
            </table>
          </div>


          
          </div></div>

          <div class="container"></div><br><br><br></div>
        <?php
include_once 'footer.php';
?>