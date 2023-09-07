<?php $base_url = base_url('/'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= csrf_hash() ?>">
    <title>Admin Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href=<?= $base_url."assets/css/styles.css" ?>>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<div class="container">
<!--    Main part -->
    <header class="header">
        <h1 class="logo">PHP Service</h1>
        <nav class="navigation menu">
            <ul class="nav-links">
                <li class="nav-link"><a href="/">Home</a></li>
                <li class="nav-link"><a href="/dashboard">Users</a></li>
                <li class="nav-link"><span>Bills</span>
                    <ul class="submenu">
                        <li><a href="/bill_invoices">Invoices</a></li>
                        <li><a href="/bill_products">Products</a></li>
                        <li><a href="/bill_clients">Clients</a></li>
                    </ul>
                </li>
                <li class="nav-link"><span>Meest</span>
                    <ul class="submenu">
                        <li><a href="/meest_parcels">Parcels</a></li>
                        <li><a href="/meest_items">Items</a></li>
                        <li><a href="/meest_clients">Clients</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="search-panel">
            <input type="text" class="search-input" placeholder="Search...">
            <button class="search-button"><i class="fas fa-search"></i></button>
        </div>
    </header>

    <main class="content">
        <!-- Messages -->
        <div id="successMessage"></div>

        <div id="errorMessage" style="display: none;" class="alert alert-danger"></div>
        <!--        spinner -->
        <div class="spinner-overlay">
            <div class="spinner"></div>
        </div>
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

<!--BEGIN: APP variables-->
<div class="app-variables" style="display: none;"
     data-csrf_token="<?= csrf_token() ?>"

     data-base_url="<?= $base_url ?>"
     data-per_page="<?= !empty($per_page) ? $per_page : 10 ?>"
     data-language="<?= service('request')->getLocale(); ?>"

     data-not_applicable="<?= lang('not_applicable') ?>"
     data-title_active="<?= lang('active') ?>"
     data-title_deactive="<?= lang('deactive') ?>"
     data-title_activate="<?= lang('activate') ?>"
     data-title_deactivate="<?= lang('deactivate') ?>"
     data-title_edit="<?= lang('edit') ?>"
     data-title_restore="<?= lang('restore') ?>"
     data-title_delete="<?= lang('delete') ?>"
     data-title_report="<?= lang('report') ?>"
     data-title_profile="<?= lang('profile') ?>"
     data-title_view="<?= lang('view') ?>"
     data-title_history="<?= lang('history') ?>"
>
</div>

<script>
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


</script>
<script type="text/javascript" src= <?= $base_url."assets/js/helper.js" ?>></script>
</body>

</html>