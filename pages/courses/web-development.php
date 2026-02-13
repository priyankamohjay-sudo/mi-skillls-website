<?php
$title = "Master Web Development: Best Online Courses Available";
$description = "Master web development with our hands-on courses. Explore HTML, CSS, JavaScript, and more to launch your career in the tech industry effectively.";
$tags = "web development courses, website development course, web programming course, website development classes";
require_once __DIR__ . '/../../includes/header.php'; 
?>

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
        Web Development
      </h1>

      <nav aria-label="breadcrumb">
        <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
          <li class="breadcrumb-item">
            <a class="breadcrumb-link" href="/">
              <i class="bi bi-house icon"></i> Home
            </a>
          </li>
          <li class="breadcrumb-item active">Web Development</li>
        </ul>
      </nav>
    </div>
  </div>

</section>
<!-- End inner Page hero-->


<!-- Start inner Page hero-->
<div class="service-single ">
  <div class="container">
    <div class="row">
      <!--Start service content-->
      <div class="col-12 col-xl-8  ">
        <div class="service-content-area">
          <div class="featured-img-area part"><img class="feat-img img-fluid"
              src="<?=BASE_URL?>assets/images/services/programming-background-collage.jpg" alt="featured image"></div>
          <div class="service-content">
            <div class="part">
              <h2 class="service-title">Build Modern Websites & Full-Stack Applications</h2>
              <h3 class="service-title">Course Overview</h3>
              <p class="info-text">Our Web Development course is designed to take you from fundamentals to
                industry-ready skills. You’ll learn how to design responsive user interfaces, build powerful backend
                systems, and deploy complete web applications. With live classes, hands-on projects, and real interview
                exposure, this course prepares you for real-world development roles.</p>
            </div>
            <div class="part">
              <div class="two-cols-img ">
                <div class="row">
                  <div class="col-12 col-md-6 mb-3">
                    <div class="img-col"><img class="img-fluid" src="<?=BASE_URL?>assets/images/services/website-1.jpg"
                        loading="lazy" alt="service single image "></div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="img-col"><img class="img-fluid" src="<?=BASE_URL?>assets/images/services/website.jpg" loading="lazy"
                        alt="service single image "></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="part">
              <h3 class="service-title">What You’ll Learn in This Course</h3>
              <p class="service-text">Frontend Development :</p>
              <p class="info-text">focuses on creating visually appealing, fast, and user-friendly websites.</p>
              <ul>
                <li>HTML5 for structured web development</li>
                <li>CSS3, Flexbox & Grid for responsive layouts</li>
                <li>JavaScript for interactive UI behavior</li>
                <li>Modern UI practices and performance optimization</li>
                <li>React website development</li>
              </ul>
            </div>

            <div class="part">
              <p class="service-text">Backend Development :</p>
              <p class="info-text">Our backend training helps students understand how applications work behind the
                scenes. From handling data to managing servers, students learn how to build secure and scalable systems.
              </p>
              <ul>
                <li>Server-side programming concepts</li>
                <li>Databases & data flow</li>
                <li>APIs and backend logic handling</li>

              </ul>
            </div>

            <div class="part">
              <p class="service-text">Full-Stack Development :</p>
              <p class="info-text">Students learn how frontend and backend work together as a complete system. This
                full-stack approach prepares them to handle complete projects independently.</p>
              <ul>
                <li>Frontend + Backend integration</li>
                <li>Real-world project architecture</li>
                <li>End-to-end application development</li>

              </ul>
            </div>

            <div class="part">
              <div class="info-items-list">
                <div class="row">
                  <div class="col-12 col-md-6 ">
                    <div class="info-item"><span class="info-number ">01.</span>
                      <div class="info-content">
                        <h5 class="info-title">Industry-Ready Skill Development</h5>
                        <p class="info-text">Learn the exact skills that companies look for today. This course prepares
                          students to build real websites and applications using modern development practices followed
                          in the industry.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 ">
                    <div class="info-item"><span class="info-number ">02.</span>
                      <div class="info-content">
                        <h5 class="info-title">Complete Frontend to Backend Learning</h5>
                        <p class="info-text">Instead of learning isolated technologies, students gain a complete
                          understanding of frontend, backend, and how both work together in real-world projects.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 ">
                    <div class="info-item"><span class="info-number ">03.</span>
                      <div class="info-content">
                        <h5 class="info-title">Practical Project-Based Training</h5>
                        <p class="info-text">Hands-on learning through live projects helps students apply concepts,
                          improve problem-solving skills, and build a strong portfolio that stands out to employers.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 ">
                    <div class="info-item"><span class="info-number ">04.</span>
                      <div class="info-content">
                        <h5 class="info-title">Career & Placement-Focused Approach</h5>
                        <p class="info-text">The course is designed to support students in internships, placements, and
                          freelance opportunities by focusing on job-oriented skills and practical experience.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="part">
              <h2 class="service-title">Frequently Asked Questions</h2>
              <div class="faq">
                <!--Start Accordion List For FAQ-->
                <div class="faq-accordion" id="accordion">
                  <div class="card mb-2">
                    <div class="card-header" id="heading-1">
                      <h5 class="mb-0 faq-title">
                        <button class="btn btn-link  faq-btn  collapsed " data-bs-toggle="collapse"
                          data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">Are the web
                          development courses beginner-friendly?</button>
                      </h5>
                    </div>
                    <div class="collapse " id="collapse-1" aria-labelledby="collapse-1" data-bs-parent="#accordion">
                      <div class="card-body">
                        <p class="faq-answer">Yes our web development courses are designed for beginners as well as
                          students with basic technical knowledge. We start from fundamentals and gradually move to
                          advanced concepts with hands-on practice.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card mb-2">
                    <div class="card-header " id="heading-2">
                      <h5 class="mb-0 faq-title">
                        <button class="btn btn-link  faq-btn  collapsed " data-bs-toggle="collapse"
                          data-bs-target="#collapse-2" aria-expanded="true" aria-controls="collapse-2">Will I receive
                          updates and new course content in the future?</button>
                      </h5>
                    </div>
                    <div class="collapse " id="collapse-2" aria-labelledby="collapse-2" data-bs-parent="#accordion">
                      <div class="card-body">
                        <p class="faq-answer">Yes students get access to future updates, new modules, and improvements
                          added to the course to keep the curriculum aligned with the latest industry trends.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card mb-2">
                    <div class="card-header " id="heading-3">
                      <h5 class="mb-0 faq-title">
                        <button class="btn btn-link  faq-btn  collapsed " data-bs-toggle="collapse"
                          data-bs-target="#collapse-3" aria-expanded="true" aria-controls="collapse-3">Do I get
                          certificates after completing the course?</button>
                      </h5>
                    </div>
                    <div class="collapse " id="collapse-3" aria-labelledby="collapse-3" data-bs-parent="#accordion">
                      <div class="card-body">
                        <p class="faq-answer">Yes students receive a course completion certificate after successfully
                          finishing the training and project work, which can be used for job applications and
                          internships.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card mb-2">
                    <div class="card-header " id="heading-4">
                      <h5 class="mb-0 faq-title">
                        <button class="btn btn-link  faq-btn  collapsed " data-bs-toggle="collapse"
                          data-bs-target="#collapse-4" aria-expanded="true" aria-controls="collapse-4">Will this course
                          help me with internships and placements?</button>
                      </h5>
                    </div>
                    <div class="collapse " id="collapse-4" aria-labelledby="collapse-4" data-bs-parent="#accordion">
                      <div class="card-body">
                        <p class="faq-answer">Yes the course focuses on practical projects, real-world scenarios, and
                          job-oriented skills that help students prepare for internships, placements, and entry-level
                          developer roles.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Start service content-->
      <!-- Start service sidebar-->
      <div class="col-12 col-xl-4">
        <div class="service-sidebar ">
          <div class="sidebar-pane">
            <h2 class="sidebar-title">list of Courses</h2>
            <ul class="list">
              <li class="list-item active"><i class="flaticon-web-development font-icon"></i><a
                  href="web-development.php"> web development<i class="bi bi-arrow-right icon "></i></a></li>
              <li class="list-item"><i class="flaticon-nanotechnology font-icon"></i><a href="digital-marketing.php">
                  Digital Marketing<i class="bi bi-arrow-right icon "></i></a></li>
              <li class="list-item"><i class="flaticon-web-domain font-icon"></i><a href="app-development.php"> App
                  Development<i class="bi bi-arrow-right icon "></i></a></li>
              <li class="list-item"><i class="flaticon-profile font-icon"></i><a href="graphic-designing.php"> Graphic
                  Desinging<i class="bi bi-arrow-right icon "></i></a></li>
              <li class="list-item"><i class="flaticon-search font-icon"></i><a href="testing.php">Testing<i
                    class="bi bi-arrow-right icon "></i></a></li>
              <li class="list-item"><i class="flaticon-strategy font-icon"></i><a href="networking.php"> Networking<i
                    class="bi bi-arrow-right icon "></i></a></li>
            </ul>
          </div>
          <div class="sidebar-pane">
            <div class="download-area">
              <h2 class="sidebar-title">Course Resources</h2>
              <p class="sidebar-text">Access all essential learning materials, guides, and documents related to your
                course. Download resources anytime to support your learning and practice.</p>
              <ul class="list">

                <li class="list-item"><i class="flaticon-downloading font-icon"></i><a href="courses.php">
                    All Courses<i class="bi bi-arrow-right icon "></i></a></li>
              </ul>
            </div>
          </div>
          <div class="sidebar-pane">
            <div class="social-area">
              <h2 class="sidebar-title">follow us</h2>
              <div class="sc-wrapper dir-row sc-size-40">
                <ul class="sc-list">
                  <li class="sc-item " title="Facebook"><a class="sc-link" target="_blank"
                      href="https://www.facebook.com/people/Miskillsofficial/61587243383829/?mibextid=wwXIfr&rdid=OYWqwYRmFVKFqtL8&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F16gAjpmgT9%2F%3Fmibextid%3DwwXIfr"
                      title="social media icon"><i class="fab fa-facebook-f sc-icon"></i></a></li>
                  <li class="sc-item " title="youtube"><a class="sc-link" target="_blank"
                      href="https://www.youtube.com/channel/UC0GbfPzvJazzHnPGJeOAgag" title="social media icon"><i
                        class="fab fa-youtube sc-icon"></i></a></li>
                  <li class="sc-item " title="instagram"><a class="sc-link" target="_blank"
                      href="https://www.instagram.com/miskills.india/?igsh=MWc4ZmZmYjkwMjhtcA%3D%3D&utm_source=qr#"
                      title="social media icon"><i class="fab fa-instagram sc-icon"></i></a></li>
                  <!-- <li class="sc-item " title="X"><a class="sc-link" href="#0" title="social media icon"><i class="fab fa-x-twitter sc-icon"></i></a></li> -->
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End service sidebar-->
    </div>
  </div>
</div>
<!-- End inner Page hero-->

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
        href="contact-us.php">contact us</a></div>

  </div>
  </div>
</section>

<!-- End  take-action Section-->

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>