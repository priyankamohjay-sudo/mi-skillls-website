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
        <title> Mi Skills | Contact Us</title>
  </head>
  <body class=" dark-theme ">
  
  <?php include 'header.php'; ?>

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
        Contact Us
      </h1>

      <nav aria-label="breadcrumb">
        <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
          <li class="breadcrumb-item">
            <a class="breadcrumb-link" href="index.php">
              <i class="bi bi-house icon"></i> Home
            </a>
          </li>
          <li class="breadcrumb-item active">Contact Us</li>
        </ul>
      </nav>
    </div>
  </div>

</section>
<!-- End inner Page hero-->

  
    <!-- Start contact-us -->
    <section class="contact-us  mega-section  pb-0" id="contact-us">
      <div class="container">
        <section class="locations-section  mega-section ">
          <div class="sec-heading centered  ">
            <div class="content-area">
              <h2 class=" title    wow fadeInUp" data-wow-delay=".4s">our Contact Information</h2>
            </div>
          </div>
          <div class=" contact-info-panel ">
            <div class="info-section ">
              <div class="row">
                <div class="col-12 col-lg-4">     
                  <div class="info-panel  wow fadeInUp" data-wow-delay=".4s ">
                    <h4 class="location-title">Office Address</h4>
                    <div class="line-on-side "> </div>
                    <!-- <p class="location-address">United States, 307 Wilshire, 2nd av. new york 3516.</p> -->
                    <div class="location-card  "><i class="flaticon-map icon"></i>
                      <div class="card-content">
                        <h6 class="content-title">Location:</h6><a class="email link" href="mailto:yourname@example.com">Hyderabad, Telangana - 500084</a>
                      </div>
                    </div>
                    
                  </div>
                </div>
                <div class="col-12 col-lg-4">           
                  <div class="info-panel  wow fadeInUp" data-wow-delay=".6s">
                    <h4 class="location-title">Email Us</h4>
                    <div class="line-on-side "> </div>
                    
                    <div class="location-card  "><i class="flaticon-email icon"></i>
                      <div class="card-content">
                        <h6 class="content-title">email:</h6><a class="email link" href="mailto:contact@miskills.in">contact@miskills.in</a>
                      </div>
                    </div>
                    
                  </div>
                </div>
                <div class="col-12 col-lg-4">
                  <div class="info-panel  wow fadeInUp" data-wow-delay=".8s">
                    <h4 class="location-title">Call Us</h4>
                    <div class="line-on-side "> </div>
                   
                   
                    <div class="location-card  "><i class="flaticon-phone-call icon"></i>
                      <div class="card-content">
                        <h6 class="content-title">phone:</h6><a class="tel link" href="tel:0123456789">+459876543210</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      
        <section class="contact-us-form-section  mega-section  ">
          <div class="row">
            <div class="col-12 ">
              <div class="contact-form-panel">
                <div class="sec-heading centered    ">
                  <div class="content-area">
                    <h2 class=" title    wow fadeInUp" data-wow-delay=".4s">Have any questions? Let's answer them</h2>
                  </div>
                </div>
                <div class="contact-form-inputs wow fadeInUp" data-wow-delay=".6s">
                  <div class="custom-form-area input-boxed"> 
                    <!--Form To have user messages-->
                    <form class="main-form" id="contact-us-form" action="https://amincode.com/tm-html/flex-it/php/send-mail.php" method="post"><span class="done-msg"></span>
                      <div class="row ">
                        <div class="col-12 col-lg-6">
                          <div class="   input-wrapper">
                            <input class="text-input" id="user-name" name="UserName" type="text"/>
                            <label class="input-label" for="user-name"> Name <span class="req">*</span></label><span class="b-border"></span><span class="error-msg"></span>
                          </div>
                        </div>
                        <div class="col-12 col-lg-6">
                          <div class="   input-wrapper">
                            <input class="text-input" id="user-email" name="UserEmail" type="email"/>
                            <label class="input-label" for="user-email"> E-mail <span class="req">*</span></label><span class="b-border"></span><span class="error-msg"></span>
                          </div>
                        </div>
                        <div class="col-12 ">
                          <div class="   input-wrapper">
                            <input class="text-input" id="msg-subject" name="subject" type="text"/>
                            <label class="input-label" for="msg-subject"> Subject <span class="req">*</span></label><span class="b-border"></span><span class="error-msg"></span>
                          </div>
                        </div>
                        <div class="col-12 ">
                          <div class="   input-wrapper">
                            <textarea class=" text-input" id="msg-text" name="message"></textarea>
                            <label class="input-label" for="msg-text"> your message <span class="req">*</span></label><span class="b-border"></span><i></i><span class="error-msg"></span>
                          </div>
                        </div>
                        <div class="col-12 submit-wrapper">
                          <button class=" btn-solid" id="submit-btn" type="submit" name="UserSubmit">Send your message</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </section>

    
    <!-- End contact-us -->

      <section class="map-section  elf-section">
          <div class="sec-heading  centered   ">
            <div class="content-area">
              <h2 class=" title    wow fadeInUp" data-wow-delay=".4s">find us on google maps</h2>
            </div>
          </div>
          <div class="map-box  wow fadeInUp" data-wow-delay=".6s">
            <div class="mapouter">
              <div class="gmap_canvas">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30446.537490728235!2d78.33889730229812!3d17.46846193966115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb924bb2c9404d%3A0xd912a69bea5b0656!2sHyderabad%2C%20Telangana%20500084!5e0!3m2!1sen!2sin!4v1767345306190!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>              </div>
            </div>
          </div>
        </section>
   
<?php include 'footer.php'; ?>

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
        
        <!--     main     -->
        <script src="js/main.js"></script>
  </body>

</html>