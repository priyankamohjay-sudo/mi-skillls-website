<!--Start Page Header-->
<?php
$title = "Affordable Course Subscription for Lifelong Learning";
$description = "Transform your education with our course subscription. Gain unlimited access to a wide range of courses and learn at your own pace, anytime you choose.";
$tags = "course subscription, subscription courses, subscribe to courses";
require_once __DIR__ . '/../includes/header.php'; ?>
<!--End Page Header-->


<!-- Start inner Page hero-->
<section class="page-hero inner-page-hero d-flex align-items-center" id="page-hero">

  <!-- Background Image -->
  <div class="hero-bg" style="background-image: url('<?=BASE_URL?>assets/images/hero/inner-banner.jpg');">
  </div>

  <!-- Black Overlay -->
  <div class="hero-overlay"></div>

  <div class="container position-relative">
    <div class="hero-text-area centerd">
      <h1 class="hero-title wow fadeInUp" data-wow-delay=".2s">
        Subscriptions
      </h1>

      <nav aria-label="breadcrumb">
        <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
          <li class="breadcrumb-item">
            <a class="breadcrumb-link" href="/">
              <i class="bi bi-house icon"></i> Home
            </a>
          </li>
          <li class="breadcrumb-item active">Subscriptions</li>
        </ul>
      </nav>
    </div>
  </div>

</section>
<!-- End inner Page hero-->


