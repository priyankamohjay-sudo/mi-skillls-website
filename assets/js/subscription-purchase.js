/**
 * Subscription Purchase & Authentication Logic
 * Connects to the Node.js backend for OTP auth and payment creation.
 */

// const API_BASE_URL = 'https://api.miskills.in'; 
const API_BASE_URL = 'http://localhost:5000'; // Update this with your actual backend URL

let currentPurchase = {
  subcategoryId: '',
  subscriptionMode: '',
  learningMode: 'ONLINE'
};

let authMode = 'login';
let pendingVerifyAction = ''; // 'login' or 'signup'
let tempPhone = '';
let tempName = '';

/**
 * Initiates the purchase flow using a stable slug.
 * Fetches the current database ID from the backend using the slug lookup API.
 */
async function startPurchase(slug, subscriptionMode) {
  try {
    // 1. Fetch the real ID from backend using the slug
    const response = await fetch(`${API_BASE_URL}/api/subcategories/slug/${slug}`);
    const data = await response.json();

    if (!data.success || !data.subcategory) {
      console.error(`❌ Subcategory not found for slug: ${slug}`);
      alert("Course information is currently unavailable. Please try again later.");
      return;
    }

    // 2. Set the current purchase details
    currentPurchase.subcategoryId = data.subcategory._id;
    currentPurchase.subscriptionMode = subscriptionMode;

    // Determine learning mode from UI state
    const onlineBtn = document.getElementById('btnOnlineMode');
    currentPurchase.learningMode = (onlineBtn && onlineBtn.classList.contains('active')) ? 'ONLINE' : 'OFFLINE';

    // 3. Check for authentication
    const token = localStorage.getItem('accessToken');
    if (!token) {
      const authModalEl = document.getElementById('authModal');
      if (authModalEl) {
        const authModal = new bootstrap.Modal(authModalEl);
        authModal.show();
        switchAuthMode('login');
      } else {
        // If no modal, redirect to login page with return URL (simplified for now)
        window.location.href = 'login.php';
      }
    } else {
      proceedToCheckout(token);
    }
  } catch (error) {
    console.error("❌ Error during purchase initiation:", error);
    alert("Something went wrong. Please check your internet and try again.");
  }
}

/**
 * Calls the backend to create a payment session and redirects to checkout.
 */
