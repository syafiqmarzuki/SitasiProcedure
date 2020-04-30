<?php  
include "header2.php";
include_once 'includes/siswa.inc.php';
$pro = new Siswa($db);
$stmt = $pro->readAll();
?>
<div class="well">
    <div class="row">
        <div class="col-md-6 text-left">
            <h4>Data Siswa</h4>
        </div>
        <div class="col-md-6 text-right">
            <button onclick="location.href='siswa-baru.php'" class="btn btn-primary">Tambah Data</button>
        </div>
    </div>
    <br/>
    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th>NO</th>
                <th width="30px">NIS</th>
                <th>Nama Siswa</th>
                <th>Alamat</th>
                <th>Tgl Lahir</th>
                <th>Jns Kelamin</th>
                <th>Nama Ortu</th>
                <th>Telp</th>
                <th>Kelompok</th>
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
                <td><?php echo $row['tgl_lahir'] ?></td>
                <td><?php echo $row['jenis_kelamin'] ?></td>
                <td><?php echo $row['nama_ortu'] ?></td>
                <td><?php echo $row['telepon'] ?></td>
                <td><?php echo $row['kelompok'] ?></td>
                <td class="text-center">
        		  <a href="siswa-ubah.php?idsw=<?php echo $row['id_sw'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        		  <a href="siswa-hapus.php?idsw=<?php echo $row['id_sw'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        	    </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
</div><br><br><br>
<?php include "footer.php"; ?>