<!-- ================= PRICING SECTION ================= -->
<section class="pricing mega-section" id="pricing-1">
  <div class="container position-relative">

    <div class="sec-heading centered">
      <div class="content-area">
        <span class="pre-title">pricing plans</span>
        <h2 class="title">
          <span class="hollow-text">Courses</span> pricing plans
        </h2>
        <p class="info-text">
          MI Skills offers flexible and affordable pricing plans with access to live classes,<br>
          expert support, and interview and internship opportunities.
        </p>
      </div>
      <div id="investor-notice" class="alert alert-info mt-3 mx-auto" style="display:none; max-width: 600px; border-radius: 30px; background: rgba(103, 58, 183, 0.1); color: #fff; border: 1px solid #673ab7;">
        <i class="bi bi-info-circle me-2"></i> As an <strong>Investor</strong>, you are currently restricted to the Business Funding package.
      </div>
    </div>

    <!-- CATEGORY TABS -->
    <div class="text-center mb-4">
      <div class="d-inline-flex gap-2 category-pill-wrap">
        <button id="btnOnlineMode" class="cat-tab btn active" onclick="setLearningMode('online')">Online Learning</button>
        <button id="btnOfflineMode" class="cat-tab btn" onclick="setLearningMode('offline')">Offline Learning</button>
      </div>
    </div>

    <div class="course-category-tabs text-center mb-5">
      <div class="d-inline-flex flex-wrap gap-2 justify-content-center category-pill-wrap">
        <button class="cat-tab btn active" onclick="activateTab(this); showCategory('web')">Web Development with AI Tools</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('app')">App Development with AI Tools</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('marketing')">Digital Marketing</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('graphic')">Graphic Designing</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('ai_ml')">AI & Applied Machine Learning</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('cloud_devops')">Cloud Computing & DevOps</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('data_science')">Data Science with Gen AI</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('cybersecurity')">Cybersecurity - AI & Cloud Security</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('data_analytics')">Data Analytics with Gen AI</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('interview')">Career Support</button>
        <button class="cat-tab btn" onclick="activateTab(this); showCategory('funding')">Business Funding</button>
      </div>
    </div>

    <!-- ================= ALL CATEGORY CONTENT ================= -->
    <div class="pricing-categories-wrapper">

      <!-- ================= WEB DEVELOPMENT ================= -->
      <div id="web" class="category-content">

        <!-- TOGGLE -->
        <div class="text-center mb-4">
          <div class="d-inline-flex gap-2 category-pill-wrap">
            <button id="btnIndividual" class="cat-tab btn active" onclick="toggleWeb('individual')">Individual
              Courses</button>
            <button id="btnFull" class="cat-tab btn" onclick="toggleWeb('full')">Full Course Package</button>
          </div>
        </div>

        <!-- FULL -->
        <div id="web_full" style="display:none">
          <div class="full-course-card mx-auto">
            <div class="full-course-left">
              <span class="badge">Most Popular</span>
              <span class="badge bg-secondary">Medium Level</span>
              <h3>Web Development – Full Course</h3>
              <p class="sub-text">Full Stack Development – Frontend + Backend</p>
              <ul class="full-feature-list">
                <li>Frontend Development</li>
                <li>Backend Development</li>
                <li>15+ Industry Projects</li>
                <li>Internship Support</li>
                <li>Career Guidance & Interview Prep</li>
                <li>Lifetime Access & Updates</li>
              </ul>
            </div>
            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price online-price">₹1,996</h2>
              <h2 class="price offline-price" style="display:none">₹3,596</h2>
              <p class="duration">Duration:</p>
              <p class="duration">4 Months Access</p>
               <p class="duration">3 Hours / Day</p>
              <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('web-development-with-ai-tools-full-stack-front-end-back-end', 'TOTAL')">Buy Now</button></div>
            </div>
            </div>
            </div>

            <!-- INDIVIDUAL -->
            <div id="web_individual">
            <div class="row">

            <!-- WEB DEVELOPMENT -->
            <div class="col-md-8 mx-auto">
              <div class="plan ui-style-card p-4 price-card">
                <h3>Web Development</h3>
                <p class="text-white-50">Full Stack Development: Frontend + Backend</p>

                <div class="price-option online-price">
                  <label>
                    <input type="radio" name="web_price" checked>
                    Monthly
                  </label>
                  <strong>₹499 / Month</strong>
                </div>

                <div class="price-option offline-price" style="display:none">
                  <label>
                    <input type="radio" name="web_price_off">
                    Monthly
                  </label>
                  <strong>₹899 / Month</strong>
                </div>

                <ul class="feature-list mt-3">
                  <li>HTML5, CSS3 & Responsive UI</li>
                  <li>JavaScript ES6+ & React Basics</li>
                  <li>Node.js & Express</li>
                  <li>MongoDB & SQL</li>
                  <li>15+ Industry Projects</li>
                </ul>
                <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('web-development-with-ai-tools-full-stack-front-end-back-end', 'MONTHLY')">Buy Now</button></div>
              </div>
            </div>

            </div>

            </div>

            </div>

            <!-- ================= APP DEVELOPMENT ================= -->
            <div id="app" class="category-content" style="display:none">

            <div class="text-center mb-4">
            <div class="d-inline-flex gap-2 category-pill-wrap">
            <button id="btnAppIndividual" class="cat-tab btn active" onclick="toggleApp('individual')">
              Individual Courses
            </button>

            <button id="btnAppFull" class="cat-tab btn" onclick="toggleApp('full')">
              Full Course Package
            </button>
            </div>
            </div>

            <!-- FULL -->
            <div id="app_full" style="display:none">
            <div class="full-course-card mx-auto">

            <div class="full-course-left">
              <span class="badge">Complete Program</span>
              <span class="badge bg-secondary">Medium Level</span>
              <h3>App Development – Full Course</h3>
              <p class="sub-text">Android + iOS + Cross Platform</p>

              <ul class="full-feature-list">
                <li>Android App Development</li>
                <li>iOS App Development</li>
                <li>Cross Platform Apps</li>
                <li>Live Projects</li>
                <li>Career Guidance</li>
              </ul>
            </div>

            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price online-price">₹3,596</h2>
              <h2 class="price offline-price" style="display:none">₹35,996</h2>
              <p class="duration">Duration:</p>
              <p class="duration">4 Months Access</p>
               <p class="duration">3 Hours / Day</p>
              <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('app-development-with-ai-tools-android-ios-cross-platform', 'TOTAL')">Buy Now</button></div>
            </div>

            </div>
            </div>

            <!-- INDIVIDUAL -->
            <div id="app_individual">
            <div class="row">

            <!-- APP DEVELOPMENT -->
            <div class="col-md-8 mx-auto">
              <div class="plan ui-style-card p-4 price-card">
                <h3>App Development</h3>
                <p class="text-white-50">Mobile Development: Android + iOS + Cross-Platform</p>

                <div class="price-option online-price">
                  <label>
                    <input type="radio" name="app_price" checked>
                    Monthly
                  </label>
                  <strong>₹899 / Month</strong>
                </div>

                <div class="price-option offline-price" style="display:none">
                  <label>
                    <input type="radio" name="app_price_off">
                    Monthly
                  </label>
                  <strong>₹8,999 / Month</strong>
                </div>

                <ul class="feature-list mt-3">
                  <li>Android App Development (Java/Kotlin)</li>
                  <li>iOS App Development (Swift)</li>
                  <li>Cross-Platform Apps (Flutter/React Native)</li>
                  <li>Live Projects & API Integration</li>
                  <li>App UI & Navigation</li>
                </ul>
                <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('app-development-with-ai-tools-android-ios-cross-platform', 'MONTHLY')">Buy Now</button></div>
              </div>
            </div>

            </div>
            </div>

            </div>

            <!-- DIGITAL MARKETING -->
            <div id="marketing" class="category-content" style="display:none">

            <div class="text-center mb-4">
            <div class="d-inline-flex gap-2 category-pill-wrap">
            <button id="btnMarketingIndividual" class="cat-tab btn active" onclick="toggleMarketing('individual')">
              Individual Courses
            </button>

            <button id="btnMarketingFull" class="cat-tab btn" onclick="toggleMarketing('full')">
              Full Course Package
            </button>
            </div>
            </div>

            <!-- FULL -->
            <div id="marketing_full" style="display:none">
            <div class="full-course-card mx-auto">
            <div class="full-course-left">
              <span class="badge">Complete Program</span>
              <span class="badge bg-secondary">Easy Level</span>
              <h3>Digital Marketing – Full Course</h3>
              <p class="sub-text">Complete Digital Marketing Journey: SEO, SMO, Content & Ads</p>
              <ul class="full-feature-list">
                <li>SEO Fundamentals & Optimization</li>
                <li>Social Media Marketing (SMO)</li>
                <li>Content Writing & Strategy</li>
                <li>Google Ads & PPC Campaigns</li>
                <li>Email Marketing</li>
              </ul>
            </div>

            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price online-price">₹3,897</h2>
              <h2 class="price offline-price" style="display:none">₹26,997</h2>
              <p class="duration">Duration:</p>
              <p class="duration">3 Months Access</p>
               <p class="duration">3 Hours / Day</p>
              <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('digital-marketing', 'TOTAL')">Buy Now</button></div>
            </div>
            </div>
            </div>

            <!-- INDIVIDUAL -->
            <div id="marketing_individual">
            <div class="row">
            <!-- COURSE 1 - DIGITAL MARKETING -->
            <div class="col-md-8 mx-auto">
              <div class="plan ui-style-card p-4 price-card">
                <h3>Digital Marketing</h3>
                <p class="text-white-50">Complete Digital Marketing Journey from Basics to Advanced</p>

                <div class="price-option online-price">
                  <label>
                    <input type="radio" name="marketing_price" checked>
                    Monthly
                  </label>
                  <strong>₹1,299 / Month</strong>
                </div>

                <div class="price-option offline-price" style="display:none">
                  <label>
                    <input type="radio" name="marketing_price_off">
                    Monthly
                  </label>
                  <strong>₹8,999 / Month</strong>
                </div>

                <ul class="feature-list mt-3">
                  <li>Digital Marketing Fundamentals</li>
                  <li>Search Engine Optimization (SEO)</li>
                  <li>Keyword Research & Analysis</li>
                  <li>On-Page & Off-Page SEO</li>
                  <li>Social Media Marketing (SMO)</li>
                  <li>Content Writing & Copywriting</li>
                  <li>Google Ads (PPC) Campaigns</li>
                  <li>Campaign Management & Optimization</li>
                  <li>Email Marketing Strategies</li>
                </ul>
                <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('digital-marketing', 'MONTHLY')">Buy Now</button></div>
              </div>
            </div>
            </div>
            </div>

            </div>


            <!-- ================= GRAPHIC ================= -->
            <div id="graphic" class="category-content" style="display:none">

            <div class="text-center mb-4">
            <div class="d-inline-flex gap-2 category-pill-wrap">
            <button id="btnGraphicIndividual" class="cat-tab btn active" onclick="toggleGraphic('individual')">
              Individual Courses
            </button>

            <button id="btnGraphicFull" class="cat-tab btn" onclick="toggleGraphic('full')">
              Full Course Package
            </button>
            </div>
            </div>

            <!-- FULL -->
            <div id="graphic_full" style="display:none">
            <div class="full-course-card mx-auto">
            <div class="full-course-left">
              <span class="badge">Complete Program</span>
              <span class="badge bg-secondary">Easy Level</span>
              <h3>Graphic Designing – Full Course</h3>
              <p class="sub-text">Complete Design Journey: UI/UX, Figma, Photoshop & More</p>
              <ul class="full-feature-list">
                <li>Design Fundamentals & Principles</li>
                <li>UI/UX Design Concepts</li>
                <li>Figma Professional Design</li>
                <li>Adobe Photoshop Mastery</li>
                <li>Adobe Illustrator, Canva</li>
                <li>Web & Mobile Design</li>
              </ul>
            </div>

            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price online-price">₹2,997</h2>
              <h2 class="price offline-price" style="display:none">₹26,997</h2>
              <p class="duration">Duration:</p>
              <p class="duration">3 Months Access</p>
              <p class="duration">3 Hours / Day</p>
              <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('graphic-designing', 'TOTAL')">Buy Now</button></div>
            </div>
            </div>
            </div>

            <!-- INDIVIDUAL -->
            <div id="graphic_individual">
            <div class="row">
            <!-- COURSE 1 - GRAPHIC DESIGNING -->
            <div class="col-md-8 mx-auto">
              <div class="plan ui-style-card p-4 price-card">
                <h3>Graphic Designing</h3>
                <p class="text-white-50">Complete Graphic Designing Journey from Basics to Advanced</p>

                <div class="price-option online-price">
                  <label>
                    <input type="radio" name="graphic_price" checked>
                    Monthly
                  </label>
                  <strong>₹999 / Month</strong>
                </div>

                <div class="price-option offline-price" style="display:none">
                  <label>
                    <input type="radio" name="graphic_price_off">
                    Monthly
                  </label>
                  <strong>₹8,999 / Month</strong>
                </div>

                <ul class="feature-list mt-3">
                  <li>Design Fundamentals & Principles</li>
                  <li>UI/UX Design Concepts</li>
                  <li>Figma, Wireframing & Prototyping Design Tool</li>
                  <li>Adobe Photoshop Mastery</li>
                  <li>Image Editing & Manipulation</li>
                  <li>Adobe Illustrator</li>
                  <li>Vector Graphics Design</li>
                  <li>Canva for Social Media Design</li>
                </ul>
                <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('graphic-designing', 'MONTHLY')">Buy Now</button></div>
              </div>
            </div>
            </div>
            </div>

            </div>

            <!-- ================= AI & APPLIED MACHINE LEARNING ================= -->
            <div id="ai_ml" class="category-content" style="display:none">

            <div class="text-center mb-4">
            <div class="d-inline-flex gap-2 category-pill-wrap">
            <button id="btnAiMlIndividual" class="cat-tab btn active" onclick="toggleAiMl('individual')">
              Individual Courses
            </button>

            <button id="btnAiMlFull" class="cat-tab btn" onclick="toggleAiMl('full')">
              Full Course Package
            </button>
            </div>
            </div>

            <!-- FULL -->
            <div id="ai_ml_full" style="display:none">
            <div class="full-course-card mx-auto">

            <div class="full-course-left">
              <span class="badge">Complete Program</span>
              <span class="badge bg-secondary">Hard Level</span>
              <h3>AI & Applied Machine Learning – Full Course</h3>
              <p class="sub-text">Complete AI Journey: Fundamentals to Advanced Applications</p>

              <ul class="full-feature-list">
                <li>AI Core Concepts & Fundamentals</li>
                <li>Python Programming for AI/ML</li>
                <li>Machine Learning Algorithms</li>
                <li>Deep Learning & Neural Networks</li>
                <li>NLP & Computer Vision</li>
                <li>Real-World Applications</li>             
              </ul>
            </div>

            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price online-price">₹10,493</h2>
              <h2 class="price offline-price" style="display:none">₹62,993</h2>
              <p class="duration">Duration:</p>
              <p class="duration">7 Months Access</p>
               <p class="duration">3 Hours / Day</p>
               <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('ai-applied-machine-learning', 'TOTAL')">Buy Now</button></div>
            </div>

            </div>
            </div>

            <!-- INDIVIDUAL -->
            <div id="ai_ml_individual">
            <div class="row">

            <!-- COURSE 1 - AI & APPLIED MACHINE LEARNING -->
            <div class="col-md-8 mx-auto">
              <div class="plan ui-style-card p-4 price-card">

                <h3>AI & Applied Machine Learning</h3>
                <p class="text-white-50">Complete AI & ML Journey from Basics to Advanced</p>

                <div class="price-option online-price">
                  <label>
                    <input type="radio" name="ai_ml_price" checked>
                    Monthly
                  </label>
                  <strong>₹1,499 / Month</strong>
                </div>

                <div class="price-option offline-price" style="display:none">
                  <label>
                    <input type="radio" name="ai_ml_price_off">
                    Monthly
                  </label>
                  <strong>₹8,999 / Month</strong>
                </div>

                <ul class="feature-list mt-3">
                  <li>AI Fundamentals & Core Concepts</li>
                  <li>Python Programming for AI/ML</li>
                  <li>Machine Learning Algorithms</li>     
                  <li>Advance AI Tools</li>
                  <li>Computer Vision & Image Processing</li>
                  <li>Data Preprocessing & Feature Engineering</li>
                  <li>Model Evaluation & Optimization</li>

                </ul>
                <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('ai-applied-machine-learning', 'MONTHLY')">Buy Now</button></div>
              </div>
            </div>
            </div>
            </div>

            </div>

            <!-- ================= CLOUD COMPUTING & DEVOPS ================= -->
            <div id="cloud_devops" class="category-content" style="display:none">

            <div class="text-center mb-4">
            <div class="d-inline-flex gap-2 category-pill-wrap">
            <button id="btnCloudIndividual" class="cat-tab btn active" onclick="toggleCloudDevops('individual')">
              Individual Courses
            </button>

            <button id="btnCloudFull" class="cat-tab btn" onclick="toggleCloudDevops('full')">
              Full Course Package
            </button>
            </div>
            </div>

            <!-- FULL -->
            <div id="cloud_devops_full" style="display:none">
            <div class="full-course-card mx-auto">

            <div class="full-course-left">
              <span class="badge">Complete Program</span>
              <span class="badge bg-secondary">Medium Level</span>
              <h3>Cloud Computing & DevOps – Full Course</h3>
              <p class="sub-text">Complete Cloud & DevOps Journey: AWS, Azure, GCP, Kubernetes & CI/CD</p>

              <ul class="full-feature-list">
                <li>Cloud Computing Fundamentals</li>
                <li>AWS / Azure / GCP Platforms</li>
                <li>Cloud Services & Architecture</li>
                <li>Docker & Containerization</li>
                <li>Kubernetes Orchestration</li>
                <li>CI/CD Pipelines</li>
              </ul>
            </div>

            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price online-price">₹8,495</h2>
              <h2 class="price offline-price" style="display:none">₹44,995</h2>
              <p class="duration">Duration:</p>
              <p class="duration">5 Months Access</p>
              <p class="duration">3 Hours / Day</p>
              <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('cloud-computing-devops-aws-azure-gcp', 'TOTAL')">Buy Now</button></div>
            </div>

            </div>
            </div>

            <!-- INDIVIDUAL -->
            <div id="cloud_devops_individual">
            <div class="row">

            <!-- COURSE 1 - CLOUD COMPUTING & DEVOPS -->
            <div class="col-md-8 mx-auto">
              <div class="plan ui-style-card p-4 price-card">

                <h3>Cloud Computing & DevOps</h3>
                <p class="text-white-50">Complete Cloud & DevOps Journey from Basics to Advanced</p>

                <div class="price-option online-price">
                  <label>
                    <input type="radio" name="cloud_devops_price" checked>
                    Monthly
                  </label>
                  <strong>₹1,699 / Month</strong>
                </div>

                <div class="price-option offline-price" style="display:none">
                  <label>
                    <input type="radio" name="cloud_devops_price_off">
                    Monthly
                  </label>
                  <strong>₹8,999 / Month</strong>
                </div>

                <ul class="feature-list mt-3">
                  <li>Cloud Computing Fundamentals</li>
                  <li>AWS / Azure / GCP Platforms</li>
                  <li>Cloud Services & Architecture</li>
                  <li>Docker & Containerization</li>
                  <li>Kubernetes Orchestration</li>
                  <li>CI/CD Pipelines & Automation</li>
                </ul>
                <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('cloud-computing-devops-aws-azure-gcp', 'MONTHLY')">Buy Now</button></div>
              </div>
            </div>
            </div>
            </div>

            </div>

            <!-- ================= DATA SCIENCE WITH GEN AI ================= -->
            <div id="data_science" class="category-content" style="display:none">

            <div class="text-center mb-4">
            <div class="d-inline-flex gap-2 category-pill-wrap">
            <button id="btnDataScienceIndividual" class="cat-tab btn active" onclick="toggleDataScience('individual')">
              Individual Courses
            </button>

            <button id="btnDataScienceFull" class="cat-tab btn" onclick="toggleDataScience('full')">
              Full Course Package
            </button>
            </div>
            </div>

            <!-- FULL -->
            <div id="data_science_full" style="display:none">
            <div class="full-course-card mx-auto">

            <div class="full-course-left">
              <span class="badge">Complete Program</span>
              <span class="badge bg-secondary">Hard Level</span>
              <h3>Data Science with Gen AI – Full Course</h3>
              <p class="sub-text">Complete Data Science Journey: Analytics, ML & Generative AI</p>

              <ul class="full-feature-list">
                <li>Data Analysis & Visualization</li>
                <li>Python for Data Science</li>
                <li>Machine Learning Algorithms</li>
                <li>Statistical Analysis</li>
                <li>Generative AI & LLMs</li>
                <li>Prompt Engineering</li>
            </div>

            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price online-price">₹9,093</h2>
              <h2 class="price offline-price" style="display:none">₹62,993</h2>
              <p class="duration">Duration:</p>
              <p class="duration">7 Months Access</p>
              <p class="duration">3 Hours / Day</p>
              <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('data-science-with-gen-ai', 'TOTAL')">Buy Now</button></div>
            </div>

            </div>
            </div>

            <!-- INDIVIDUAL -->
            <div id="data_science_individual">
            <div class="row">

            <!-- COURSE 1 - DATA SCIENCE WITH GEN AI -->
            <div class="col-md-8 mx-auto">
              <div class="plan ui-style-card p-4 price-card">

                <h3>Data Science with Gen AI</h3>
                <p class="text-white-50">Complete Data Science Journey from Basics to Advanced with AI</p>

                <div class="price-option online-price">
                  <label>
                    <input type="radio" name="data_science_price" checked>
                    Monthly
                  </label>
                  <strong>₹1,299 / Month</strong>
                </div>

                <div class="price-option offline-price" style="display:none">
                  <label>
                    <input type="radio" name="data_science_price_off">
                    Monthly
                  </label>
                  <strong>₹8,999 / Month</strong>
                </div>

                <ul class="feature-list mt-3">
                  <li>Python for Data Science</li>
                  <li>Data Analysis & Visualization</li>
                  <li>Statistical Analysis</li>
                  <li>Machine Learning Algorithms</li>
                  <li>Large Language Models (LLMs)</li>
                  <li>Prompt Engineering</li>
                </ul>
                <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('data-science-with-gen-ai', 'MONTHLY')">Buy Now</button></div>
              </div>
            </div>
            </div>
            </div>

            </div>

            <!-- ================= CYBERSECURITY - AI & CLOUD SECURITY ================= -->
            <div id="cybersecurity" class="category-content" style="display:none">

            <div class="text-center mb-4">
            <div class="d-inline-flex gap-2 category-pill-wrap">
            <button id="btnCybersecurityIndividual" class="cat-tab btn active" onclick="toggleCybersecurity('individual')">
              Individual Courses
            </button>

            <button id="btnCybersecurityFull" class="cat-tab btn" onclick="toggleCybersecurity('full')">
              Full Course Package
            </button>
            </div>
            </div>

            <!-- FULL -->
            <div id="cybersecurity_full" style="display:none">
            <div class="full-course-card mx-auto">

            <div class="full-course-left">
              <span class="badge">Complete Program</span>
              <span class="badge bg-secondary">Medium Level</span>
              <h3>Cybersecurity - AI & Cloud Security – Full Course</h3>
              <p class="sub-text">Complete Cybersecurity Journey: Fundamentals, AI Security & Cloud Security</p>

              <ul class="full-feature-list">
                <li>Cybersecurity Fundamentals</li>
                <li>Network Security & Cryptography</li>
                <li>AI-Powered Threat Detection</li>
                <li>Anomaly Detection & Security Automation</li>
                <li>Cloud Security Best Practices</li>
                <li>AWS / Azure / GCP Security</li>
              </ul>
            </div>

            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price online-price">₹6,495</h2>
              <h2 class="price offline-price" style="display:none">₹44,995</h2>
              <p class="duration">Duration:</p>
              <p class="duration">5 Months Access</p>
              <p class="duration">3 Hours / Day</p>
              <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('cyber-security-ai-cloud-security', 'TOTAL')">Buy Now</button></div>
            </div>

            </div>
            </div>

            <!-- INDIVIDUAL -->
            <div id="cybersecurity_individual">
            <div class="row">

            <!-- COURSE 1 - CYBERSECURITY - AI & CLOUD SECURITY -->
            <div class="col-md-8 mx-auto">
              <div class="plan ui-style-card p-4 price-card">

                <h3>Cybersecurity - AI & Cloud Security</h3>
                <p class="text-white-50">Complete Cybersecurity Journey from Basics to Advanced with AI</p>

                <div class="price-option online-price">
                  <label>
                    <input type="radio" name="cybersecurity_price" checked>
                    Monthly
                  </label>
                  <strong>₹1,299 / Month</strong>
                </div>

                <div class="price-option offline-price" style="display:none">
                  <label>
                    <input type="radio" name="cybersecurity_price_off">
                    Monthly
                  </label>
                  <strong>₹8,999 / Month</strong>
                </div>

                <ul class="feature-list mt-3">
                  <li>Cybersecurity Fundamentals</li>
                  <li>Security Concepts & Frameworks</li>
                  <li>Network Security & Cryptography</li>
                  <li>AI-Powered Threat Detection</li>
                  <li>Security Automation & Orchestration</li>
                  <li>Cloud Security Best Practices</li>
                  <li>Identity & Access Management (IAM)</li>
                </ul>
                <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('cyber-security-ai-cloud-security', 'MONTHLY')">Buy Now</button></div>
              </div>
            </div>
            </div>
            </div>

            </div>

            <!-- ================= DATA ANALYTICS WITH GEN AI ================= -->
            <div id="data_analytics" class="category-content" style="display:none">

            <div class="text-center mb-4">
            <div class="d-inline-flex gap-2 category-pill-wrap">
            <button id="btnDataAnalyticsIndividual" class="cat-tab btn active" onclick="toggleDataAnalytics('individual')">
              Individual Courses
            </button>

            <button id="btnDataAnalyticsFull" class="cat-tab btn" onclick="toggleDataAnalytics('full')">
              Full Course Package
            </button>
            </div>
            </div>

            <!-- FULL -->
            <div id="data_analytics_full" style="display:none">
            <div class="full-course-card mx-auto">

            <div class="full-course-left">
              <span class="badge">Complete Program</span>
              <span class="badge bg-secondary">Medium Level</span>
              <h3>Data Analytics with Gen AI – Full Course</h3>
              <p class="sub-text">Complete Analytics Journey: Fundamentals, BI Tools & AI Insights</p>

              <ul class="full-feature-list">
                <li>Data Analytics Fundamentals</li>
                <li>SQL & Data Querying</li>
                <li>Business Intelligence Tools (Tableau, Power BI)</li>
                <li>Data Visualization & Dashboards</li>
                <li>Statistical Analysis</li>
                <li>AI-Powered Insights</li>
            </div>

            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price online-price">₹5,196</h2>
              <h2 class="price offline-price" style="display:none">₹35,996</h2>
              <p class="duration">Duration:</p>
              <p class="duration">4 Months Access</p>
              <p class="duration">3 Hours / Day</p>
              <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('data-analytics-with-gen-ai', 'TOTAL')">Buy Now</button></div>
            </div>

            </div>
            </div>

            <!-- INDIVIDUAL -->
            <div id="data_analytics_individual">
            <div class="row">

            <!-- COURSE 1 - DATA ANALYTICS WITH GEN AI -->
            <div class="col-md-8 mx-auto">
              <div class="plan ui-style-card p-4 price-card">

                <h3>Data Analytics with Gen AI</h3>
                <p class="text-white-50">Complete Data Analytics Journey from Basics to Advanced with AI</p>

                <div class="price-option online-price">
                  <label>
                    <input type="radio" name="data_analytics_price" checked>
                    Monthly
                  </label>
                  <strong>₹1,299 / Month</strong>
                </div>

                <div class="price-option offline-price" style="display:none">
                  <label>
                    <input type="radio" name="data_analytics_price_off">
                    Monthly
                  </label>
                  <strong>₹8,999 / Month</strong>
                </div>

                <ul class="feature-list mt-3">
                  <li>Data Analytics Fundamentals</li>
                  <li>SQL Data Querying</li>
                  <li>Data Preparation & Cleaning</li>
                  <li>Python for Data Analysis</li>
                  <li>Business Intelligence Tools (Tableau, Power BI)</li>
                  <li>Dashboard Creation & Data Visualization</li>
                  <li>Statistical Analysis</li>
                </ul>
                <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('data-analytics-with-gen-ai', 'MONTHLY')">Buy Now</button></div>
              </div>
            </div>
            </div>
            </div>

            </div>

      <!-- ================= INTERVIEW ================= -->
      <div id="interview" class="category-content" style="display:none">
        <div class="category-inner">

          <!-- FULL COURSE BUTTON -->
          <div class="text-center mb-4">
            <div class="d-inline-flex gap-2 category-pill-wrap">
              <button class="cat-tab btn active">Interview Package</button>
            </div>
          </div>

          <!-- COURSE CARD -->
          <div class="full-course-card mx-auto">
            <div class="full-course-left">
              <span class="badge">Most Popular</span>
              <h3>Interview & Internship Support</h3>
              <ul class="full-feature-list">
                <li>2 Interview Opportunities</li>
              </ul>
            </div>

            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price">₹499</h2>
              <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('interview-internship-support', 'TOTAL')">Buy Now</button></div>
            </div>
          </div>

        </div>
      </div>


      <!-- ================= FUNDING ================= -->

      <div id="funding" class="category-content" style="display:none">
        <div class="category-inner">

          <!-- FULL COURSE BUTTON -->
          <div class="text-center mb-4">
            <div class="d-inline-flex gap-2 category-pill-wrap">
              <button class="cat-tab btn active">Business Funding Package</button>
            </div>
          </div>

          <!-- COURSE CARD -->
          <div class="full-course-card mx-auto">
            <div class="full-course-left">
              <span class="badge">Coming Soon</span>
              <h3>Business Funding</h3>
              <ul class="full-feature-list">
                <li>2 Business Meetings</li>
              </ul>
            </div>
            <div class="full-course-right">
              <span class="best-value">BEST VALUE</span>
              <h2 class="price">₹499</h2>
              <div class="plan-cta mt-3"><button class="cta-btn btn-solid w-100" onclick="startPurchase('business-funding', 'TOTAL')">Buy Now</button></div>
            </div>
          </div>

        </div>
      </div>


    </div>
