<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?php
// Load the breadcrumb helper
helper('breadcrumb');

// Breadcrumb items
$breadcrumbs = [
    'Home' => site_url(),
    'Dashboard' => base_url('dashboard'),
];

// Generate and display the breadcrumbs
echo generate_breadcrumbs($breadcrumbs, ' / ');
?>

<h2 class="float-left"><?= lang('app_lang.dashboard') ?></h2>
<!-- Button to load invoices -->
<!--<button type="submit" id="loadInvoicesBtn" class="btn btn-primary float-right">Update Invoices</button>-->
<div class="clear-both"></div>

<div class="table-container">
    <table id="usersTable" class="dataTable">
        <thead>
        <tr>
            <th><?= lang('app_lang.id') ?></th>
            <th><?= lang('app_lang.username') ?></th>
            <th><?= lang('app_lang.status') ?></th>
            <th><?= lang('app_lang.status_message') ?></th>
            <th><?= lang('app_lang.active') ?></th>
            <th><?= lang('app_lang.last_active') ?></th>
            <th><?= lang('app_lang.created_at') ?></th>
            <th><?= lang('app_lang.updated_at') ?></th>
            <th><?= lang('app_lang.deleted_at') ?></th>
            <th><?= lang('app_lang.actions') ?></th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <br/>
</div>


<link rel="stylesheet" href="<?= base_url('assets/css/dashboard/index.css') ?>">
<script src="<?= base_url('assets/js/dashboard/index.js') ?>"></script>


<?= $this->endSection() ?>

