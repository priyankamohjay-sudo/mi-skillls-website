/**
 * Offline Enrollment Wizard
 * Locations, batches, seats, and payment context are fetched from the backend.
 */

const OFFLINE_API_BASE_URL = window.MI_API_BASE_URL || 'https://dev.miskills.in';

const OFFLINE_COURSE_API_SLUGS = {
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

const COURSE_NAMES = {
  'web-and-app-development-with-ai-tools': 'Web and App Development with AI Tools',
  'ai-and-applied-machine-learning': 'AI & Applied Machine Learning',
  'data-science-and-analytics-with-gen-ai': 'Data Science and Analytics with Gen AI',
  'cloud-computing-and-devops-aws-azure-gcp': 'Cloud Computing & DevOps (AWS / Azure / GCP)',
  'cyber-security-ai-and-cloud-security': 'Cyber Security (AI & Cloud Security)',
  'web-development-with-ai-tools-full-stack-front-end-back-end': 'Web and App Development with AI Tools',
  'ai-applied-machine-learning': 'AI & Applied Machine Learning',
  'artificial-intelligence-and-applied-machine-learning': 'AI & Applied Machine Learning',
  'cloud-computing-devops-aws-azure-gcp': 'Cloud Computing & DevOps (AWS / Azure / GCP)',
  'cloud-computing-and-devops': 'Cloud Computing & DevOps (AWS / Azure / GCP)',
  'cyber-security-ai-cloud-security': 'Cyber Security (AI & Cloud Security)',
  'cybersecurity-ai-and-cloud-security': 'Cyber Security (AI & Cloud Security)',
  'interview-internship-support': 'Career Support',
  'business-funding': 'Business Funding'
};

// List of 5 courses included in each batch
const COURSES_IN_BATCH = [
  'Web and App Development with AI Tools',
  'Artificial Intelligence and Applied Machine Learning',
  'Data Science and Analytics with Gen AI',
  'Cloud Computing and DevOps',
  'Cybersecurity AI and Cloud Security'
];

let BATCHES_DATA = [];

// Local fallback is used only if the backend is unavailable during development.
const FALLBACK_BATCHES_DATA = [
  {
    id: 1,
    number: 1,
    course: 'AI & Applied Machine Learning',
    time: '9:30 AM - 12:00 PM',
    days: 'Monday - Saturday',
    duration: '2.5 hours',
    startDate: '17 Aug 2026',
    totalSeats: 40,
    availableSeats: 35,
    paymentMode: 'both', // both, full-only, monthly-only
    isAvailable: true,
    batchCode: 'AIML-01'
  },
  {
    id: 2,
    number: 2,
    course: 'Data Science And Analytics With Gen AI',
    time: '12:30 PM - 3:00 PM',
    days: 'Monday - Saturday',
    duration: '2.5 hours',
    startDate: '17 Aug 2026',
    totalSeats: 40,
    availableSeats: 28,
    paymentMode: 'full-only',
    isAvailable: true,
    batchCode: 'DSA-02'
  },
  {
    id: 3,
    number: 3,
    course: 'Cloud Computing & DevOps (AWS / Azure / GCP)',
    time: '3:30 PM - 6:00 PM',
    days: 'Monday - Saturday',
    duration: '2.5 hours',
    startDate: '17 Aug 2026',
    totalSeats: 40,
    availableSeats: 32,
    paymentMode: 'both',
    isAvailable: true,
    batchCode: 'DOPS-03'
  },
  {
    id: 4,
    number: 4,
    course: 'Cyber Security (AI & Cloud Security)',
    time: '6:30 PM - 9:00 PM',
    days: 'Monday - Saturday',
    duration: '2.5 hours',
    startDate: '17 Aug 2026',
    totalSeats: 40,
    availableSeats: 25,
    paymentMode: 'full-only',
    isAvailable: true,
    batchCode: 'CSEC-04'
  },
  {
    id: 5,
    number: 5,
    course: 'Web And App Development With AI Tools',
    time: '9:00 AM - 11:30 AM',
    days: 'Monday - Saturday',
    duration: '2.5 hours',
    startDate: '17 Aug 2026',
    totalSeats: 40,
    availableSeats: 38,
    paymentMode: 'both',
    isAvailable: true,
    batchCode: 'WAD-05'
  }
];

const FALLBACK_LOCATIONS = [
  {
    _id: 'dehradun',
    slug: 'dehradun',
    city: 'Dehradun',
    state: 'Uttarakhand',
    image: 'assets/images/locations/Dehradun_Clock_Tower_Night_600x400.webp',
    seatsAvailable: 14,
    centreName: 'MI Skills Dehradun Centre',
    address: 'Rajpur Road, Dehradun - 248001',
    operatingHours: 'Mon - Sat · 8:00 AM - 9:00 PM',
    landmark: 'Clock Tower',
    distance: '2.5',
    lat: 30.3165,
    lng: 78.0322
  },
  {
    _id: 'hyderabad',
    slug: 'hyderabad',
    city: 'Hyderabad',
    state: 'Telangana',
    image: 'assets/images/locations/Hyderabad_Charminar.webp',
    seatsAvailable: 20,
    centreName: 'MI Skills Hyderabad Centre',
    address: 'HITEC City, Hyderabad - 500081',
    operatingHours: 'Mon - Sat · 8:00 AM - 9:00 PM',
    landmark: 'Charminar',
    distance: '12.3',
    lat: 17.4435,
    lng: 78.3772
  },
  {
    _id: 'bengaluru',
    slug: 'bengaluru',
    city: 'Bengaluru',
    state: 'Karnataka',
    image: 'assets/images/locations/Bengaluru_Vidhana_Soudha.webp',
    seatsAvailable: 16,
    centreName: 'MI Skills Bengaluru Centre',
    address: 'Koramangala, Bengaluru - 560034',
    operatingHours: 'Mon - Sat · 8:00 AM - 9:00 PM',
    landmark: 'MG Road Metro Station',
    distance: '4.8',
    lat: 12.9352,
    lng: 77.6245
  },
  {
    _id: 'ludhiana',
    slug: 'ludhiana',
    city: 'Ludhiana',
    state: 'Punjab',
    image: 'assets/images/locations/Ludhiana_War_Memorial.webp',
    seatsAvailable: 18,
    centreName: 'MI Skills Ludhiana Centre',
    address: 'Model Town, Ludhiana - 141002',
    operatingHours: 'Mon - Sat · 8:00 AM - 9:00 PM',
    landmark: 'Ludhiana Junction',
    distance: '3.2',
    lat: 30.9010,
    lng: 75.8573
  }
];

const IMAGE_FALLBACKS = {
  dehradun: 'assets/images/locations/Dehradun_Clock_Tower_Night_600x400.webp',
  hyderabad: 'assets/images/locations/Hyderabad_Charminar.webp',
  bengaluru: 'assets/images/locations/Bengaluru_Vidhana_Soudha.webp',
  ludhiana: 'assets/images/locations/Ludhiana_War_Memorial.webp',
  lucknow: 'https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?w=600&h=400&fit=crop'
};

let selectedLocation = null;
let locationsData = [];
let currentStep = 'location';

const config = window.OFFLINE_ENROLL_CONFIG || {};
const baseUrl = config.baseUrl || '/';

document.addEventListener('DOMContentLoaded', () => initOfflineEnrollment());

function getAuthHeaders() {
  const token = localStorage.getItem('accessToken');
  return token ? { Authorization: `Bearer ${token}` } : {};
}

async function apiRequest(path, options = {}) {
  const headers = {
    ...(options.body ? { 'Content-Type': 'application/json' } : {}),
    ...getAuthHeaders(),
    ...(options.headers || {})
  };

  const response = await fetch(`${OFFLINE_API_BASE_URL}${path}`, { ...options, headers });
  const data = await response.json().catch(() => ({}));

  if (!response.ok || data.success === false) {
    throw new Error(data.message || `Request failed: ${response.status}`);
  }

  return data;
}

function getCourseSlug() {
  return config.courseSlug || getStoredPurchase()?.slug || new URLSearchParams(window.location.search).get('course') || '';
}

async function ensureCourseContext() {
  const stored = getStoredPurchase() || {};
  if (stored.subcategoryId) return stored;

  const slug = getCourseSlug();
  if (!slug) return stored;

  const { subcategory, apiSlug } = await fetchSubcategoryContext(slug);
  if (!subcategory?._id && !subcategory?.id) return stored;

  const updated = {
    ...stored,
    slug,
    apiSlug,
    subcategoryId: subcategory._id || subcategory.id,
    courseName: subcategory.name || subcategory.title || COURSE_NAMES[slug] || slug,
    subscriptionMode: stored.subscriptionMode || config.subscriptionMode || 'TOTAL',
    learningMode: 'OFFLINE'
  };
  sessionStorage.setItem('offlinePurchase', JSON.stringify(updated));
  return updated;
}

async function fetchSubcategoryContext(slug) {
  const slugsToTry = OFFLINE_COURSE_API_SLUGS[slug] || [slug];
  let lastError = null;

  for (const apiSlug of slugsToTry) {
    try {
      const data = await apiRequest(`/api/subcategories/slug/${encodeURIComponent(apiSlug)}`);
      const subcategory = data.subcategory || data.data || data.result;
      if (subcategory?._id || subcategory?.id) {
        return { subcategory, apiSlug };
      }
      lastError = new Error(data.message || `Course not found for slug: ${apiSlug}`);
    } catch (err) {
      lastError = err;
    }
  }

  throw lastError || new Error('Course information is unavailable.');
}

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

function notifyUser(title, message, type = 'info') {
  showToast(title, message, type);
}

async function initOfflineEnrollment() {
  currentStep = config.currentStep || 'location';
  updateCourseSubtitle();
  updateStepper(currentStep);
  showStepPanel(currentStep);
  updateContinueButton();

  document.getElementById('btnContinueBatch')?.addEventListener('click', handleContinue);
  document.getElementById('btnBackStep')?.addEventListener('click', handleBackStep);
  document.getElementById('retryLocationsBtn')?.addEventListener('click', fetchLocations);

  try {
    await ensureCourseContext();
  } catch (err) {
    console.error('Course lookup failed:', err);
  }

  restoreSelectionsFromStorage();

  if (currentStep === 'location') {
    await fetchLocations();
    restoreSelectedLocation();
  } else if (currentStep === 'batch') {
    await fetchBatches();
    restoreSelectedBatch();
  } else if (currentStep === 'seat') {
    await fetchSeatData();
    renderSeatLayout();
    restoreSelectedSeat();
  } else if (currentStep === 'review') {
    renderReviewSummary();
    updateReviewContinueButton();
  }
}

function restoreSelectionsFromStorage() {
  const stored = getStoredPurchase() || {};
  selectedLocation = stored.location || selectedLocation;
  selectedBatch = stored.batch || selectedBatch;
  selectedSeat = stored.seat || selectedSeat;
}

function restoreSelectedLocation() {
  const params = new URLSearchParams(window.location.search);
  const locationParam = params.get('location');

  // Only restore selection if there's a location parameter in the URL
  // This ensures the button stays disabled until user clicks a location card
  if (locationParam && locationsData.length > 0) {
    const match = locationsData.find(
      l => l.slug === locationParam || String(l._id) === locationParam
    );
    if (match) {
      selectedLocation = match;
      const card = document.querySelector(`[data-location-id="${match._id}"]`);
      if (card) card.classList.add('selected');
    }
  }

  updateContinueButton();
}

function updateCourseSubtitle() {
  const subtitle = document.getElementById('courseSubtitle');
  if (!subtitle) return;

  const stored = getStoredPurchase() || {};
  const slug = getCourseSlug();
  const courseName = stored.courseName || COURSE_NAMES[slug] || slug || 'Your selected course';
  subtitle.textContent = courseName;
}

/**
 * Fetch locations from API.
 * Expected API: GET /api/subcategories/:subcategoryId/locations
 */
async function fetchLocations() {
  const grid = document.getElementById('locationsGrid');
  const loading = document.getElementById('locationsLoading');
  const errorEl = document.getElementById('locationsError');

  if (!grid) return;

  loading.style.display = 'flex';
  errorEl.style.display = 'none';
  grid.innerHTML = '';

  const purchase = await ensureCourseContext();
  const subcategoryId = purchase?.subcategoryId;

  if (!subcategoryId) {
    loading.style.display = 'none';
    errorEl.style.display = 'flex';
    return [];
  }

  try {
    const data = await apiRequest(`/api/subcategories/${encodeURIComponent(subcategoryId)}/locations`);
    const locations = data.locations || data.data || data.result || data.subcategory?.locations || [];
    locationsData = normalizeLocations(Array.isArray(locations) ? locations : []);
  } catch (err) {
    console.error('Locations API unavailable:', err);
    locationsData = [];
  }

  loading.style.display = 'none';

  if (locationsData.length === 0) {
    errorEl.style.display = 'flex';
    return;
  }

  renderLocationCards(locationsData);
  return locationsData;
}

function normalizeLocations(locations) {
  return locations.map(loc => ({
    _id: loc._id || loc.id || loc.slug,
    slug: loc.slug || (loc.city || '').toLowerCase(),
    city: loc.city || loc.name,
    state: loc.state || '',
    image: loc.image || loc.imageUrl || `assets/images/locations/${(loc.slug || 'default')}.jpg`,
    seatsAvailable: loc.seatsAvailable ?? loc.seatsLeft ?? 0,
    centreName: loc.centreName || loc.name || `MI Skills ${loc.city} Centre`,
    address: loc.address || '',
    operatingHours: loc.operatingHours || loc.hours || 'Mon - Sat · 8:00 AM - 9:00 PM'
  }));
}

function normalizeLocationItem(loc) {
  return {
    _id: loc._id || loc.id || loc.locationId || loc.slug,
    slug: loc.slug || (loc.city || loc.name || '').toLowerCase().replace(/\s+/g, '-'),
    city: loc.city || loc.name || loc.centreName || 'MI Skills Centre',
    state: loc.state || '',
    image: loc.image || loc.imageUrl || loc.photo || loc.thumbnail || `assets/images/locations/${(loc.slug || 'default')}.jpg`,
    seatsAvailable: loc.seatsAvailable ?? loc.seatsLeft ?? loc.availableSeats ?? 0,
    centreName: loc.centreName || loc.name || `MI Skills ${loc.city || loc.name || ''} Centre`,
    address: loc.address || '',
    operatingHours: loc.operatingHours || loc.hours || 'Mon - Sat - 8:00 AM - 9:00 PM',
    landmark: loc.landmark || '',
    distance: loc.distance || '',
    lat: loc.lat || loc.latitude,
    lng: loc.lng || loc.longitude,
    status: loc.status || 'available' // available, upcoming
  };
}

normalizeLocations = function(locations) {
  return locations.map(normalizeLocationItem);
};

function renderLocationCards(locations) {
  const grid = document.getElementById('locationsGrid');
  if (!grid) return;

  grid.innerHTML = locations.map(loc => {
    const slug = loc.slug || loc._id;
    const imgSrc = loc.image.startsWith('http') ? loc.image : `${baseUrl}${loc.image}`;
    const fallback = IMAGE_FALLBACKS[slug] || imgSrc;
    const distanceText = loc.distance ? `${loc.distance} km from ${loc.landmark}` : '';
    const isUpcoming = String(loc.status).toLowerCase() === 'upcoming';
    const cardClass = isUpcoming ? 'offline-location-card upcoming' : 'offline-location-card';

    return `
      <div class="col-12 col-md-6 col-lg-4">
        <div class="${cardClass}"
             data-location-id="${loc._id}"
             data-slug="${slug}"
             data-status="${loc.status}"
             role="button"
             tabindex="${isUpcoming ? '-1' : '0'}"
             aria-label="Select ${loc.city}">
          <div class="offline-location-card__image">
            <img src="${imgSrc}" alt="${loc.city} - ${loc.state}"
                 loading="lazy"
                 onerror="this.src='${fallback}'">
            ${isUpcoming ? '<span class="offline-location-card__upcoming-label">Coming Soon</span>' : '<span class="offline-location-card__check"><i class="bi bi-check-lg"></i></span>'}
          </div>
          <div class="offline-location-card__body">
            <h4 class="offline-location-card__city">${loc.city}</h4>
            <p class="offline-location-card__state">${loc.state}</p>
            ${distanceText ? `<p class="offline-location-card__distance">
              <i class="bi bi-geo-alt"></i> ${distanceText}
            </p>` : ''}
            ${isUpcoming ? `
              <span class="offline-location-card__seats upcoming">
                <i class="bi bi-clock"></i> Opening Soon
              </span>
            ` : `
              <span class="offline-location-card__seats">
                <i class="bi bi-circle-fill"></i> ${loc.seatsAvailable} seats left
              </span>
            `}
          </div>
        </div>
      </div>
    `;
  }).join('');

  grid.querySelectorAll('.offline-location-card').forEach(card => {
    if (card.dataset.status !== 'upcoming') {
      card.addEventListener('click', () => selectLocation(card));
      card.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          selectLocation(card);
        }
      });
    }
  });
}

