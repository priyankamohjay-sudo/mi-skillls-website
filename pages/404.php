<?php
http_response_code(404);
require_once __DIR__ . '/../includes/header.php';
?>

<section style="text-align:center; padding:80px 20px;">
    <h1 style="font-size:72px; margin-bottom:10px;">404</h1>
    <h2>Page Not Found</h2>
    <p>The page you are looking for doesn’t exist or has been moved.</p>

    <a href="<?= BASE_URL ?>" 
       style="display:inline-block;margin-top:20px;padding:12px 25px;background:#007bff;color:#fff;text-decoration:none;border-radius:4px;">
        Go to Home
    </a>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
