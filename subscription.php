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
            <a class="breadcrumb-link" href="/">
              <i class="bi bi-house icon"></i> Home
            </a>
          </li>
          <li class="breadcrumb-item active">Subscriptions</li>
        </ul>
      </nav>
    </div>
  </div>

</section>
<!-- End inner Page hero-->


<!-- ================= PRICING SECTION ================= -->
<section class="pricing mega-section" id="pricing-1">
  <div class="container position-relative">

    <!-- SECTION HEADING -->
    <div class="sec-heading centered">
      <div class="content-area">
        <span class="pre-title">pricing plans</span>
        <h2 class="title">
          <span class="hollow-text">Courses</span> pricing plans
        </h2>
        <p class="info-text">
          MI Skills offers flexible and affordable pricing plans with access to live classes,<br>
          expert support, and interview and internship opportunities.
        </p>
      </div>
    </div>

    <!-- CATEGORY TABS -->
    <div class="course-category-tabs text-center mb-5">
      <div class="d-inline-flex flex-wrap gap-2 justify-content-center category-pill-wrap">
        <button class="cat-tab btn active" onclick="activateTab(this); showCategory('web')">Web Development</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('app')">App Development</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('marketing')">Digital Marketing</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('graphic')">Graphic Designing</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('testing')">Testing</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('networking')">Networking</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('interview')">Interview & Internship</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('funding')">Business Funding</button>
      </div>
    </div>

    <!-- ================= ALL CATEGORY CONTENT ================= -->
    <div class="pricing-categories-wrapper">

      <!-- ================= WEB DEVELOPMENT ================= -->
      <div id="web" class="category-content">

        <!-- TOGGLE -->
        <div class="text-center mb-4">
          <div class="d-inline-flex gap-2 category-pill-wrap">
            <button id="btnIndividual" class="cat-tab btn active" onclick="toggleWeb('individual')">Individual Courses</button>
            <button id="btnFull" class="cat-tab btn" onclick="toggleWeb('full')">Full Course Package</button>
          </div>
        </div>

        <!-- FULL -->
        <div id="web_full" style="display:none">
          <div class="full-course-card mx-auto">
            <div class="full-course-left">
              <span class="badge">Most Popular</span>
              <h3>Web Development – Full Course</h3>
              <p class="sub-text">Full Stack Development – Frontend + Backend</p>
              <ul class="full-feature-list">
                <li>Frontend Development</li>
                <li>Backend Development</li>
                <li>15+ Industry Projects</li>
                <li>Internship Support</li>
                <li>Career Guidance & Interview Prep</li>
                <li>Lifetime Access & Updates</li>
              </ul>
            </div>
            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price">₹1,495</h2>
              <p class="duration">3 Months Access</p>
              <!-- <div class="plan-cta"><a class="cta-btn btn-solid" href="#">Select Plan</a></div> -->
            </div>
          </div>
        </div>

        <!-- INDIVIDUAL -->
        <div id="web_individual">
           <div class="row">

            <!-- FRONTEND -->
            <div class="col-md-6">
              <div class="plan ui-style-card p-4 price-card">
                <h3>Frontend Development</h3>
                <p class="text-white-50">HTML · CSS · JavaScript · Responsive UI</p>

                <div class="price-option">
                  <label>
                    <input type="radio" name="frontend_price">
                    Monthly
                  </label>
                  <strong>₹499 / Month</strong>
                </div>

                <div class="price-option">
                  <label>
                    <input type="radio" name="frontend_price">
                    2 Months
                  </label>
                  <strong>₹998 / Two Month</strong>
                </div>

                <ul class="feature-list mt-3">
                  <li>HTML5 & CSS3</li>
                  <li>JavaScript ES6+</li>
                  <li>React Basics</li>
                  <li>8+ Projects</li>
                </ul>
              </div>
            </div>

            <!-- BACKEND -->
            <div class="col-md-6">
              <div class="plan ui-style-card p-4 price-card">
                <h3>Backend Development</h3>
                <p class="text-white-50">MongoDB · SQL · APIs · Auth</p>

                <div class="price-option">
                  <label>
                    <input type="radio" name="backend_price">
                    Monthly
                  </label>
                  <strong>₹499 / Month</strong>
                </div>

                <div class="price-option">
                  <label>
                    <input type="radio" name="backend_price">
                    2 Months
                  </label>
                  <strong>₹998 / Two Month</strong>
                </div>

                <ul class="feature-list mt-3">
                  <li>Node & Express</li>
                  <li>REST APIs</li>
                  <li>Authentication</li>
                  <li>7+ Projects</li>
                </ul>
              </div>
            </div>

          </div>

        </div>
        
      </div>

      <!-- ================= APP DEVELOPMENT ================= -->
      <div id="app" class="category-content" style="display:none">

        <div class="text-center mb-4">
          <div class="d-inline-flex gap-2 category-pill-wrap">
            <button id="btnAppIndividual"
              class="cat-tab btn active"
              onclick="toggleApp('individual')">
              Individual Courses
            </button>

            <button id="btnAppFull"
              class="cat-tab btn"
              onclick="toggleApp('full')">
              Full Course Package
            </button>
          </div>
        </div>

        <!-- FULL -->
        <div id="app_full" style="display:none">
          <div class="full-course-card mx-auto">

            <div class="full-course-left">
              <span class="badge">Complete Program</span>
              <h3>App Development – Full Course</h3>
              <p class="sub-text">Android + iOS + Cross Platform</p>

              <ul class="full-feature-list">
                <li>Android App Development</li>
                <li>iOS App Development</li>
                <li>Cross Platform Apps</li>
                <li>Live Projects</li>
                <li>Career Guidance</li>
              </ul>
            </div>

            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price">₹3,899</h2>
              <p class="duration">4 Months Access</p>
              <!-- <div class="plan-cta"><a class="cta-btn btn-solid" href="#">Select Plan</a></div> -->
            </div>

          </div>
        </div>

        <!-- INDIVIDUAL -->
        <div id="app_individual">
         <div class="row">

        <!-- IOS -->
        <div class="col-md-4">
          <div class="plan ui-style-card p-4 price-card">

            <h3>iOS App Development</h3>
            <p class="text-white-50">Swift · iOS SDK</p>

            <div class="price-option">
              <label>
                <input type="radio" name="ios_price">
                Monthly
              </label>
              <strong>₹899 / Month</strong>
            </div>

            <div class="price-option">
              <label>
                <input type="radio" name="ios_price">
                2 Months
              </label>
              <strong>₹1,798 / Two Month</strong>
            </div>

            <ul class="feature-list mt-3">
              <li>Swift Programming</li>
              <li>iOS SDK & Xcode</li>
              <li>App UI & Navigation</li>
              <li>Live Projects</li>
            </ul>

          </div>
        </div>

        <!-- ANDROID -->
        <div class="col-md-4">
          <div class="plan ui-style-card p-4 price-card">

            <h3>Android App Development</h3>
            <p class="text-white-50">Java · Kotlin</p>

            <div class="price-option">
              <label>
                <input type="radio" name="android_price">
                Monthly
              </label>
              <strong>₹899 / Month</strong>
            </div>

            <div class="price-option">
              <label>
                <input type="radio" name="android_price">
                2 Months
              </label>
              <strong>₹1,798 /Two Month</strong>
            </div>

            <ul class="feature-list mt-3">
              <li>Java & Kotlin</li>
              <li>Android SDK</li>
              <li>API Integration</li>
              <li>Live Projects</li>
            </ul>

          </div>
        </div>

        <!-- CROSS PLATFORM -->
        <div class="col-md-4">
          <div class="plan ui-style-card p-4 price-card">

            <h3>Cross-Platform App Development</h3>
            <p class="text-white-50">Flutter · React Native</p>

            <div class="price-option">
              <strong>₹1,299</strong>
            </div>

            <ul class="feature-list mt-3">
              <li>Flutter / React Native</li>
              <li>Single Codebase</li>
              <li>Android & iOS Apps</li>
              <li>Live Projects</li>
              <li>Dart</li>
            </ul>

          </div>
        </div>
      </div>
        </div>

      </div>

          <!-- DIGITAL MARKETING -->
      <div id="marketing" class="category-content" style="display:none">

        <div class="category-inner">

          <!-- FULL COURSE BUTTON -->
          <div class="text-center mb-4">
            <div class="d-inline-flex gap-2 category-pill-wrap">
              <button class="cat-tab btn active">Full Course Package</button>
            </div>
          </div>

          <!-- COURSE CARD -->
          <div class="full-course-card mx-auto">
            <div class="full-course-left">
              <span class="badge">Complete Program</span>
              <h3>Digital Marketing</h3>
              <p class="sub-text">No Individual Courses</p>
              <ul class="full-feature-list">
                <li>SEO</li>
                <li>SMO</li>
                <li>Content Writing</li>
              </ul>
            </div>

            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price">₹4,799</h2>
              <p class="duration">4 Months</p>
            </div>
          </div>

        </div>

      </div>


      <!-- ================= GRAPHIC ================= -->
      <div id="graphic" class="category-content" style="display:none">
        <div class="category-inner">

          <!-- FULL COURSE BUTTON -->
          <div class="text-center mb-4">
            <div class="d-inline-flex gap-2 category-pill-wrap">
              <button class="cat-tab btn active">Full Course Package</button>
            </div>
          </div>

          <!-- COURSE CARD -->
          <div class="full-course-card mx-auto">
            <div class="full-course-left">
              <span class="badge">Complete Program</span>
              <h3>Graphic Designing</h3>
              <p class="sub-text">No Individual Courses</p>
              <ul class="full-feature-list">
                <li>UI/UX</li>
                <li>Figma</li>
                <li>Photoshop</li>
              </ul>
            </div>

            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price">₹2,495</h2>
              <p class="duration">5 Months</p>
            </div>
          </div>

        </div>

      </div>

      <!-- ================= TESTING ================= -->
      
        <div id="testing" class="category-content" style="display:none">
          <div class="category-inner">

            <!-- FULL COURSE BUTTON -->
            <div class="text-center mb-4">
              <div class="d-inline-flex gap-2 category-pill-wrap">
                <button class="cat-tab btn active">Full Course Package</button>
              </div>
            </div>

            <!-- COURSE CARD -->
            <div class="full-course-card mx-auto">
              <div class="full-course-left">
                <span class="badge">Complete Program</span>
                <h3>Software Testing</h3>
                <p class="sub-text">No Individual Courses</p>
                <ul class="full-feature-list">
                  <li>Manual Testing</li>
                  <li>Automation Testing</li>
                </ul>
              </div>

              <div class="full-course-right">
                <span class="best-value">BEST VALUE</span>
                <h2 class="price">₹3,099</h2>
                <p class="duration">4 Months</p>
              </div>
            </div>

          </div>

        </div>

      <!-- ================= NETWORKING ================= -->
      
      <div id="networking" class="category-content" style="display:none"> 
        <div class="category-inner">

          <!-- FULL COURSE BUTTON -->
          <div class="text-center mb-4">
            <div class="d-inline-flex gap-2 category-pill-wrap">
              <button class="cat-tab btn active">Full Course Package</button>
            </div>
          </div>

          <!-- COURSE CARD -->
          <div class="full-course-card mx-auto">
            <div class="full-course-left">
              <span class="badge">Complete Program</span>
              <h3>Networking</h3>
              <p class="sub-text">No Individual Courses</p>
              <ul class="full-feature-list">
                <li>Desktop Support</li>
                <li>Core Networking</li>
              </ul>
            </div>

            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price">₹1,497</h2>
              <p class="duration">2 Months</p>
            </div>
          </div>

        </div>

      </div>

      <!-- ================= INTERVIEW ================= -->
      <div id="interview" class="category-content" style="display:none">
        <div class="category-inner">

          <!-- FULL COURSE BUTTON -->
          <div class="text-center mb-4">
            <div class="d-inline-flex gap-2 category-pill-wrap">
              <button class="cat-tab btn active">Interview Package</button>
            </div>
          </div>

          <!-- COURSE CARD -->
          <div class="full-course-card mx-auto">
            <div class="full-course-left">
              <span class="badge">Most Popular</span>
              <h3>Interview & Internship Support</h3>
              <ul class="full-feature-list">
                <li>2 Interview Opportunities</li>
              </ul>
            </div>

            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price">₹499</h2>
            </div>
          </div>

        </div>
      </div>


      <!-- ================= FUNDING ================= -->
    
      <div id="funding" class="category-content" style="display:none">
        <div class="category-inner">

          <!-- FULL COURSE BUTTON -->
          <div class="text-center mb-4">
            <div class="d-inline-flex gap-2 category-pill-wrap">
              <button class="cat-tab btn active">Business Funding Package</button>
            </div>
          </div>

          <!-- COURSE CARD -->
          <div class="full-course-card mx-auto">
            <div class="full-course-left">
              <span class="badge">Coming Soon</span>
              <h3>Business Funding</h3>
              <ul class="full-feature-list">
                <li>2 Business Meetings</li>
              </ul>
            </div>
            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price">₹499</h2>
            </div>
          </div>

        </div>     
      </div>


  </div>