function selectLocation(card) {
  document.querySelectorAll('.offline-location-card').forEach(c => c.classList.remove('selected'));
  card.classList.add('selected');

  const locationId = card.dataset.locationId;
  selectedLocation = locationsData.find(l => String(l._id) === String(locationId));

  if (selectedLocation) {
    updateGoogleMap(selectedLocation);
    saveSelection({ locationId: selectedLocation._id, location: selectedLocation });
  }

  updateContinueButton();
}

/**
 * Display a Google Map for the selected location.
 */
function updateGoogleMap(loc) {
  const mapContainer = document.getElementById('locationMapContainer');
  if (!mapContainer) return;

  mapContainer.style.display = 'block';

  const searchQuery = encodeURIComponent(`${loc.centreName || loc.city}, ${loc.address || loc.state}`);
  const standardEmbedSrc = `https://maps.google.com/maps?q=${searchQuery}&t=&z=14&ie=UTF8&iwloc=&output=embed`;

  mapContainer.innerHTML = `
    <div class="location-map-wrapper">
      <h5 class="map-title text-white mb-3">
        <i class="bi bi-geo-alt-fill me-2 text-danger"></i>${loc.city} - Centre Location
      </h5>
      <div class="location-map-frame" style="border: 2px solid rgba(255,255,255,0.1); border-radius: 15px; overflow: hidden; background: #1a1a1a;">
        <iframe 
          width="100%" 
          height="350" 
          style="border:0; filter: invert(90%) hue-rotate(180deg) brightness(0.9);" 
          src="${standardEmbedSrc}" 
          allowfullscreen 
          loading="lazy">
        </iframe>
      </div>
      <div class="mt-3 text-center">
        <p class="text-white small mb-1"><strong>Address:</strong> ${loc.address || loc.centreName}</p>
        <p class="text-white-50 small"><i class="bi bi-clock me-1"></i> ${loc.operatingHours}</p>
      </div>
    </div>
  `;

  // Scroll to map smoothly
  setTimeout(() => {
    mapContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }, 300);
}

