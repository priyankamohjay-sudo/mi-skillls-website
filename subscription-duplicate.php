<!DOCTYPE html>
<html lang="zxx">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="IT Solutions &amp; Business Services Responsive HTML5 Bootstrap5  Website Template">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <!-- fav icon -->
        <link rel="icon" href="assets/images/fav-icon/logo-new.png">
        
        <!-- bootstarp -->
        <link rel="stylesheet" href="css/vendors/bootstrap.min.css">
        
        <!-- animate.css file -->
        <link rel="stylesheet" href="css/vendors/animate.css">
        
        <!-- Fancybox -->
        <link rel="stylesheet" href="css/vendors/jquery.fancybox.min.css">
        
        <!-- Swiper -->
        <link rel="stylesheet" href="css/vendors/swiper-bundle.min.css">
        
        <!-- flaticon -->
        <link rel="stylesheet" href="css/vendors/flaticon/flaticon.css">
        
        <!-- fontAwesome -->
        <link rel="stylesheet" href="css/vendors/all.min.css">
        
        <!-- bootstrap icons -->
        <link rel="stylesheet" href="css/vendors/bootstrap-icons-1.9.1/bootstrap-icons.css">
        
        <!-- Font Family -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&amp;display=swap">
        
        <!-- main-LTR -->
        <link rel="stylesheet" href="css/main-LTR.css">
        <title> Mi Skills   |   Subscription</title>
  </head>
  <body class=" dark-theme ">

    <!--Start Page Header-->
    <?php include 'header.php'; ?>
    <!--End Page Header-->

    
      <!-- Start inner Page hero-->
<section class="page-hero inner-page-hero d-flex align-items-center" id="page-hero">

  <!-- Background Image -->
  <div class="hero-bg"
       style="background-image: url('assets/images/hero/inner-banner.jpg');">
  </div>

  <!-- Black Overlay -->
  <div class="hero-overlay"></div>

  <div class="container position-relative">
    <div class="hero-text-area centerd">
      <h1 class="hero-title wow fadeInUp" data-wow-delay=".2s">
        Subscriptions
      </h1>

      <nav aria-label="breadcrumb">
        <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
          <li class="breadcrumb-item">
            <a class="breadcrumb-link" href="index.php">
              <i class="bi bi-house icon"></i> Subscriptions
            </a>
          </li>
          <li class="breadcrumb-item active">Subscriptions</li>
        </ul>
      </nav>
    </div>
  </div>

</section>
<!-- End inner Page hero-->


<!-- Start pricing Section -->

<!-- ================= PRICING SECTION ================= -->
<section class="pricing mega-section" id="pricing-1">
<div class="container position-relative">

  <!-- ===== HEADING BLOCK ===== -->
  <div class="sec-heading text-center mb-5">
    <div class="content-area">
      <span class="pre-title">Pricing Plans</span>
      <h2 class="title text-white">Choose Your Learning Path</h2>
      <p class="subtitle text-white-50">
        MI Skills offers flexible plans with live classes, mentor support, and industry projects.
      </p>
    </div>
  </div>

  <!-- ======= 8 TABS ======= -->
  <div class="course-category-tabs mb-5 text-center">
    <button class="cat-tab active" onclick="showCategory('web')">Web Development</button>
    <button class="cat-tab" onclick="showCategory('app')">App Development</button>
    <button class="cat-tab" onclick="showCategory('marketing')">Digital Marketing</button>
    <button class="cat-tab" onclick="showCategory('graphic')">Graphic Designing</button>
    <button class="cat-tab" onclick="showCategory('testing')">Software Testing</button>
    <button class="cat-tab" onclick="showCategory('networking')">Networking</button>
    <button class="cat-tab" onclick="showCategory('interview')">Interview & Internship</button>
    <button class="cat-tab" onclick="showCategory('funding')">Business Funding</button>
  </div>

  <!-- ============ WEB DEVELOPMENT ============ -->
  <div id="web" class="category-content">

    <!-- Toggle -->
    <div class="web-toggle text-center mb-4">
      <label class="text-white me-3">
        <input type="radio" name="web_toggle" checked onclick="toggleWeb('individual')">
        <span>Individual Courses</span>
      </label>

      <label class="text-white">
        <input type="radio" name="web_toggle" onclick="toggleWeb('full')">
        <span>Full Course Package</span>
      </label>
    </div>

    <!-- ===== FULL → SINGLE CARD ONLY ===== -->
    <div id="web_full" style="display:none">
      <div class="plan full-ui-card p-4">

        <span class="ribbon">Most Popular</span>

        <i class="flaticon-nft-1 plan-icon"></i>

        <h3 class="text-white">Web Development – Full Course</h3>

        <p class="text-white-50">
          3 Months complete course with frontend & backend
        </p>

        <div class="plan-price text-white mb-3">
          <h2>₹1,495</h2>
        </div>

        <select class="form-control dark-select mt-2">
          <option>₹1,495 – 3 Months</option>
          <option>₹499 / Monthly Plan</option>
        </select>

        <button class="cta-btn w-100 mt-3">Select Plan</button>

      </div>
    </div>

    <!-- ===== INDIVIDUAL → 2 CARDS ONLY ===== -->
    <div id="web_individual">
      <div class="row">

        <!-- Frontend -->
        <div class="col-12 col-md-6 price-plan">
          <div class="plan ui-style-card p-4">

            <h3 class="text-white">Frontend Development</h3>

            <p class="text-white-50">
              Modules Included: HTML · CSS · JavaScript · Responsive UI
            </p>

            <label class="option">
              <input type="radio" name="fe_plan" checked>
              <span>1 Month Plan</span>
            </label>

            <label class="option">
              <input type="radio" name="fe_plan">
              <span>2 Months Plan</span>
            </label>

            <select class="form-control dark-select mt-2">
              <option>₹499 / month – Total ₹998</option>
            </select>

            <button class="cta-btn w-100 mt-3">Select Plan</button>

          </div>
        </div>

        <!-- Backend -->
        <div class="col-12 col-md-6 price-plan">
          <div class="plan ui-style-card p-4">

            <h3 class="text-white">Backend Development</h3>

            <p class="text-white-50">
              Modules Included: MongoDB · SQL · Authentication · APIs
            </p>

            <label class="option">
              <input type="radio" name="be_plan" checked>
              <span>1 Month Plan</span>
            </label>

            <label class="option">
              <input type="radio" name="be_plan">
              <span>2 Months Plan</span>
            </label>

            <select class="form-control dark-select mt-2">
              <option>₹499 / month – Total ₹998</option>
            </select>

            <button class="cta-btn w-100 mt-3">Select Plan</button>

          </div>
        </div>

      </div>
    </div>

  </div>
  <!-- ============ WEB END ============ -->