</section>

<!-- Auth Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content auth-modal-content border-0">
      <div class="modal-header border-0 pb-0">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4 pt-0">
        <div class="text-center mb-4">
          <img src="<?= BASE_URL ?>assets/images/logo/logo-white-new.png" alt="MI Skills" style="height: 40px;" class="mb-3">
          <h4 class="fw-bold" id="authModalTitle">Instant Enrollment</h4>
          <p class="text-white-50 small">Quickly secure your spot in this course</p>
        </div>

        <!-- Instant Enrollment State -->
        <div id="directSubscribeState">
          <div class="mb-3">
            <label class="form-label small text-white-50">Full Name</label>
            <div class="input-group custom-input-group">
              <span class="input-group-text bg-transparent border-end-0 text-white-50"><i class="bi bi-person"></i></span>
              <input type="text" id="directName" class="form-control bg-transparent border-start-0 text-white" placeholder="Enter your full name">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label small text-white-50">Phone Number</label>
            <div class="input-group custom-input-group">
              <span class="input-group-text bg-transparent border-end-0 text-white-50"><i class="bi bi-phone"></i></span>
              <input type="text" id="directPhone" class="form-control bg-transparent border-start-0 text-white" placeholder="Enter your phone number">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label small text-white-50">Email Address</label>
            <div class="input-group custom-input-group">
              <span class="input-group-text bg-transparent border-end-0 text-white-50"><i class="bi bi-envelope"></i></span>
              <input type="email" id="directEmail" class="form-control bg-transparent border-start-0 text-white" placeholder="Enter your email address">
            </div>
          </div>
          <div class="mb-4">
            <label class="form-label small text-white-50">Path Preference</label>
            <div class="pref-group">
              <input type="radio" class="btn-check" name="direct_preference" id="direct-pref-learning" value="LEARNING" checked onchange="validatePreferenceSelection()">
              <label class="pref-label" for="direct-pref-learning">Learning</label>

              <input type="radio" class="btn-check" name="direct_preference" id="direct-pref-funding" value="FUNDING" onchange="validatePreferenceSelection()">
              <label class="pref-label" for="direct-pref-funding">Funding</label>
            </div>
            <div id="pref-warning" class="text-warning small mt-2" style="display:none;">
              <i class="bi bi-exclamation-triangle-fill me-1"></i> Funding is only available for Business Funding course. Switched to Learning.
            </div>
          </div>
          <button class="btn btn-auth-gradient w-100 mb-3 py-2 fw-bold" onclick="handleDirectSubscribe()">Continue to Payment</button>
          <div class="text-center">
            <span class="small text-white-50">By continuing, you agree to our Terms and Privacy Policy.</span>
          </div>
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
  <h5 class="text-white fw-bold mb-1">Securing Your Enrollment</h5>
  <p class="text-white-50 small">Please wait while we connect to the payment gateway...</p>