function updateContinueButton() {
  const btn = document.getElementById('btnContinueBatch');
  if (!btn) return;

  const labels = {
    location: 'Continue <i class="bi bi-arrow-right ms-2"></i> Choose Batch',
    batch: 'Continue <i class="bi bi-arrow-right ms-2"></i> Choose Seat',
    seat: 'Confirm Seat <i class="bi bi-arrow-right ms-2"></i> Review & Pay',
    review: 'Proceed to Payment <i class="bi bi-arrow-right ms-2"></i>'
  };

  btn.innerHTML = labels[currentStep] || labels.location;

  const canContinue = currentStep === 'location' ? !!selectedLocation : false;
  btn.disabled = !canContinue;
  btn.classList.toggle('enabled', canContinue);
  updateBackButton();
}

function handleContinue() {
  if (currentStep === 'location' && !selectedLocation) return;

  const steps = ['location', 'batch', 'seat', 'review'];
  const currentIndex = steps.indexOf(currentStep);

  if (currentIndex < steps.length - 1) {
    const nextStep = steps[currentIndex + 1];
    navigateToStep(nextStep);
  } else {
    proceedToPayment();
  }
}

function navigateToStep(step) {
  const params = new URLSearchParams(window.location.search);
  params.set('step', step);
  if (selectedLocation) params.set('location', selectedLocation.slug || selectedLocation._id);
  window.location.href = `${baseUrl}offline-enrollment?${params}`;
}

