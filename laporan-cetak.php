<?php
include_once 'header2.php';


$nissw = isset($_GET['nissw']) ? $_GET['nissw'] : die('ERROR: missing ID.');

include_once 'includes/laporan.inc.php';
$eks = new laporan($db);

$eks->nissw = $nissw;

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
              <h3 class="panel-title">Laporan Detail Transaksi</h3>
            </div>
            <div class="panel-body">
               <div class="col-sm-8">
    <h4>* Detail Data Siswa</h4>
    <?php
    $no1 = 1;
    $no2 = 1;
    ?>
    <table class="table table-bordered">
        <tr>
            <th>NIS</th>
            <td><?php echo $eks->nissw; ?></td>
        </tr>
        <tr>
            <th>Nama</th>
            <td><?php echo $eks->nmsw; ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?php echo $eks->almtsw; ?></td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td><?php echo $eks->tglsw; ?></td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td><?php echo $eks->jsw; ?></td>
        </tr>
        <tr>
            <th>Nama Ortu</th>
            <td><?php echo $eks->nmotsw; ?></td>
        </tr>
        <tr>
            <th>Telepon</th>
            <td><?php echo $eks->telsw; ?></td>
        </tr>
        <tr>
            <th>Kelompok Siswa</th>
            <td><?php echo $eks->kelsw; ?></td>
        </tr>
        
    </table><br><br>
    <?php
    include_once 'includes/trans.inc.php';
    
    $pro = new Transaksi($db);
    $pro->nissw = $nissw;
    $stmt = $pro->readAll3();

     
    ?>
              
          </div>
          <div class="col-sm-12">
          <h4>* Detail Data Transaksi Siswa</h4>
            <table class="table table-bordered">
            <thead>
              <tr>
                <th width="30px">NO</th>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>ID Petugas</th>
              </tr>
            </thead>
            <tbody>
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
              <td><?php echo $no1++; ?></td>
              <td><?php echo $row['id_trans']; ?></td>
              <td><?php echo $row['tgl_trans']; ?></td>
              <td><?php echo "Rp. " . number_format( $row['debit'] , 2 , ',' , '.'); ?></td>
              <td><?php echo "Rp. " . number_format( $row['kredit'] , 2 , ',' , '.'); ?></td>
              <td><?php echo $row['id_ptgs']; ?></td>
            </tr>
            <?php
            }
            ?>
              
            </tbody>
            <tfoot>
              <tr>
                <th colspan="6" style="font-size: 12pt">Saldo Total : <?php echo "Rp. " . number_format( $eks->saldo , 2 , ',' , '.'); ?></th>
            
              </tr>
            </tfoot>
         
              
            </table>
          </div>

          
          </div>

          <div class="container"></div><br><br><br></div>
        <?php
include_once 'footer.php';
?>
<script type="text/javascript">
    window.print();
</script>