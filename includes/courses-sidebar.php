<?php
$coursesNav = [
  ['slug' => 'artificial-intelligence-and-applied-machine-learning', 'title' => 'AI & Applied Machine Learning', 'icon' => 'flaticon-strategy'],
  ['slug' => 'data-science-and-analytics-with-gen-ai', 'title' => 'Data Science and Analytics with <br>Gen AI', 'icon' => 'flaticon-database'],
  ['slug' => 'cloud-computing-and-devops', 'title' => 'Cloud Computing & DevOps (AWS / Azure / GCP)', 'icon' => 'flaticon-web-domain'],
  ['slug' => 'cybersecurity-ai-and-cloud-security', 'title' => 'Cyber Security (AI & Cloud Security)', 'icon' => 'flaticon-security'],
  ['slug' => 'web-and-app-development-with-ai-tools', 'title' => 'Web and App Development with AI Tools', 'icon' => 'flaticon-web-development'],
];
$activeCourse = $activeCourse ?? '';
?>
<ul class="list">
  <?php foreach ($coursesNav as $course): ?>
    <li class="list-item <?= $activeCourse === $course['slug'] ? 'active' : '' ?>">
      <i class="<?= $course['icon'] ?> font-icon"></i>
      <a href="<?= BASE_URL ?>course/<?= $course['slug'] ?>">
        <?= $course['title'] ?><i class="bi bi-arrow-right icon "></i>
      </a>
    </li>
  <?php endforeach; ?>
</ul>
