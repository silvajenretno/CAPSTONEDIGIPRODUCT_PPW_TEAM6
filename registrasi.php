<?php
require 'koneksi.php';

// Ambil data dari form pendaftaran
if (isset($_POST['registrasi'])) {
  $nama = mysqli_real_escape_string($conn, $_POST['nama_member']);
  $email = mysqli_real_escape_string($conn, $_POST['email_member']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $nohp = mysqli_real_escape_string($conn, $_POST['no_hp']);
  $tgl = mysqli_real_escape_string($conn, $_POST['tgl_lahir']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);

  $epassword = password_hash($password, PASSWORD_DEFAULT);

  // Query untuk memeriksa apakah email sudah terdaftar
  $check_email_query = "SELECT * FROM tbl_membership WHERE email_member = '$email'";
  $check_email_result = mysqli_query($conn, $check_email_query);

if ($check_email_result) {
    if (mysqli_num_rows($check_email_result) > 0) {
        // Jika email sudah terdaftar, tampilkan pesan kesalahan
        echo "<script>alert('Email sudah terdaftar')</script>";
    } else {
        // Jika email belum terdaftar, lakukan pendaftaran
        // Query untuk memasukkan data pelanggan baru ke dalam database dengan prepared statement
        $sql = "INSERT INTO tbl_membership (nama_member,email_member,password,no_hp,tgl_lahir,gender,status) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssssss", $nama, $email, $epassword, $nohp, $tgl, $gender, $status);
            mysqli_stmt_execute($stmt);

            echo "<script>alert('Data berhasil ditambah')</script>";
            header('Location: login.php');
            exit;
        } else {
            echo "<script>alert('Gagal registrasi data')</script>";
        }

        mysqli_stmt_close($stmt);
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="./logo.png"/>
  <title>STARBUCKS &mdash; Coffee That Inspires</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="logo.png" alt="logo" class="logo" style="width: 65px; height: 65px;">
                <span class="brand-text" style="font-weight: bold; color: green; vertical-align: bottom; font-size: 40px;">STARBUCKS</span>
              </div>
              <p class="login-card-description">Register for a new account</p>
              <form method="post">
                  <div class="form-group">
                    <label for="nama_member" class="sr-only">Nama</label>
                    <input type="text" name="nama_member" id="nama_member" class="form-control" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="email_member" class="sr-only">Email</label>
                    <input type="email" name="email_member" id="email_member" class="form-control" placeholder="Email address">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="****">
                  </div>
                  <div class="form-group">
                    <label for="no_hp" class="sr-only">No. Telepon</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No. Telepon">
                  </div>
                  <div class="form-group">
                    <label for="tgl_lahir" class="sr-only">Birth Date</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Birth Date">
                  </div>
                  <div class="form-group">
                    <label for="gender" class="sr-only">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                      <option value="laki-laki">Laki-laki</option>
                      <option value="perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="status" class="sr-only">Birth Date</label>
                    <input type="text" name="status" id="status" class="form-control" placeholder="Status">
                  </div>
                  <button type="submit" name="registrasi" class="btn btn-block login-btn mb-4">Registrasi</button>
                </form>
                <!-- <a href="#!" class="forgot-password-link">Forgot password?</a> -->
                <p class="login-card-footer-text">Already have an account <a href="login.php" class="text-reset">Login</a></p>
                <nav class="login-card-footer-nav">
                  <!-- <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a> -->
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