async function proceedToCheckout(token) {
  try {
    const response = await fetch(`${API_BASE_URL}/api/payments/create-subscription-payment`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`
      },
      body: JSON.stringify({
        subcategories: [{
          subcategoryId: currentPurchase.subcategoryId,
          learningMode: currentPurchase.learningMode
        }],
        subscriptionMode: currentPurchase.subscriptionMode,
        client: "WEB"
      })
    });

    const data = await response.json();
    if (data.checkoutLink) {
      window.location.href = data.checkoutLink;
    } else {
      alert(data.message || 'Error creating checkout link. Please try again.');
    }
  } catch (error) {
    console.error('Checkout error:', error);
    alert('An error occurred during checkout. Please try again.');
  }
}

/**
 * Switches between Login and Signup states in the Auth Modal or Page.
 */
function switchAuthMode(mode) {
  authMode = mode;
  const titleEl = document.getElementById('authModalTitle') || document.getElementById('authPageTitle');
  const loginState = document.getElementById('loginState');
  const signupState = document.getElementById('signupState');
  const otpState = document.getElementById('otpState');

  if (titleEl) {
    if (mode === 'login') {
      titleEl.innerText = titleEl.id === 'authModalTitle' ? 'Login to Continue' : 'Login';
    } else {
      titleEl.innerText = titleEl.id === 'authModalTitle' ? 'Create an Account' : 'Create Account';
    }
  }

  if (loginState) loginState.style.display = mode === 'login' ? 'block' : 'none';
  if (signupState) signupState.style.display = mode === 'signup' ? 'block' : 'none';
  if (otpState) otpState.style.display = 'none';
}

/**
 * Handles sending OTP for Login.
 */
async function handleLoginSendOTP() {
  const phone = document.getElementById('loginPhone').value;
  if (!phone) return alert('Please enter phone number');
  tempPhone = phone;
  
  try {
    const res = await fetch(`${API_BASE_URL}/api/auth/login-send-otp`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ phoneNumber: phone })
    });
    if (res.ok) {
      pendingVerifyAction = 'login';
      showOTPState();
    } else {
      const data = await res.json();
      alert(data.message || 'Error sending OTP');
    }
  } catch (err) {
    alert('Server error. Please try again.');
  }
}

/**
 * Handles sending OTP for Signup.
 */
async function handleSignupSendOTP() {
  const name = document.getElementById('signupName').value;
  const phone = document.getElementById('signupPhone').value;
  
  // Get preference and map to role
  let preference = '';
  const prefLearning = document.getElementById('pref-learning') || document.getElementById('pref-learning-modal');
  const prefFunding = document.getElementById('pref-funding') || document.getElementById('pref-funding-modal');
  
  if (prefLearning && prefLearning.checked) preference = 'Learning';
  else if (prefFunding && prefFunding.checked) preference = 'Funding';
  
  const role = (preference === 'Funding') ? 'investor' : 'student';

  if (!name || !phone) return alert('Please fill all fields');
  tempName = name;
  tempPhone = phone;

  try {
    const res = await fetch(`${API_BASE_URL}/api/auth/signup-send-otp`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ 
        name, 
        phoneNumber: phone,
        role: role,
        preference: preference
      })
    });
    if (res.ok) {
      pendingVerifyAction = 'signup';
      showOTPState();
    } else {
      const data = await res.json();
      alert(data.message || 'Error sending OTP');
    }
  } catch (err) {
    alert('Server error. Please try again.');
  }
}

/**
 * Shows the OTP entry view in the modal or page.
 */
function showOTPState() {
  if (document.getElementById('loginState')) document.getElementById('loginState').style.display = 'none';
  if (document.getElementById('signupState')) document.getElementById('signupState').style.display = 'none';
  if (document.getElementById('otpState')) document.getElementById('otpState').style.display = 'block';
  
  const titleEl = document.getElementById('authModalTitle') || document.getElementById('authPageTitle');
  if (titleEl) titleEl.innerText = 'Verify OTP';
}

/**
 * Navigates back from OTP state to the phone entry state.
 */
function backToPhone() {
  switchAuthMode(authMode);
}

/**
 * Verifies the entered OTP and stores the accessToken.
 */
async function handleVerifyOTP() {
  const otpInputs = document.querySelectorAll('.otp-input, .otp-input-v2');
  let otp = '';
  
  // Re-collect OTP correctly if there are multiple sets of inputs (modal vs page)
  // Actually, let's just target the visible ones
  const visibleInputs = Array.from(otpInputs).filter(i => i.offsetParent !== null);
  visibleInputs.forEach(input => otp += input.value);

  if (otp.length < 6) return alert('Please enter the 6-digit OTP');

  const action = window.pendingVerifyAction || pendingVerifyAction;
  const url = action === 'login' 
    ? `${API_BASE_URL}/api/auth/login-verify-otp`
    : `${API_BASE_URL}/api/auth/signup-verify-otp`;

  const body = { phoneNumber: tempPhone, otp };
  if (action === 'signup') body.name = tempName;

  try {
    const res = await fetch(url, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(body)
    });
    const data = await res.json();
    if (data.accessToken) {
      localStorage.setItem('accessToken', data.accessToken);
      
      // Store user role if returned by backend
      if (data.user && data.user.role) {
        localStorage.setItem('userRole', data.user.role);
      } else if (action === 'signup') {
        // Fallback for signup if not in response
        const prefFunding = document.getElementById('pref-funding') || document.getElementById('pref-funding-modal');
        const role = (prefFunding && prefFunding.checked) ? 'investor' : 'student';
        localStorage.setItem('userRole', role);
      }

      const modalEl = document.getElementById('authModal');
      if (modalEl) {
        const modal = bootstrap.Modal.getInstance(modalEl);
        if (modal) modal.hide();
      }
      
      if (currentPurchase.subcategoryId) {
        proceedToCheckout(data.accessToken);
      } else {
        // Standard login/signup redirect
        window.location.href = BASE_URL;
      }
    } else {
      alert(data.message || 'Invalid OTP');
    }
  } catch (err) {
    alert('Verification failed. Please try again.');
  }
}

/**
 * Helper to auto-focus next input in OTP fields.
 */
function moveNext(el) {
  if (el.value.length === 1 && el.nextElementSibling) {
    el.nextElementSibling.focus();
  }
}

/**
 * Logs out the user and clears local storage.
 */
function handleLogout() {
  localStorage.removeItem('accessToken');
  window.location.href = BASE_URL;
}

/**
 * Updates the UI based on authentication state.
 */
function updateAuthUI() {
  const token = localStorage.getItem('accessToken');
  const role = localStorage.getItem('userRole');
  const authMainBtn = document.getElementById('auth-main-btn');
  const authDropdownMenu = document.getElementById('auth-dropdown-menu');
  
  if (!authMainBtn || !authDropdownMenu) return;

  if (token) {
    // Logged In State
    authMainBtn.innerHTML = `
      <div class="user-avatar-circle">
        <i class="bi bi-person-fill"></i>
      </div>
      <span class="ms-2">Account</span>
      <span class="plus-icon">
        <i class="fas fa-plus"></i>
      </span>
    `;
    authDropdownMenu.innerHTML = `
      <li class="menu-item sub-menu-item">
        <a class="menu-link sub-menu-link" href="${BASE_URL}dashboard">
          <i class="bi bi-speedometer2 me-2"></i>My Dashboard
        </a>
      </li>
      <li class="menu-item sub-menu-item">
        <a class="menu-link sub-menu-link" href="javascript:void(0)" onclick="handleLogout()">
          <i class="bi bi-box-arrow-right me-2"></i>Logout
        </a>
      </li>
    `;

    // Handle Role-based restrictions on Subscription Page
    if (window.location.pathname.includes('subscription')) {
      const investorNotice = document.getElementById('investor-notice');
      if (role === 'investor') {
        if (investorNotice) investorNotice.style.display = 'block';
        
        // Disable all "Buy Now" buttons except for Business Funding
        document.querySelectorAll('button[onclick*="startPurchase"]').forEach(btn => {
          if (!btn.getAttribute('onclick').includes('business-funding')) {
            btn.disabled = true;
            btn.innerText = 'Restricted';
            btn.classList.add('btn-secondary');
            btn.classList.remove('btn-solid');
            btn.style.opacity = '0.5';
            btn.style.cursor = 'not-allowed';
          }
        });
      } else {
        if (investorNotice) investorNotice.style.display = 'none';
      }
    }

  } else {
    // Guest State
    authMainBtn.innerHTML = `
      <div class="user-avatar-circle">
        <i class="bi bi-person"></i>
      </div>
      <span class="ms-2">Join Us</span>
      <span class="plus-icon">
        <i class="fas fa-plus"></i>
      </span>
    `;
    authDropdownMenu.innerHTML = `
      <li class="menu-item sub-menu-item">
        <a class="menu-link sub-menu-link" href="${BASE_URL}login">
          <i class="bi bi-box-arrow-in-right me-2"></i>Login
        </a>
      </li>
      <li class="menu-item sub-menu-item">
        <a class="menu-link sub-menu-link" href="${BASE_URL}signup">
          <i class="bi bi-person-plus me-2"></i>Sign Up
        </a>
      </li>
    `;
  }
}

// Initialize UI on load
document.addEventListener('DOMContentLoaded', updateAuthUI);

