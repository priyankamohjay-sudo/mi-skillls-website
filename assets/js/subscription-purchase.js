/**
 * Subscription Purchase & Authentication Logic
 * Frictionless One-Step Flow for MI Skills Website
 */

// const API_BASE_URL = 'https://api.miskills.in'; 
const API_BASE_URL = 'http://localhost:5000'; // Development

let currentPurchase = {
  subcategoryId: '',
  subscriptionMode: '',
  learningMode: 'ONLINE',
  slug: ''
};

/**
 * Custom Theme-Consistent Toast Notification
 */
function showToast(title, message, type = 'info') {
  const container = document.getElementById('toastContainer');
  if (!container) return;

  const toast = document.createElement('div');
  toast.className = `custom-toast ${type}`;
  
  let icon = 'bi-info-circle-fill';
  if (type === 'error') icon = 'bi-x-circle-fill';
  if (type === 'warning') icon = 'bi-exclamation-triangle-fill';
  if (type === 'success') icon = 'bi-check-circle-fill';

  toast.innerHTML = `
    <i class="bi ${icon}"></i>
    <div class="toast-content">
      <span class="toast-title">${title}</span>
      <span class="toast-message">${message}</span>
    </div>
  `;

  container.appendChild(toast);

  // Animate in
  setTimeout(() => toast.classList.add('show'), 100);

  // Auto remove
  setTimeout(() => {
    toast.classList.remove('show');
    setTimeout(() => toast.remove(), 400);
  }, 5000);
}

/**
 * Validates path preference selection based on the current course.
 */
function validatePreferenceSelection() {
  const fundingRadio = document.getElementById('direct-pref-funding');
  const warningEl = document.getElementById('pref-warning');
  
  if (fundingRadio && fundingRadio.checked) {
    // Only 'business-funding' allows Funding path
    if (currentPurchase.slug !== 'business-funding') {
      document.getElementById('direct-pref-learning').checked = true;
      if (warningEl) {
        warningEl.style.display = 'block';
        setTimeout(() => { warningEl.style.display = 'none'; }, 6000);
      }
      showToast('Path Adjusted', 'The "Funding" path is exclusive to the Business Funding course. We have set your preference to "Learning".', 'warning');
    }
  }
}

/**
 * Triggered when a "Buy Now" button is clicked.
 */
async function startPurchase(slug, mode) {
  currentPurchase.slug = slug;
  currentPurchase.subscriptionMode = mode;
  
  // Detect learning mode from UI tabs
  const offlineBtn = document.getElementById('btnOfflineMode');
  currentPurchase.learningMode = (offlineBtn && offlineBtn.classList.contains('active')) ? 'OFFLINE' : 'ONLINE';

  try {
    // 1. Fetch Subcategory ID from slug (to keep createSubsPayment logic working)
    const response = await fetch(`${API_BASE_URL}/api/subcategories/slug/${slug}`);
    const data = await response.json();

    if (!data.success || !data.subcategory) {
      return showToast('Course Error', 'This course information is currently unavailable. Please try again later.', 'error');
    }

    currentPurchase.subcategoryId = data.subcategory._id;

    // 2. Check for existing authentication
    const token = localStorage.getItem('accessToken');
    if (!token) {
      const authModalEl = document.getElementById('authModal');
      if (authModalEl) {
        // Reset modal fields and warnings
        document.getElementById('directName').value = '';
        document.getElementById('directPhone').value = '';
        document.getElementById('direct-pref-learning').checked = true;
        const warningEl = document.getElementById('pref-warning');
        if (warningEl) warningEl.style.display = 'none';

        const authModal = new bootstrap.Modal(authModalEl);
        authModal.show();
      } else {
        showToast('System Error', 'Enrollment modal could not be loaded.', 'error');
      }
    } else {
      proceedToCheckout(token);
    }
  } catch (err) {
    console.error("❌ Error during purchase initiation:", err);
    showToast('Connection Error', 'Could not connect to the database. Please check your internet connection.', 'error');
  }
}

/**
 * Helper to show/hide the professional loader
 */
function toggleLoader(show) {
  const loader = document.getElementById('enrollLoader');
  if (loader) {
    if (show) loader.classList.add('show');
    else loader.classList.remove('show');
  }
}

