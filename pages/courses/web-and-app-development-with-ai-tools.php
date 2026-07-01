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
            <!-- What You'll Learn — hydrated by course-detail.js -->
            <div class="part pb-5" data-course-learn>
              <h3 class="service-title">What You'll Learn in This Course</h3>
              <ul></ul>
            </div>

            <!-- Course Syllabus — hydrated by course-detail.js -->
            <div class="part pb-5" data-course-syllabus>
              <h3 class="service-title">Topics Included in This Course</h3>
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
              <h2 class="sidebar-title">Course Enrollment</h2>
              <p class="sidebar-text">Start your AI & Applied Machine Learning journey with live classes, hands-on projects, expert mentorship, internship opportunities, and career support. Subscribe now to unlock complete course access and begin learning today.</p>
              <ul class="list">

                <li class="list-item"><i class="fas fa-graduation-cap font-icon"></i><a href="<?= BASE_URL ?>subscription">
                    Enroll Now<i class="bi bi-arrow-right icon "></i></a></li>
              </ul>
            </div>
          </div>
          <div class="sidebar-pane">
            <div class="download-area">
              <h2 class="sidebar-title">Course Resources</h2>
              <p class="sidebar-text">Access all essential learning materials, guides, and documents related to your
                course. Download resources anytime to support your learning and practice.</p>
              <ul class="list">
 
                <li class="list-item"><i class="flaticon-downloading font-icon"></i><a href="<?= BASE_URL ?>courses" data-course-doc-link target="_blank">
                    Course Syllabus<i class="bi bi-arrow-right icon "></i></a></li>
              </ul>
            </div>
          </div>
             <div class="sidebar-pane">
            <div class="social-area">
              <h2 class="sidebar-title">follow us</h2>
              <div class="sc-wrapper dir-row sc-size-40">
                <ul class="sc-list">
                  <li class="sc-item " title="Facebook"><a class="sc-link" target="_blank"
                      href="https://www.facebook.com/people/Miskillsofficial/61587243383829/?mibextid=wwXIfr&rdid=OYWqwYRmFVKFqtL8&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F16gAjpmgT9%2F%3Fmibextid%3DwwXIfr"
                      title="social media icon"><i class="fab fa-facebook-f sc-icon"></i></a></li>
                  <li class="sc-item " title="youtube"><a class="sc-link" target="_blank"
                      href="https://www.youtube.com/channel/UC0GbfPzvJazzHnPGJeOAgag" title="social media icon"><i
                        class="fab fa-youtube sc-icon"></i></a></li>
                  <li class="sc-item " title="instagram"><a class="sc-link" target="_blank"
                      href="https://www.instagram.com/miskills.india/?igsh=MWc4ZmZmYjkwMjhtcA%3D%3D&utm_source=qr#"
                      title="social media icon"><i class="fab fa-instagram sc-icon"></i></a></li>
                  <!-- <li class="sc-item " title="X"><a class="sc-link" href="#0" title="social media icon"><i class="fab fa-x-twitter sc-icon"></i></a></li> -->
                </ul>
              </div>
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

<script>window.COURSE_PAGE_SLUG = 'web-and-app-development-with-ai-tools';</script>
<script src="<?= BASE_URL ?>assets/js/course-detail.js"></script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
