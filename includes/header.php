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
</head>

<body class=" dark-theme "></body>
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
        <!-- <ul class="list-js links-list">
          <li class="menu-item"><a class="menu-link" href="<?= BASE_URL ?>">Home</a></li>
          <li class="menu-item"><a class="menu-link" href="<?= BASE_URL ?>about-us">About Us </a></li>
          <li class="menu-item has-sub-menu">

            <a class="menu-link" href="courses.php">
              Courses
              <span class="plus-icon">
                <i class="fas fa-plus"></i>
              </span>
            </a>

            <ul class="sub-menu">
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="web-development.php">Web Development</a>
              </li>
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="app-development.php">App Development</a>
              </li>
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="digital-marketing.php">Digital Marketing</a>
              </li>
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="graphic-designing.php">Graphic Designing</a>
              </li>
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="testing.php">Testing</a>
              </li>
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="networking.php">Networking</a>
              </li>
            </ul>

          </li>
          <li class="menu-item"><a class="menu-link " href="subscription.php">Subscription</a></li>
          <li class="menu-item"><a class="menu-link " href="contact-us.php">contact Us</a></li>
        </ul> -->

        <ul class="list-js links-list">
          <li class="menu-item">
            <a class="menu-link" href="<?= BASE_URL ?>">Home</a>
          </li>

          <li class="menu-item">
            <a class="menu-link" href="<?= BASE_URL ?>about-us">About Us</a>
          </li>

          <li class="menu-item has-sub-menu">
            <a class="menu-link" href="javascript:void(0)">
              Courses
              <span class="plus-icon">
                <i class="fas fa-plus"></i>
              </span>
            </a>

            <ul class="sub-menu">
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="<?= BASE_URL ?>course/web-development">
                  Web Development
                </a>
              </li>
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="<?= BASE_URL ?>course/app-development">
                  App Development
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
                <a class="menu-link sub-menu-link" href="<?= BASE_URL ?>course/testing">
                  Testing
                </a>
              </li>
              <li class="menu-item sub-menu-item">
                <a class="menu-link sub-menu-link" href="<?= BASE_URL ?>course/networking">
                  Networking
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