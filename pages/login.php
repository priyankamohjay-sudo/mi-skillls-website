<?php
$title = "Login / Signup - MI Skills";
$description = "Access your MI Skills account to manage your subscriptions and courses.";
require_once __DIR__ . '/../includes/header.php';
?>

<div class="login-wrapper mega-section d-flex align-items-center justify-content-center" style="background: #080808; min-height: 85vh; padding: 60px 0;">
  <div class="container d-flex justify-content-center">
    <div class="col-12 col-md-8 col-lg-5">
      <div class="card auth-modal-content p-4 p-md-5 border-0">
        
        <!-- Step 1: Input Fields -->
        <div id="authStep1">
          <!-- Tabs for Login / Signup -->
          <div class="d-flex justify-content-center mb-4">
            <div class="pref-group w-100" style="max-width: 300px;">
              <input type="radio" class="btn-check" name="auth_mode" id="auth-mode-login" value="LOGIN" checked onchange="toggleAuthMode('LOGIN')">
              <label class="pref-label w-50" for="auth-mode-login">Login</label>

              <input type="radio" class="btn-check" name="auth_mode" id="auth-mode-signup" value="SIGNUP" onchange="toggleAuthMode('SIGNUP')">
              <label class="pref-label w-50" for="auth-mode-signup">Enroll</label>
            </div>
          </div>

          <div class="text-center mb-4">
            <h4 class="fw-bold text-white" id="loginTitle">Welcome Back</h4>
            <p class="text-white-50 small" id="loginSubtitle">Enter your details to access your dashboard</p>
          </div>

          <form id="authForm" onsubmit="handleSendOTP(event)">
            <!-- Name Field (only visible in SIGNUP mode) -->
            <div class="mb-3" id="nameFieldContainer" style="display: none;">
              <label class="form-label small text-white-50">Full Name</label>
              <div class="input-group custom-input-group">
                <span class="input-group-text bg-transparent border-end-0 text-white-50"><i class="bi bi-person"></i></span>
                <input type="text" id="authName" class="form-control bg-transparent border-start-0 text-white" placeholder="Enter your full name">
              </div>
            </div>

            <!-- Phone Number / Email -->
            <div class="mb-3">
              <label class="form-label small text-white-50" id="authIdentifierLabel">Phone Number or Email</label>
              <div class="input-group custom-input-group">
                <span class="input-group-text bg-transparent border-end-0 text-white-50"><i class="bi bi-phone" id="authIdentifierIcon"></i></span>
                <input type="text" id="authIdentifier" class="form-control bg-transparent border-start-0 text-white" placeholder="Enter email or phone" required>
              </div>
            </div>

            <!-- Email Field (only visible in SIGNUP mode) -->
            <div class="mb-3" id="emailFieldContainer" style="display: none;">
              <label class="form-label small text-white-50">Email Address</label>
              <div class="input-group custom-input-group">
                <span class="input-group-text bg-transparent border-end-0 text-white-50"><i class="bi bi-envelope"></i></span>
                <input type="email" id="authEmail" class="form-control bg-transparent border-start-0 text-white" placeholder="Enter your email address">
              </div>
            </div>



            <button type="submit" class="btn btn-auth-gradient w-100 mb-3 py-2 fw-bold" id="authSubmitBtn">Send OTP</button>
          </form>
        </div>

        <!-- Step 2: OTP Verification -->
        <div id="authStep2" style="display: none;">
          <div class="text-center mb-4">
            <h4 class="fw-bold text-white">Enter Verification Code</h4>
            <p class="text-white-50 small" id="authOtpSentMsg">OTP has been sent to your device</p>
          </div>

          <form id="otpForm" onsubmit="handleVerifyOTP(event)">
            <div class="mb-3">
              <label class="form-label small text-white-50">Verification Code</label>
              <div class="input-group custom-input-group">
                <span class="input-group-text bg-transparent border-end-0 text-white-50"><i class="bi bi-shield-lock"></i></span>
                <input type="text" id="authOtp" class="form-control bg-transparent border-start-0 text-white text-center fw-bold fs-5" placeholder="Enter 6-digit OTP" maxlength="6" required>
              </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
              <button type="button" class="btn btn-link text-white-50 p-0 text-decoration-none small" onclick="goBackToStep1()">
                <i class="bi bi-arrow-left me-1"></i> Edit Details
              </button>
              <span class="small text-white-50" id="authOtpTimer">Expires in 5:00</span>
              <button type="button" class="btn btn-link text-white-50 p-0 text-decoration-none small" id="btnAuthResend" onclick="handleResendOTP()" disabled>
                Resend OTP
              </button>
            </div>

            <button type="submit" class="btn btn-auth-gradient w-100 mb-3 py-2 fw-bold">Verify & Login</button>
          </form>
        </div>

        <div class="text-center">
          <span class="small text-white-50">By continuing, you agree to our Terms and Privacy Policy.</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Toast Notifications -->
