/**
 * Subscription Purchase & Authentication Logic
 * Frictionless One-Step Flow for MI Skills Website
 */

const SUBSCRIPTION_API_BASE_URL = window.MI_API_BASE_URL || 'https://dev.miskills.in';

const COURSE_API_SLUGS = {
  'web-and-app-development-with-ai-tools': [
    'web-and-app-development-with-ai-tools',
    'web-development-with-ai-tools-full-stack-front-end-back-end'
  ],
  'ai-and-applied-machine-learning': [
    'ai-and-applied-machine-learning',
    'artificial-intelligence-and-applied-machine-learning',
    'ai-applied-machine-learning'
  ],
  'data-science-and-analytics-with-gen-ai': [
    'data-science-and-analytics-with-gen-ai'
  ],
  'cloud-computing-and-devops-aws-azure-gcp': [
    'cloud-computing-and-devops-aws-azure-gcp',
    'cloud-computing-devops-aws-azure-gcp',
    'cloud-computing-and-devops'
  ],
  'cyber-security-ai-and-cloud-security': [
    'cyber-security-ai-and-cloud-security',
    'cybersecurity-ai-and-cloud-security',
    'cyber-security-ai-cloud-security'
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
  return `₹${numeric.toLocaleString('en-IN')}`;
}

function getCoursePrice(subcategory, mode, learningMode) {
  const normalizedMode = mode === 'TOTAL' ? 'full' : 'monthly';
  const normalizedLearning = learningMode.toLowerCase();
  return getNestedValue(subcategory, [
    `plans.${normalizedLearning}.${normalizedMode === 'full' ? 'totalPrice' : 'monthlyPrice'}`,
    `plans.${normalizedLearning}.${normalizedMode === 'full' ? 'total' : 'monthly'}`,
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
  const buttons = Array.from(document.querySelectorAll('button')).filter(btn => {
    const onclickStr = btn.getAttribute('onclick') || '';
    return onclickStr.includes('startPurchase(');
  });
  if (!buttons.length) {
    console.warn('[Hydration] No startPurchase buttons found on page.');
    return;
  }

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
      // console.log(`[Hydration] Fetching data for course slug: ${item.slug}`);
      const { subcategory, apiSlug } = await fetchSubcategoryBySlug(item.slug);
      // console.log(`[Hydration] Successfully fetched data for slug: ${item.slug}`, subcategory);
      
      SUBCATEGORY_CACHE.set(item.slug, { subcategory, apiSlug });
      item.buttons.forEach(button => {
        button.dataset.subcategoryId = subcategory._id || subcategory.id || '';
        button.dataset.apiSlug = apiSlug;

        const card = button.closest('.price-card, .full-course-card, .plan');
        if (!card) {
          console.warn(`[Hydration] Card element not found for button`, button);
          return;
        }

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

        // Hydrate dynamic duration and daily hours
        const durationEl = card.querySelector('[data-duration-months]');
        if (durationEl && subcategory.durationMonths) {
          // console.log(`[Hydration] Updating duration for ${item.slug} to ${subcategory.durationMonths} months`);
          durationEl.textContent = `${subcategory.durationMonths} Months Access`;
        }
        const dailyHoursEl = card.querySelector('[data-daily-hours]');
        if (dailyHoursEl && subcategory.dailyHours !== undefined) {
          dailyHoursEl.textContent = `${subcategory.dailyHours} Hours / Day`;
        }

        // Hydrate Online & Offline Features Lists
        const onlineFeaturesList = card.querySelector('[data-features-online]');
        const offlineFeaturesList = card.querySelector('[data-features-offline]');

        let originalFeatures = [];
        if (onlineFeaturesList) {
          if (!onlineFeaturesList.dataset.originalFeatures) {
            const originalItems = Array.from(onlineFeaturesList.querySelectorAll('li')).map(li => li.textContent.trim());
            onlineFeaturesList.dataset.originalFeatures = JSON.stringify(originalItems);
          }
          originalFeatures = JSON.parse(onlineFeaturesList.dataset.originalFeatures);
        } else if (offlineFeaturesList) {
          if (!offlineFeaturesList.dataset.originalFeatures) {
            const originalItems = Array.from(offlineFeaturesList.querySelectorAll('li')).map(li => li.textContent.trim());
            offlineFeaturesList.dataset.originalFeatures = JSON.stringify(originalItems);
          }
          originalFeatures = JSON.parse(offlineFeaturesList.dataset.originalFeatures);
        }

        const baseCurriculum = (subcategory.whatYouWillLearn && subcategory.whatYouWillLearn.length > 0)
          ? subcategory.whatYouWillLearn
          : originalFeatures;

        if (onlineFeaturesList) {
          const onlineFeatures = subcategory.plans?.online?.features || [];
          // console.log(`[Hydration] Updating online features for ${item.slug}`, onlineFeatures);
          onlineFeaturesList.innerHTML = '';
          const combinedOnline = [...baseCurriculum];
          combinedOnline.forEach(feat => {
            const li = document.createElement('li');
            li.textContent = feat;
            onlineFeaturesList.appendChild(li);
          });
        }

        if (offlineFeaturesList) {
          const offlineFeatures = subcategory.plans?.offline?.features || [];
          // console.log(`[Hydration] Updating offline features for ${item.slug}`, offlineFeatures);
          offlineFeaturesList.innerHTML = '';
          const combinedOffline = [...baseCurriculum];
          combinedOffline.forEach(feat => {
            const li = document.createElement('li');
            li.textContent = feat;
            offlineFeaturesList.appendChild(li);
          });
        }

        const onlinePrice = getCoursePrice(subcategory, mode, 'ONLINE');
        const offlinePrice = getCoursePrice(subcategory, mode, 'OFFLINE');
        // console.log(`[Hydration] Prices for ${item.slug}: Online = ${onlinePrice}, Offline = ${offlinePrice}`);

        if (onlinePrice) {
          const el = card.querySelector('.online-price strong, .online-price.price');
          if (el) {
            // console.log(`[Hydration] Updating online price element for ${item.slug}`, el, `with price: ${onlinePrice}`);
            el.textContent = `${formatCurrency(onlinePrice)}${mode === 'MONTHLY' ? ' / Month' : ''}`;
          } else {
            console.warn(`[Hydration] Online price element not found in card for ${item.slug}`, card);
          }
        }

        if (offlinePrice) {
          const el = card.querySelector('.offline-price strong, .offline-price.price');
          if (el) {
            // console.log(`[Hydration] Updating offline price element for ${item.slug}`, el, `with price: ${offlinePrice}`);
            el.textContent = `${formatCurrency(offlinePrice)}${mode === 'MONTHLY' ? ' / Month' : ''}`;
          } else {
            console.warn(`[Hydration] Offline price element not found in card for ${item.slug}`, card);
          }
        }
      });
    } catch (err) {
      console.error(`[Hydration Error] Could not hydrate course ${item.slug}:`, err);
    }
  }));
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', hydrateSubscriptionCardsFromBackend);
} else {
  hydrateSubscriptionCardsFromBackend();
}

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

  // [MARKETING] Online mode is "Full" - force offline learning
  if (currentPurchase.learningMode === 'ONLINE') {
    const onlineModalEl = document.getElementById('onlineFullModal');
    if (onlineModalEl) {
      const onlineModal = new bootstrap.Modal(onlineModalEl);
      onlineModal.show();
      return;
    }
  }

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
        // Reset modal steps
        goBackToModalStep1();

        // Reset or pre-fill modal fields
        const savedUserStr = localStorage.getItem('user');
        let savedUser = null;
        if (savedUserStr) {
          try { savedUser = JSON.parse(savedUserStr); } catch(e) {}
        }

        document.getElementById('directName').value = savedUser?.name || '';
        document.getElementById('directPhone').value = savedUser?.phoneNumber || '';

        // Handle dynamic modal view based on whether we have saved user details
        const modalModeSignup = document.getElementById('modal-mode-signup');
        const modalModeLogin = document.getElementById('modal-mode-login');
        if (modalModeSignup && modalModeLogin) {
          if (savedUser) {
            modalModeLogin.checked = true;
            toggleModalAuthMode('LOGIN');
          } else {
            modalModeSignup.checked = true;
            toggleModalAuthMode('SIGNUP');
          }
        }

        const prefLearningEl = document.getElementById('direct-pref-learning');
        if (prefLearningEl) prefLearningEl.checked = true;
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