function showStepPanel(step) {
  document.querySelectorAll('.enroll-step-panel').forEach(panel => {
    panel.classList.toggle('active', panel.dataset.step === step);
  });
}

function updateStepper(step) {
  const steps = ['location', 'batch', 'seat', 'review'];
  const activeIndex = steps.indexOf(step);

  document.querySelectorAll('.offline-step').forEach((el, i) => {
    el.classList.remove('active', 'completed');
    if (i < activeIndex) el.classList.add('completed');
    if (i === activeIndex) el.classList.add('active');
  });
}

function updateBackButton() {
  const btn = document.getElementById('btnBackStep');
  if (!btn) return;
  btn.style.display = currentStep === 'location' ? 'none' : 'inline-flex';
}

function handleBackStep() {
  const steps = ['location', 'batch', 'seat', 'review'];
  const currentIndex = steps.indexOf(currentStep);
  if (currentIndex <= 0) return;

  const previousStep = steps[currentIndex - 1];
  const params = new URLSearchParams(window.location.search);
  params.set('step', previousStep);

  if (previousStep === 'location') {
    params.delete('batch');
    params.delete('seat');
  } else if (previousStep === 'batch') {
    params.delete('seat');
  }

  window.location.href = `${baseUrl}offline-enrollment?${params}`;
}

function getStoredPurchase() {
  try {
    return JSON.parse(sessionStorage.getItem('offlinePurchase') || 'null');
  } catch {
    return null;
  }
}

function saveSelection(extra) {
  const existing = getStoredPurchase() || {};
  sessionStorage.setItem('offlinePurchase', JSON.stringify({ ...existing, ...extra }));
}

function proceedToPayment() {
  const purchase = getStoredPurchase();
  const token = localStorage.getItem('accessToken');

  if (!token) {
    window.location.href = `${baseUrl}subscription`;
    return;
  }

  // Show loader before calling payment logic
  if (typeof toggleLoader === 'function') {
    toggleLoader(true);
  }

  if (typeof proceedToCheckout === 'function' && purchase) {
    if (typeof currentPurchase !== 'undefined') {
      currentPurchase.locationId = purchase.locationId;
      currentPurchase.batchId = purchase.batchId;
      currentPurchase.seatNumber = purchase.seatId || purchase.seat?.id;
      currentPurchase.slug = purchase.slug || config.courseSlug;
      currentPurchase.apiSlug = purchase.apiSlug;
      currentPurchase.subcategoryId = purchase.subcategoryId;
      currentPurchase.courseName = purchase.courseName;
      currentPurchase.subscriptionMode = purchase.subscriptionMode || config.subscriptionMode;
      currentPurchase.paymentMode = purchase.paymentMode;
      currentPurchase.learningMode = 'OFFLINE';
    }
    proceedToCheckout(token);
  } else {
    window.location.href = `${baseUrl}subscription`;
  }
}

// ==================== SEAT DATA ====================

const SEAT_LAYOUT = {
  rows: ['A', 'B', 'C', 'D', 'E'],
  columns: [1, 2, 3, 4, 5, 6, 7, 8],
  deskPairs: [[1, 2], [3, 4], [5, 6], [7, 8]],
  deskSegments: [['A', 'B'], ['C', 'D', 'E']],
  takenByBatch: {
    1: ['A4', 'B2', 'B5', 'C6', 'D1', 'E7'],
    2: ['A1', 'A5', 'B3', 'C4', 'D7', 'E2', 'E8'],
    3: ['A6', 'B1', 'B8', 'C3', 'D5', 'E2'],
    4: ['A2', 'C1', 'C7', 'D4', 'E5'],
    5: ['A7', 'B4', 'C5', 'D2', 'E8', 'E3']
  }
};

function generateSeats(apiSeats = []) {
  const seats = [];

  SEAT_LAYOUT.rows.forEach(row => {
    SEAT_LAYOUT.columns.forEach(column => {
      const seatNumber = `${row}${column}`;
      const apiSeat = apiSeats.find(item => {
        const apiSeatNumber = item.seatNumber || item.seatId || item.seatNo || item.seat || item.number || item.name || item.id;
        return String(apiSeatNumber).toUpperCase() === seatNumber;
      });
      const section = column <= 4 ? 'Left Section' : 'Right Section';
      const apiStatus = String(apiSeat?.status || '').toLowerCase();
      const isTakenFromApi = apiSeat
        ? apiSeat.isAvailable === false || ['taken', 'booked', 'blocked', 'locked', 'reserved', 'unavailable'].includes(apiStatus)
        : false;
      const isTaken = apiSeat ? isTakenFromApi : false;

      seats.push({
        id: seatNumber,
        row,
        number: column,
        section: apiSeat?.section || section,
        type: apiSeat?.type || `Row ${row} - ${section}`,
        price: Number(apiSeat?.price || 0),
        isAvailable: !isTaken,
        isBooked: isTaken,
        isBlocked: false
      });
    });
  });
  return seats;
}

let SEATS_DATA = [];

async function fetchSeatData() {
  const grid = document.getElementById('seatsGrid');
  restoreSelectionsFromStorage();
  const purchase = getStoredPurchase() || {};
  const batchId = purchase.batchId || selectedBatch?.id || new URLSearchParams(window.location.search).get('batch');

  if (grid) {
    grid.innerHTML = `
      <div class="locations-loading" style="display:flex;">
        <div class="enroll-spinner-sm"></div>
        <p>Loading seats...</p>
      </div>
    `;
  }

  if (!batchId) {
    SEATS_DATA = [];
    return [];
  }

  try {
    const data = await apiRequest(`/api/batches/${encodeURIComponent(batchId)}/seats`);
    const seats = data.seats || data.data || data.result || [];
    SEATS_DATA = generateSeats(Array.isArray(seats) ? seats : []);
  } catch (err) {
    console.error('Seats API unavailable:', err);
    SEATS_DATA = [];
  }

  return SEATS_DATA;
}