<div class="toast-container" id="toastContainer"></div>

<!-- Professional Loader Overlay -->
<div class="enroll-loader-overlay" id="enrollLoader">
  <div class="enroll-spinner"></div>
  <h5 class="text-white fw-bold mb-1" id="loaderTitle">Securing Your Session</h5>
  <p class="text-white-50 small" id="loaderDesc">Please wait while we connect to the authentication server...</p>
</div>

<script>
let otpTimer = null;
let otpSecondsRemaining = 300;

document.addEventListener('DOMContentLoaded', () => {
  // If already logged in, redirect to homepage
  const token = localStorage.getItem('accessToken');
  if (token) {
    window.location.href = '<?= BASE_URL ?>';
  }

  // Pre-fill fields if user details are saved in localStorage
  const savedUserStr = localStorage.getItem('user');
  if (savedUserStr) {
    try {
      const savedUser = JSON.parse(savedUserStr);
      if (savedUser) {
        document.getElementById('authIdentifier').value = savedUser.phoneNumber || savedUser.email || '';
        if (savedUser.name) {
          document.getElementById('authName').value = savedUser.name;
        }
      }
    } catch (e) {
      console.error("Error loading pre-filled user details:", e);
    }
  }
});

function startOtpTimer() {
  clearInterval(otpTimer);
  otpSecondsRemaining = 300;
  const timerEl = document.getElementById('authOtpTimer');
  const resendBtn = document.getElementById('btnAuthResend');
  if (resendBtn) resendBtn.disabled = true;

  otpTimer = setInterval(() => {
    otpSecondsRemaining--;
    const mins = Math.floor(otpSecondsRemaining / 60);
    const secs = otpSecondsRemaining % 60;
    if (timerEl) {
      timerEl.textContent = `Expires in ${mins}:${secs.toString().padStart(2, '0')}`;
    }

    if (otpSecondsRemaining <= 0) {
      clearInterval(otpTimer);
      if (timerEl) timerEl.textContent = "OTP Expired";
      if (resendBtn) resendBtn.disabled = false;
    }
  }, 1000);
}

function goBackToStep1() {
  clearInterval(otpTimer);
  document.getElementById('authStep2').style.display = 'none';
  document.getElementById('authStep1').style.display = 'block';
}

function toggleAuthMode(mode) {
  const nameContainer = document.getElementById('nameFieldContainer');
  const emailContainer = document.getElementById('emailFieldContainer');
  const title = document.getElementById('loginTitle');
  const subtitle = document.getElementById('loginSubtitle');
  const submitBtn = document.getElementById('authSubmitBtn');
  const nameInput = document.getElementById('authName');
  const emailInput = document.getElementById('authEmail');
  const identifierLabel = document.getElementById('authIdentifierLabel');
  const identifierIcon = document.getElementById('authIdentifierIcon');
  const identifierInput = document.getElementById('authIdentifier');

  if (mode === 'SIGNUP') {
    nameContainer.style.display = 'block';
    emailContainer.style.display = 'block';
    nameInput.setAttribute('required', 'required');
    emailInput.setAttribute('required', 'required');
    title.textContent = 'Create Account';
    subtitle.textContent = 'Register to start your learning journey';
    submitBtn.textContent = 'Send OTP';
    
    // For signup, only phone number is allowed by backend v2 API
    identifierLabel.textContent = 'Phone Number';
    identifierIcon.className = 'bi bi-phone';
    identifierInput.placeholder = 'Enter your phone number';
  } else {
    nameContainer.style.display = 'none';
    emailContainer.style.display = 'none';
    nameInput.removeAttribute('required');
    emailInput.removeAttribute('required');
    title.textContent = 'Welcome Back';
    subtitle.textContent = 'Enter your details to access your dashboard';
    submitBtn.textContent = 'Send OTP';
    
    // For login, phone or email is allowed
    identifierLabel.textContent = 'Phone Number or Email';
    identifierIcon.className = 'bi bi-phone';
    identifierInput.placeholder = 'Enter email or phone';
  }
}

