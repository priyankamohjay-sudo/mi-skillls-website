<?php
$title = "Sign Up - MI Skills";
require_once __DIR__ . '/../includes/header.php';
?>

<div class="auth-page-wrapper">
  <div class="auth-card">
    <div class="text-center mb-4">
      <a href="<?= BASE_URL ?>">
        <img src="<?= BASE_URL ?>assets/images/logo/logo-white-new.png" alt="MI Skills" style="height: 50px;" class="mb-4">
      </a>
      <h3 class="fw-bold" id="authPageTitle">Create Account</h3>
      <p class="text-white-50 small">Join us and start your learning journey</p>
    </div>

    <!-- Signup State -->
    <div id="signupState">
      <div class="mb-3">
        <label class="form-label small text-white-50">Full Name</label>
        <div class="input-group custom-input-group">
          <span class="input-group-text bg-transparent border-end-0 text-white-50"><i class="bi bi-person"></i></span>
          <input type="text" id="signupName" class="form-control bg-transparent border-start-0 text-white" placeholder="Enter your full name">
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label small text-white-50">Phone Number</label>
        <div class="input-group custom-input-group">
          <span class="input-group-text bg-transparent border-end-0 text-white-50"><i class="bi bi-phone"></i></span>
          <input type="text" id="signupPhone" class="form-control bg-transparent border-start-0 text-white" placeholder="Enter your phone number">
        </div>
      </div>
      <div class="mb-4">
        <label class="form-label small text-white-50">Path Preference</label>
        <div class="pref-group">
          <input type="radio" class="btn-check" name="preference" id="pref-learning" value="Learning" checked>
          <label class="pref-label" for="pref-learning">Learning</label>

          <input type="radio" class="btn-check" name="preference" id="pref-funding" value="Funding">
          <label class="pref-label" for="pref-funding">Funding</label>
        </div>
      </div>
      <button class="btn btn-auth-gradient w-100 mb-4 py-3 fw-bold" onclick="handleSignupSendOTP()">Send OTP</button>
      <div class="text-center">
        <span class="small text-white-50">Already have an account?</span>
        <a href="<?= BASE_URL ?>login" class="small text-gradient fw-bold ms-1">Login</a>
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
