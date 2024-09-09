<?php
$queryUser = mysqli_query($koneksi, "SELECT * FROM users ORDER BY id DESC");
?>
<div class="mb-3" align="right">
    <a href="?pg=tambah-user" class="btn btn-primary">Tambah Pengguna</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>email</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($rowUser = mysqli_fetch_assoc($queryUser)): ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $rowUser['fullname'] ?></td>
                <td><?php echo $rowUser['email'] ?></td>
                <td>
                    <a href="?pg=user-role&id_user=<?php echo $rowUser['id'] ?>" class="btn btn-success">User Level </a>
                    <a href="?pg=tambah-user&edit=<?php echo $rowUser['id'] ?>" class="btn btn-success">Edit </a>
                    
                    <a class="btn btn-danger" onclick="return confirm('Apakah anda yakin cuy menghapus data nih??')" href="?pg=tambah-user&delete=<?php echo $rowUser['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>