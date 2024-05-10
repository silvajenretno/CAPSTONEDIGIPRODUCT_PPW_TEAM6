<?php
require 'koneksi.php';
session_start();

if(isset($_SESSION['success_message'])) {
  echo "<script>alert('" . $_SESSION['success_message'] . "')</script>";
  unset($_SESSION['success_message']);
}


if (isset($_POST['login'])) {
  $email = htmlspecialchars($_POST['email_member']);
  $password = htmlspecialchars($_POST['password']);

  $result = mysqli_query($conn, "SELECT * FROM tbl_membership WHERE email_member='$email'");
  
  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $password_hashed = $row['password'];
    
    // Bandingkan password yang dimasukkan dengan password terenkripsi dari database
    if (password_verify($password, $password_hashed)) {
      $_SESSION['email'] = $email;
      $_SESSION['login'] = true;

      // Set cookie untuk menyimpan session
      $session_name = session_name();
      setcookie($session_name, session_id(), time() + (4 * 60 * 60), '/'); // Cookie berlaku selama 4 jam
      $_SESSION['success_message'] = 'You have successfully logged in';
      header('location:home_member.php');
      exit;
    } else {
      echo '<script>alert("Password wrong");</script>';
    }
  } else {
    echo '<script>alert("Email Not Registered");</script>';
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
              <p class="login-card-description">Log in to your account</p>
              <form method="post">
                  <div class="form-group">
                    <label for="email_member" class="sr-only">Email</label>
                    <input type="email" name="email_member" id="email_member" class="form-control" placeholder="Email address" required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

                  </div>
                  <button type="submit" name="login" class="btn btn-block login-btn mb-4">Login</button>
                </form>
                <p class="login-card-footer-text">Don't have an account? <a href="registrasi.php" class="text-reset">Register here</a></p>
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