// ==================== BATCH SELECTION FUNCTIONS ====================

let selectedBatch = null;

/**
 * Fetch offline batches for the selected course and location.
 * Expected API: GET /api/batches/offline/:subcategoryId/:locationId
 */
async function fetchBatches() {
  const grid = document.getElementById('batchesGrid');
  if (!grid) return [];

  const purchase = await ensureCourseContext();
  restoreSelectionsFromStorage();
  const locationId = purchase?.locationId || selectedLocation?._id;

  grid.innerHTML = `
    <div class="locations-loading" style="display:flex;">
      <div class="enroll-spinner-sm"></div>
      <p>Loading available batches...</p>
    </div>
  `;

  if (!purchase?.subcategoryId || !locationId) {
    BATCHES_DATA = [];
    grid.innerHTML = '<div class="locations-error" style="display:flex;"><p>Please select a location first.</p></div>';
    return [];
  }

  try {
    const data = await apiRequest(
      `/api/batches/offline/${encodeURIComponent(purchase.subcategoryId)}/${encodeURIComponent(locationId)}`
    );
    const batches = data.batches || data.data || data.result || [];
    BATCHES_DATA = normalizeBatches(Array.isArray(batches) ? batches : [], purchase);
  } catch (err) {
    console.error('Batches API unavailable, falling back to mock data:', err);
    BATCHES_DATA = normalizeBatches(FALLBACK_BATCHES_DATA, purchase);
  }

  if (!BATCHES_DATA.length) {
    grid.innerHTML = '<div class="locations-error" style="display:flex;"><p>No offline batches are available for this course and location yet.</p></div>';
    return [];
  }

  renderBatchCards();
  return BATCHES_DATA;
}

function normalizeBatches(batches, purchase = {}) {
  const courseName = purchase.courseName || COURSE_NAMES[purchase.slug] || COURSE_NAMES[getCourseSlug()] || 'Selected Course';

  return batches.map((batch, index) => {
    const id = batch._id || batch.id || batch.batchId;
    const startTime = batch.startTime || batch.fromTime || '';
    const endTime = batch.endTime || batch.toTime || '';
    const time = batch.time || batch.batchTime || ([startTime, endTime].filter(Boolean).join(' - '));
    const days = Array.isArray(batch.days) ? batch.days.join(', ') : (batch.days || batch.weekDays || batch.scheduleDays || 'Monday - Saturday');
    const rawMode = String(batch.paymentMode || batch.subscriptionMode || '').toLowerCase();
    
    const batchNum = batch.number || batch.batchNumber || (index + 1);
    const isFullOnly = batch.monthlyAllowed === false || 
                       batch.isMonthlyAvailable === false || 
                       rawMode.includes('full') || 
                       String(batchNum) === '2' || 
                       String(batchNum) === '4';

    return {
      id,
      number: batchNum,
      course: batch.name || batch.courseName || batch.course || courseName,
      time: time || 'Time will be announced',
      days,
      duration: batch.duration || batch.classDuration || '2.5 hours',
      startDate: formatDisplayDate(batch.startDate || batch.startsAt || batch.start_date),
      totalSeats: batch.totalSeats ?? batch.capacity ?? batch.seats ?? 40,
      availableSeats: batch.availableSeats ?? batch.seatsAvailable ?? batch.availableSeatCount ?? 0,
      paymentMode: isFullOnly ? 'full-only' : 'both',
      isAvailable: batch.isAvailable !== false && batch.status !== 'inactive' && batch.status !== 'closed',
      batchCode: batch.batchCode || batch.code || '',
      raw: batch
    };
  });
}

function formatDisplayDate(value) {
  if (!value) return 'TBA';
  const date = new Date(value);
  if (Number.isNaN(date.getTime())) return String(value);
  return date.toLocaleDateString('en-IN', { day: '2-digit', month: 'short', year: 'numeric' });
}

/**
 * Render batch cards with API data
 */
function renderBatchCards() {
  const grid = document.getElementById('batchesGrid');
  if (!grid) return;

  grid.innerHTML = BATCHES_DATA.map(batch => {
    const isFullOnly = batch.paymentMode === 'full-only';
    const unavailableClass = !batch.isAvailable ? ' unavailable' : '';

    return `
      <div class="batch-card${unavailableClass}" 
           data-batch-id="${batch.id}" 
           data-payment-mode="${batch.paymentMode}"
           role="button" 
           tabindex="0"
           aria-label="Select Batch ${batch.number}">
        <div class="batch-card__number">${batch.number}</div>
        <div class="batch-card__content">
          <div class="batch-card__headline">
            <h4 class="batch-card__title">${batch.time}</h4>
            <div class="batch-card__seats">
              <span>${batch.availableSeats} seats left</span>
            </div>
          </div>
          <p class="batch-card__course">${batch.course}</p>
          <div class="batch-card__supporting">
            <span><i class="bi bi-calendar3"></i>${batch.days}</span>
            <span><i class="bi bi-calendar-event"></i>Starts ${batch.startDate}</span>
            ${batch.batchCode ? `<span class="batch-card__code"><i class="bi bi-hash"></i>${batch.batchCode}</span>` : ''}
          </div>
        </div>
        <div class="batch-card__aside">
          <div class="batch-card__total">
            <span>Total Seats:</span>
            <strong>${batch.totalSeats}</strong>
          </div>
          <span class="batch-card__payment ${isFullOnly ? 'full-only' : ''}">${isFullOnly ? 'Full Payment Only' : 'Flexible Payment'}</span>
        </div>
        <div class="batch-card__radio" aria-hidden="true"></div>
      </div>
    `;
  }).join('');

  // Add click handlers
  grid.querySelectorAll('.batch-card').forEach(card => {
    card.addEventListener('click', () => selectBatch(card));
    card.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        selectBatch(card);
      }
    });
  });
}

/**
 * Handle batch selection
 */
