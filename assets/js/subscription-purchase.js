/**
 * Subscription Purchase & Authentication Logic
 * Frictionless One-Step Flow for MI Skills Website
 */

const SUBSCRIPTION_API_BASE_URL = window.MI_API_BASE_URL || 'https://dev.miskills.in';

const COURSE_API_SLUGS = {
  'web-and-app-development-with-ai-tools': [
    'web-development-with-ai-tools-full-stack-front-end-back-end',
    'web-and-app-development-with-ai-tools'
  ],
  'ai-applied-machine-learning': [
    'ai-applied-machine-learning',
    'artificial-intelligence-and-applied-machine-learning'
  ],
  'data-science-and-analytics-with-gen-ai': [
    'data-science-and-analytics-with-gen-ai'
  ],
  'cloud-computing-devops-aws-azure-gcp': [
    'cloud-computing-devops-aws-azure-gcp',
    'cloud-computing-and-devops'
  ],
  'cyber-security-ai-cloud-security': [
    'cyber-security-ai-cloud-security',
    'cybersecurity-ai-and-cloud-security'
  ]
};

const SUBCATEGORY_CACHE = new Map();

let currentPurchase = {
  subcategoryId: '',
  subscriptionMode: '',
  learningMode: 'ONLINE',
  slug: '',
  apiSlug: '',
  courseName: ''
};

async function fetchSubcategoryBySlug(slug) {
  const slugsToTry = COURSE_API_SLUGS[slug] || [slug];
  let lastError = null;

  for (const apiSlug of slugsToTry) {
    try {
      const response = await fetch(`${SUBSCRIPTION_API_BASE_URL}/api/subcategories/slug/${encodeURIComponent(apiSlug)}`);
      const data = await response.json().catch(() => ({}));

      if (response.ok && data.success !== false && data.subcategory) {
        const result = { subcategory: data.subcategory, apiSlug };
        SUBCATEGORY_CACHE.set(slug, result);
        return result;
      }

      lastError = new Error(data.message || `Course not found for slug: ${apiSlug}`);
    } catch (err) {
      lastError = err;
    }
  }

  throw lastError || new Error('Course information is unavailable.');
}

function getNestedValue(source, paths) {
  for (const path of paths) {
    const value = path.split('.').reduce((obj, key) => obj?.[key], source);
    if (value !== undefined && value !== null && value !== '') return value;
  }
  return null;
}

function formatCurrency(value) {
  if (value === null || value === undefined || value === '') return '';
  const numeric = Number(String(value).replace(/[^\d.]/g, ''));
  if (Number.isNaN(numeric)) return String(value);
  return `Rs. ${numeric.toLocaleString('en-IN')}`;
}

function getCoursePrice(subcategory, mode, learningMode) {
  const normalizedMode = mode === 'TOTAL' ? 'full' : 'monthly';
  const normalizedLearning = learningMode.toLowerCase();
  return getNestedValue(subcategory, [
    `pricing.${normalizedLearning}.${normalizedMode}`,
    `prices.${normalizedLearning}.${normalizedMode}`,
    `${normalizedLearning}${normalizedMode.charAt(0).toUpperCase()}${normalizedMode.slice(1)}Price`,
    `${normalizedLearning}_${normalizedMode}_price`,
    normalizedLearning === 'offline' && normalizedMode === 'monthly' ? 'offlineMonthlyPrice' : '',
    normalizedLearning === 'offline' && normalizedMode === 'full' ? 'offlineFullPrice' : '',
    normalizedLearning === 'online' && normalizedMode === 'monthly' ? 'onlineMonthlyPrice' : '',
    normalizedLearning === 'online' && normalizedMode === 'full' ? 'onlineFullPrice' : '',
    normalizedMode === 'monthly' ? 'monthlyPrice' : 'fullPrice',
    'price'
  ].filter(Boolean));
}

