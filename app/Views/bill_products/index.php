<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?php
// Load the breadcrumb helper
helper('breadcrumb');

// Breadcrumb items
$breadcrumbs = [
    'Home' => site_url(),
    'Bill Products' => base_url('bill_products'),
];

// Generate and display the breadcrumbs
echo generate_breadcrumbs($breadcrumbs, ' / ');
?>

<h2 class="float-left">Bill Products</h2>
<!-- Button to load products -->
<button type="submit" id="loadProductsBtn" class="btn btn-primary float-right">Update Products</button>
<div class="clear-both"></div>
<div class="spinner-overlay">
    <div class="spinner"></div>
</div>
<div class="table-container">
    <table id="billProductsTable" class="dataTable">
        <thead>
        <tr>
            <th><?= lang('app_lang.id') ?></th>
            <th><?= lang('app_lang.name') ?></th>
            <th><?= lang('app_lang.description') ?></th>
            <th><?= lang('app_lang.price_net') ?></th>
            <th><?= lang('app_lang.quantity') ?></th>
            <th><?= lang('app_lang.quantity_unit') ?></th>
            <th><?= lang('app_lang.additional_info') ?></th>
            <th><?= lang('app_lang.price_gross') ?></th>
            <th><?= lang('app_lang.form_name') ?></th>
            <th><?= lang('app_lang.code') ?></th>
            <th><?= lang('app_lang.currency') ?></th>
            <th><?= lang('app_lang.weight_unit') ?></th>
            <th><?= lang('app_lang.supplier_code') ?></th>
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

<link rel="stylesheet" href="<?= base_url('assets/css/bill_products/index.css') ?>">
<script src="<?= base_url('assets/js/bill_products/index.js') ?>"></script>


<?= $this->endSection() ?>