function selectBatch(card) {
  if (card.classList.contains('unavailable')) return;

  // Remove selection from all cards
  document.querySelectorAll('.batch-card').forEach(c => c.classList.remove('selected'));
  
  // Add selection to clicked card
  card.classList.add('selected');

  const batchId = card.dataset.batchId;
  selectedBatch = BATCHES_DATA.find(b => String(b.id) === String(batchId));

  if (selectedBatch) {
    const purchase = getStoredPurchase() || {};
    const originalMode = new URLSearchParams(window.location.search).get('mode') || config.subscriptionMode || 'TOTAL';
    let targetMode = purchase.subscriptionMode || originalMode;

    if (selectedBatch.paymentMode === 'full-only') {
      if (targetMode !== 'TOTAL') {
        targetMode = 'TOTAL';
        notifyUser('Payment Mode Updated', 'This batch only supports Full Course Payment. Your selection has been updated to Full Payment.', 'warning');
      }
    } else {
      // Revert to original preference if it was different
      if (targetMode !== originalMode) {
        targetMode = originalMode;
        if (originalMode === 'MONTHLY') {
          notifyUser('Payment Mode Restored', 'Flexible payment is available for this batch. Restored to Monthly payment.', 'info');
        }
      }
    }

    // Save selection
    saveSelection({ 
      batchId: selectedBatch.id, 
      batch: selectedBatch,
      paymentMode: selectedBatch.paymentMode,
      subscriptionMode: targetMode
    });

    // Show/hide payment note based on batch
    const paymentNote = document.getElementById('batchPaymentNote');
    if (paymentNote) {
      paymentNote.style.display = selectedBatch.paymentMode === 'full-only' ? 'flex' : 'none';
    }
  }

  updateBatchContinueButton();
}

/**
 * Restore selected batch from URL or storage
 */
function restoreSelectedBatch() {
  const params = new URLSearchParams(window.location.search);
  const batchParam = params.get('batch');

  if (batchParam && BATCHES_DATA.length > 0) {
    const match = BATCHES_DATA.find(b => String(b.id) === String(batchParam));
    if (match) {
      selectedBatch = match;
      const card = document.querySelector(`[data-batch-id="${match.id}"]`);
      if (card) card.classList.add('selected');

      // Show payment note if needed
      const paymentNote = document.getElementById('batchPaymentNote');
      if (paymentNote && match.paymentMode === 'full-only') {
        paymentNote.style.display = 'flex';
      }

      // Sync subscription mode
      const purchase = getStoredPurchase() || {};
      const originalMode = params.get('mode') || config.subscriptionMode || 'TOTAL';
      let targetMode = purchase.subscriptionMode || originalMode;

      if (match.paymentMode === 'full-only') {
        targetMode = 'TOTAL';
      } else {
        targetMode = originalMode;
      }

      if (purchase.subscriptionMode !== targetMode) {
        saveSelection({ subscriptionMode: targetMode });
      }
    }
  }

  updateBatchContinueButton();
}

/**
 * Update continue button state for batch step
 */
function updateBatchContinueButton() {
  const btn = document.getElementById('btnContinueBatch');
  if (!btn) return;

  const canContinue = currentStep === 'batch' ? !!selectedBatch : false;
  btn.disabled = !canContinue;
  btn.classList.toggle('enabled', canContinue);
  updateBackButton();
}

// Override updateContinueButton for batch step
const originalUpdateContinueButton = updateContinueButton;
updateContinueButton = function() {
  if (currentStep === 'batch') {
    updateBatchContinueButton();
  } else {
    originalUpdateContinueButton();
  }
};

// Override handleContinue for batch step
const originalHandleContinue = handleContinue;
handleContinue = function() {
  if (currentStep === 'batch' && !selectedBatch) return;

  const steps = ['location', 'batch', 'seat', 'review'];
  const currentIndex = steps.indexOf(currentStep);

  if (currentIndex < steps.length - 1) {
    const nextStep = steps[currentIndex + 1];
    const params = new URLSearchParams(window.location.search);
    params.set('step', nextStep);
    if (selectedLocation) params.set('location', selectedLocation.slug || selectedLocation._id);
    if (selectedBatch) params.set('batch', selectedBatch.id);
    window.location.href = `${baseUrl}offline-enrollment?${params}`;
  } else {
    proceedToPayment();
  }
};

// ==================== SEAT SELECTION FUNCTIONS ====================

let selectedSeat = null;

function renderSeatLayout() {
  const grid = document.getElementById('seatsGrid');
  if (!grid) return;

  if (!SEATS_DATA.length) {
    grid.innerHTML = '<div class="locations-error" style="display:flex;"><p>No seats are available for this batch yet.</p></div>';
    updateSeatSummaryCard();
    updateSeatContinueButton();
    return;
  }

  grid.innerHTML = SEAT_LAYOUT.deskPairs.map((pair, index) => {
    const [leftColumn, rightColumn] = pair;
    return `
      <div class="desk-pod" data-desk="${index + 1}">
        ${SEAT_LAYOUT.deskSegments.map(rows => `
          <div class="desk-segment desk-segment--${rows.length}">
            <div class="seat-stack seat-stack-left">${renderSeatColumn(leftColumn, 'right', rows)}</div>
            <div class="table-desk" aria-hidden="true"></div>
            <div class="seat-stack seat-stack-right">${renderSeatColumn(rightColumn, 'left', rows)}</div>
          </div>
        `).join('')}
      </div>
    `;
  }).join('');

  grid.querySelectorAll('.seat.available').forEach(seatEl => {
    seatEl.addEventListener('click', () => selectSeat(seatEl));
    seatEl.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        selectSeat(seatEl);
      }
    });
  });

  document.getElementById('clearSeatBtn')?.addEventListener('click', clearSeatSelection);
  updateSeatSummaryCard();
}

function renderSeatColumn(column, facing, rows = SEAT_LAYOUT.rows) {
  return rows.map(row => {
    const seat = SEATS_DATA.find(item => item.id === `${row}${column}`);
    if (!seat) return '<span class="seat-spacer" aria-hidden="true"></span>';

    const statusClass = seat.isBooked ? 'booked' : 'available';
    const selectedClass = selectedSeat?.id === seat.id ? 'selected' : '';
    const facingClass = facing === 'left' ? 'seat-face-left' : 'seat-face-right';

    return `
      <button class="seat ${statusClass} ${selectedClass} ${facingClass}"
              type="button"
              data-seat-id="${seat.id}"
              data-seat-row="${seat.row}"
              data-seat-number="${seat.number}"
              data-seat-type="${seat.type}"
              data-seat-price="${seat.price}"
              data-is-booked="${seat.isBooked}"
              aria-label="Seat ${seat.id} - ${seat.isAvailable ? 'Available' : 'Taken'}">
        <span class="seat-back" aria-hidden="true"></span>
        <span class="seat-label">${seat.id}</span>
      </button>
    `;
  }).join('');
}

function getBatchIdFromState() {
  const params = new URLSearchParams(window.location.search);
  const stored = getStoredPurchase();
  return params.get('batch') || stored?.batchId || stored?.batch?.id || '';
}

