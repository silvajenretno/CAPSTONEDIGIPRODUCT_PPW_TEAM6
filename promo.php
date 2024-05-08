<?php
require 'koneksi.php';
$current_date = date('Y-m-d'); // Mendapatkan tanggal saat ini dalam format YYYY-MM-DD
$sql_promo = "SELECT * FROM tbl_promo WHERE tgl_berakhir > '$current_date' AND jenis_promo = 'Non-Membership'";
$result_promo = mysqli_query($conn, $sql_promo);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content="Untree.co"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="bootstrap, bootstrap5"/>

    <link rel="shortcut icon" href="./logo.png"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="fonts/icomoon/style.css"/>
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css"/>

    <link rel="stylesheet" href="css/tiny-slider.css"/>
    <link rel="stylesheet" href="css/aos.css"/>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/promo.css">

    <title>STARBUCKS &mdash; Coffee That Inspires</title>
  </head>
  <body>
  <header>
      <?php include './partials/_navbar.php'; ?>

      <div class="hero page-inner overlay" style="background-image: url('images/hero_bg_1.jpg')">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Promo</h1>
            <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">
                  Promo
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  <header>

  <div class="single-menu" data-id="<?php echo $row_promo['id_promo']; ?>">


<!-- Start menu Area -->
<section class="menu-area section-gap" id="coffee">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-10">
                <div class="title text-center">
                    <h1 class="mb-10"> Exclusive Deals Await!</h1>
                    <p>Treat yourself to incredible savings with our latest promotional offers.</p>
                </div>
            </div>
        </div>
        <div class="row row-promo">
            <!-- Menampilkan promosi -->
            <?php
            if(mysqli_num_rows($result_promo) > 0) {
                while($row_promo = mysqli_fetch_assoc($result_promo)) {
            ?>
                    <div class="col-lg-4">
                        <div class="single-menu">
                            <div class="title-div justify-content-between d-flex">
                                <h4 class="nama-promo" style="color: #365B51"><?php echo $row_promo['nama_promo']; ?></h4>
                            </div>
                            <p><?php echo $row_promo['deskripsi']; ?></p>
                            <p>Tanggal Berakhir: <?php echo $row_promo['tgl_berakhir']; ?></p>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>Tidak ada promosi yang tersedia.</p>";
            }
            ?>
            <!-- Akhir promosi -->
        </div>
    </div>
</section>

<?php
require 'koneksi.php';

if(isset($_GET['id_promo'])) {
    $promoId = $_GET['id_promo'];
    $sql = "SELECT * FROM tbl_promo WHERE id_promo = '$promoId'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $response = array(
            'nama_promo' => $row['nama_promo'],
            'deskripsi' => $row['deskripsi'],
            'tgl_berakhir' => $row['tgl_berakhir'],
            'syarat_dan_ketentuan1' => $row['sk_1'],
            'syarat_dan_ketentuan2' => $row['sk_2'],
            'syarat_dan_ketentuan3' => $row['sk_3'],
            'syarat_dan_ketentuan4' => $row['sk_5']
        );
        echo json_encode($response);
    } else {
        echo json_encode(array('error' => 'Promo not found'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request'));
}
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var promos = document.querySelectorAll('.single-menu');
    promos.forEach(function(promo) {
        promo.addEventListener('click', function() {
            var promoId = promo.getAttribute('data-id');
            fetch('get_promo_info.php?id=' + promoId)
            .then(response => response.json())
            .then(data => {
                // Tampilkan informasi promo
                var message = 'Nama: ' + data.nama_promo + '\nDeskripsi: ' + data.deskripsi + '\nTanggal Berakhir: ' + data.tgl_berakhir;
                if (data.syarat_dan_ketentuan) {
                    message += '\n\nSyarat dan Ketentuan:\n' + data.syarat_dan_ketentuan;
                }
                alert(message);
            })
            .catch(error => console.error(error));
        });
    });
});
</script>
<!-- End menu Area -->

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