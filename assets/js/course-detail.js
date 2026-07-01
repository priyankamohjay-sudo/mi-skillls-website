/**
 * Course Detail Page — Dynamic Data Loader
 * Fetches course data from the MI Skills backend API using the course slug
 * and hydrates the "What You'll Learn" and "Course Syllabus" sections.
 */

(function () {
  'use strict';

  const API_BASE = window.MI_API_BASE_URL || 'https://dev.miskills.in';

  // Slug aliases: page slug → API slugs to try (same order as subscription-purchase.js)
  // The FIRST slug in each array is the one the backend actually has — try it first.
  const COURSE_API_SLUGS = {
    'web-and-app-development-with-ai-tools': [
      'web-and-app-development-with-ai-tools',
      'web-development-with-ai-tools-full-stack-front-end-back-end'
    ],
    'artificial-intelligence-and-applied-machine-learning': [
      'ai-and-applied-machine-learning',
      'artificial-intelligence-and-applied-machine-learning',
      'ai-applied-machine-learning'
    ],
    'data-science-and-analytics-with-gen-ai': [
      'data-science-and-analytics-with-gen-ai'
    ],
    'cloud-computing-and-devops': [
      'cloud-computing-and-devops-aws-azure-gcp',
      'cloud-computing-and-devops',
      'cloud-computing-devops-aws-azure-gcp'
    ],
    'cybersecurity-ai-and-cloud-security': [
      'cyber-security-ai-and-cloud-security',
      'cybersecurity-ai-and-cloud-security',
      'cyber-security-ai-cloud-security'
    ]
  };

  /**
   * Fetch a subcategory by trying multiple slugs (same strategy as subscription-purchase.js).
   */
  async function fetchSubcategoryBySlug(pageSlug) {
    const slugsToTry = COURSE_API_SLUGS[pageSlug] || [pageSlug];

    for (const apiSlug of slugsToTry) {
      try {
        const res = await fetch(`${API_BASE}/api/subcategories/slug/${encodeURIComponent(apiSlug)}`);
        const data = await res.json().catch(() => ({}));
        if (res.ok && data.success !== false && data.subcategory) {
          return data.subcategory;
        }
      } catch (_) {
        // try next slug
      }
    }
    return null;
  }

  /**
   * Render "What You'll Learn" section.
   * Target container: [data-course-learn]
   */
  function renderWhatYouLearn(container, items) {
    if (!container || !Array.isArray(items) || items.length === 0) return;

    const ul = container.querySelector('ul');
    if (!ul) return;

    ul.innerHTML = '';
    items.forEach(item => {
      const li = document.createElement('li');
      li.textContent = item;
      ul.appendChild(li);
    });

    container.style.display = '';
  }

  /**
   * Render "Course Syllabus" (curriculum) section.
   * Target container: [data-course-syllabus]
   *
   * Curriculum is an array of modules:
   *   { moduleName, duration, topics: [string, ...] }
   *
   * Renders as an accordion — one panel per module, topics listed inside.
   */
  function renderCourseSyllabus(container, curriculum) {
    if (!container || !Array.isArray(curriculum) || curriculum.length === 0) return;

    container.style.display = '';

    // Find the heading if it exists, or create one
    const heading = container.querySelector('h3.service-title');
    const headingHtml = heading ? heading.outerHTML : '<h3 class="service-title">Topics Included in This Course</h3>';

    // Build accordion HTML
    const accordionId = 'syllabusAccordion';
    let html = `${headingHtml}<div class="course-syllabus-accordion" id="${accordionId}">`;

    curriculum.forEach((module, idx) => {
      const collapseId = `syllabusCollapse${idx}`;
      const headingId  = `syllabusHeading${idx}`;
      const isFirst    = idx === 0;
      const topicsList = Array.isArray(module.topics) ? module.topics : [];

      html += `
        <div class="syllabus-module card mb-2">
          <div class="card-header syllabus-module-header" id="${headingId}">
            <button
              class="btn btn-link syllabus-toggle w-100 text-start${isFirst ? '' : ' collapsed'}"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#${collapseId}"
              aria-expanded="${isFirst ? 'true' : 'false'}"
              aria-controls="${collapseId}"
            >
              <span class="syllabus-module-name">${escapeHtml(module.moduleName || module.duration || `Module ${idx + 1}`)}</span>
              <span class="syllabus-topic-count">${topicsList.length} topic${topicsList.length !== 1 ? 's' : ''}</span>
              <i class="bi bi-chevron-down syllabus-chevron"></i>
            </button>
          </div>
          <div id="${collapseId}" class="collapse${isFirst ? ' show' : ''}" aria-labelledby="${headingId}" data-bs-parent="#${accordionId}">
            <div class="card-body syllabus-module-body">
              <ul class="syllabus-topics-list">
                ${topicsList.map(t => `<li><i class="bi bi-check-circle-fill"></i> ${escapeHtml(t)}</li>`).join('')}
              </ul>
            </div>
          </div>
        </div>`;
    });

    html += '</div>';
    container.innerHTML = html;
  }

  /**
   * Render "Topics Included" (legacy simple table) section.
   * Target container: [data-course-topics]
   * Used when the API has no curriculum but has modules/topics in a flat structure.
   * Falls back to showing curriculum module names + first few topics.
   */
  function renderTopicsTable(container, curriculum) {
    if (!container || !Array.isArray(curriculum) || curriculum.length === 0) return;

    const tbody = container.querySelector('tbody');
    if (!tbody) return;

    tbody.innerHTML = '';
    curriculum.forEach(module => {
      const tr = document.createElement('tr');
      const td = document.createElement('td');
      const moduleName = module.moduleName || module.duration || '';
      const topics = Array.isArray(module.topics) ? module.topics : [];
      const preview = topics.slice(0, 3).join(', ') + (topics.length > 3 ? '...' : '');
      td.innerHTML = `<strong>${escapeHtml(moduleName)}</strong>${preview ? '<br>' + escapeHtml(preview) : ''}`;
      tr.appendChild(td);
      tbody.appendChild(tr);
    });

    container.style.display = '';
  }

  function escapeHtml(str) {
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
  }

  /**
   * Show skeleton loaders while fetching.
   */
  function showSkeletons() {
    document.querySelectorAll('[data-course-learn]').forEach(el => {
      const ul = el.querySelector('ul');
      if (ul) {
        ul.innerHTML = Array(5).fill('<li class="skeleton-line" style="height:18px;width:80%;background:rgba(255,255,255,.1);border-radius:4px;margin-bottom:8px;list-style:none;"></li>').join('');
      }
    });
    document.querySelectorAll('[data-course-syllabus]').forEach(el => {
      const heading = el.querySelector('h3.service-title');
      const headingHtml = heading ? heading.outerHTML : '<h3 class="service-title">Topics Included in This Course</h3>';
      el.innerHTML = `${headingHtml}<div style="display:flex;flex-direction:column;gap:10px;">${
        Array(4).fill('<div class="skeleton-line" style="height:48px;background:rgba(255,255,255,.08);border-radius:8px;"></div>').join('')
      }</div>`;
    });
  }

  /**
   * Main entry point — reads window.COURSE_PAGE_SLUG set by each course page.
   */
  async function init() {
    const pageSlug = window.COURSE_PAGE_SLUG;
    if (!pageSlug) return; // Not a course detail page

    const learnContainers   = document.querySelectorAll('[data-course-learn]');
    const syllabusContainers = document.querySelectorAll('[data-course-syllabus]');
    const topicsContainers   = document.querySelectorAll('[data-course-topics]');
    const docLinks           = document.querySelectorAll('[data-course-doc-link]');

    // Nothing to hydrate
    if (!learnContainers.length && !syllabusContainers.length && !topicsContainers.length && !docLinks.length) return;

    showSkeletons();

    const subcategory = await fetchSubcategoryBySlug(pageSlug);
    if (!subcategory) {
    // API unavailable — keep existing static fallback links visible
      console.warn('[CourseDetail] Could not fetch course data for slug:', pageSlug);
      document.querySelectorAll('[data-course-learn]').forEach(el => { el.style.display = ''; });
      document.querySelectorAll('[data-course-syllabus]').forEach(el => { el.style.display = ''; });
      document.querySelectorAll('[data-course-topics]').forEach(el => { el.style.display = ''; });
      // Leave doc link pointing to its current fallback href
      return;
    }

    // 1. "What You'll Learn" — uses subcategory.whatYouWillLearn
    const learnItems = subcategory.whatYouWillLearn || [];
    learnContainers.forEach(el => renderWhatYouLearn(el, learnItems));

    // 2. Course Syllabus accordion — uses subcategory.curriculum
    const curriculum = subcategory.curriculum || [];
    syllabusContainers.forEach(el => renderCourseSyllabus(el, curriculum));

    // 3. Legacy topics table — uses curriculum module names
    topicsContainers.forEach(el => renderTopicsTable(el, curriculum));

    // 4. Course Resources — document URL from backend
    if (subcategory.documentURL) {
      docLinks.forEach(link => {
        link.href = subcategory.documentURL;
      });
    } else {
      // No document available — hide the list item so no dead link shows
      docLinks.forEach(link => {
        const li = link.closest('li');
        if (li) li.style.display = 'none';
      });
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