</div>

<!-- ================= PRICING SECTION END ================= -->


<!-- Start  take-action Section-->

<section class=" elf-section " id="take-action" style="background: #673ab7;">
  <div class="overlay-photo-image-bg  " data-bg-img="<?=BASE_URL?>assets/images/hero/white-bg.jpg" data-bg-opacity=".25"> </div>
  <div class="cta-wrapper">
    <div class="container">
      <div class="sec-heading  centered mb-0 ">
        <!-- <div class="content-area"><span class=" pre-title wow fadeInUp " data-wow-delay=".2s">contact us</span> -->
        <h4 class=" title    wow fadeInUp" data-wow-delay=".4s">Get in touch with us</h4>
        <p class="info-text   wow fadeInUp " data-wow-delay=".6s">Our team at MI Skills is here to guide you at every
          step—from learning to real-world success. <br>Connect with us today and take the next step toward your career
          goals.</p>
      </div>
    </div>

    <div class=" see-more-area wow fadeInUp" data-wow-delay="0.8s"><a class=" btn btn-dark cta-link"
        href="<?= BASE_URL ?>contact-us">contact us</a></div>


  </div>
  </div>
</section>

<script>
// Toggle functions for Web Development
function toggleWeb(type) {
  if (type === 'individual') {
    document.getElementById('web_individual').style.display = 'block';
    document.getElementById('web_full').style.display = 'none';
    document.getElementById('btnIndividual').classList.add('active');
    document.getElementById('btnFull').classList.remove('active');
  } else {
    document.getElementById('web_individual').style.display = 'none';
    document.getElementById('web_full').style.display = 'block';
    document.getElementById('btnIndividual').classList.remove('active');
    document.getElementById('btnFull').classList.add('active');
  }
}

