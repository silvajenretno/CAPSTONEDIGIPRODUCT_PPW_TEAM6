<?php
require 'koneksi.php';

session_start();
if(isset($_SESSION['error_message'])) {
    echo "<script>alert('" . $_SESSION['error_message'] . "')</script>";
    unset($_SESSION['error_message']);
}

if (isset($_POST['registrasi'])) {
  $nama = mysqli_real_escape_string($conn, $_POST['nama_member']);
  $email = mysqli_real_escape_string($conn, $_POST['email_member']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $nohp = mysqli_real_escape_string($conn, $_POST['no_hp']);
  $tgl = mysqli_real_escape_string($conn, $_POST['tgl_lahir']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);

  // Validasi nama tidak boleh diisi dengan angka
  if (preg_match('/[0-9]/', $nama)) {
      $_SESSION['error_message'] = 'Names cannot contain numbers';
      header('Location: registrasi.php'); // kembali ke halaman registrasi
      exit;
  }

  // Validasi nomor telepon tidak boleh lebih dari 12 angka
  if (strlen($nohp) > 12) {
      $_SESSION['error_message'] = 'Telephone numbers cannot exceed 12 digits';
      header('Location: registrasi.php'); // kembali ke halaman registrasi
      exit;
  }

   // Validasi format email
   if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@gmail\.com$/', $email)) {
    $_SESSION['error_message'] = 'The email format must match @gmail.com';
    header('Location: registrasi.php'); // kembali ke halaman registrasi
    exit;
  }

   // Validasi password minimal 8 karakter dan kombinasi angka dan huruf
   if (strlen($password) < 8 || !preg_match('/[0-9]/', $password) || !preg_match('/[a-zA-Z]/', $password)) {
    $_SESSION['error_message'] = 'The password must be at least 8 characters and a combination of numbers and letters';
    header('Location: registrasi.php'); // kembali ke halaman registrasi
    exit;
  }

  // Validasi umur minimal 10 tahun
  $tgl_lahir = DateTime::createFromFormat('Y-m-d', $tgl);
  $today = new DateTime();
  $diff = $today->diff($tgl_lahir);
  if ($diff->y < 10) {
      $_SESSION['error_message'] = 'Sorry, but the membership program is only available to those who are at least 10 years old';
      header('Location: registrasi.php'); // kembali ke halaman registrasi
      exit;
  }

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

              $_SESSION['success_message'] = 'Registration is successful, please log in';
              header('Location: login.php');
              exit;
          } else {
              echo "<script>alert('Data registration failed')</script>";
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
                    <input type="text" name="nama_member" id="nama_member" class="form-control" placeholder="Your name" required>
                  </div>
                  <div class="form-group">
                    <input type="email" name="email_member" id="email_member" class="form-control" placeholder="Email address" required>
                  </div>
                  <div class="form-group mb-4">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Phone number" required>
                  </div>
                  <div class="form-group">
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Birth Date" required>
                  </div>
                  <div class="form-group">
                    <select name="gender" id="gender" class="form-control" required>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group" required>
                    <select name="status" id="status" class="form-control" required>
                        <option value="Student">Student</option>
                        <option value="Worker">Worker</option>
                      </select>
                  </div>
                  <button type="submit" name="registrasi" class="btn btn-block login-btn mb-4">Registrasi</button>
                </form>
                <p class="login-card-footer-text">Already have an account <a href="login.php" class="text-reset">Login</a></p>
                <nav class="login-card-footer-nav">
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