</section>

<!-- ================= PRICING SECTION END ================= -->


         <!-- Start  take-action Section-->

    <section class=" elf-section " id="take-action" style="background: #673ab7;">
      <div class="overlay-photo-image-bg  " data-bg-img="assets/images/hero/white-bg.jpg" data-bg-opacity=".25"> </div>
      <div class="cta-wrapper">
        <div class="container">
          <div class="sec-heading  centered mb-0 ">         
            <!-- <div class="content-area"><span class=" pre-title wow fadeInUp " data-wow-delay=".2s">contact us</span> -->
              <h4 class=" title    wow fadeInUp" data-wow-delay=".4s">Get in touch with us</h4>
              <p class="info-text   wow fadeInUp " data-wow-delay=".6s">Our team at MI Skills is here to guide you at every step—from learning to real-world success. <br>Connect with us today and take the next step toward your career goals.</p>
            </div>
          </div>

            <div class=" see-more-area wow fadeInUp" data-wow-delay="0.8s"><a class=" btn btn-dark cta-link" href="contact-us.php">contact us</a></div>

           
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

<!-- price script -->

<script>
function activateTab(el){
  document.querySelectorAll('.cat-tab').forEach(btn=>{
    btn.classList.remove('active');
  });
  el.classList.add('active');
}