// Toggle functions for App Development
function toggleApp(type) {
  if (type === 'individual') {
    document.getElementById('app_individual').style.display = 'block';
    document.getElementById('app_full').style.display = 'none';
    document.getElementById('btnAppIndividual').classList.add('active');
    document.getElementById('btnAppFull').classList.remove('active');
  } else {
    document.getElementById('app_individual').style.display = 'none';
    document.getElementById('app_full').style.display = 'block';
    document.getElementById('btnAppIndividual').classList.remove('active');
    document.getElementById('btnAppFull').classList.add('active');
  }
}

// Toggle functions for AI & Applied Machine Learning
function toggleAiMl(type) {
  if (type === 'individual') {
    document.getElementById('ai_ml_individual').style.display = 'block';
    document.getElementById('ai_ml_full').style.display = 'none';
    document.getElementById('btnAiMlIndividual').classList.add('active');
    document.getElementById('btnAiMlFull').classList.remove('active');
  } else {
    document.getElementById('ai_ml_individual').style.display = 'none';
    document.getElementById('ai_ml_full').style.display = 'block';
    document.getElementById('btnAiMlIndividual').classList.remove('active');
    document.getElementById('btnAiMlFull').classList.add('active');
  }
}

// Toggle functions for Cloud Computing & DevOps
function toggleCloudDevops(type) {
  if (type === 'individual') {
    document.getElementById('cloud_devops_individual').style.display = 'block';
    document.getElementById('cloud_devops_full').style.display = 'none';
    document.getElementById('btnCloudIndividual').classList.add('active');
    document.getElementById('btnCloudFull').classList.remove('active');
  } else {
    document.getElementById('cloud_devops_individual').style.display = 'none';
    document.getElementById('cloud_devops_full').style.display = 'block';
    document.getElementById('btnCloudIndividual').classList.remove('active');
    document.getElementById('btnCloudFull').classList.add('active');
  }
}