let modalOtpTimer = null;
let modalOtpSecondsRemaining = 300;

function startModalOtpTimer() {
  clearInterval(modalOtpTimer);
  modalOtpSecondsRemaining = 300;
  const timerEl = document.getElementById('modalOtpTimer');
  const resendBtn = document.getElementById('btnModalResend');
  if (resendBtn) resendBtn.disabled = true;

  modalOtpTimer = setInterval(() => {
    modalOtpSecondsRemaining--;
    const mins = Math.floor(modalOtpSecondsRemaining / 60);
    const secs = modalOtpSecondsRemaining % 60;
    if (timerEl) {
      timerEl.textContent = `Expires in ${mins}:${secs.toString().padStart(2, '0')}`;
    }

    if (modalOtpSecondsRemaining <= 0) {
      clearInterval(modalOtpTimer);
      if (timerEl) timerEl.textContent = "OTP Expired";
      if (resendBtn) resendBtn.disabled = false;
    }
  }, 1000);
}

function goBackToModalStep1() {
  clearInterval(modalOtpTimer);
  const step1 = document.getElementById('modalStep1');
  const step2 = document.getElementById('modalStep2');
  if (step1) step1.style.display = 'block';
  if (step2) step2.style.display = 'none';
}

/**
 * Toggles auth modal fields between signup and login mode.
 */
