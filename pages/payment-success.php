<?php
$title = "Payment Successful - MI Skills";
require_once __DIR__ . '/../includes/header.php';

$payment_id = $_GET['payment_id'] ?? 'N/A';
$amount = $_GET['amount'] ?? 'N/A';
?>

<section class="page-hero inner-page-hero d-flex align-items-center" id="page-hero">
  <div class="hero-bg" style="background-image: url('<?=BASE_URL?>assets/images/hero/inner-banner.jpg');"></div>
  <div class="hero-overlay"></div>
  <div class="container position-relative">
    <div class="hero-text-area centerd">
      <h1 class="hero-title wow fadeInUp" data-wow-delay=".2s">Payment Successful</h1>
    </div>
  </div>
</section>

<section class="success-section mega-section">
  <div class="container text-center">
    <div class="success-card p-5 ui-style-card mx-auto" style="max-width: 600px;">
      <div class="success-icon mb-4">
        <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
      </div>
      <h2 class="mb-3">Thank You for Your Purchase!</h2>
      <p class="mb-4">Your subscription has been successfully activated. You can now access your courses from your dashboard.</p>
      
      <div class="order-details text-start bg-dark p-4 rounded mb-4">
        <h5 class="mb-3 border-bottom pb-2">Order Details</h5>
        <div class="d-flex justify-content-between mb-2">
          <span>Payment ID:</span>
          <span class="fw-bold"><?= htmlspecialchars($payment_id) ?></span>
        </div>
        <div class="d-flex justify-content-between">
          <span>Amount Paid:</span>
          <span class="fw-bold">₹<?= htmlspecialchars($amount) ?></span>
        </div>
      </div>

      <a href="<?= BASE_URL ?>" class="btn btn-primary">Go to Home</a>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
