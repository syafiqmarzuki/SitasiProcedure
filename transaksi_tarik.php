<?php  
include "header2.php";
include_once 'includes/trans.inc.php';
$pro = new Transaksi($db);
$stmt = $pro->readAll1();
?>
<div class="well">
    <div class="row">
        <div class="col-md-6 text-left">
            <h4>Data Transaksi Penarikan Siswa</h4>
        </div>
        <div class="col-md-6 text-right">
            <button onclick="location.href='transaksi_tarik_baru.php'" class="btn btn-primary">Tambah Data</button>
        </div>
    </div>
    <br/>
    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th>NO</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelompok</th>
                <th>Tgl Penarikan</th>
                <th>Jumlah Penarikan</th>
                <th>Petugas</th>
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
                <td><?php echo $row['kelompok'] ?></td>
                <td><?php echo $row['tgl_trans'] ?></td>
                <td><?php echo "Rp. " . number_format($row['kredit'] , 2 , ',' , '.'); ?></td>
                <td><?php echo $row['id_ptgs'] ?></td>
                
                
                <td class="text-center">
              
              <a href="transtarik-detail.php?idtrans=<?php echo $row['id_trans'] ?>" class="btn btn-primary" title="Lihat Detail"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>

              <a href="transtarik-cetak.php?idtrans=<?php echo $row['id_trans']?>" class="btn btn-warning" title="Cetak Laporan" target="_blank"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
              </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
</div><br><br><br>
<?php include "footer.php"; ?>