// Toggle functions for Data Science with Gen AI
function toggleDataScience(type) {
  if (type === 'individual') {
    document.getElementById('data_science_individual').style.display = 'block';
    document.getElementById('data_science_full').style.display = 'none';
    document.getElementById('btnDataScienceIndividual').classList.add('active');
    document.getElementById('btnDataScienceFull').classList.remove('active');
  } else {
    document.getElementById('data_science_individual').style.display = 'none';
    document.getElementById('data_science_full').style.display = 'block';
    document.getElementById('btnDataScienceIndividual').classList.remove('active');
    document.getElementById('btnDataScienceFull').classList.add('active');
  }
}

// Toggle functions for Cybersecurity - AI & Cloud Security
function toggleCybersecurity(type) {
  if (type === 'individual') {
    document.getElementById('cybersecurity_individual').style.display = 'block';
    document.getElementById('cybersecurity_full').style.display = 'none';
    document.getElementById('btnCybersecurityIndividual').classList.add('active');
    document.getElementById('btnCybersecurityFull').classList.remove('active');
  } else {
    document.getElementById('cybersecurity_individual').style.display = 'none';
    document.getElementById('cybersecurity_full').style.display = 'block';
    document.getElementById('btnCybersecurityIndividual').classList.remove('active');
    document.getElementById('btnCybersecurityFull').classList.add('active');
  }
}

