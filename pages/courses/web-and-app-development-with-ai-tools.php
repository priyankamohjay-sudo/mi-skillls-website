<?php
$title = "Web and App Development with AI Tools | MI Skills";
$description = "Learn full-stack web and mobile app development with AI-powered tools. Build responsive websites and Android, iOS, and cross-platform applications.";
$tags = "web development, app development, full stack, mobile development, AI tools";
$activeCourse = 'web-and-app-development-with-ai-tools';
require_once __DIR__ . '/../../includes/header.php';
?>

<section class="page-hero inner-page-hero d-flex align-items-center" id="page-hero">
  <div class="hero-bg" style="background-image: url('<?=BASE_URL?>assets/images/hero/inner-banner.jpg');"></div>
  <div class="hero-overlay"></div>
  <div class="container position-relative">
    <div class="hero-text-area centerd">
      <h1 class="hero-title wow fadeInUp" data-wow-delay=".2s">Web and App Development with AI Tools</h1>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= BASE_URL ?>"><i class="bi bi-house icon"></i> Home</a></li>
          <li class="breadcrumb-item active">Web and App Development with AI Tools</li>
        </ul>
      </nav>
    </div>
  </div>
</section>

<div class="service-single">
  <div class="container">
    <div class="row">
      <div class="col-12 col-xl-8">
        <div class="service-content-area">
          <div class="featured-img-area part">
            <img class="feat-img img-fluid" src="<?=BASE_URL?>assets/images/services/programming-background-collage.jpg" alt="Web and App Development">
          </div>
          <div class="service-content">
            <div class="part">
              <h2 class="service-title">Web and App Development with AI Tools</h2>
              <h3 class="service-title">Course Overview</h3>
              <p class="info-text">This course combines modern web development and mobile app development with AI-powered tools. Learners will build full-stack web applications and Android, iOS, and cross-platform mobile apps using efficient, industry-relevant workflows.</p>
              <p class="info-text">Designed for beginners and aspiring developers, the program covers frontend, backend, mobile UI/UX, deployment, and real-world projects to help students become job-ready full-stack developers.</p>
            </div>
            <div class="part">
              <div class="two-cols-img">
                <div class="row">
                  <div class="col-12 col-md-6 mb-3">
                    <div class="img-col"><img class="img-fluid" src="<?=BASE_URL?>assets/images/services/website-1.jpg" loading="lazy" alt="Web development"></div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="img-col"><img class="img-fluid" src="<?=BASE_URL?>assets/images/services/app-1.jpg" loading="lazy" alt="App development"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="part pb-5">
              <h3 class="service-title">What You'll Learn in This Course</h3>
              <ul>
                <li>Full-stack web development (frontend & backend)</li>
                <li>Android, iOS, and cross-platform mobile app development</li>
                <li>Using AI tools to accelerate coding and design</li>
                <li>Building responsive websites and mobile applications</li>
                <li>Working with databases, APIs, and server-side logic</li>
                <li>App testing, debugging, and deployment</li>
              </ul>
            </div>
            <div class="part pb-5">
              <h3 class="service-title">Topics Included in This Course</h3>
              <div class="table-responsive">
                <table class="custom-table">
                  <tbody>
                    <tr><td><strong>Web Development Fundamentals</strong><br>HTML, CSS, JavaScript, responsive UI, and modern frontend frameworks.</td></tr>
                    <tr><td><strong>Backend Development</strong><br>Server-side logic, databases, APIs, and authentication for dynamic web apps.</td></tr>
                    <tr><td><strong>Android & iOS Development</strong><br>Build native mobile applications with industry-standard tools and frameworks.</td></tr>
                    <tr><td><strong>Cross-Platform Development</strong><br>Create apps for multiple platforms using Flutter and React Native.</td></tr>
                    <tr><td><strong>AI Tools for Development</strong><br>Leverage AI assistants to speed up coding, debugging, and project delivery.</td></tr>
                    <tr><td><strong>Real-World Projects</strong><br>Hands-on web and mobile projects to build a strong developer portfolio.</td></tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-xl-4">
        <div class="service-sidebar">
          <div class="sidebar-pane">
            <h2 class="sidebar-title">list of Courses</h2>
            <?php require_once __DIR__ . '/../../includes/courses-sidebar.php'; ?>
          </div>
          <div class="sidebar-pane">
            <div class="download-area">
              <h2 class="sidebar-title">Course Resources</h2>
              <p class="sidebar-text">Access all essential learning materials, guides, and documents related to your course.</p>
              <ul class="list">
                <li class="list-item"><i class="flaticon-downloading font-icon"></i><a href="<?= BASE_URL ?>courses">All Courses<i class="bi bi-arrow-right icon "></i></a></li>
                <li class="list-item"><i class="flaticon-downloading font-icon"></i><a href="<?= BASE_URL ?>subscription">View Pricing<i class="bi bi-arrow-right icon "></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="elf-section" id="take-action" style="background: #673ab7;">
  <div class="overlay-photo-image-bg" data-bg-img="<?=BASE_URL?>assets/images/hero/white-bg.jpg" data-bg-opacity=".25"></div>
  <div class="cta-wrapper">
    <div class="container">
      <div class="sec-heading centered mb-0">
        <h4 class="title wow fadeInUp" data-wow-delay=".4s">Start Building Web & Mobile Applications</h4>
        <p class="info-text wow fadeInUp" data-wow-delay=".6s">Enroll in our combined Web and App Development program and gain practical skills for today's full-stack developer roles.</p>
      </div>
    </div>
    <div class="see-more-area wow fadeInUp" data-wow-delay="0.8s">
      <a class="btn btn-dark cta-link" href="<?= BASE_URL ?>subscription">View Plans</a>
      <a class="btn btn-dark cta-link ms-2" href="<?= BASE_URL ?>contact-us">Contact Us</a>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
