<?php
require_once 'config.php';
$success = '';
$error = '';

if (isset($_POST['UserSubmit'])) {

  $name = trim($_POST['UserName']);
  $email = trim($_POST['UserEmail']);
  $subject = trim($_POST['subject']);
  $message = trim($_POST['message']);

  $to = "contact@miskills.in";
  $mail_subject = "New Contact Form Message";

  $body = "Name: $name\n";
  $body .= "Email: $email\n";
  $body .= "Subject: $subject\n\n";
  $body .= "Message:\n$message";

  $headers = "From: $email";

  if (mail($to, $mail_subject, $body, $headers)) {
    $success = "Thank you! Your message has been sent successfully.";
  } else {
    $error = "Something went wrong. Please try again.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= $description ?? '' ?>">
  <meta name="keywords" content="<?= $tags ?? '' ?>">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- fav icon -->
  <link rel="icon" href="<?= BASE_URL ?>assets/images/fav-icon/logo-new.png">

  <!-- bootstarp -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/vendors/bootstrap.min.css">

  <!-- animate.css file -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/vendors/animate.css">

  <!-- Fancybox -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/vendors/jquery.fancybox.min.css">

  <!-- Swiper -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/vendors/swiper-bundle.min.css">

  <!-- flaticon -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/vendors/flaticon/flaticon.css">

  <!-- fontAwesome -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/vendors/all.min.css">

  <!-- bootstrap icons -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/vendors/bootstrap-icons-1.9.1/bootstrap-icons.css">

  <!-- Font Family -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&amp;display=swap">

  <!-- main-LTR -->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main-LTR.css">
  <title><?= $title ?? 'MISKILLS' ?></title>
  <script>
    const BASE_URL = '<?= BASE_URL ?>';
  </script>
  <style>
    .header-basic .links-list > .menu-item > .menu-link {
      padding: 10px 18px; /* Reduced from 30px to fit more items */
    }
    .header-basic .menu-item {
      padding: 0 4px; /* Reduced from 1rem to prevent wrapping */
    }
    .user-avatar-link {
      display: flex !important;
      align-items: center;
      padding: 10px 18px !important; /* Match other menu links */
      border-radius: 30px !important;
      border: 1.5px solid transparent !important;
      transition: all 0.3s ease !important;
      background:
        linear-gradient(#05062d, #05062d) padding-box,
        linear-gradient(144deg, #af40ff, #5b42f3 50%, #00ddeb) border-box !important;
    }
    .user-avatar-link:hover {
      box-shadow: 0 0 15px rgba(103, 58, 183, 0.4);
      transform: translateY(-2px);
    }

    /* Theme Consistent Preference Selection */
    .pref-group {
      display: flex;
      gap: 10px;
    }
    .pref-label {
      flex: 1;
      text-align: center;
      padding: 8px 15px;
      border-radius: 30px;
      border: 1.5px solid rgba(103, 58, 183, 0.4);
      color: rgba(255, 255, 255, 0.6);
      cursor: pointer;
      transition: all 0.3s ease;
      font-size: 0.85rem;
      font-weight: 600;
      background: rgba(103, 58, 183, 0.05);
    }
    .btn-check:checked + .pref-label {
      background: linear-gradient(144deg, #af40ff, #5b42f3 50%, #00ddeb);
      border-color: transparent;
      color: #fff;
      box-shadow: 0 4px 15px rgba(103, 58, 183, 0.3);
    }
    .pref-label:hover {
      border-color: #af40ff;
      color: #fff;
    }
    .user-avatar-circle {
      width: 26px;
      height: 26px;
      background: linear-gradient(135deg, #673ab7 0%, #9c27b0 100%);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 0.9rem;
      border: 1px solid rgba(255, 255, 255, 0.2);
      transition: all 0.3s ease;
    }
    .user-profile-dropdown:hover .user-avatar-circle {
      transform: scale(1.05);
      border-color: rgba(255, 255, 255, 0.3);
      box-shadow: 0 0 15px rgba(103, 58, 183, 0.4);
    }
    .user-profile-dropdown .sub-menu {
      min-width: 150px !important;
      right: 0;
      left: auto !important;
    }
    @media (max-width: 1199px) {
      .header-basic .menu-item {
        padding: 0;
        width: 100%;
      }
      .header-basic .links-list > .menu-item > .menu-link {
        padding: 0.75rem 1rem;
      }
    }
    @media (max-width: 991px) {
      .user-avatar-circle {
        width: 30px;
        height: 30px;
        font-size: 1rem;
      }
      .user-profile-dropdown .sub-menu {
        position: relative !important;
        width: 100% !important;
        background: transparent !important;
        box-shadow: none !important;
        padding-left: 20px !important;
      }
    }
  </style>
</head>

<body class=" dark-theme ">
<!--Start Page Header-->
<header class=" page-header content-always-light header-basic" id="page-header">
  <div class="header-search-box">
    <div class="close-search"></div>
    <form class="nav-search search-form" role="search" method="get" action="#">
      <div class="search-wrapper">
        <label class="search-lbl">Search for:</label>
        <input class="search-input" type="search" placeholder="Search..." name="searchInput" autofocus="autofocus" />
        <button class="search-btn" type="submit"><i class="bi bi-search icon"></i></button>
      </div>
    </form>
  </div>
  <div class="container">
    <nav class="menu-navbar">
      <div class="header-logo"><a class="logo-link" href="<?= BASE_URL ?>"><img class="logo-img light-logo"
            loading="lazy" src="<?= BASE_URL ?>assets/images/logo/logo-white-new.png" alt="logo" /><img class="logo-img  dark-logo"
            loading="lazy" src="<?= BASE_URL ?>assets/images/logo/logo-dark.png" alt="logo" /></a></div>
      <div class="links menu-wrapper ">
        <ul class="list-js links-list">
          <li class="menu-item">
            <a class="menu-link" href="<?= BASE_URL ?>">Home</a>
          </li>

          <li class="menu-item">
            <a class="menu-link" href="<?= BASE_URL ?>about-us">About Us</a>
          </li>

          <li class="menu-item has-sub-menu">
            <a class="menu-link" href="<?= BASE_URL ?>courses">
              Courses
              <span class="plus-icon">
                <i class="fas fa-plus"></i>
              </span>
            </a>

            <ul class="sub-menu">
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="<?= BASE_URL ?>course/artificial-intelligence-and-applied-machine-learning">
                  AI & Applied Machine Learning
                </a>
              </li>
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="<?= BASE_URL ?>course/cloud-computing-and-devops">
                  Cloud Computing & DevOps
                </a>
              </li>
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="<?= BASE_URL ?>course/digital-marketing">
                  Digital Marketing
                </a>
              </li>
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="<?= BASE_URL ?>course/graphic-designing">
                  Graphic Designing
                </a>
              </li>
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="<?= BASE_URL ?>course/data-science-with-gen-ai">
                  Data Science with Gen AI
                </a>
              </li>
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="<?= BASE_URL ?>course/data-analytics-with-gen-ai">
                  Data Analytics with Gen AI
                </a>
              </li>
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="<?= BASE_URL ?>course/cybersecurity-ai-and-cloud-security">
                  Cybersecurity - AI & Cloud Security
                </a>
              </li>
               <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="<?= BASE_URL ?>course/app-development-with-ai-tools">
                  App Development with AI Tools
                </a>
              </li>
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="<?= BASE_URL ?>course/web-development-with-ai-tools">
                  Web Development with AI Tools
                </a>
              </li>
            </ul>
          </li>

          <li class="menu-item">
            <a class="menu-link" href="<?= BASE_URL ?>subscription">Subscription</a>
          </li>

          <li class="menu-item">
            <a class="menu-link" href="<?= BASE_URL ?>contact-us">Contact Us</a>
          </li>

          <!-- Consolidated Auth Dropdown -->
          <li class="menu-item has-sub-menu user-profile-dropdown">
            <a class="menu-link user-avatar-link" href="javascript:void(0)" id="auth-main-btn">
              <!-- Content dynamically changed by JS -->
            </a>
            <ul class="sub-menu" id="auth-dropdown-menu">
              <!-- Content dynamically changed by JS -->
            </ul>
          </li>
          </ul>
          </div>

      <div class="controls-box">
        <!--Menu Toggler button-->
        <div class="control  menu-toggler"><span></span><span></span><span></span></div>
        <!--download app button-->
        <!-- <div class="cta-links-area"><a class="btn-solid cta-link cta-link-primary" href="#take-action">Download App</a></div> -->
      </div>
    </nav>
  </div>
</header>
<!--End Page Header-->