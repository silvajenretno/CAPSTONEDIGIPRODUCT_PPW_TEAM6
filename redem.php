<?php
require 'koneksi.php';
require 'session.php';


// Ambil email pengguna dari sesi
$email_pengguna = $_SESSION['email'];
$current_date = date('Y-m-d');

$sql_info_pengguna = "SELECT * FROM tbl_membership WHERE email_member = '$email_pengguna'";
$result_info_pengguna = mysqli_query($conn, $sql_info_pengguna);

if(isset($_POST['redem'])) {
   
    // Ambil data dari formulir
    $kode_struk = $_POST['kode_struk'];

    // Validasi kode_struk
    if (!preg_match('/^sb[a-zA-Z]{4}[0-9]{2}$/i', $kode_struk)) {
        echo "<script>alert('Sorry code not listed');</script>";
    } else {
        $sql_cek_kode_struk = "SELECT id_struk FROM tbl_struk WHERE kode_struck = '$kode_struk'";
        $result_cek_kode_struk = $conn->query($sql_cek_kode_struk);

        if ($result_cek_kode_struk->num_rows > 0) {
          echo "<script>alert('Sorry, this code has already been entered');</script>";
        } else {
            $sql = "INSERT INTO tbl_struk (kode_struck) VALUES ('$kode_struk')";
            if ($conn->query($sql) === TRUE) {
                $sql_update_poin = "UPDATE tbl_membership SET poin = poin + 10 WHERE email_member = '$email_pengguna'";
                if ($conn->query($sql_update_poin) === TRUE) {
                  echo "<script>alert('Congratulation! you get 10 points');</script>";
                } else {
                    echo "Error: " . $sql_update_poin . "<br>" . $conn->error;
                }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

// Periksa apakah query berhasil dieksekusi
if ($result_info_pengguna) {
  // Periksa apakah data pengguna ditemukan
  if (mysqli_num_rows($result_info_pengguna) > 0) {
      // Ambil data pengguna dari hasil query
      $row_info_pengguna = mysqli_fetch_assoc($result_info_pengguna);
      $nama_member = $row_info_pengguna['nama_member'];
      $email_member = $row_info_pengguna['email_member'];
      $no_hp = $row_info_pengguna['no_hp'];
      $status = $row_info_pengguna['status'];
  } else {
      echo "<p>User information not found.</p>";
  }
} else {
  echo "Error: " . $sql_info_pengguna . "<br>" . mysqli_error($conn);
}

// Query SQL untuk mengambil poin pengguna berdasarkan email
// Ambil poin pengguna dari database
$sql_poin_pengguna = "SELECT poin FROM tbl_membership WHERE email_member = '$email_pengguna'";
$result_poin_pengguna = mysqli_query($conn, $sql_poin_pengguna);

if ($result_poin_pengguna) {
    if (mysqli_num_rows($result_poin_pengguna) > 0) {
        $row_poin_pengguna = mysqli_fetch_assoc($result_poin_pengguna);
        $poin_pengguna = $row_poin_pengguna['poin'];
    } else {
        $poin_pengguna = 0;
    }
} else {
    echo "Error: " . $sql_poin_pengguna . "<br>" . mysqli_error($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="shortcut icon" href="./logo.png"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/promo.css">

    <style>
      /* Styling for section-gap */
.menu-area {
  padding: 80px 0; /* Sesuaikan dengan kebutuhan */
  background-image: url('hero_bg_1.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

.menu-area form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.menu-area h3 {
  margin-top: 5rem;
  margin-left: 10rem;
  font-size: 50px;
  font-weight: 600;
  margin-bottom: 20px;
}

.acc-information {
  margin-top: 5rem;
  margin-left: 10rem;
  font-size: 30px;
  font-weight: 500;
  margin-bottom: 1rem;
  /* border: 1px solid; */
}

.title-form {
  font-size: 24px;
  font-weight: 500;
  margin-top: 5rem;
  margin-bottom: 3rem;
  /* border: 1px solid; */
}

.menu-area p {
  margin-top: 0.6rem;
  margin-left: 10rem;
  font-size: 18px;
  margin-bottom: 5px;
  color: #00204a;
}

.menu-area input[type="text"] {
  width: 580px;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  border-radius: 50px;
}

.menu-area button {
  width: 200px;
  padding: 12px 20px;
  font-size: 16px;
  font-weight: 600;
  color: #fff;
  background-color: #1E3932;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.menu-area button:hover {
  background-color: #034D35;
}

.menu-area p.poin {
  margin-top: 20px;
}

.container-form {
  border: 1px solid;
  border-radius: 50px;
  max-width: 1000px; /* Mengatur margin kiri dan kanan agar container berada di tengah */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
  margin-top: 50px;
}



.user-info {
  margin-left: 10rem;
  width: 40%;
  margin-bottom: 20px;
  border-collapse: collapse;
}

.user-info td {
  padding: 10px;
}

.user-info td:first-child {
  font-weight: bold;
}

@media screen and (max-width: 768px) {
  .menu-area h3,
  .acc-information,
  .title-form,
  .menu-area p,
  .user-info {
    margin-left: 0;
    text-align: center;
  }

  .menu-area input[type="text"],
  .menu-area button,
  .user-info {
    width: 90%;
  }
}
    </style>

    <title>STARBUCKS &mdash; Coffee That Inspires</title>
    
  </head>
  <body>
    <header>
      <?php include './partials/_navbar_member.php'; ?>

    </header>


<section class="menu-area section-gap ">
    <div class="container container-form">
      <h3>Hello, Starbucks buddy!</h3>
      <hr>

      <h4 class="acc-information">Account Information</h4>
      <table class="user-info">
        <tr>
          <td>Customers name:</td>
          <td><?php echo $nama_member; ?></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td><?php echo $email_member; ?></td>
        </tr>
        <tr>
          <td>Handphone number:</td>
          <td><?php echo $no_hp; ?></td>
        </tr>
        <tr>
          <td>Status:</td>
          <td><?php echo $status; ?></td>
        </tr>
        <tr>
          <td>Your poins:</td>
          <td><?php echo $poin_pengguna; ?></td>
        </tr>
      </table>        
    <form action="" method="post">        
    <h4 class="title-form">Let's Redeem Your Code!</h4>
        <input type="text" name="kode_struk" id="kode_struk" placeholder="Enter your code">

        <button type="submit" name="redem" class="btn btn-block login-btn mb-4">Redeem</button>
    </form>
    <br><br><br><br><br><br>
    
        
    
    </div>
</section>



    <footer>
      <?php include './partials/_footer_member.php'; ?>
    </footer>

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>