/**
 * Handle seat selection
 */
function selectSeat(seatEl) {
  if (seatEl.dataset.isBooked === 'true') {
    showToast('Seat Taken', `Seat ${seatEl.dataset.seatId} is already booked. Please select an available seat.`, 'warning');
    return;
  }

  document.querySelectorAll('.seat').forEach(s => s.classList.remove('selected'));
  seatEl.classList.add('selected');

  const seatId = seatEl.dataset.seatId;
  selectedSeat = SEATS_DATA.find(s => s.id === seatId);

  if (selectedSeat) {
    saveSelection({ 
      seatId: selectedSeat.id, 
      seat: selectedSeat 
    });

    updateSeatSummaryCard();
  }

  updateSeatContinueButton();
}

/**
 * Clear seat selection
 */
function clearSeatSelection() {
  selectedSeat = null;
  document.querySelectorAll('.seat').forEach(s => s.classList.remove('selected'));
  const existing = getStoredPurchase() || {};
  delete existing.seatId;
  delete existing.seat;
  sessionStorage.setItem('offlinePurchase', JSON.stringify(existing));
  updateSeatSummaryCard();
  updateSeatContinueButton();
}

/**
 * Update seat summary card
 */
function updateSeatSummaryCard() {
  const purchase = getStoredPurchase() || {};
  const batch = selectedBatch || purchase.batch || BATCHES_DATA.find(b => String(b.id) === String(getBatchIdFromState()));
  const location = selectedLocation || purchase.location;
  const empty = document.getElementById('seatSelectionEmpty');
  const details = document.getElementById('seatSelectionDetails');

  const setText = (id, value) => {
    const el = document.getElementById(id);
    if (el) el.textContent = value || '-';
  };

  setText('seatSummaryLocation', location?.city || location?.centreName || '-');
  setText('seatSummaryBatch', batch ? `Batch ${batch.number}` : '-');
  setText('seatSummaryStart', batch?.startDate || '-');
  setText('seatSummaryTime', batch?.time || '-');
  setText('seatSummaryDays', batch?.days || '-');

  const batchCodeRow = document.getElementById('seatSummaryBatchCodeRow');
  if (batchCodeRow) {
    if (batch && batch.batchCode) {
      batchCodeRow.style.display = 'flex';
      setText('seatSummaryBatchCode', batch.batchCode);
    } else {
      batchCodeRow.style.display = 'none';
    }
  }

  if (!selectedSeat) {
    if (empty) empty.style.display = 'block';
    if (details) details.style.display = 'none';
    return;
  }

  if (empty) empty.style.display = 'none';
  if (details) details.style.display = 'block';
  setText('selectedSeatNumber', selectedSeat.id);
  setText('selectedSeatRow', `Row ${selectedSeat.row} - ${selectedSeat.section}`);
  setText('selectedSeatType', `${selectedSeat.id} (Row ${selectedSeat.row})`);
}

/**
 * Update continue button state for seat step
 */
function updateSeatContinueButton() {
  const btn = document.getElementById('btnContinueBatch');
  if (!btn) return;

  const canContinue = currentStep === 'seat' ? !!selectedSeat : false;
  btn.disabled = !canContinue;
  btn.classList.toggle('enabled', canContinue);
  updateBackButton();
}

// Keep the DOMContentLoaded handler pointed at one complete API-driven init path.
initOfflineEnrollment = async function() {
  currentStep = config.currentStep || 'location';
  updateCourseSubtitle();
  updateStepper(currentStep);
  showStepPanel(currentStep);
  updateContinueButton();

  document.getElementById('btnContinueBatch')?.addEventListener('click', handleContinue);
  document.getElementById('btnBackStep')?.addEventListener('click', handleBackStep);
  document.getElementById('retryLocationsBtn')?.addEventListener('click', fetchLocations);

  try {
    await ensureCourseContext();
  } catch (err) {
    console.error('Course lookup failed:', err);
    notifyUser('Course Error', err.message || 'Course information is unavailable.', 'error');
  }

  restoreSelectionsFromStorage();

  if (currentStep === 'location') {
    await fetchLocations();
    restoreSelectedLocation();
  } else if (currentStep === 'batch') {
    await fetchBatches();
    restoreSelectedBatch();
  } else if (currentStep === 'seat') {
    await fetchBatches();
    restoreSelectedBatch();
    await fetchSeatData();
    renderSeatLayout();
    restoreSelectedSeat();
  } else if (currentStep === 'review') {
    await fetchBatches();
    restoreSelectedBatch();
    await fetchSeatData();
    restoreSelectedSeat();
    renderReviewSummary();
    updateReviewContinueButton();
  }
};

/**
 * Restore selected seat from URL or storage
 */
function restoreSelectedSeat() {
  const params = new URLSearchParams(window.location.search);
  const stored = getStoredPurchase();
  const seatParam = params.get('seat') || stored?.seatId || stored?.seat?.id;

  if (seatParam && SEATS_DATA.length > 0) {
    const match = SEATS_DATA.find(s => s.id === seatParam);
    if (match && match.isAvailable) {
      selectedSeat = match;
      const seatEl = document.querySelector(`[data-seat-id="${match.id}"]`);
      if (seatEl) seatEl.classList.add('selected');
      
      updateSeatSummaryCard();
      document.getElementById('selectedSeatCard').style.display = 'block';
    }
  }

  updateSeatContinueButton();
}

async function lockSelectedSeat() {
  const purchase = getStoredPurchase() || {};
  const batchId = purchase.batchId || selectedBatch?.id;
  const seatId = selectedSeat?.id || purchase.seatId || purchase.seat?.id;

  if (!batchId || !seatId) return false;

  try {
    await apiRequest('/api/batches/lock-seat', {
      method: 'POST',
      body: JSON.stringify({ batchId, seatId })
    });
    saveSelection({ lockedSeatId: seatId, lockedAt: new Date().toISOString() });
    return true;
  } catch (err) {
    console.error('Seat lock failed:', err);
    notifyUser('Seat Lock Failed', err.message || 'This seat could not be locked. Please choose another seat.', 'error');
    await fetchSeatData();
    renderSeatLayout();
    return false;
  }
}

const FALLBACK_PRICES = {
  'web-and-app-development-with-ai-tools': { TOTAL: 39592, MONTHLY: 8999 },
  'ai-and-applied-machine-learning': { TOTAL: 62993, MONTHLY: 10493 },
  'cloud-computing-and-devops-aws-azure-gcp': { TOTAL: 44995, MONTHLY: 8495 },
  'data-science-and-analytics-with-gen-ai': { TOTAL: 98993, MONTHLY: 14289 },
  'cyber-security-ai-and-cloud-security': { TOTAL: 44995, MONTHLY: 6495 }
};