async function hydrateSubscriptionCardsFromBackend() {
  const buttons = Array.from(document.querySelectorAll('button[onclick^="startPurchase("]'));
  if (!buttons.length) return;

  const slugMap = new Map();
  buttons.forEach(button => {
    const match = button.getAttribute('onclick')?.match(/startPurchase\('([^']+)'\s*,\s*'([^']+)'\)/);
    if (!match) return;
    const [, slug, mode] = match;
    if (!slugMap.has(slug)) slugMap.set(slug, { slug, modes: new Set(), buttons: [] });
    slugMap.get(slug).modes.add(mode);
    slugMap.get(slug).buttons.push(button);
  });

  await Promise.all(Array.from(slugMap.values()).map(async item => {
    try {
      const { subcategory, apiSlug } = await fetchSubcategoryBySlug(item.slug);
      SUBCATEGORY_CACHE.set(item.slug, { subcategory, apiSlug });
      item.buttons.forEach(button => {
        button.dataset.subcategoryId = subcategory._id || subcategory.id || '';
        button.dataset.apiSlug = apiSlug;

        const card = button.closest('.price-card, .full-course-card, .plan');
        if (!card) return;

        const titleEl = card.querySelector('h3');
        const descEl = card.querySelector('.text-white-50, .sub-text');
        const mode = button.getAttribute('onclick')?.includes("'TOTAL'") ? 'TOTAL' : 'MONTHLY';

        if (titleEl && (subcategory.name || subcategory.title)) {
          const isFullCard = card.classList.contains('full-course-card') || mode === 'TOTAL';
          titleEl.textContent = `${subcategory.name || subcategory.title}${isFullCard ? ' - Full Course' : ''}`;
        }

        if (descEl && (subcategory.shortDescription || subcategory.description || subcategory.subtitle)) {
          descEl.textContent = subcategory.shortDescription || subcategory.description || subcategory.subtitle;
        }

        const onlinePrice = getCoursePrice(subcategory, mode, 'ONLINE');
        const offlinePrice = getCoursePrice(subcategory, mode, 'OFFLINE');

        if (onlinePrice) {
          const el = card.querySelector('.online-price strong, .online-price.price');
          if (el) el.textContent = `${formatCurrency(onlinePrice)}${mode === 'MONTHLY' ? ' / Month' : ''}`;
        }

        if (offlinePrice) {
          const el = card.querySelector('.offline-price strong, .offline-price.price');
          if (el) el.textContent = `${formatCurrency(offlinePrice)}${mode === 'MONTHLY' ? ' / Month' : ''}`;
        }
      });
    } catch (err) {
      console.warn(`Could not hydrate course ${item.slug}:`, err);
    }
  }));
}

document.addEventListener('DOMContentLoaded', hydrateSubscriptionCardsFromBackend);

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
    // 1. Fetch Subcategory ID from backend slug (keeps payment tied to backend data)
    const lookup = SUBCATEGORY_CACHE.get(slug) || await fetchSubcategoryBySlug(slug);
    const { subcategory, apiSlug } = lookup;
    currentPurchase.subcategoryId = subcategory._id || subcategory.id;
    currentPurchase.apiSlug = apiSlug;
    currentPurchase.courseName = subcategory.name || subcategory.title || currentPurchase.courseName;

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
    } else if (currentPurchase.learningMode === 'OFFLINE') {
      redirectToOfflineEnrollment();
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
    const res = await fetch(`${SUBSCRIPTION_API_BASE_URL}/api/auth/direct-subscribe`, {
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
      
      if (currentPurchase.learningMode === 'OFFLINE') {
        toggleLoader(false);
        redirectToOfflineEnrollment();
      } else {
        proceedToCheckout(data.accessToken);
      }
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

/**
 * Redirects offline learners to the enrollment wizard.
 */
function redirectToOfflineEnrollment() {
  sessionStorage.setItem('offlinePurchase', JSON.stringify({
    slug: currentPurchase.slug,
    apiSlug: currentPurchase.apiSlug,
    subcategoryId: currentPurchase.subcategoryId,
    courseName: currentPurchase.courseName,
    subscriptionMode: currentPurchase.subscriptionMode,
    learningMode: 'OFFLINE'
  }));

  const qs = new URLSearchParams({
    course: currentPurchase.slug,
    mode: currentPurchase.subscriptionMode,
    step: 'location'
  });

  window.location.href = `${BASE_URL}offline-enrollment?${qs}`;
}

const COURSE_DURATIONS = {
  'web-and-app-development-with-ai-tools': 4,
  'data-science-and-analytics-with-gen-ai': 7,
  'ai-applied-machine-learning': 7,
  'artificial-intelligence-and-applied-machine-learning': 7,
  'cloud-computing-devops-aws-azure-gcp': 5,
  'cloud-computing-and-devops': 5,
  'cyber-security-ai-cloud-security': 5,
  'cybersecurity-ai-and-cloud-security': 5,
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

    const subscriptionMode =
      currentPurchase.learningMode === 'OFFLINE' &&
      (currentPurchase.subscriptionMode === 'TOTAL' || currentPurchase.paymentMode === 'full-only')
        ? 'FULL'
        : currentPurchase.subscriptionMode;

    if (
      currentPurchase.learningMode === 'OFFLINE' &&
      (!currentPurchase.locationId || !currentPurchase.batchId || !currentPurchase.seatNumber)
    ) {
      toggleLoader(false);
      return showToast('Offline Selection Missing', 'Please select your location, batch, and seat before payment.', 'warning');
    }

    const subscriptionItem = {
      subcategoryId: currentPurchase.subcategoryId,
      learningMode: currentPurchase.learningMode,
      locationId: currentPurchase.locationId || null,
      batchId: currentPurchase.batchId || null,
      seatNumber: currentPurchase.seatNumber || null
    };

    if (!(currentPurchase.learningMode === 'OFFLINE' && subscriptionMode === 'FULL')) {
      subscriptionItem.months = months;
    }

    const payload = {
      subcategories: [subscriptionItem],
      subscriptionMode,
      client: "WEB"
    };

    const res = await fetch(`${SUBSCRIPTION_API_BASE_URL}/api/payments/create-subscription-payment`, {
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
