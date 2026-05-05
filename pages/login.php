<?php
$title = "Login - MI Skills";
require_once __DIR__ . '/../includes/header.php';
?>

<div class="auth-page-wrapper">
  <div class="auth-card">
    <div class="text-center mb-4">
      <a href="<?= BASE_URL ?>">
        <img src="<?= BASE_URL ?>assets/images/logo/logo-white-new.png" alt="MI Skills" style="height: 50px;" class="mb-4">
      </a>
      <h3 class="fw-bold" id="authPageTitle">Login</h3>
      <p class="text-white-50 small">Access your dashboard and manage subscriptions</p>
    </div>

    <!-- Login State -->
    <div id="loginState">
      <div class="mb-3">
        <label class="form-label small text-white-50">Phone Number</label>
        <div class="input-group custom-input-group">
          <span class="input-group-text bg-transparent border-end-0 text-white-50"><i class="bi bi-phone"></i></span>
          <input type="text" id="loginPhone" class="form-control bg-transparent border-start-0 text-white" placeholder="Enter your phone number">
        </div>
      </div>
      <button class="btn btn-auth-gradient w-100 mb-4 py-3 fw-bold" onclick="handleLoginSendOTP()">Send OTP</button>
      <div class="text-center">
        <span class="small text-white-50">Don't have an account?</span>
        <a href="<?= BASE_URL ?>signup" class="small text-gradient fw-bold ms-1">Sign Up</a>
      </div>
    </div>

    <!-- OTP State -->
    <div id="otpState" style="display:none">
      <p class="text-center small mb-3 text-white-50">Enter the 6-digit code sent to your phone</p>
      <div class="mb-4 text-center d-flex gap-2 justify-content-center">
        <input type="text" class="form-control text-center otp-input-v2" maxlength="1" onkeyup="moveNext(this)">
        <input type="text" class="form-control text-center otp-input-v2" maxlength="1" onkeyup="moveNext(this)">
        <input type="text" class="form-control text-center otp-input-v2" maxlength="1" onkeyup="moveNext(this)">
        <input type="text" class="form-control text-center otp-input-v2" maxlength="1" onkeyup="moveNext(this)">
        <input type="text" class="form-control text-center otp-input-v2" maxlength="1" onkeyup="moveNext(this)">
        <input type="text" class="form-control text-center otp-input-v2" maxlength="1" onkeyup="moveNext(this)">
      </div>
      <button class="btn btn-auth-gradient w-100 mb-2 py-3 fw-bold" id="btnVerifyOTP" onclick="handleVerifyOTP()">Verify & Continue</button>
      <button class="btn btn-link w-100 text-white-50 btn-sm text-decoration-none" onclick="location.reload()"><i class="bi bi-arrow-left me-1"></i> Change Phone Number</button>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
