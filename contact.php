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
    <link rel="stylesheet" href="css/style.css"/>
    
    <title>STARBUCKS &mdash; Coffee That Inspires</title>

    <style>
      .containerForm{
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .container .contactUs {
        font-size: 28px;
      }
    </style>

  <title>STARBUCKS &mdash; Coffee That Inspires</title>
  </head>

  
  <body>
    <!-- header -->
    <header>
      <?php include './partials/_navbar.php'; ?>
      <div class="hero page-inner overlay" style="background-image: url('images/hero_bg_1.jpg')">
        <div class="container">
          <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 text-center mt-5">
              <h1 class="heading" data-aos="fade-up">Contact Us</h1>
              <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                <ol class="breadcrumb text-center justify-content-center">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active text-white-50" aria-current="page">Contact</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>


    <div class="section">
      <div class="container containerForm">
        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
          <p class="contactUs">Let's Contact Us</p>
          <form id="contactForm" class="forms-sample">
            <div class="row">
              <div class="col-6 mb-3">
                <input type="text" class="form-control" placeholder="Your Name" name="name" id="name"/>
              </div>
              <div class="col-6 mb-3">
                <input type="email" class="form-control" placeholder="Your Email" name="email" id="email"/>
              </div>
              <div class="col-12 mb-3">
                <input type="text" class="form-control" placeholder="Subject" name="subject" id="subject"/>
              </div>
              <div class="col-12 mb-3">
                <textarea cols="30" rows="7" class="form-control" placeholder="Message" style="resize: none;" name="message" id="message"></textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Kirim</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- footer -->
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

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>