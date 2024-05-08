<?php

// Cek apakah tombol logout ditekan
if(isset($_POST['logout'])){
    session_unset(); // Menghapus semua data session
    session_destroy(); // Menghancurkan session
    header("Location: index.php"); // Redirect ke halaman Index.php setelah logout
}
?>

<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
    <div class="container">
    <div class="menu-bg-wrap">
        <div class="site-navigation">
        <a href="home_member.php" class="logo m-0 float-start">Starbucks</a>
        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
            <li class="active"><a href="home_member.php">Home</a></li>
            <li><a href="about_member.php">About</a></li>
            <li><a href="menu_member.php">Menu</a></li>
            <li><a href="promo_member.php">Promo</a></li>
            <li><a href="contact_member.php">Contact Us</a></li>
            <li>
                <form method="post">
                <button type="submit" name="logout" style="border: none; background-color: transparent; cursor: pointer; color: white;">Logout</button>
                </form>
            </li>
            </ul>

        <a href="#"
            class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
            data-toggle="collapse"
            data-target="#main-navbar">
            <span></span>
        </a>
        </div>
    </div>
    </div>
</nav>