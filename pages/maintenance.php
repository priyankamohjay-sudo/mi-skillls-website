<?php
require_once __DIR__ . '/../includes/config.php';

// Redirect to home if maintenance mode is not active
if (!defined('MAINTENANCE_MODE') || !MAINTENANCE_MODE) {
    // Calculate base path dynamically to avoid cross-domain redirection issues
    $currentDir = dirname($_SERVER['SCRIPT_NAME']);
    $currentDir = str_replace('\\', '/', $currentDir);
    $basePath = rtrim($currentDir, '/');
    if (preg_match('#/pages(/courses)?$#', $basePath)) {
        $basePath = preg_replace('#/pages(/courses)?$#', '', $basePath);
    }
    $redirectUrl = $basePath ?: '/';
    header("Location: " . $redirectUrl);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Under Maintenance - MI Skills</title>
    <!-- fav icon -->
    <link rel="icon" href="<?= BASE_URL ?>assets/images/fav-icon/logo-new.png">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/vendors/bootstrap.min.css">
    <!-- fontAwesome -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/vendors/all.min.css">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/vendors/bootstrap-icons-1.9.1/bootstrap-icons.css">
    <!-- Font Family -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&amp;display=swap">
    <!-- main-LTR -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main-LTR.css?v=<?= time() ?>">
    <style>
        body.dark-theme {
            background-color: #121212;
            color: #ffffff;
            font-family: 'Jost', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .maintenance-container {
            max-width: 600px;
            text-align: center;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 50px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
        }
        .maintenance-logo {
            max-height: 60px;
            margin-bottom: 40px;
        }
        .maintenance-icon {
            font-size: 80px;
            color: #ff4a5a;
            margin-bottom: 30px;
            animation: spin 8s linear infinite;
            display: inline-block;
        }
        @keyframes spin {
            100% { transform: rotate(360deg); }
        }
        .maintenance-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(144deg, #af40ff, #5b42f3 50%, #00ddeb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .maintenance-text {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .brand-color-text {
            color: #ff4a5a;
            font-weight: 600;
        }
    </style>
</head>
<body class="dark-theme">
    <div class="maintenance-container">
        <!-- Logo -->
        <img class="maintenance-logo" src="<?= BASE_URL ?>assets/images/logo/logo-white-new.png" alt="MI Skills Logo">
        
        <!-- Icon -->
        <div>
            <i class="fas fa-cog maintenance-icon"></i>
        </div>
        
        <!-- Heading -->
        <h1 class="maintenance-title">We'll Be Back Soon!</h1>
        
        <!-- Message -->
        <p class="maintenance-text">
            <span class="brand-color-text">MI Skills</span> is currently undergoing temporary maintenance due to a server disk space issue. 
            We are actively resolving this and will be back online shortly.
        </p>
    </div>
</body>
</html>