// Toggle functions for Data Analytics with Gen AI
function toggleDataAnalytics(type) {
  if (type === 'individual') {
    document.getElementById('data_analytics_individual').style.display = 'block';
    document.getElementById('data_analytics_full').style.display = 'none';
    document.getElementById('btnDataAnalyticsIndividual').classList.add('active');
    document.getElementById('btnDataAnalyticsFull').classList.remove('active');
  } else {
    document.getElementById('data_analytics_individual').style.display = 'none';
    document.getElementById('data_analytics_full').style.display = 'block';
    document.getElementById('btnDataAnalyticsIndividual').classList.remove('active');
    document.getElementById('btnDataAnalyticsFull').classList.add('active');
  }
}

// Toggle functions for Digital Marketing
function toggleMarketing(type) {
  if (type === 'individual') {
    document.getElementById('marketing_individual').style.display = 'block';
    document.getElementById('marketing_full').style.display = 'none';
    document.getElementById('btnMarketingIndividual').classList.add('active');
    document.getElementById('btnMarketingFull').classList.remove('active');
  } else {
    document.getElementById('marketing_individual').style.display = 'none';
    document.getElementById('marketing_full').style.display = 'block';
    document.getElementById('btnMarketingIndividual').classList.remove('active');
    document.getElementById('btnMarketingFull').classList.add('active');
  }
}

