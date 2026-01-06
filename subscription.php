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


<!-- ======================== PRICING PAGE SECTION ======================== -->
<section class="pricing mega-section" id="pricing-1">

  <div class="container">

    <!-- ===== SECTION HEADING ===== -->
    <div class="sec-heading text-center mb-5">
      <span class="pre-title wow fadeInUp" data-wow-delay=".2s">pricing plans</span>

      <h2 class="title wow fadeInUp text-white" data-wow-delay=".4s">
        <span class="hollow-text">Courses</span> pricing plans
      </h2>

      <p class="subtitle wow fadeInUp text-white-50" data-wow-delay=".6s">
        MI Skills offers flexible and affordable pricing plans with access to live classes, expert support, and interview and internship opportunities.
      </p>
    </div>


    <!-- ======= 8 CATEGORY TABS ======= -->
    <div class="course-category-tabs mb-5 text-center">
      <button class="cat-tab active" onclick="showCategory('web')">Web Development</button>
      <button class="cat-tab" onclick="showCategory('app')">App Development</button>
      <button class="cat-tab" onclick="showCategory('marketing')">Digital Marketing</button>
      <button class="cat-tab" onclick="showCategory('graphic')">Graphic Designing</button>
      <button class="cat-tab" onclick="showCategory('testing')">Testing</button>
      <button class="cat-tab" onclick="showCategory('networking')">Networking</button>
      <button class="cat-tab" onclick="showCategory('interview')">Interview & Internship</button>
      <button class="cat-tab" onclick="showCategory('funding')">Business Funding</button>
    </div>


    <!-- ======================== WEB DEVELOPMENT ======================== -->
    <div id="web" class="category-content">

      <!-- Toggle -->
      <div class="web-toggle text-center mb-4">
        <label class="text-white me-3">
          <input type="radio" name="web_toggle" checked onclick="toggleWeb('individual')" />
          <span>Individual Courses</span>
        </label>

        <label class="text-white">
          <input type="radio" name="web_toggle" onclick="toggleWeb('full')" />
          <span>Full Course Package</span>
        </label>
      </div>


      <!-- ===== FULL COURSE – SINGLE BIG CARD ===== -->
      <div id="web_full" class="wrap-inner" style="display:none">
        <div class="plan p-4 full-big-card">

          <span class="ribbon">Most Popular</span>

          <i class="flaticon-nft-1 plan-icon"></i>

          <h3 class="text-white">Web Development Masterclass</h3>
          <p class="text-white-50">Complete Frontend & Backend Course</p>

          <div class="plan-price text-white mb-3">
            <h2>₹1,495</h2>
            <span>3 Months Access</span>
          </div>

          <select class="form-control dark-select mt-3">
            <option>₹1,495 – 3 Months</option>
          </select>

          <button class="cta-btn w-100 mt-3">Select Plan</button>

        </div>
      </div>



      <!-- ===== INDIVIDUAL – 2 CARDS (FRONTEND + BACKEND) ===== -->
      <div id="web_individual" class="wrap-inner">
        <div class="row">

          <!-- Frontend -->
          <div class="col-12 col-md-6">
            <div class="plan p-4">

              <i class="flaticon-basic-shapes plan-icon"></i>

              <h4 class="text-white">Frontend Development</h4>
              <p class="text-white-50">HTML, CSS, JavaScript, Responsive UI</p>

              <label class="option">
                <input type="radio" name="fe_plan" checked />
                <span>1 Month – ₹499</span>
              </label>

              <label class="option">
                <input type="radio" name="fe_plan" />
                <span>2 Months – ₹998</span>
              </label>

              <button class="cta-btn w-100 mt-3">Select Plan</button>

            </div>
          </div>


          <!-- Backend -->
          <div class="col-12 col-md-6">
            <div class="plan p-4">

              <i class="flaticon-search plan-icon"></i>

              <h4 class="text-white">Backend Development</h4>
              <p class="text-white-50">MongoDB, SQL, Authentication</p>

              <label class="option">
                <input type="radio" name="be_plan" checked />
                <span>1 Month – ₹499</span>
              </label>

              <label class="option">
                <input type="radio" name="be_plan" />
                <span>2 Months – ₹998</span>
              </label>

              <button class="cta-btn w-100 mt-3">Select Plan</button>

            </div>
          </div>

        </div>
      </div>

    </div>



    <!-- ======================== APP DEVELOPMENT ======================== -->
    <div id="app" class="category-content" style="display:none">
      <div class="plan p-4 text-center">
        <h3 class="text-white">App Development – Full Course</h3>
        <button class="cta-btn w-100 mt-3">Select Plan</button>
      </div>
    </div>


    <!-- Other categories abhi static placeholders rahenge, baad me logic lagega -->

  </div>