async function handleSendOTP(event) {
  if (event) event.preventDefault();

  const isSignup = document.getElementById('auth-mode-signup').checked;
  const identifier = document.getElementById('authIdentifier').value.trim();
  
  let name = '';
  let email = '';
  let preference = 'LEARNING';
  
  if (isSignup) {
    name = document.getElementById('authName').value.trim();
    email = document.getElementById('authEmail').value.trim();
    
    if (!name || !email) {
      return showToast('Missing Fields', 'Please enter your full name and email address.', 'warning');
    }

    // Basic email validation
    if (!email.includes('@') || !email.includes('.')) {
      return showToast('Invalid Email', 'Please provide a valid email address.', 'warning');
    }
  }

  if (!identifier) {
    return showToast('Missing Field', 'Please enter your phone number.', 'warning');
  }

  // Show Loader
  if (typeof toggleLoader === 'function') {
    toggleLoader(true);
  }

  const endpoint = isSignup ? `${API_BASE_URL}/api/auth/signup-v2` : `${API_BASE_URL}/api/auth/login-v2`;
  const body = isSignup 
    ? { name, phoneNumber: identifier, email, role: 'student', preference }
    : { identifier };

  try {
    const res = await fetch(endpoint, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(body)
    });

    const data = await res.json();

    if (res.status === 409 || (data.message && data.message.toLowerCase().includes('already registered'))) {
      if (typeof toggleLoader === 'function') {
        toggleLoader(false);
      }
      
      // If the conflict is about the email address, just show error and don't change mode
      if (data.message && data.message.toLowerCase().includes('email')) {
        showToast('Registration Error', data.message || 'Email already registered. Please login.', 'error');
        return;
      }

      showToast('Account Exists', 'This phone number is already registered. Switched to Login mode.', 'info');

      // Toggle to Login Mode
      const modeLogin = document.getElementById('auth-mode-login');
      if (modeLogin) {
        modeLogin.checked = true;
        toggleAuthMode('LOGIN');
      }

      // Pre-fill the identifier input with the phone number
      const identifierInput = document.getElementById('authIdentifier');
      if (identifierInput) {
        identifierInput.value = identifier;
      }
      return;
    }

    if (typeof toggleLoader === 'function') {
      toggleLoader(false);
    }

    if (data.success) {
      showToast('OTP Sent', data.message || 'OTP sent successfully!', 'success');
      
      // Update text in step 2
      const targetMsg = isSignup 
        ? `OTP has been sent to your phone ${identifier}` 
        : `OTP has been sent via ${data.data?.channel || 'your channel'}`;
      document.getElementById('authOtpSentMsg').textContent = targetMsg;

      // Switch screen
      document.getElementById('authStep1').style.display = 'none';
      document.getElementById('authStep2').style.display = 'block';

      // Start timer
      startOtpTimer();
    } else {
      showToast('Request Failed', data.message || 'Could not send OTP. Please try again.', 'error');
    }
  } catch (err) {
    if (typeof toggleLoader === 'function') {
      toggleLoader(false);
    }
    console.error("OTP send error:", err);
    showToast('Database Error', 'Could not connect to the server to send OTP.', 'error');
  }
}

function handleResendOTP() {
  handleSendOTP();
}

async function handleVerifyOTP(event) {
  if (event) event.preventDefault();

  const isSignup = document.getElementById('auth-mode-signup').checked;
  const identifier = document.getElementById('authIdentifier').value.trim();
  const otp = document.getElementById('authOtp').value.trim();

  if (!otp || otp.length < 6) {
    return showToast('Invalid OTP', 'Please enter the 6-digit code.', 'warning');
  }

  if (typeof toggleLoader === 'function') {
    toggleLoader(true);
  }

  const endpoint = isSignup 
    ? `${API_BASE_URL}/api/auth/signup-v2/verify-otp` 
    : `${API_BASE_URL}/api/auth/login-v2/verify-otp`;

  const body = isSignup 
    ? { phoneNumber: identifier, otp } 
    : { identifier, otp };

  try {
    const res = await fetch(endpoint, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(body)
    });

    const data = await res.json();
    if (typeof toggleLoader === 'function') {
      toggleLoader(false);
    }

    if (data.success && data.data?.accessToken) {
      clearInterval(otpTimer);
      
      // Save user & token
      localStorage.setItem('accessToken', data.data.accessToken);
      if (data.data.user) {
        localStorage.setItem('user', JSON.stringify(data.data.user));
      }

      showToast('Authenticated', 'Authentication successful! Redirecting...', 'success');
      
      setTimeout(() => {
        window.location.href = '<?= BASE_URL ?>';
      }, 1000);
    } else {
      showToast('Verification Failed', data.message || 'Invalid or expired OTP. Please try again.', 'error');
    }
  } catch (err) {
    if (typeof toggleLoader === 'function') {
      toggleLoader(false);
    }
    console.error("OTP verify error:", err);
    showToast('Database Error', 'Could not connect to the server to verify OTP.', 'error');
  }
}
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
