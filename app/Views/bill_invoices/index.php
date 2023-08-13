<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?php
// Load the breadcrumb helper
helper('breadcrumb');

// Breadcrumb items
$breadcrumbs = [
    'Home' => site_url(),
    'Bill Invoices' => base_url('bill_invoices'),
];

// Generate and display the breadcrumbs
echo generate_breadcrumbs($breadcrumbs, ' / ');
?>

<h2>Bill Invoices</h2>
<div class="table-container">
    <table id="billInvoicesTable" class="dataTable">
        <thead>
        <tr>
            <th><?= lang('app_lang.id') ?></th>
            <th><?= lang('app_lang.user_id') ?></th>
            <th><?= lang('app_lang.number') ?></th>
            <th><?= lang('app_lang.place') ?></th>
            <th><?= lang('app_lang.sell_date') ?></th>
            <th><?= lang('app_lang.price_net') ?></th>
            <th><?= lang('app_lang.price_gross') ?></th>
            <th><?= lang('app_lang.currency') ?></th>
            <th><?= lang('app_lang.description') ?></th>
            <th><?= lang('app_lang.seller_name') ?></th>
            <th><?= lang('app_lang.seller_tax_no') ?></th>
            <th><?= lang('app_lang.seller_street') ?></th>
            <th><?= lang('app_lang.seller_post_code') ?></th>
            <th><?= lang('app_lang.seller_city') ?></th>
            <th><?= lang('app_lang.seller_country') ?></th>
            <th><?= lang('app_lang.seller_email') ?></th>
            <th><?= lang('app_lang.seller_phone') ?></th>
            <th><?= lang('app_lang.seller_www') ?></th>
            <th><?= lang('app_lang.seller_bank') ?></th>
            <th><?= lang('app_lang.seller_bank_account') ?></th>
            <th><?= lang('app_lang.buyer_name') ?></th>
            <th><?= lang('app_lang.buyer_post_code') ?></th>
            <th><?= lang('app_lang.buyer_city') ?></th>
            <th><?= lang('app_lang.buyer_street') ?></th>
            <th><?= lang('app_lang.buyer_first_name') ?></th>
            <th><?= lang('app_lang.buyer_country') ?></th>
            <th><?= lang('app_lang.created_at') ?></th>
            <th><?= lang('app_lang.updated_at') ?></th>
            <th><?= lang('app_lang.token') ?></th>
            <th><?= lang('app_lang.buyer_email') ?></th>
            <th><?= lang('app_lang.client_id') ?></th>
            <th><?= lang('app_lang.lang') ?></th>
            <th><?= lang('app_lang.product_cache') ?></th>
            <th><?= lang('app_lang.buyer_last_name') ?></th>
            <th><?= lang('app_lang.delivery_date') ?></th>

            <th><?= lang('app_lang.actions') ?></th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <br/>
</div>


<link rel="stylesheet" href="<?= base_url('assets/css/bill_invoices/index.css') ?>">
<script src="<?= base_url('assets/js/bill_invoices/index.js') ?>"></script>


<?= $this->endSection() ?>

