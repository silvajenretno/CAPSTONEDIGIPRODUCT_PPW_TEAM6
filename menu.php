<?php
require 'koneksi.php';

$sql = "SELECT * FROM tbl_menu";
$result = mysqli_query($conn, $sql);

$sql_foods = "SELECT * FROM tbl_menu WHERE jenis_menu = 'Makanan'";
$result_foods = mysqli_query($conn, $sql_foods);

$sql_drinks = "SELECT * FROM tbl_menu WHERE jenis_menu = 'Minuman'";
$result_drinks = mysqli_query($conn, $sql_drinks);
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
    <link rel="stylesheet" href="css/menu.css">

    <title>STARBUCKS &mdash; Coffee That Inspires</title>

    <style>
      .menu-main {
        margin-bottom: 10rem;
      }
    </style>
  </head>
  <body>
  <header>
      <?php include './partials/_navbar.php'; ?>

      <div class="hero page-inner overlay" style="background-image: url('images/hero_bg_1.jpg')">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Menu</h1>
            <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">
                  Menu
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  <header>

    <!-- Delicious area start  -->
    <div class="Delicious_area menu-main">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="row">
            <div class="col-xl-12">
              <div class="section_title text-center mb-50 mt-30">
                <h1>Delicious Menu For You</h1>
              </div>
            </div>
          </div>
          <div class="tablist_menu">
            <div class="row">
              <div class="col-xl-12">
                <ul class="nav justify-content-center" id="pills-tab" role="tablist">
                  
                  <!-- toggle all -->
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-main-tab" data-toggle="pill" href="#pills-main" role="tab" aria-controls="pills-main" aria-selected="true">
                      <div class="single_menu text-center">
                        <div class="icon">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="50" fill-rule="evenodd" clip-rule="evenodd">
                            <path d="M9.46 11.039l-.48-4.039h-.98v-1.382c.87 0 2-.697 2-1.618h6.185l2.113-4 1.359.634-1.817 3.366h4.199c0 .922 1.092 1.618 1.961 1.618v1.382h-1l-2 17s-15.839.007-17.094-.005c-2.168-.068-3.017-1.656-3.041-3.743-.569-.472-.909-1.485-.861-2.409.044-.872.467-1.674 1.139-2.203.669-3.206 3.591-4.594 7.28-4.64.352 0 .698.013 1.037.039zm-6.466 9.957h-.002c.031.791.267.979.954.999 1.241.013 8.514 0 9.098-.009.679-.022.92-.269.96-.943 0 0-4.384.036-11.01-.047zm8.513-9.608c2.212.616 3.855 1.986 4.344 4.247.676.529 1.101 1.333 1.145 2.208.048.931-.437 1.866-.996 2.418.018.643-.061 1.23-.235 1.739h3.5l1.735-15h-10l.507 4.388zm2.493 5.612l-3.831.005c-.962.007-1.433 1.342-3.068 1.326-1.732-.018-1.855-1.313-2.723-1.309l-1.454-.022c-.54.046-.899.472-.923.943-.026.523.354 1.033 1.005 1.053h11.008c.645-.034 1.01-.539.985-1.053-.027-.49-.438-.92-.999-.943zm-.52-2.006c-.971-1.579-3.186-1.994-5.042-1.994-1.859.025-3.981.417-4.942 1.997l1.098.021c1.443.009 1.549 1.487 2.517 1.482.839-.004 1.404-1.492 2.834-1.494.141-.001 2.675-.012 3.535-.012z" fill="#365B51"/></svg>
                          </div>
                        <h4>All</h4>
                      </div>
                    </a>
                  </li>

                  <!-- toggle foods -->
                <li class="nav-item">
                    <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                        <div class="single_menu text-center">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="50" fill-rule="evenodd" clip-rule="evenodd">
                                    <path d="M11.415 12.393l1.868-2.289c.425-.544.224-.988-.055-2.165-.205-.871-.044-1.854.572-2.5 1.761-1.844 5.343-5.439 5.343-5.439l.472.37-3.693 4.728.79.617 3.87-4.59.479.373-3.558 4.835.79.618 3.885-4.58.443.347-3.538 4.85.791.617 3.693-4.728.433.338s-2.55 4.36-3.898 6.535c-.479.771-1.425 1.161-2.334 1.167-1.211.007-1.685-.089-2.117.464l-2.281 2.795c2.445 2.962 4.559 5.531 5.573 6.829.771.987.065 2.421-1.198 2.421-.42 0-.853-.171-1.167-.573l-8.36-10.072s-.926.719-1.944 1.518c-3.172-5.184-6.267-11.661-6.267-13.955 0-.128-.034-.924.732-.924.245 0 .493.116.674.344.509.642 5.415 6.513 10.002 12.049m-2.952 3.617l1.953 2.365-4.115 5.055c-.295.378-.736.576-1.182.576-1.198 0-1.991-1.402-1.189-2.428l4.533-5.568z" fill="#365B51"/>
                                </svg>
                            </div>
                            <h4>Foods</h4>
                        </div>
                    </a>
                </li>

                <!-- toggle drinks -->
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                        <div class="single_menu text-center">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="50">
                                    <path d="M12.874 6.999c4.737-4.27-.979-4.044.116-6.999-3.781 3.817 1.41 3.902-.116 6.999zm-2.78.001c3.154-2.825-.664-3.102.087-5.099-2.642 2.787.95 2.859-.087 5.099zm8.906 2.618c-.869 0-1.961-.696-1.961-1.618h-10.039c0 .921-1.13 1.618-2 1.618v1.382h14v-1.382zm-3.4 4.382l-1.286 8h-4.627l-1.287-8h7.2zm2.4-2h-12l2.021 12h7.959l2.02-12z" fill="#365B51"/>
                                </svg>
                            </div>
                            <h4>Drinks</h4>
                        </div>
                    </a>
                </li>
                </ul>
              </div>
            </div>
          </div>
        </div>


