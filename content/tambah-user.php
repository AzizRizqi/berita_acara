<?php
if (isset($_POST['simpan'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password =sha1( $_POST['password']);
    $insert= mysqli_query($koneksi, "INSERT INTO users (fullname,email,password) VALUES ('$fullname','$email','$password')");
    header("location:?pg=user&tambah=berhasil");
}
if (isset($_GET['delete'])) {
    $id=$_GET['delete'];

    // print_r($id);
    // die;

    $delete = mysqli_query($koneksi, "DELETE FROM users WHERE id='$id'");
    header("location:?pg=user&hapus=berhasil");
}
// $id = $_GET['edit']??''; <= cara di sebelah itu buat solve "edit" cara lain dari yang di bawah

// isset= tidak kosong / isinya ada
// empty = kosong
if (isset($_GET['edit'])) {
    $id=$_GET['edit'];

    // print_r($id);
    // die;

    $edit = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
    $rowEdit = mysqli_fetch_assoc($edit);

    if (isset($_POST['edit'])) {  
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password =sha1( $_POST['password']); 
        $update = mysqli_query($koneksi, "UPDATE users SET fullname='$fullname',email ='$email',password='$password' WHERE id='$id'");
        header("location:?pg=user&ubah=berhasil");
    }
}
?>

<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama Lengkap</label>
        </div>
        <div class="col-sm-6">
        <input type="text" class="form-control" name="fullname" placeholder="Nama user" value="<?php echo $rowEdit['fullname'] ?? '' ?>" required>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">email</label>
        </div>
        <div class="col-sm-6">
        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $rowEdit['email'] ?? '' ?>" required>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">password</label>
        </div>
        <div class="col-sm-6">
        <input type="password" class="form-control" name="password" placeholder="password">
        </div>
    </div>
    <div class="mb-3 offset-md-2">
        <button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>"><?php echo isset($_GET['edit']) ? 'ubah' : 'simpan' ?></button>
        <a href="?pg=user" class="btn btn-secondary">Kembali</a>
    </div>
</form>