function toggleModalAuthMode(mode) {
  const nameField = document.getElementById('modalNameFieldContainer');
  const emailField = document.getElementById('modalEmailFieldContainer');
  const phoneLabel = document.getElementById('modalPhoneLabel');
  const phoneIcon = document.getElementById('modalPhoneIcon');
  const phoneInput = document.getElementById('directPhone');
  const title = document.getElementById('authModalTitle');
  const subtitle = document.getElementById('authModalSubtitle');
  
  if (mode === 'LOGIN') {
    if (nameField) nameField.style.display = 'none';
    if (emailField) emailField.style.display = 'none';
    if (phoneLabel) phoneLabel.textContent = 'Phone Number or Email';
    if (phoneIcon) phoneIcon.className = 'bi bi-phone';
    if (phoneInput) phoneInput.placeholder = 'Enter email or phone';
    if (title) title.textContent = 'Existing User Login';
    if (subtitle) subtitle.textContent = 'Enter phone & email to verify and pay';
  } else {
    if (nameField) nameField.style.display = 'block';
    if (emailField) emailField.style.display = 'block';
    if (phoneLabel) phoneLabel.textContent = 'Phone Number';
    if (phoneIcon) phoneIcon.className = 'bi bi-phone';
    if (phoneInput) phoneInput.placeholder = 'Enter your phone number';
    if (title) title.textContent = 'Instant Enrollment';
    if (subtitle) subtitle.textContent = 'Quickly secure your spot in this course';
  }
}

/**
 * Handles sending OTP for the modal auth flow.
 */
async function handleModalSendOTP() {
  const loginModeRadio = document.getElementById('modal-mode-login');
  const isLoginMode = loginModeRadio && loginModeRadio.checked;

  const identifier = document.getElementById('directPhone').value.trim();
  
  let name = '';
  let email = '';
  let preference = 'LEARNING';
  
  if (currentPurchase.slug === 'business-funding') {
    preference = 'FUNDING';
  }

  if (isLoginMode) {
    if (!identifier) {
      return showToast('Missing Field', 'Please enter your phone number or email address.', 'warning');
    }
  } else {
    name = document.getElementById('directName').value.trim();
    email = document.getElementById('directEmail').value.trim();
    if (!name || !identifier || !email) {
      return showToast('Missing Fields', 'Please enter your name, phone number, and email address to continue.', 'warning');
    }

    // Basic email validation
    if (!email.includes('@') || !email.includes('.')) {
      return showToast('Invalid Email', 'Please provide a valid email address.', 'warning');
    }
  }

  // Show Loader
  toggleLoader(true);

  const endpoint = isLoginMode ? `${SUBSCRIPTION_API_BASE_URL}/api/auth/login-v2` : `${SUBSCRIPTION_API_BASE_URL}/api/auth/signup-v2`;
  const body = isLoginMode 
    ? { identifier }
    : { name, phoneNumber: identifier, email, role: 'student', preference };

  try {
    const res = await fetch(endpoint, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(body)
    });

    const data = await res.json();

    if (res.status === 409 || (data.message && data.message.toLowerCase().includes('already registered'))) {
      toggleLoader(false);
      
      // If the conflict is about the email address, just show error and don't change mode
      if (data.message && data.message.toLowerCase().includes('email')) {
        showToast('Registration Error', data.message || 'Email already registered. Please login.', 'error');
        return;
      }

      showToast('Account Exists', 'This phone number is already registered. Switched to Login mode.', 'info');

      // Toggle to Login Mode
      const modalModeLogin = document.getElementById('modal-mode-login');
      if (modalModeLogin) {
        modalModeLogin.checked = true;
        toggleModalAuthMode('LOGIN');
      }

      // Pre-fill the identifier input with the phone number
      const phoneInput = document.getElementById('directPhone');
      if (phoneInput) {
        phoneInput.value = identifier;
      }
      return;
    }

    toggleLoader(false);

    if (data.success) {
      showToast('OTP Sent', data.message || 'OTP sent successfully!', 'success');
      
      const sentMsgEl = document.getElementById('modalOtpSentMsg');
      if (sentMsgEl) {
        sentMsgEl.textContent = isLoginMode 
          ? `OTP has been sent via ${data.data?.channel || 'your channel'}`
          : `OTP has been sent to ${identifier}`;
      }

      // Switch step
      document.getElementById('modalStep1').style.display = 'none';
      document.getElementById('modalStep2').style.display = 'block';

      // Start OTP Timer
      startModalOtpTimer();
    } else {
      showToast('Request Failed', data.message || 'Could not send OTP. Please try again.', 'error');
    }
  } catch (err) {
    toggleLoader(false);
    console.error("Modal send OTP error:", err);
    showToast('Database Error', 'Could not reach the server to send OTP.', 'error');
  }
}