<!-- result all -->
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-main" role="tabpanel" aria-labelledby="pills-main-tab">
        <div class="row">
            <?php
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-lg-6 col-md-6">
                            <div class="single_delicious d-flex align-items-center">
                                <div class="thumb">
                                    <img src="./images/' . $row['gambar_menu'] . '" alt="">
                                </div>
                                <div class="info">
                                    <h3>' . $row['nama_menu'] . '</h3>
                                    <p>' . $row['deskripsi_menu'] . '</p>
                                    <span>' . $row['harga_normal'] . '</span>
                                </div>
                            </div>
                        </div>';
                }
            } else {
                echo "<p>Tidak ada menu yang tersedia.</p>";
            }
            ?>
        </div>
    </div>
</div>

<!-- result food -->
<div class="tab-content" id="pills-tabContent-foods">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row">
            <?php
            if(mysqli_num_rows($result_foods) > 0) {
                while($row = mysqli_fetch_assoc($result_foods)) {
                    echo '<div class="col-lg-6 col-md-6">
                            <div class="single_delicious d-flex align-items-center">
                                <div class="thumb">
                                    <img src="./images/' . $row['gambar_menu'] . '" alt="">
                                </div>
                                <div class="info">
                                    <h3>' . $row['nama_menu'] . '</h3>
                                    <p>' . $row['deskripsi_menu'] . '</p>
                                    <span>' . $row['harga_normal'] . '</span>
                                </div>
                            </div>
                        </div>';
                }
            } else {
                echo "<p>Tidak ada menu makanan yang tersedia.</p>";
            }
            ?>
        </div>
    </div>
</div>

<!-- result drinks -->
<div class="tab-content" id="pills-tabContent-drinks">
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="row">
            <?php
            if(mysqli_num_rows($result_drinks) > 0) {
                while($row = mysqli_fetch_assoc($result_drinks)) {
                    echo '<div class="col-lg-6 col-md-6">
                            <div class="single_delicious d-flex align-items-center">
                                <div class="thumb">
                                    <img src="./images/' . $row['gambar_menu'] . '" alt="">
                                </div>
                                <div class="info">
                                    <h3>' . $row['nama_menu'] . '</h3>
                                    <p>' . $row['deskripsi_menu'] . '</p>
                                    <span>' . $row['harga_normal'] . '</span>
                                </div>
                            </div>
                        </div>';
                }
            } else {
                echo "<p>Tidak ada menu minuman yang tersedia.</p>";
            }
            ?>
        </div>
    </div>
</div>
      </div>
    </div>

<footer>
      <?php include './partials/_footer.php'; ?>
    </footer>

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <script>
      var allTab = document.getElementById("pills-main");
      var foodsTab = document.getElementById("pills-home");
      var drinksTab = document.getElementById("pills-profile");

      allTab.classList.add("show", "active");
      foodsTab.classList.remove("show", "active");
      drinksTab.classList.remove("show", "active");

      // Event listener untuk kategori "All"
      document.getElementById("pills-main-tab").addEventListener("click", function(event) {
        event.preventDefault(); 
        foodsTab.classList.remove("show", "active");
        drinksTab.classList.remove("show", "active");
        allTab.classList.add("show", "active");
      });

      // Event listener untuk kategori "Foods"
      document.getElementById("pills-home-tab").addEventListener("click", function(event) {
        event.preventDefault();
        allTab.classList.remove("show", "active");
        drinksTab.classList.remove("show", "active");
        foodsTab.classList.add("show", "active");
      });

      // Event listener untuk kategori "Drinks"
      document.getElementById("pills-profile-tab").addEventListener("click", function(event) {
        event.preventDefault();
        allTab.classList.remove("show", "active");
        drinksTab.classList.add("show", "active");
        foodsTab.classList.remove("show", "active");
      });
    </script>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>