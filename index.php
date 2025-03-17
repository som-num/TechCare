<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GTS Booking</title>
    <link rel="stylesheet" href="styles.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- Navbar -->
    <nav>
      <div class="nav__logo">
        <a href="#"><img src="assets/GTS_logo_white.png" alt="logo" /></a>
      </div>

      <div class="pushRight">

      <div class="btn__sigIn">
        <a href="login.php">
          <button class="btn btn__booking">Sign In</button>
      </a>
      </div>
      <div class="nav__menu__btn" id="menu-btn">
        
        <i class="ri-menu-line"></i>
      </div>
      </div>

      <ul class="nav__links" id="nav-links">
        <li class="link"><a href="#home">Home</a></li>
        <li class="link"><a href="#services">Services</a></li>
        <li class="link"><a href="#whyUs">Why Us</a></li>
        <li class="link"><a href="#portfolio">Portfolio</a></li>
        <li class="link"><a href="#review">Reviews</a></li>
        <li class="link"><a href="#contact">Contact</a></li>
      </ul>
      <a href="login.php">
        <button class="btn btn__booking1">Sign In</button>
    </a>
    
    </nav>
<!-- End of navbar -->

<!-- Hero Section -->
    <header class="section__container header__container" id="home">
      <div class="header__content">
        <span class="bg__blur"></span>
        <span class="bg__blur header__blur"></span>
        <h4>Empowering You with Innovative Tech Solutions & Security</h4>
        <h1><span>SECURE</span> YOUR SPACE, UPGRADE YOUR TECH</h1>
        <p>
          From CCTV installations to solar systems and custom tech builds, we
          deliver reliable and future-ready solutions for your home and
          business.
        </p>
        <a href="login.php"><button class="btn">Get Started</button></a>
      </div>
      <div class="header__image">
        <img src="assets/file.png" alt="" class="header" />
      </div>
    </header>
    <!-- End of Hero Section -->

    <!-- Services section -->
    <section class="section__container explore__container" id="services">
      <div class="explore__header">
        <h2 class="section__header">Solutions That Power Your World</h2>
        <div class="explore__nav">
          <!-- <span><i class="ri-arrow-left-line"></i></span>
          <span><i class="ri-arrow-right-line"></i></span> -->
        </div>
      </div>
      <div class="explore__grid">
        <div class="explore__card">
          <span><i class="ri-dv-fill"></i></span>
          <h4>CCTV Installation</h4>
          <p>
            Advanced surveillance solutions tailored to your security needs,
            ensuring peace of mind.
          </p>
          <a href="login.php">Book Now<i class="ri-arrow-right-line"></i></a>
        </div>

        <div class="explore__card">
          <span><i class="ri-sun-line"></i></span>
          <h4>Solar Installation</h4>
          <p>
            Energy-efficient solar power systems designed to cut costs and
            reduce your carbon footprint.
          </p>
          <a href="login.php">Book Now<i class="ri-arrow-right-line"></i></a>
        </div>

        <div class="explore__card">
          <span><i class="ri-macbook-line"></i></span>
          <h4>Gadget Repair</h4>
          <p>
            Fast, efficient repairs for laptops, phones, and electronics,
            extending the life of your devices.
          </p>
          <a href="login.php">Book Now<i class="ri-arrow-right-line"></i></a>
        </div>

        <div class="explore__card">
          <span><i class="ri-store-3-line"></i></span>
          <h4>Custom PC Builds</h4>
          <p>
            Offering laptops, office and school supplies, and custom PC builds
            that fit your exact specifications.
          </p>
          <a href="login.php">Book Now<i class="ri-arrow-right-line"></i></a>
        </div>
      </div>
    </section>
    <!-- End of Services section -->

    <!-- Why Us section -->
    <section class="section__container class__container" id="whyUs">
      <div class="class__image">
        <span class="bg__blur"></span>
        <img
          src="assets/american-public-power-association-513dBrMJ_5w-unsplash(1).jpg"
          alt="class"
          class="class__img-1"
        />
        <img
          src="assets/insung-yoon-dRUqU4RpeOE-unsplash(1).jpg"
          alt="class"
          class="class__img-2"
        />
        <img
          src="assets/olena-bohovyk-PLMJD95IN_0-unsplash(1).jpg"
          alt=""
          class="class__img-3"
        />
      </div>
      <div class="class__content">
        <h2 class="section__header">Why We Stand Out</h2>
        <!-- <span> <h4>In a competitive tech market, we differentiate ourselves by offering:</h4> -->
        <ul>
          <span
            ><li>
              <h4>Expertise & Experience:</h4>
              With years of experience, we deliver reliable solutions with a
              personal touch.
            </li></span
          >
          <span
            ><li>
              <h4>Creativity & Innovation:</h4>
              Every solution is tailored to meet your unique needs, combining
              creativity and cutting-edge technology.
            </li></span
          >
          <span
            ><li>
              <h4>Comprehensive Support:</h4>
              We don’t just provide products or services—we offer continuous
              support, ensuring your satisfaction at every step.
            </li></span
          >
        </ul>
        <a href="login.php">
        <button class="btn">Book a Call</button>
        </a>
        
      </div>
    </section>
    <!-- End of Why Us -->

    <!-- Portfolio -->
    <section class="section__container portfolio__container" id="portfolio">
      <h2 class="section__header">See Our Work in Action</h2>
      <p class="section__subheader">
        Browse through our featured projects, where we’ve helped clients enhance
        security, boost productivity, and save on energy:
      </p>

      <div class="portfolio__image__wrapper">
        <div class="portfolio__image">
          <img src="assets/portfolio-1.jpg" alt="portfolio" class="explore__card"/>
          <img src="assets/portfolio-2.jpg" alt="portfolio" class="explore__card"/>
          <img src="assets/portfolio-3.jpg" alt="portfolio"class="explore__card"/>
          <img src="assets/portfolio-4.jpg" alt="portfolio"class="explore__card"/>
          <img src="assets/portfolio-5.jpg" alt="portfolio"class="explore__card"/>
          <img src="assets/portfolio-6.jpg" alt="portfolio"class="explore__card"/>
          <img src="assets/portfolio-1.jpg" alt="portfolio" class="explore__card"/>
      <img src="assets/portfolio-2.jpg" alt="portfolio" class="explore__card"/>
      <img src="assets/portfolio-3.jpg" alt="portfolio" class="explore__card"/>
      <img src="assets/portfolio-4.jpg" alt="portfolio" class="explore__card"/>
      <img src="assets/portfolio-5.jpg" alt="portfolio" class="explore__card"/>
      <img src="assets/portfolio-6.jpg" alt="portfolio" class="explore__card"/>
        </div>
      </div>
      <div class="portfolio__btn">
        <a href="login.php">
        <button class="btn">Book now</button>

        </a>
      </div>
    </section>