/**
 * Handles frictionless account creation/retrieval and proceeds to payment.
 */
async function handleDirectSubscribe() {
  const name = document.getElementById('directName').value;
  const phone = document.getElementById('directPhone').value;
  const email = document.getElementById('directEmail').value;
  
  let preference = 'LEARNING';
  const prefFunding = document.getElementById('direct-pref-funding');
  if (prefFunding && prefFunding.checked) preference = 'FUNDING';

  if (!name || !phone || !email) {
    return showToast('Missing Fields', 'Please enter your full name, phone number, and email to continue.', 'warning');
  }

  // Basic email validation
  if (!email.includes('@') || !email.includes('.')) {
    return showToast('Invalid Email', 'Please provide a valid email address for subscription details.', 'warning');
  }

  // Double check preference vs course logic before submitting
  if (preference === 'FUNDING' && currentPurchase.slug !== 'business-funding') {
    preference = 'LEARNING';
    document.getElementById('direct-pref-learning').checked = true;
  }

  // Show Loader
  toggleLoader(true);

  try {
    const res = await fetch(`${API_BASE_URL}/api/auth/direct-subscribe`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ 
        name, 
        phoneNumber: phone,
        email: email,
        preference: preference
      })
    });
    
    const data = await res.json();
    if (data.success && data.accessToken) {
      localStorage.setItem('accessToken', data.accessToken);
      
      const modalEl = document.getElementById('authModal');
      if (modalEl) {
        const modal = bootstrap.Modal.getInstance(modalEl);
        if (modal) modal.hide();
      }
      
      proceedToCheckout(data.accessToken);
    } else {
      toggleLoader(false);
      showToast('Enrollment Failed', data.message || 'We could not process your details. Please try again.', 'error');
    }
  } catch (err) {
    toggleLoader(false);
    console.error("Direct subscribe error:", err);
    showToast('Database Error', 'Could not reach the server to secure your enrollment. Please try again.', 'error');
  }
}

const COURSE_DURATIONS = {
  'web-development-with-ai-tools-full-stack-front-end-back-end': 4,
  'app-development-with-ai-tools-android-ios-cross-platform': 4,
  'digital-marketing': 3,
  'graphic-designing': 3,
  'ai-applied-machine-learning': 7,
  'cloud-computing-devops-aws-azure-gcp': 5,
  'data-science-with-gen-ai': 7,
  'cyber-security-ai-cloud-security': 5,
  'data-analytics-with-gen-ai': 4,
  'interview-internship-support': 1,
  'business-funding': 1
};

/**
 * Calls the backend to create a payment session and redirects to Razorpay.
 */
async function proceedToCheckout(token) {
  try {
    // If loader isn't already on (e.g. user was already logged in), turn it on
    toggleLoader(true);

    // 1. Determine months based on mode and slug
    let months = 1;
    if (currentPurchase.subscriptionMode === 'TOTAL') {
      months = COURSE_DURATIONS[currentPurchase.slug] || 4;
    }

    const payload = {
      subcategories: [
        {
          subcategoryId: currentPurchase.subcategoryId,
          learningMode: currentPurchase.learningMode,
          months: months,
          locationId: null,
          batchId: null,
          seatNumber: null
        }
      ],
      subscriptionMode: currentPurchase.subscriptionMode,
      client: "WEB"
    };

    const res = await fetch(`${API_BASE_URL}/api/payments/create-subscription-payment`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`
      },
      body: JSON.stringify(payload)
    });

    const data = await res.json();

    if (data.success && data.checkoutLink) {
      // Redirect to Razorpay
      window.location.href = data.checkoutLink;
    } else {
      toggleLoader(false);
      showToast('Payment Error', data.message || 'Failed to initiate the payment gateway. Please try again.', 'error');
    }
  } catch (err) {
    toggleLoader(false);
    console.error("❌ Checkout error:", err);
    showToast('Database Error', 'A connection error occurred while reaching the payment gateway.', 'error');
  }
}

/**
 * Simple logout helper
 */
function handleLogout() {
  localStorage.removeItem('accessToken');
  window.location.reload();
}
