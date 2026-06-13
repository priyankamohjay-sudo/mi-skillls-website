<?php
$title = "Data Science and Analytics with Gen AI | MI Skills";
$description = "Master data science, data analytics, and Generative AI. Learn to analyze data, build models, and extract actionable insights for real-world business decisions.";
$tags = "data science, data analytics, generative AI, machine learning, data analysis";
$activeCourse = 'data-science-and-analytics-with-gen-ai';
require_once __DIR__ . '/../../includes/header.php';
?>

<section class="page-hero inner-page-hero d-flex align-items-center" id="page-hero">
  <div class="hero-bg" style="background-image: url('<?=BASE_URL?>assets/images/hero/inner-banner.jpg');"></div>
  <div class="hero-overlay"></div>
  <div class="container position-relative">
    <div class="hero-text-area centerd">
      <h1 class="hero-title wow fadeInUp" data-wow-delay=".2s">Data Science and Analytics with Gen AI</h1>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
          <li class="breadcrumb-item"><a class="breadcrumb-link" href="<?= BASE_URL ?>"><i class="bi bi-house icon"></i> Home</a></li>
          <li class="breadcrumb-item active">Data Science and Analytics with Gen AI</li>
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
            <img class="feat-img img-fluid" src="<?=BASE_URL?>assets/images/services/data-science-1.webp" alt="Data Science and Analytics">
          </div>
          <div class="service-content">
            <div class="part">
              <h2 class="service-title">Data Science and Analytics with Gen AI</h2>
              <h3 class="service-title">Course Overview</h3>
              <p class="info-text">This course combines Data Science, Data Analytics, and Generative AI into one comprehensive program. Learners will collect, clean, analyze, and visualize data while applying machine learning and AI models to generate intelligent insights.</p>
              <p class="info-text">Designed for beginners and upskilling professionals, the program includes hands-on projects with real-world datasets, business intelligence tools, and Generative AI workflows for smarter decision-making.</p>
            </div>
            <div class="part">
              <div class="two-cols-img">
                <div class="row">
                  <div class="col-12 col-md-6 mb-3">
                    <div class="img-col"><img class="img-fluid" src="<?=BASE_URL?>assets/images/services/data-science-2.webp" loading="lazy" alt="Data science"></div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="img-col"><img class="img-fluid" src="<?=BASE_URL?>assets/images/services/data-analytics-2.webp" loading="lazy" alt="Data analytics"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="part pb-5">
              <h3 class="service-title">What You'll Learn in This Course</h3>
              <ul>
                <li>Data science and analytics fundamentals with Generative AI</li>
                <li>Data collection, cleaning, preprocessing, and visualization</li>
                <li>Statistical analysis and machine learning algorithms</li>
                <li>SQL, Python, and business intelligence tools</li>
                <li>Large Language Models (LLMs) and prompt engineering</li>
                <li>Building data-driven and AI-powered applications</li>
              </ul>
            </div>
            <div class="part pb-5">
              <h3 class="service-title">Topics Included in This Course</h3>
              <div class="table-responsive">
                <table class="custom-table">
                  <tbody>
                    <tr><td><strong>Data Science Fundamentals</strong><br>Core concepts of data handling, analysis, and model building for intelligent solutions.</td></tr>
                    <tr><td><strong>Data Analytics & Visualization</strong><br>SQL querying, dashboards, reporting, and insight generation using BI tools.</td></tr>
                    <tr><td><strong>Machine Learning</strong><br>Supervised and unsupervised learning, model evaluation, and optimization.</td></tr>
                    <tr><td><strong>Generative AI & LLMs</strong><br>Apply Gen AI models and prompt engineering to enhance data workflows.</td></tr>
                    <tr><td><strong>Real-World Projects</strong><br>Work on industry datasets to build a strong data science portfolio.</td></tr>
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
        <h4 class="title wow fadeInUp" data-wow-delay=".4s">Build Your Data Career with Gen AI</h4>
        <p class="info-text wow fadeInUp" data-wow-delay=".6s">Enroll in our combined Data Science and Analytics program and gain the skills employers need in today's AI-driven world.</p>
      </div>
    </div>
    <div class="see-more-area wow fadeInUp" data-wow-delay="0.8s">
      <a class="btn btn-dark cta-link" href="<?= BASE_URL ?>subscription">View Plans</a>
      <a class="btn btn-dark cta-link ms-2" href="<?= BASE_URL ?>contact-us">Contact Us</a>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
