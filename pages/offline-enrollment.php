<?php
$title = "Offline Enrollment | MI Skills";
$description = "Select your preferred offline learning centre, choose a batch, and complete your enrollment with MI Skills.";
$tags = "offline enrollment, MI Skills centres, Dehradun, Hyderabad, Bengaluru, Ludhiana";
require_once __DIR__ . '/../includes/header.php';

$courseSlug = htmlspecialchars($_GET['course'] ?? '', ENT_QUOTES, 'UTF-8');
$subscriptionMode = htmlspecialchars($_GET['mode'] ?? 'TOTAL', ENT_QUOTES, 'UTF-8');
$currentStep = htmlspecialchars($_GET['step'] ?? 'location', ENT_QUOTES, 'UTF-8');
?>

<!-- Start inner Page hero-->
<section class="page-hero inner-page-hero d-flex align-items-center" id="page-hero">
  <div class="hero-bg" style="background-image: url('<?= BASE_URL ?>assets/images/hero/inner-banner.jpg');"></div>
  <div class="hero-overlay"></div>
  <div class="container position-relative">
    <div class="hero-text-area centerd">
      <h1 class="hero-title wow fadeInUp" data-wow-delay=".2s">Offline Enrollment</h1>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
          <li class="breadcrumb-item">
            <a class="breadcrumb-link" href="<?= BASE_URL ?>">
              <i class="bi bi-house icon"></i> Home
            </a>
          </li>
          <li class="breadcrumb-item">
            <a class="breadcrumb-link" href="<?= BASE_URL ?>subscription">Subscriptions</a>
          </li>
          <li class="breadcrumb-item active">Offline Enrollment</li>
        </ul>
      </nav>
    </div>
  </div>
</section>
<!-- End inner Page hero-->

