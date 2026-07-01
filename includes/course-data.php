<?php
/**
 * Central course data file.
 * Each key is the course slug (matches $activeCourse in each course page).
 * Used by course detail pages to dynamically render:
 *   - "What You'll Learn in This Course" section
 *   - "Topics Included in This Course" section (course syllabus)
 */
$courseData = [

  // ── Web and App Development with AI Tools ─────────────────────────────────
  'web-and-app-development-with-ai-tools' => [
    'what_you_learn' => [
      'Full-stack web development (frontend &amp; backend)',
      'Android, iOS, and cross-platform mobile app development',
      'Using AI tools to accelerate coding and design',
      'Building responsive websites and mobile applications',
      'Working with databases, APIs, and server-side logic',
      'App testing, debugging, and deployment',
    ],
    'topics' => [
      [
        'title'       => 'Web Development Fundamentals',
        'description' => 'HTML, CSS, JavaScript, responsive UI, and modern frontend frameworks.',
      ],
      [
        'title'       => 'Backend Development',
        'description' => 'Server-side logic, databases, APIs, and authentication for dynamic web apps.',
      ],
      [
        'title'       => 'Android &amp; iOS Development',
        'description' => 'Build native mobile applications with industry-standard tools and frameworks.',
      ],
      [
        'title'       => 'Cross-Platform Development',
        'description' => 'Create apps for multiple platforms using Flutter and React Native.',
      ],
      [
        'title'       => 'AI Tools for Development',
        'description' => 'Leverage AI assistants to speed up coding, debugging, and project delivery.',
      ],
      [
        'title'       => 'Real-World Projects',
        'description' => 'Hands-on web and mobile projects to build a strong developer portfolio.',
      ],
    ],
  ],

  // ── Artificial Intelligence &amp; Applied Machine Learning ──────────────────
  'artificial-intelligence-and-applied-machine-learning' => [
    'what_you_learn' => [
      'Fundamentals of Artificial Intelligence and Machine Learning',
      'Data preprocessing and feature engineering',
      'Supervised and unsupervised learning techniques',
      'Model training, evaluation, and optimization',
      'Working with real-world datasets',
      'Introduction to Deep Learning concepts',
    ],
    'topics' => [
      [
        'title'       => 'Introduction to Artificial Intelligence &amp; Applied Machine Learning',
        'description' => 'Understand the fundamentals of AI and Machine Learning and how they are transforming industries. Learn how intelligent systems are designed to analyze data and make decisions.',
      ],
      [
        'title'       => 'Artificial Intelligence',
        'description' => 'Explore the core concepts of AI including problem-solving, reasoning, and automation. Learn how AI is used to build smart applications across various domains.',
      ],
      [
        'title'       => 'Machine Learning',
        'description' => 'Learn how machines learn from data using supervised and unsupervised techniques. Understand model building, training, and evaluation for predictive analysis.',
      ],
      [
        'title'       => 'Data Analysis &amp; Visualization',
        'description' => 'Gain skills in analyzing data and extracting meaningful insights. Learn to visualize data using charts and tools to support better decision-making.',
      ],
      [
        'title'       => 'Real-World Projects &amp; Case Studies',
        'description' => 'Work on practical projects and real-life scenarios to apply your knowledge. Build hands-on experience and develop a strong portfolio for career growth.',
      ],
    ],
  ],

  // ── Data Science and Analytics with Gen AI ────────────────────────────────
  'data-science-and-analytics-with-gen-ai' => [
    'what_you_learn' => [
      'Data science and analytics fundamentals with Generative AI',
      'Data collection, cleaning, preprocessing, and visualization',
      'Statistical analysis and machine learning algorithms',
      'SQL, Python, and business intelligence tools',
      'Large Language Models (LLMs) and prompt engineering',
      'Building data-driven and AI-powered applications',
    ],
    'topics' => [
      [
        'title'       => 'Data Science Fundamentals',
        'description' => 'Core concepts of data handling, analysis, and model building for intelligent solutions.',
      ],
      [
        'title'       => 'Data Analytics &amp; Visualization',
        'description' => 'SQL querying, dashboards, reporting, and insight generation using BI tools.',
      ],
      [
        'title'       => 'Machine Learning',
        'description' => 'Supervised and unsupervised learning, model evaluation, and optimization.',
      ],
      [
        'title'       => 'Generative AI &amp; LLMs',
        'description' => 'Apply Gen AI models and prompt engineering to enhance data workflows.',
      ],
      [
        'title'       => 'Real-World Projects',
        'description' => 'Work on industry datasets to build a strong data science portfolio.',
      ],
    ],
  ],

  // ── Cloud Computing &amp; DevOps ───────────────────────────────────────────
  'cloud-computing-and-devops' => [
    'what_you_learn' => [
      'Fundamentals of Cloud Computing and DevOps',
      'Working with AWS, Azure, and GCP',
      'IaaS and PaaS concepts',
      'CI/CD pipelines and automation tools',
      'Containerization and deployment strategies',
      'Monitoring and managing cloud applications',
    ],
    'topics' => [
      [
        'title'       => 'Introduction to Cloud Computing &amp; DevOps',
        'description' => 'Understand the core concepts of cloud computing and how DevOps bridges development and operations.',
      ],
      [
        'title'       => 'Cloud Computing Fundamentals',
        'description' => 'Learn IaaS, PaaS, SaaS, scalability, virtualization, and storage concepts.',
      ],
      [
        'title'       => 'DevOps Practices &amp; Workflow',
        'description' => 'Learn CI/CD, automation, and collaboration for faster delivery.',
      ],
      [
        'title'       => 'Amazon Web Services (AWS)',
        'description' => 'Work with EC2, S3 and deploy scalable applications.',
      ],
      [
        'title'       => 'Microsoft Azure',
        'description' => 'Learn virtual machines, app services, and cloud infrastructure.',
      ],
      [
        'title'       => 'Google Cloud Platform (GCP)',
        'description' => 'Explore GCP tools for computing, storage, and deployment.',
      ],
    ],
  ],

  // ── Cybersecurity – AI &amp; Cloud Security ────────────────────────────────
  'cybersecurity-ai-and-cloud-security' => [
    'what_you_learn' => [
      'Fundamentals of Cybersecurity and threat management',
      'Network security and system protection techniques',
      'Cloud security principles and best practices',
      'Role of AI in cybersecurity and threat detection',
      'Risk assessment and vulnerability management',
      'Working with real-world security tools and scenarios',
    ],
    'topics' => [
      [
        'title'       => 'Introduction to Cybersecurity &amp; AI Security',
        'description' => 'Understand the basics of cybersecurity and how AI is transforming threat detection and prevention. Learn about common cyber threats and modern security approaches.',
      ],
      [
        'title'       => 'Cybersecurity Fundamentals',
        'description' => 'Explore key concepts such as network security, encryption, authentication, and data protection. Learn how systems are secured against potential attacks.',
      ],
      [
        'title'       => 'Cloud Security Fundamentals',
        'description' => 'Understand how cloud environments are secured, including identity management, data protection, and secure configurations. Learn best practices for cloud-based applications.',
      ],
      [
        'title'       => 'AI in Cybersecurity',
        'description' => 'Learn how AI is used to detect threats, automate responses, and improve security systems. Explore real-world use cases of AI in cyber defense.',
      ],
      [
        'title'       => 'Risk Management &amp; Threat Analysis',
        'description' => 'Gain skills in identifying vulnerabilities, analyzing risks, and implementing security measures. Learn how to handle security incidents effectively.',
      ],
      [
        'title'       => 'Real-World Projects &amp; Case Studies',
        'description' => 'Work on practical cybersecurity scenarios and projects to apply your knowledge. Build hands-on experience in securing systems and cloud environments.',
      ],
    ],
  ],

];
