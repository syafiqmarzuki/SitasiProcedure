<?php  
include "header.php";
include_once 'includes/user.inc.php';
$pro = new User($db);
$stmt = $pro->readAll();
?>
<div class="well">
    <div class="row">
        <div class="col-md-6 text-left">
            <h4>Data Pengguna</h4>
        </div>
        <div class="col-md-6 text-right">
            <button onclick="location.href='user-baru.php'" class="btn btn-primary">Tambah Data</button>
        </div>
    </div>
    <br/>
    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="30px">ID</th>
                <th>Username</th>
                <th>Nama Petugas</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Status</th>
                <th>Jenis Kelamin</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
            <tr>
                <td><?php echo $row['id_ptgs'] ?></td>
                <td><?php echo $row['username'] ?></td>
        	    <td><?php echo $row['nama_ptgs'] ?></td>
                <td><?php echo $row['alamat_ptgs'] ?></td>
                <td><?php echo $row['telepon_ptgs'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td><?php echo $row['jns_kelamin_ptgs'] ?></td>
                <td class="text-center">
        		  <a href="user-ubah.php?idptgs=<?php echo $row['id_ptgs'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        		  <a href="user-hapus.php?idptgs=<?php echo $row['id_ptgs'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        	    </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
</div>
<?php include "footer.php"; ?>
