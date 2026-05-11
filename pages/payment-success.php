<?php
$title = "Payment Successful - MI Skills";
require_once __DIR__ . '/../includes/header.php';

// Get params from URL (sent by backend redirect)
$payment_id = $_GET['payment_id'] ?? 'N/A';
$amount = $_GET['amount'] ?? 'N/A';
$course_name = $_GET['course'] ?? 'Course Subscription'; 
$duration = $_GET['duration'] ?? 'Standard Duration';     
?>

<section class="page-hero inner-page-hero d-flex align-items-center" style="height: auto !important; min-height: 100vh; background-color: #080808; padding: 200px 0 100px !important;">
  <div class="container">
    <div class="success-card text-center wow fadeInUp" data-wow-delay=".2s">
      
      <div class="success-icon-wrap">
        <i class="bi bi-check-lg"></i>
      </div>

      <h2 class="fw-bold text-white mb-3">Thank You for Your Purchase!</h2>
      <p class="text-white-50 mb-4 px-md-5">Your enrollment is confirmed. <strong>You can now login to our mobile app using your phone number to access your courses.</strong></p>
      
      <div class="order-summary text-start mt-5">
        <h5 class="text-white fw-bold mb-3 border-bottom pb-2" style="font-size: 1.1rem;">Order Details</h5>
        
        <div class="order-detail-row">
          <span class="order-detail-label">Course Name</span>
          <span class="order-detail-value"><?= htmlspecialchars($course_name) ?></span>
        </div>

        <div class="order-detail-row">
          <span class="order-detail-label">Plan / Duration</span>
          <span class="order-detail-value"><?= htmlspecialchars($duration) ?></span>
        </div>

        <div class="order-detail-row">
          <span class="order-detail-label">Payment ID</span>
          <span class="order-detail-value text-break" style="max-width: 250px;"><?= htmlspecialchars($payment_id) ?></span>
        </div>

        <div class="order-detail-row">
          <span class="order-detail-label">Amount Paid</span>
          <span class="order-detail-value text-success" style="font-size: 1.2rem;">₹<?= htmlspecialchars($amount) ?></span>
        </div>
      </div>

      <div class="d-flex flex-wrap gap-3 justify-content-center mt-5">
        <a href="<?= BASE_URL ?>" class="btn btn-outline-light px-4 py-2">Back to Home</a>
        <a href="#" class="btn btn-auth-gradient px-4 py-2 fw-bold">
          <i class="bi bi-download me-2"></i>Download App
        </a>
      </div>

      <div class="mt-4 pt-3 border-top border-secondary">
        <p class="small text-white-50 mb-0">A confirmation email has been sent to your registered address.</p>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
