<?php
$queryLevel = mysqli_query($koneksi, "SELECT * FROM levels ORDER BY id DESC");
?>
<div class="mb-3" align="right">
    <a href="?pg=tambah-level" class="btn btn-primary">Tambah Level</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Level</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($rowLevel = mysqli_fetch_assoc($queryLevel)): ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $rowLevel['level_name'] ?></td>
                <td>
                    <a href="?pg=tambah-level&edit=<?php echo $rowLevel['id'] ?>" class="btn btn-success">Edit </a>
                    
                    <a class="btn btn-danger" onclick="return confirm('Apakah anda yakin cuy menghapus data nih??')" href="?pg=tambah-level&delete=<?php echo $rowLevel['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>