function getNestedValue(obj, paths) {
  for (const path of paths) {
    const parts = path.split('.');
    let current = obj;
    for (const part of parts) {
      if (current === null || current === undefined) {
        current = undefined;
        break;
      }
      current = current[part];
    }
    if (current !== undefined) return current;
  }
  return undefined;
}

function getCoursePrice(subcategory, mode, learningMode) {
  if (!subcategory) return 0;
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

async function renderReviewSummary() {
  const container = document.getElementById('reviewSummary');
  if (!container) return;

  container.innerHTML = `
    <div class="text-center py-4">
      <div class="enroll-spinner-sm mx-auto mb-3"></div>
      <p class="text-white-50">Calculating pricing and fee details...</p>
    </div>
  `;

  const purchase = getStoredPurchase() || {};
  const location = purchase.location || selectedLocation;
  const batch = purchase.batch || selectedBatch;
  const seat = purchase.seat || selectedSeat;
  const courseName = purchase.courseName || COURSE_NAMES[purchase.slug] || COURSE_NAMES[getCourseSlug()] || 'Selected Course';
  const slug = purchase.slug || getCourseSlug();

  let price = 0;
  try {
    const context = await fetchSubcategoryContext(slug);
    const subcategory = context?.subcategory;
    price = getCoursePrice(subcategory, purchase.subscriptionMode, 'OFFLINE') || 0;
  } catch (err) {
    console.error('Pricing lookup failed, falling back to local defaults:', err);
    const modeKey = purchase.subscriptionMode || 'TOTAL';
    price = FALLBACK_PRICES[slug]?.[modeKey] || 0;
  }

  const totalVal = Number(price);
  const subtotalVal = totalVal / 1.18;
  const gstVal = totalVal - subtotalVal;

  const formatINR = (num) => '₹' + Number(num).toLocaleString('en-IN', {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  });

  const paymentModeText = purchase.subscriptionMode === 'TOTAL' ? 'Full Course Payment' : 'Monthly Subscription';

  container.innerHTML = `
    <div class="row g-4" style="max-width: 960px; margin: 0 auto; text-align: left;">
      <div class="col-12 col-md-6">
        <div class="selected-seat-card h-100" style="position:static; width:auto; margin:0; box-shadow: 0 10px 30px rgba(0,0,0,0.25);">
          <h5 class="mb-4" style="border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 0.8rem;">
            <i class="bi bi-info-circle-fill me-2 text-primary"></i>Enrollment Details
          </h5>
          <div class="seat-summary-list">
            <div class="seat-info-row"><span class="info-label">Course</span><span class="info-value" style="font-weight: 600;">${courseName}</span></div>
            <div class="seat-info-row"><span class="info-label">Location</span><span class="info-value">${location?.city || location?.centreName || '-'}</span></div>
            <div class="seat-info-row"><span class="info-label">Batch</span><span class="info-value">${batch ? `Batch ${batch.number}` : '-'}</span></div>
            ${batch?.batchCode ? `<div class="seat-info-row"><span class="info-label">Batch Code</span><span class="info-value accent text-uppercase" style="font-weight: 700;">${batch.batchCode}</span></div>` : ''}
            <div class="seat-info-row"><span class="info-label">Start Date</span><span class="info-value">${batch?.startDate || '-'}</span></div>
            <div class="seat-info-row"><span class="info-label">Time</span><span class="info-value">${batch?.time || '-'}</span></div>
            <div class="seat-info-row"><span class="info-label">Days</span><span class="info-value">${batch?.days || '-'}</span></div>
            <div class="seat-info-row" style="margin-top: 0.5rem; padding-top: 0.5rem; border-top: 1px dashed rgba(255,255,255,0.1);">
              <span class="info-label">Selected Seat</span>
              <span class="info-value accent" style="font-size: 1.1rem; font-weight: 700;">${seat?.id || purchase.seatId || '-'}</span>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-12 col-md-6">
        <div class="selected-seat-card h-100" style="position:static; width:auto; margin:0; box-shadow: 0 10px 30px rgba(0,0,0,0.25);">
          <h5 class="mb-4" style="border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 0.8rem;">
            <i class="bi bi-receipt me-2 text-primary"></i>Fee & Tax Breakdown
          </h5>
          <div class="seat-summary-list">
            <div class="seat-info-row"><span class="info-label">Payment Mode</span><span class="info-value text-white">${paymentModeText}</span></div>
            <div class="seat-info-row"><span class="info-label">Base Fee (Subtotal)</span><span class="info-value">${formatINR(subtotalVal)}</span></div>
            <div class="seat-info-row"><span class="info-label">GST (18%)</span><span class="info-value">${formatINR(gstVal)}</span></div>
            <div class="seat-info-row" style="margin-top: 0.8rem; padding-top: 0.8rem; border-top: 1px solid rgba(255,255,255,0.15);">
              <span class="info-label" style="color:#fff; font-size: 1rem; font-weight: 700;">Total Amount</span>
              <span class="info-value accent" style="font-size: 1.2rem; font-weight: 800;">${formatINR(totalVal)}</span>
            </div>
            <div class="text-white-50 small mt-3 text-end" style="font-style: italic; font-size: 0.75rem; opacity: 0.7;">
              * Prices are inclusive of 18% GST
            </div>
          </div>
        </div>
      </div>
    </div>
  `;
}

function updateReviewContinueButton() {
  const btn = document.getElementById('btnContinueBatch');
  if (!btn) return;
  btn.disabled = false;
  btn.classList.add('enabled');
  updateBackButton();
}

// Override handleContinue for seat step
const originalHandleContinue2 = handleContinue;
handleContinue = async function() {
  if (currentStep === 'batch' && !selectedBatch) return;
  if (currentStep === 'seat' && !selectedSeat) return;

  const steps = ['location', 'batch', 'seat', 'review'];
  const currentIndex = steps.indexOf(currentStep);

  if (currentIndex < steps.length - 1) {
    const nextStep = steps[currentIndex + 1];
    if (currentStep === 'seat') {
      const locked = await lockSelectedSeat();
      if (!locked) return;
    }
    const params = new URLSearchParams(window.location.search);
    params.set('step', nextStep);
    if (selectedLocation) params.set('location', selectedLocation.slug || selectedLocation._id);
    if (selectedBatch) params.set('batch', selectedBatch.id);
    if (selectedSeat) params.set('seat', selectedSeat.id);
    window.location.href = `${baseUrl}offline-enrollment?${params}`;
  } else {
    proceedToPayment();
  }
};
