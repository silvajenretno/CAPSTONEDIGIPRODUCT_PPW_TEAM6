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

    <title>STARBUCKS &mdash; Coffee That Inspires</title>
  </head>
  <body>
  <header>
      <?php include './partials/_navbar.php'; ?>

    <div class="hero page-inner overlay" style="background-image: url('images/hero_bg_1.jpg')">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">About</h1>
            <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active text-white-50" aria-current="page">
                  About
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>

    <div class="section">
      <div class="container">
        <div class="row text-left mb-5">
          <div class="col-12">
            <h2 class="font-weight-bold heading text-primary mb-4" data-aos="fade-up">About Us</h2>
          </div>
          <div class="col-lg-6" data-aos="fade-up">
            <p class="text-black-50">
              Our story begins in 1971 along the cobblestone streets of Seattle's historic Pike Place Market. It was here where Starbucks opened its first store, offering fresh-roasted coffee beans, tea and spices from around the world for our customers to take home. Our name was inspired by the classic tale, “Moby-Dick,” evoking the seafaring tradition of the early coffee traders.
            </p>
            <p class="text-black-50">
            Ten years later, a young New Yorker named Howard Schultz would walk through these doors and become captivated with Starbucks coffee from his first sip. After joining the company in 1982, a different cobblestone road would lead him to another discovery. It was on a trip to Milan in 1983 that Howard first experienced Italy’s coffeehouses, and he returned to Seattle inspired to bring the warmth and artistry of its coffee culture to Starbucks. By 1987, we swapped our brown aprons for green ones and embarked on our next chapter as a coffeehouse.
            </p>
          </div>
          <div class="col-lg-6" data-aos="fade-up">
            <p class="text-black-50">
            Starbucks would soon expand to Chicago and Vancouver, Canada and then on to California, Washington, D.C. and New York. By 1996, we would cross the Pacific to open our first store in Japan, followed by Europe in 1998 and China in 1999. Over the next two decades, we would grow to welcome millions of customers each week and become a part of the fabric of tens of thousands of neighborhoods all around the world. In everything we do, we are always dedicated to Our Mission: With every cup, with every conversation, with every community - we nurture the limitless possibilities of human connection.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="section pt-0" data-aos="fade-up">
      <div class="container">
        <div class="row justify-content-between mb-5">
          <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
            <div class="img-about dots">
              <img src="./images/pic1.jpg" alt="Image" class="img-fluid" />
            </div>
          </div>
          <div class="col-lg-4">
            <div class="d-flex feature-h">
              <div class="feature-text">
                <h3 class="heading">Coffee & Craft</h3>
                <p class="text-black-50">
                It takes many hands to craft the perfect cup of coffee - from the farmers who tend to the red-ripe coffee cherries, to the master roasters who coax the best from every bean, and to the barista who serves it with care. We are committed to the highest standards of quality and service, embracing our heritage while innovating to create new experiences to savor.
                </p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="section pt-0" data-aos="fade-up">
      <div class="container">
        <div class="row justify-content-between mb-5">
          <div class="col-lg-7 mb-5 mb-lg-0">
            <div class="img-about dots">
              <img src="./images/pic2.webp" alt="Image" class="img-fluid" />
            </div>
          </div>
          <div class="col-lg-4">
            <div class="d-flex feature-h">
              <div class="feature-text">
                <h3 class="heading">Our Partners</h3>
                <p class="text-black-50">
                  We like to say that we are not in the coffee business serving people, but in the people business serving coffee. Our employees – who we call partners – are at the heart of the Starbucks experience. We are committed to making our partners proud and investing in their health, well-being and success and to creating a culture of belonging where everyone is welcome.
                </p>
              </div>
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

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
