<?php
if (isset($_POST['simpan'])) {
    $level_id = $_POST['level_id'];
    $user_id = $_GET['id_user'];
    $insert = mysqli_query($koneksi, "INSERT INTO user_levels (level_id, user_id)VALUES ('$level_id','$user_id') ");
    header("location:?pg=user-role&id_user=".urlencode($user_id)."&tambah=berhasil");
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // print_r($id);
    // die;

    $delete = mysqli_query($koneksi, "DELETE FROM users WHERE id='$id'");
    header("location:?pg=user&hapus=berhasil");
}
// $id = $_GET['edit']??''; <= cara di sebelah itu buat solve "edit" cara lain dari yang di bawah

// isset= tidak kosong / isinya ada
// empty = kosong
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    // print_r($id);
    // die;

    $edit = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
    $rowEdit = mysqli_fetch_assoc($edit);

    if (isset($_POST['edit'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        $update = mysqli_query($koneksi, "UPDATE users SET fullname='$fullname',email ='$email',password='$password' WHERE id='$id'");
        header("location:?pg=user&ubah=berhasil");
    }
}

    $querylevels = mysqli_query($koneksi, "SELECT * FROM levels ORDER BY id DESC");
?>

<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama Level</label>
        </div>
        <select name="level_id" id="" class="form-control">
            <option value="">Pilih Level</option>
            <?php while ($rowLevel= mysqli_fetch_assoc($querylevels)): ?>
            <option value="<?php echo $rowLevel['id'] ?>"><?php echo $rowLevel['level_name'] ?></option>
            <?php endwhile;?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>"><?php echo isset($_GET['edit']) ? 'ubah' : 'simpan' ?></button>
        <a href="?pg=user" class="btn btn-secondary">Kembali</a>
    </div>
</form>