</section>



    <!-- Start  pricing Section-->


    <!-- <section class="pricing mega-section  " id="pricing-1">
      <div class="container">
        <div class="sec-heading  ">
          <div class="content-area"><span class=" pre-title       wow fadeInUp " data-wow-delay=".2s">pricing plans</span>
            <h2 class=" title    wow fadeInUp" data-wow-delay=".4s"><span class='hollow-text'>affordable</span> pricing plans</h2>
            <p class="subtitle   wow fadeInUp " data-wow-delay=".6s">Lorem ipsum dolor sit amet consectetur adipisicing elit Omnis <br>id atque  dignissimos repellat quae ullam.</p>
          </div>
          <div class=" cta-area   wow fadeInUp" data-wow-delay=".8s"><a class="cta-btn btn-solid    " href="pricing.html">see all plans<i class="bi bi-arrow-right icon "></i></a></div>
        </div>
        <div class="row">
         
          <div class="col-12  col-md-6 col-xl-3  mx-auto price-plan ">
            <div class="plan    wow fadeInUp  " data-wow-delay=".1s ">
              <div class="plan-head"><i class="flaticon-nft-1 plan-icon"></i>
                <h4 class="plane-name">free plan</h4>
                <div class="plan-price">
                  <h3 class="price">00<sup class="currency-symbol">$</sup></h3><span class="per">per project</span>
                </div>
              </div>
              <div class="plan-details">
                <ul class="plan-list">
                  <li class="plan-feat "> <span class="feat-text"> 150 Lorem, ipsum dolor. </span></li>
                  <li class="plan-feat "> <span class="feat-text"> 20 Lorem ipsum dolor sit . </span></li>
                  <li class="plan-feat "> <span class="feat-text"> Lorem ipsum dolor sit. </span></li>
                  <li class="plan-feat "> <span class="feat-text"> free Lorem ipsum dolor . </span></li>
                  <li class="plan-feat "> <span class="feat-text"> added Lorem ipsum dolor. </span></li>
                </ul>
              </div>
              <div class="plan-cta"><a class="cta-btn btn-outline " href="#0">select plan  </a></div>
            </div>
          </div>
        
          <div class="col-12  col-md-6 col-xl-3  mx-auto price-plan ">
            <div class="plan    wow fadeInUp  " data-wow-delay=".3s ">
              <div class="plan-head"><i class="flaticon-virtual-reality plan-icon"></i>
                <h4 class="plane-name">standerd plan</h4>
                <div class="plan-price">
                  <h3 class="price">85<sup class="currency-symbol">$</sup></h3><span class="per">per project</span>
                </div>
              </div>
              <div class="plan-details">
                <ul class="plan-list">
                  <li class="plan-feat "> <span class="feat-text"> 150 Lorem, ipsum dolor. </span></li>
                  <li class="plan-feat "> <span class="feat-text"> 20 Lorem ipsum dolor sit . </span></li>
                  <li class="plan-feat "> <span class="feat-text"> Lorem ipsum dolor sit. </span></li>
                  <li class="plan-feat "> <span class="feat-text"> free Lorem ipsum dolor . </span></li>
                  <li class="plan-feat "> <span class="feat-text"> added Lorem ipsum dolor. </span></li>
                </ul>
              </div>
              <div class="plan-cta"><a class="cta-btn btn-outline " href="#0">select plan  </a></div>
            </div>
          </div>
         
          <div class="col-12  col-md-6 col-xl-3  mx-auto price-plan ">
            <div class="plan   featured  wow fadeInUp  " data-wow-delay=".5s ">
              <div class="plan-head"><i class="flaticon-box plan-icon"></i>
                <h4 class="plane-name">pro plan</h4>
                <div class="plan-price">
                  <h3 class="price">150<sup class="currency-symbol">$</sup></h3><span class="per">per project</span>
                </div>
              </div>
              <div class="plan-details">
                <ul class="plan-list">
                  <li class="plan-feat "> <span class="feat-text"> 150 Lorem, ipsum dolor. </span></li>
                  <li class="plan-feat "> <span class="feat-text"> 20 Lorem ipsum dolor sit . </span></li>
                  <li class="plan-feat "> <span class="feat-text"> Lorem ipsum dolor sit. </span></li>
                  <li class="plan-feat "> <span class="feat-text"> free Lorem ipsum dolor . </span></li>
                  <li class="plan-feat "> <span class="feat-text"> added Lorem ipsum dolor. </span></li>
                </ul>
              </div>
              <div class="plan-cta"><a class="cta-btn btn-outline " href="#0">select plan  </a></div>
            </div>
          </div>
         
          <div class="col-12  col-md-6 col-xl-3  mx-auto price-plan ">
            <div class="plan    wow fadeInUp  " data-wow-delay=".6s ">
              <div class="plan-head"><i class="flaticon-basic-shapes plan-icon"></i>
                <h4 class="plane-name">ultimate plan</h4>
                <div class="plan-price">
                  <h3 class="price">210<sup class="currency-symbol">$</sup></h3><span class="per">per project</span>
                </div>
              </div>
              <div class="plan-details">
                <ul class="plan-list">
                  <li class="plan-feat "> <span class="feat-text"> 150 Lorem, ipsum dolor. </span></li>
                  <li class="plan-feat "> <span class="feat-text"> 20 Lorem ipsum dolor sit . </span></li>
                  <li class="plan-feat "> <span class="feat-text"> Lorem ipsum dolor sit. </span></li>
                  <li class="plan-feat "> <span class="feat-text"> free Lorem ipsum dolor . </span></li>
                  <li class="plan-feat "> <span class="feat-text"> added Lorem ipsum dolor. </span></li>
                </ul>
              </div>
              <div class="plan-cta"><a class="cta-btn btn-outline " href="#0">select plan  </a></div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- End  pricing Section-->
   
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
    <!-- Start privacy-policy-modal-->
    <div class="modal privacy-policy-modal fade" id="privacyPolicyModal" aria-labelledby="PrivacyPolicyModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-xl ">
        <div class="modal-content text-dark">
          <div class="modal-header">
            <h2 class="modal-title" id="PrivacyPolicyModalLabel">Privacy Policy Modal Title</h2>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="content">
              <h4>privacy policy item Title goes here </h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores saepe, labore sequi libero nesciunt optio quidem iste, dolorum nostrum ex at. Recusandae ducimus aut autem temporibus tempore rerum, consequuntur doloribus perspiciatis, labore totam dolorem veritatis repellendus omnis illo sint ut?</p>
            </div>
            <div class="content">
              <h4>privacy policy item Title goes here </h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores saepe, labore sequi libero nesciunt optio quidem iste, dolorum nostrum ex at. Recusandae ducimus aut autem temporibus tempore rerum, consequuntur doloribus perspiciatis, labore totam dolorem veritatis repellendus omnis illo sint ut?</p>
            </div>
            <div class="content">
              <h4>privacy policy item Title goes here </h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores saepe, labore sequi libero nesciunt optio quidem iste, dolorum nostrum ex at. Recusandae ducimus aut autem temporibus tempore rerum, consequuntur doloribus perspiciatis, labore totam dolorem veritatis repellendus omnis illo sint ut?</p>
            </div>
            <div class="content">
              <h4>privacy policy item Title goes here </h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores saepe, labore sequi libero nesciunt optio quidem iste, dolorum nostrum ex at. Recusandae ducimus aut autem temporibus tempore rerum, consequuntur doloribus perspiciatis, labore totam dolorem veritatis repellendus omnis illo sint ut?</p>
            </div>
            <div class="content">
              <h4>privacy policy item Title goes here </h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores saepe, labore sequi libero nesciunt optio quidem iste, dolorum nostrum ex at. Recusandae ducimus aut autem temporibus tempore rerum, consequuntur doloribus perspiciatis, labore totam dolorem veritatis repellendus omnis illo sint ut?</p>
            </div>
            <div class="content">
              <h4>privacy policy item Title goes here </h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores saepe, labore sequi libero nesciunt optio quidem iste, dolorum nostrum ex at. Recusandae ducimus aut autem temporibus tempore rerum, consequuntur doloribus perspiciatis, labore totam dolorem veritatis repellendus omnis illo sint ut?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn-solid" type="button" data-bs-dismiss="modal" aria-label="Close">Click to close</button>
            <button class="btn-outline" type="button">Do somthing else</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End privacy-policy-modal-->   
        
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
  </body>

</html>