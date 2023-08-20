<?php $base_url = base_url('/'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href=<?= $base_url."assets/css/styles.css" ?>>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<div class="container">
    <!--    Main part -->
    <header class="header">
        <h1 class="logo">PHP Service</h1>
        <nav class="navigation">
            <ul class="nav-links">
                <li class="nav-link"><a href="/auth/login"><?= lang('app_lang.login') ?></a></li>
                <li class="nav-link"><a href="/auth/register"><?= lang('app_lang.register') ?></a></li>
            </ul>
        </nav>

    </header>

    <main class="content">
        <!-- Messages -->
        <div id="successMessage"></div>

        <div id="errorMessage" style="display: none;" class="alert alert-danger"></div>

        <!--        Content -->
        <?= $this->renderSection('content') ?>

    </main>
    <footer class="footer">
        <span>&copy; <?php echo date('Y'); ?> PHP Service. All rights reserved.</span>
        <div class="social-icons">
            <a href="#" class="footer-icon"><i class="fab fa-telegram"></i></a>
            <a href="#" class="footer-icon"><i class="fab fa-viber"></i></a>
            <a href="#" class="footer-icon"><i class="fab fa-twitter"></i></a>
        </div>
    </footer>
</div>



</body>

</html>