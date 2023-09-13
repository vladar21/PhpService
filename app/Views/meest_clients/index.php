<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?php
// Load the breadcrumb helper
helper('breadcrumb');

// Breadcrumb items
$breadcrumbs = [
    'Home' => site_url(),
    'Meest Clients' => base_url('meest_clients'),
];

// Generate and display the breadcrumbs
echo generate_breadcrumbs($breadcrumbs, ' / ');
?>

<h2 class="float-left"><?= lang('app_lang.meest_clients') ?></h2>
<!-- Button to load products -->
<button type="submit" id="loadClientsBtn" class="btn btn-primary float-right"><?= lang('app_lang.update_clients') ?></button>
<div class="clear-both"></div>
<div class="table-container">
    <table id="meestClientsTable" class="dataTable">
        <thead>
        <tr>
            <th><?= lang('app_lang.id') ?></th>
            <th><?= lang('app_lang.bill_client_id') ?></th>
            <th><?= lang('app_lang.company_name') ?></th>
            <th><?= lang('app_lang.name') ?></th>
            <th><?= lang('app_lang.phone') ?></th>
            <th><?= lang('app_lang.email') ?></th>
            <th><?= lang('app_lang.zip_code') ?></th>
            <th><?= lang('app_lang.country') ?></th>
            <th><?= lang('app_lang.city') ?></th>
            <th><?= lang('app_lang.street') ?></th>
            <th><?= lang('app_lang.building_number') ?></th>
            <th><?= lang('app_lang.flat_number') ?></th>
            <th><?= lang('app_lang.pickup_point') ?></th>
            <th><?= lang('app_lang.region1') ?></th>
            <th><?= lang('app_lang.region2') ?></th>
            <th><?= lang('app_lang.created_at') ?></th>
            <th><?= lang('app_lang.updated_at') ?></th>
            <th><?= lang('app_lang.actions') ?></th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <br/>
</div>

<link rel="stylesheet" href="<?= base_url('assets/css/meest_clients/index.css') ?>">
<script src="<?= base_url('assets/js/meest_clients/index.js') ?>"></script>


<?= $this->endSection() ?>

