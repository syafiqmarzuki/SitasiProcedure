<?php  
include "header.php";
include_once 'includes/laporan.inc.php';
$pro = new Laporan($db);
$stmt = $pro->readAll();
?>
<div class="well">
    <div class="row">
        <div class="col-md-6 text-left">
            <h4>Laporan</h4>
        </div>
        
    </div>
    <br/>
    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="20px">NO</th>
                <th width="30px">NIS</th>
                <th>Nama Siswa</th>
                <th>Alamat</th>
                <th>Jns Kelamin</th>
                <th>Kelompok</th>
                <th>Saldo</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
    <?php
    $no = 1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nis'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['alamat'] ?></td>
                <td><?php echo $row['jenis_kelamin'] ?></td>
                <td><?php echo $row['kelompok'] ?></td>
                <td><?php echo "Rp. " . number_format($row['saldo'] , 2 , ',' , '.'); ?></td>
                <td class="text-center">
              <a href="laporan-detail2.php?nissw=<?php echo $row['nis'] ?>" class="btn btn-primary" title="Lihat Detail"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>

              <a href="laporan-cetak.php?nissw=<?php echo $row['nis']?>" class="btn btn-warning" title="Cetak Laporan" target="_blank"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
              </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
</div><br><br><br>
<?php include "footer.php"; ?>