function showCategory(name){
  document.querySelectorAll('.category-content')
    .forEach(sec => sec.style.display = 'none');

  document.getElementById(name).style.display = 'block';

  if(name === 'web'){
    toggleWeb('individual');
  }

  if(name === 'app'){
    toggleApp('individual');
  }
}

function toggleWeb(type){
  document.getElementById('web_full').style.display =
    type === 'full' ? 'block' : 'none';

  document.getElementById('web_individual').style.display =
    type === 'individual' ? 'block' : 'none';

  document.getElementById('btnIndividual').classList.remove('active');
  document.getElementById('btnFull').classList.remove('active');

  type === 'individual'
    ? document.getElementById('btnIndividual').classList.add('active')
    : document.getElementById('btnFull').classList.add('active');
}

function toggleApp(type){
  document.getElementById('app_individual').style.display =
    type === 'individual' ? 'block' : 'none';

  document.getElementById('app_full').style.display =
    type === 'full' ? 'block' : 'none';

  document.getElementById('btnAppIndividual').classList.remove('active');
  document.getElementById('btnAppFull').classList.remove('active');

  type === 'individual'
    ? document.getElementById('btnAppIndividual').classList.add('active')
    : document.getElementById('btnAppFull').classList.add('active');
}
</script>



  </body>

</html>