<!-- End of Portfolio -->

<!-- Testimonials -->
    <section class="review" id="review">
      <div class="section__container review__container">
        <span><i class="ri-chat-quote-line"></i></i></span>
        <div class="review__content">
          <h4>Testimonials</h4>
          <p>
            Their CCTV installation gave us the peace of mind we needed, and the team was professional and efficient from start to finish.
          </p>
          <div class="review__rating">
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-fill"></i></span>
            <span><i class="ri-star-half-fill"></i></span>
          </div>
          <div class="review__footer">
            <div class="review__customer">
              <img src="assets/customer.jpg" alt="customer"/>
              <div class="review__customer__details">
                <h4>John D.</h4>
                <p>Retail Store Owner</p>
              </div>
            </div>
            <div class="review__nav">
              <!-- <span><i class="ri-arrow-left-line"></i></span>
              <span><i class="ri-arrow-right-line"></i></span> -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End of Testimonials -->


<!-- Booking Section -->
    <section class="section__container booking__container" id="contact">
      <div class="contact__container">
      <h2 class="section__header">Let’s Work Together to Bring Your Vision to Life</h2>
      <p class="section__description">
        Whether you need a security upgrade, tech repairs, or solar solutions, our team is ready to assist. Contact us today to discuss your project and get a personalized quote.
      </p>
      <!-- <form action="/">
        <div class="form__grid">
          <input type="text" placeholder="Full Name"/>
          <input type="text" placeholder="Emaiil"/>
          <input type="text" placeholder="Phone Number"/>
          <input type="text" placeholder="Address"/>
        </div>       
        <textarea placeholder="Message"></textarea>
        <button class="btn">Submit Message</button>
      </form> -->
      <div class="portfolio__btn">
        <a href="login.php">
        <button class="btn">Register Now</button>
        </a>
      </div>
    </div>
  
    </section>
    <!-- End of Booking Section -->

    <!-- Puter Siksyon -->
    <footer class="section__container footer__container">
      <p>Copyright © 2024 GTS Marketing. All rights reserved.</p>
      <ul class="footer__socials">
        <li>
          <a href="https://www.facebook.com/tylerchristian.opo" target="_blank"><i class="ri-facebook-fill"></i></a>
        </li>
        <li>
          <a href="https://www.linkedin.com/in/tyler-christian-opo" target="_blank"><i class="ri-linkedin-fill"></i></a>
        </li>
        <li>
          <a href="https://www.youtube.com/@opotylerchristian5665" target="_blank"><i class="ri-google-fill"></i></a>
        </li>
      </ul>
    </footer>
    <!-- Katapusan mo na Puter siksyon -->

    <script src="main.js"></script>
  </body>
</html>
