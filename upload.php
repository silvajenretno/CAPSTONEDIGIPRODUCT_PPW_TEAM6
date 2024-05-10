<?php
    include('koneksi.php');
    if(isset($_POST['submit'])) {
        $nama_menu = $_POST['nama_menu'];
        $harga_normal = $_POST['harga_normal'];
        $harga_diskon = $_POST['harga_diskon'];
        $jenis_menu = $_POST['jenis_menu'];
        $gambar_menu = $_FILES['gambar_menu']['name'];
        $tempname = $_FILES['gambar_menu']['tmp_name'];
        $folder = 'Images/'. $gambar_menu;

        $query = mysqli_query($conn, "INSERT INTO tbl_menu (nama_menu, gambar_menu, harga_normal, harga_diskon, jenis_menu) 
                                    VALUES ('$nama_menu', '$gambar_menu', '$harga_normal', '$harga_diskon', '$jenis_menu')");

        if($query && move_uploaded_file($tempname, $folder)) {
            echo('<h2>UPLOAD SUCCESFULLY </h2>');
        } else {
            echo('<h2>GAGAL UPLOAD</h2>');
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nama_menu">Nama Menu</label>
        <input type="text" name="nama_menu" id="nama_menu" maxlength="50"> <br> <br>

        <label for="gambar_menu"></label>
        <input type="file" name="gambar_menu" id="gambar_menu" maxlength="50" /> <br /> <br />

        <label for="deskripsi_menu">Desksipsi Menu</label>
        <input type="text" name="deskripsi_menu" id="deskripsi_menu" maxlength="50"> <br> <br>

        <label for="harga_normal">harga_normal</label>
        <input type="text" name="harga_normal" id="harga_normal"> <br> <br>

        <label for="harga_diskon">harga_diskon</label>
        <input type="text" name="harga_diskon" id="harga_diskon"> <br> <br>

        <label for="jenis_menu">jenis_menu</label>
        <input type="text" name="jenis_menu" id="jenis_menu" maxlength="100"> <br> <br>

        <button type="submit" name="submit">Submit</button>
    </form>

    <div>
    <?php

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        $res = mysqli_query($conn, "SELECT * FROM tbl_menu");
        while($row = mysqli_fetch_assoc($res)) {
    ?>
    <img src="Images/<?php echo $row['gambar_menu'] ?>" >
    <?php 
        } 
    } 
    ?>
</div>

</body>
</html>