// Toggle functions for Graphic Designing
function toggleGraphic(type) {
  if (type === 'individual') {
    document.getElementById('graphic_individual').style.display = 'block';
    document.getElementById('graphic_full').style.display = 'none';
    document.getElementById('btnGraphicIndividual').classList.add('active');
    document.getElementById('btnGraphicFull').classList.remove('active');
  } else {
    document.getElementById('graphic_individual').style.display = 'none';
    document.getElementById('graphic_full').style.display = 'block';
    document.getElementById('btnGraphicIndividual').classList.remove('active');
    document.getElementById('btnGraphicFull').classList.add('active');
  }
}

// Functions for category tabs
function activateTab(element) {
  const parent = element.parentElement;
  const buttons = parent.querySelectorAll('.cat-tab');
  buttons.forEach(btn => btn.classList.remove('active'));
  element.classList.add('active');
}

function showCategory(categoryId) {
  const allCategories = document.querySelectorAll('.category-content');
  allCategories.forEach(category => {
    category.style.display = 'none';
  });
  document.getElementById(categoryId).style.display = 'block';

  // Reset internal sub-toggles to 'individual' when switching main categories
  if (categoryId === 'web') toggleWeb('individual');
  if (categoryId === 'app') toggleApp('individual');
  if (categoryId === 'marketing') toggleMarketing('individual');
  if (categoryId === 'graphic') toggleGraphic('individual');
  if (categoryId === 'ai_ml') toggleAiMl('individual');
  if (categoryId === 'cloud_devops') toggleCloudDevops('individual');
  if (categoryId === 'data_science') toggleDataScience('individual');
  if (categoryId === 'cybersecurity') toggleCybersecurity('individual');
  if (categoryId === 'data_analytics') toggleDataAnalytics('individual');
}

function setLearningMode(mode) {
  if (mode === 'online') {
    document.getElementById('btnOnlineMode').classList.add('active');
    document.getElementById('btnOfflineMode').classList.remove('active');
    document.querySelectorAll('.online-price').forEach(el => el.style.display = 'block');
    document.querySelectorAll('.offline-price').forEach(el => el.style.display = 'none');
  } else {
    document.getElementById('btnOnlineMode').classList.remove('active');
    document.getElementById('btnOfflineMode').classList.add('active');
    document.querySelectorAll('.online-price').forEach(el => el.style.display = 'none');
    document.querySelectorAll('.offline-price').forEach(el => el.style.display = 'block');
  }
}
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>