</div>
</div>
</section>



<!-- end new subscription duplicate -->
   
      <!-- Start  take-action Section-->
    <section class="our-clients elf-section has-dark-bg" id="take-action">
      <div class="overlay-photo-image-bg  " data-bg-img="assets/images/sections-bg-images/2.jpg" data-bg-opacity=".25"> </div>
      <div class="cta-wrapper">
        <div class="container">
          <div class="sec-heading  centered mb-0 ">
            <div class="content-area"><span class=" pre-title wow fadeInUp " data-wow-delay=".2s">contact us</span>
              <h2 class=" title    wow fadeInUp" data-wow-delay=".4s">get in touch with us</h2>
              <p class="subtitle   wow fadeInUp " data-wow-delay=".6s">Our team at MI Skills is here to guide you at every step—from learning to real-world success. <br>Connect with us today and take the next step toward your career goals.</p>
            </div>
          </div>
          <!--Start .see-more-area-->
          <div class=" see-more-area wow fadeInUp" data-wow-delay="0.8s"><a class=" btn btn-dark cta-link" href="contact-us.html">contact us</a></div>
          <!--End Of .see-more-area        -->
        </div>
      </div>
    </section>
    <!-- End  take-action Section-->

    <!-- Start  page-footer Section-->
 <?php include 'footer.php'; ?>
    <!-- End  page-footer Section-->
    <!-- Start loading-screen Component-->
    <div class="loading-screen" id="loading-screen"><span class="bar top-bar"></span><span class="bar down-bar"></span><span class="progress-line"></span><span class="loading-counter"> </span></div>
    <!-- End loading-screen Component-->
    <!-- Start back-to-top Button-->
    <div class="back-to-top" id="back-to-top"><i class="bi bi-arrow-up icon "></i>
    </div>
    <!-- End back-to-top Button-->
   
        
        <!--     JQuery     -->
        <script src="js/vendors/jquery-3.6.1.min.js"></script>
        
        <!--     bootstrap     -->
        <script src="js/vendors/bootstrap.bundle.min.js"></script>
        
        <!--     wow     -->
        <script src="js/vendors/wow.min.js"></script>
        
        <!--     swiper     -->
        <script src="js/vendors/swiper-bundle.min.js"></script>
        
        <!--     fancybox     -->
        <script src="js/vendors/jquery.fancybox.min.js"></script>
        
        <!--     particles     -->
        <script src="js/vendors/particles.min.js"></script>
        
        <!--     countTo     -->
        <script src="js/vendors/jquery.countTo.js"></script>
        
        <!--     main     -->
        <script src="js/main.js"></script>

   <!-- ===== JS TAB LOGIC ===== -->
<script>
function showCategory(name){
  var i, x = document.getElementsByClassName("category-content");
  for(i=0;i<x.length;i++){ x[i].style.display="none"; }

  document.getElementById(name).style.display="block";
  event.currentTarget.classList.add("active");
}

function toggleWeb(type){
  if(type=='full'){
    document.getElementById('web_full').style.display='block';
    document.getElementById('web_individual').style.display='none';
  }else{
    document.getElementById('web_full').style.display='none';
    document.getElementById('web_individual').style.display='block';
  }
}
</script>

  </body>

</html>