function handleModalResendOTP() {
  handleModalSendOTP();
}

/**
 * Handles verifying OTP and continuing with subscription checkout.
 */
async function handleModalVerifyOTP() {
  const loginModeRadio = document.getElementById('modal-mode-login');
  const isLoginMode = loginModeRadio && loginModeRadio.checked;

  const identifier = document.getElementById('directPhone').value.trim();
  const otp = document.getElementById('directOtp').value.trim();

  if (!otp || otp.length < 6) {
    return showToast('Invalid OTP', 'Please enter the 6-digit code.', 'warning');
  }

  // Show Loader
  toggleLoader(true);

  const endpoint = isLoginMode ? `${SUBSCRIPTION_API_BASE_URL}/api/auth/login-v2/verify-otp` : `${SUBSCRIPTION_API_BASE_URL}/api/auth/signup-v2/verify-otp`;
  const body = isLoginMode 
    ? { identifier, otp }
    : { phoneNumber: identifier, otp };

  try {
    const res = await fetch(endpoint, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(body)
    });

    const data = await res.json();
    
    if (data.success && data.data?.accessToken) {
      clearInterval(modalOtpTimer);
      
      localStorage.setItem('accessToken', data.data.accessToken);
      if (data.data.user) {
        localStorage.setItem('user', JSON.stringify(data.data.user));
      }

      // Hide modal
      const modalEl = document.getElementById('authModal');
      if (modalEl) {
        const modal = bootstrap.Modal.getInstance(modalEl);
        if (modal) modal.hide();
      }

      // Perform checkout or offline redirect
      if (currentPurchase.learningMode === 'OFFLINE') {
        toggleLoader(false);
        redirectToOfflineEnrollment();
      } else {
        proceedToCheckout(data.data.accessToken);
      }
    } else {
      toggleLoader(false);
      showToast('Verification Failed', data.message || 'Invalid or expired OTP.', 'error');
    }
  } catch (err) {
    toggleLoader(false);
    console.error("Modal OTP verification error:", err);
    showToast('Database Error', 'Could not connect to the server to verify OTP.', 'error');
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
  'ai-and-applied-machine-learning': 7,
  'cloud-computing-and-devops-aws-azure-gcp': 5,
  'cyber-security-ai-and-cloud-security': 5,
  // Keep legacy for backward compatibility
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
      const lookup = SUBCATEGORY_CACHE.get(currentPurchase.slug);
      if (lookup && lookup.subcategory && lookup.subcategory.durationMonths) {
        months = lookup.subcategory.durationMonths;
      } else {
        months = COURSE_DURATIONS[currentPurchase.slug] || 4;
      }
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
  localStorage.removeItem('user');
  window.location.reload();
}

/**
 * Programmatically switches to offline mode, closes the modal, and prompts user.
 */
function switchToOfflineAndClose() {
  const modalEl = document.getElementById('onlineFullModal');
  if (modalEl) {
    const modal = bootstrap.Modal.getInstance(modalEl);
    if (modal) modal.hide();
  }

  // Switch UI to Offline Learning
  setLearningMode('offline');

  // Smooth scroll to pricing category tabs to prompt course selection
  const pricingSection = document.getElementById('pricing-1');
  if (pricingSection) {
    pricingSection.scrollIntoView({ behavior: 'smooth' });
  }

  // Show guiding toast
  setTimeout(() => {
    showToast('Mode Switched', 'We have switched you to Offline Learning. Please select your desired course again to proceed.', 'info');
  }, 600);
}
