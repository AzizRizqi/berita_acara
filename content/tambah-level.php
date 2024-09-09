<?php
if (isset($_POST['simpan'])) {
    $level_name = $_POST['level_name'];
    $insert= mysqli_query($koneksi, "INSERT INTO levels (level_name) VALUES ('$level_name')");
    header("location:?pg=level&tambah=berhasil");
}
if (isset($_GET['delete'])) {
    $id=$_GET['delete'];

    // print_r($id);
    // die;

    $delete = mysqli_query($koneksi, "DELETE FROM levels WHERE id='$id'");
    header("location:?pg=level&hapus=berhasil");
}
// $id = $_GET['edit']??''; <= cara di sebelah itu buat solve "edit" cara lain dari yang di bawah

// isset= tidak kosong / isinya ada
// empty = kosong
if (isset($_GET['edit'])) {
    $id=$_GET['edit'];

    // print_r($id);
    // die;

    $edit = mysqli_query($koneksi, "SELECT * FROM levels WHERE id='$id'");
    $rowEdit = mysqli_fetch_assoc($edit);

    if (isset($_POST['edit'])) {  
        $level_name = $_POST['level_name'];  
        $update = mysqli_query($koneksi, "UPDATE levels SET level_name='$level_name' WHERE id='$id'");
        header("location:?pg=level&ubah=berhasil");
    }
}
?>

<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama Level</label>
        </div>
        <div class="col-sm-6">
        <input type="text" class="form-control" name="level_name" placeholder="Nama Level" value="<?php echo $rowEdit['level_name'] ?? '' ?>" required>
        </div>
    </div>
    <div class="mb-3 offset-md-2">
        <button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>"><?php echo isset($_GET['edit']) ? 'ubah' : 'simpan' ?></button>
        <a href="?pg=level" class="btn btn-secondary">Kembali</a>
    </div>
</form>