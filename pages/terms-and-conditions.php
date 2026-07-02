<!--Start Page Header-->
<?php
$title = "Mi Skills | Terms and Conditions";
$description = "";
$tags = "";
require_once __DIR__ . '/../includes/header.php'; ?>
<!--End Page Header-->

<!-- Start inner Page hero-->
<section class="page-hero inner-page-hero d-flex align-items-center" id="page-hero">

  <!-- Background Image -->
  <div class="hero-bg" style="background-image: url('<?=BASE_URL?>assets/images/hero/inner-banner.jpg');">
  </div>

  <!-- Black Overlay -->
  <div class="hero-overlay"></div>

  <div class="container position-relative">
    <div class="hero-text-area centerd">
      <h1 class="hero-title wow fadeInUp" data-wow-delay=".2s">
        Terms & Conditions
      </h1>

      <nav aria-label="breadcrumb">
        <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
          <li class="breadcrumb-item">
            <a class="breadcrumb-link" href="/">
              <i class="bi bi-house icon"></i> Home
            </a>
          </li>
          <li class="breadcrumb-item active">Terms & Conditions</li>
        </ul>
      </nav>
    </div>
  </div>

</section>
<!-- End inner Page hero-->


<div class="blog blog-post ">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-10 mx-auto">
        <!--post heading area-->

        <h2 class="post-title">Terms &amp; Conditions</h2>
        <div class="post-img-wrapper post-featured-area"></div>
      </div>

      <div class="col-12 col-lg-9 mx-auto">
        <div class="post-main-area">
          <div class="post-content" id="policy-content-area">
            <div class="skeleton-line" style="height: 24px; width: 30%; background: rgba(255,255,255,.1); border-radius: 4px; margin-bottom: 25px;"></div>
            <div class="skeleton-line" style="height: 16px; width: 100%; background: rgba(255,255,255,.07); border-radius: 4px; margin-bottom: 12px;"></div>
            <div class="skeleton-line" style="height: 16px; width: 95%; background: rgba(255,255,255,.07); border-radius: 4px; margin-bottom: 12px;"></div>
            <div class="skeleton-line" style="height: 16px; width: 90%; background: rgba(255,255,255,.07); border-radius: 4px; margin-bottom: 12px;"></div>
            <br>
            <div class="skeleton-line" style="height: 24px; width: 45%; background: rgba(255,255,255,.1); border-radius: 4px; margin-bottom: 25px;"></div>
            <div class="skeleton-line" style="height: 16px; width: 100%; background: rgba(255,255,255,.07); border-radius: 4px; margin-bottom: 12px;"></div>
            <div class="skeleton-line" style="height: 16px; width: 85%; background: rgba(255,255,255,.07); border-radius: 4px; margin-bottom: 12px;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End _post -->

<script>window.POLICY_TYPE = 'terms';</script>
<script src="<?= BASE_URL ?>assets/js/policy-loader.js?v=<?= time() ?>"></script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>