<section class="offline-enroll-section" id="offline-enrollment">
  <div class="container">

    <div class="offline-enroll-header wow fadeInUp" data-wow-delay=".2s">
      <a href="<?= BASE_URL ?>subscription" class="offline-back-btn" aria-label="Back to subscriptions">
        <i class="bi bi-arrow-left"></i>
      </a>
      <div>
        <h2 class="offline-enroll-title">Offline Enrollment</h2>
        <p class="offline-enroll-subtitle" id="courseSubtitle">Select your preferred learning centre</p>
      </div>
    </div>

    <div class="offline-stepper wow fadeInUp" data-wow-delay=".3s" id="enrollmentStepper">
      <div class="offline-step active" data-step="location">
        <span class="step-num">1</span>
        <span class="step-label">Location</span>
      </div>
      <div class="offline-step-line"></div>
      <div class="offline-step" data-step="batch">
        <span class="step-num">2</span>
        <span class="step-label">Batch</span>
      </div>
      <div class="offline-step-line"></div>
      <div class="offline-step" data-step="seat">
        <span class="step-num">3</span>
        <span class="step-label">Seat</span>
      </div>
      <div class="offline-step-line"></div>
      <div class="offline-step" data-step="review">
        <span class="step-num">4</span>
        <span class="step-label">Review &amp; Pay</span>
      </div>
    </div>

    <!-- Step 1: Location -->
    <div class="enroll-step-panel active" id="step-location" data-step="location">
      <div class="sec-heading mb-4">
        <div class="content-area">
          <h3 class="pre-title">Step 1</h3>
          <h2 class="title">Select <span class="featured-text">Location</span></h2>
          <p class="info-text">Choose the city where you'd like to attend offline classes.</p>
        </div>
      </div>

      <div class="locations-loading" id="locationsLoading">
        <div class="enroll-spinner-sm"></div>
        <p>Loading available centres...</p>
      </div>

      <div class="locations-error" id="locationsError" style="display:none;">
        <i class="bi bi-exclamation-triangle"></i>
        <p>Could not load locations. Please try again.</p>
        <button class="btn btn-outline btn-sm" id="retryLocationsBtn">Retry</button>
      </div>

      <div class="row g-4" id="locationsGrid"></div>

      <!-- Google Maps Container -->
      <div class="location-map-container wow fadeInUp" id="locationMapContainer" style="display:none;">
      </div>
    </div>

    <!-- Step 2: Batch -->
    <div class="enroll-step-panel" id="step-batch" data-step="batch">
      <div class="sec-heading mb-4">
        <div class="content-area">
          <h3 class="pre-title">Step 2</h3>
          <h2 class="title">Choose <span class="featured-text">Batch</span></h2>
          <p class="info-text">Select a batch schedule that fits your availability.</p>
        </div>
      </div>

      <!-- Batch Availability Note -->
      <div class="batch-availability-note wow fadeInUp" data-wow-delay=".2s">
        <i class="bi bi-info-circle-fill"></i>
        <p><strong>Note:</strong> Batch 2 and Batch 4 are available under <strong>full payment mode only</strong>. Monthly payment is not available for these batches.</p>
      </div>

      <!-- Batch Cards Grid -->
      <div class="batch-cards-grid" id="batchesGrid"></div>

      <!-- Payment Note -->
      <div class="batch-payment-note wow fadeInUp" data-wow-delay=".4s" id="batchPaymentNote" style="display:none;">
        <i class="bi bi-exclamation-triangle-fill"></i>
        <p>The batch you selected is available under <strong>full payment mode only</strong>. Monthly payment option is not available for this batch.</p>
      </div>
    </div>

    <!-- Step 3: Seat Selection -->
    <div class="enroll-step-panel" id="step-seat" data-step="seat">
      <div class="sec-heading mb-4">
        <div class="content-area">
          <h3 class="pre-title">Step 3</h3>
          <h2 class="title">Pick Your <span class="featured-text">Seat</span></h2>
          <p class="info-text">Choose an available seat in your selected batch.</p>
        </div>
      </div>

      <div class="seat-selection-shell wow fadeInUp" data-wow-delay=".2s">
        <div class="seat-map-panel">
          <div class="seat-legend">
            <div class="legend-item">
              <span class="legend-seat available"></span>
              <span>Available</span>
            </div>
            <div class="legend-item">
              <span class="legend-seat selected"></span>
              <span>Your seat</span>
            </div>
            <div class="legend-item">
              <span class="legend-seat booked"></span>
              <span>Taken</span>
            </div>
          </div>

          <div class="whiteboard-bar">
            <i class="bi bi-display"></i> WHITEBOARD - INSTRUCTOR POSITION
          </div>

          <div class="classroom-scroll">
            <div class="classroom-layout" id="seatsGrid" aria-label="Classroom seat layout"></div>
          </div>
        </div>

        <aside class="selected-seat-card" id="selectedSeatCard" aria-live="polite">
          <h5>Your Selection</h5>
          <div class="seat-selection-empty" id="seatSelectionEmpty">
            Choose an available chair from the classroom layout.
          </div>
          <div class="seat-selection-details" id="seatSelectionDetails" style="display:none;">
            <div class="selected-seat-display" id="selectedSeatNumber">-</div>
            <p class="selected-seat-position" id="selectedSeatRow">-</p>
            <div class="seat-summary-list">
              <div class="seat-info-row">
                <span class="info-label">Location</span>
                <span class="info-value" id="seatSummaryLocation">-</span>
              </div>
              <div class="seat-info-row">
                <span class="info-label">Batch</span>
                <span class="info-value" id="seatSummaryBatch">-</span>
              </div>
              <div class="seat-info-row" id="seatSummaryBatchCodeRow" style="display: none;">
                <span class="info-label">Batch Code</span>
                <span class="info-value accent text-uppercase" id="seatSummaryBatchCode">-</span>
              </div>
              <div class="seat-info-row">
                <span class="info-label">Start Date</span>
                <span class="info-value" id="seatSummaryStart">-</span>
              </div>
              <div class="seat-info-row">
                <span class="info-label">Time</span>
                <span class="info-value" id="seatSummaryTime">-</span>
              </div>
              <div class="seat-info-row">
                <span class="info-label">Days</span>
                <span class="info-value" id="seatSummaryDays">-</span>
              </div>
              <div class="seat-info-row">
                <span class="info-label">Seat</span>
                <span class="info-value accent" id="selectedSeatType">-</span>
              </div>
            </div>
            <button class="clear-selection-btn" id="clearSeatBtn" type="button">
              Clear selection
            </button>
          </div>
        </aside>
      </div>
    </div>

    <!-- Step 4: Review (placeholder) -->
    <div class="enroll-step-panel" id="step-review" data-step="review">
      <div class="sec-heading mb-4">
        <div class="content-area">
          <h3 class="pre-title">Step 4</h3>
          <h2 class="title">Review &amp; <span class="featured-text">Pay</span></h2>
          <p class="info-text">Confirm your enrollment details before proceeding to payment.</p>
        </div>
      </div>
      <div class="review-summary" id="reviewSummary"></div>
    </div>

    <div class="offline-enroll-footer wow fadeInUp" data-wow-delay=".4s">
      <button class="btn-back-offline" id="btnBackStep" type="button">
        <i class="bi bi-arrow-left me-2"></i> Back
      </button>
      <button class="btn-continue-offline" id="btnContinueBatch" disabled>
        Continue <i class="bi bi-arrow-right ms-2"></i> Choose Seat
      </button>
    </div>

  </div>
</section>

<div class="toast-container" id="toastContainer"></div>

<script>
  window.OFFLINE_ENROLL_CONFIG = {
    courseSlug: <?= json_encode($courseSlug) ?>,
    subscriptionMode: <?= json_encode($subscriptionMode) ?>,
    currentStep: <?= json_encode($currentStep) ?>,
    baseUrl: <?= json_encode(BASE_URL) ?>
  };
</script>
<script src="<?= BASE_URL ?>assets/js/offline-enrollment.js"></script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
