<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?php
// Load the breadcrumb helper
helper('breadcrumb');

// Breadcrumb items
$breadcrumbs = [
    'Home' => site_url(),
    'Bill Clients' => base_url('bill_clients'),
];

// Generate and display the breadcrumbs
echo generate_breadcrumbs($breadcrumbs, ' / ');
?>

<h2 class="float-left"><?= lang('app_lang.bill_clients') ?></h2>
<!-- Button to load products -->
<button type="submit" id="loadClientsBtn" class="btn btn-primary float-right"><?= lang('app_lang.update_clients') ?></button>
<div class="clear-both"></div>
<div class="table-container">
    <table id="billClientsTable" class="dataTable">
        <thead>
        <tr>
            <th><?= lang('app_lang.id') ?></th>
            <th><?= lang('app_lang.name') ?></th>
            <th><?= lang('app_lang.tax_no') ?></th>
            <th><?= lang('app_lang.post_code') ?></th>
            <th><?= lang('app_lang.city') ?></th>
            <th><?= lang('app_lang.street') ?></th>
            <th><?= lang('app_lang.first_name') ?></th>
            <th><?= lang('app_lang.country') ?></th>
            <th><?= lang('app_lang.email') ?></th>
            <th><?= lang('app_lang.phone') ?></th>
            <th><?= lang('app_lang.www') ?></th>
            <th><?= lang('app_lang.fax') ?></th>
            <th><?= lang('app_lang.created_at') ?></th>
            <th><?= lang('app_lang.updated_at') ?></th>
            <th><?= lang('app_lang.street_no') ?></th>
            <th><?= lang('app_lang.kind') ?></th>
            <th><?= lang('app_lang.bank') ?></th>
            <th><?= lang('app_lang.bank_account') ?></th>
            <th><?= lang('app_lang.bank_account_id') ?></th>
            <th><?= lang('app_lang.shortcut') ?></th>
            <th><?= lang('app_lang.note') ?></th>
            <th><?= lang('app_lang.last_name') ?></th>
            <th><?= lang('app_lang.referrer') ?></th>
            <th><?= lang('app_lang.token') ?></th>
            <th><?= lang('app_lang.fuid') ?></th>
            <th><?= lang('app_lang.fname') ?></th>
            <th><?= lang('app_lang.femail') ?></th>
            <th><?= lang('app_lang.department_id') ?></th>
            <th><?= lang('app_lang.import') ?></th>
            <th><?= lang('app_lang.discount') ?></th>
            <th><?= lang('app_lang.payment_to_kind') ?></th>
            <th><?= lang('app_lang.category_id') ?></th>
            <th><?= lang('app_lang.use_delivery_address') ?></th>
            <th><?= lang('app_lang.delivery_address') ?></th>
            <th><?= lang('app_lang.person') ?></th>
            <th><?= lang('app_lang.panel_user_id') ?></th>
            <th><?= lang('app_lang.use_mass_payment') ?></th>
            <th><?= lang('app_lang.mass_payment_code') ?></th>
            <th><?= lang('app_lang.external_id') ?></th>
            <th><?= lang('app_lang.company') ?></th>
            <th><?= lang('app_lang.title') ?></th>
            <th><?= lang('app_lang.mobile_phone') ?></th>
            <th><?= lang('app_lang.register_number') ?></th>
            <th><?= lang('app_lang.tax_no_check') ?></th>
            <th><?= lang('app_lang.attachments_count') ?></th>
            <th><?= lang('app_lang.default_payment_type') ?></th>
            <th><?= lang('app_lang.tax_no_kind') ?></th>
            <th><?= lang('app_lang.accounting_id') ?></th>
            <th><?= lang('app_lang.disable_auto_reminders') ?></th>
            <th><?= lang('app_lang.buyer_id') ?></th>
            <th><?= lang('app_lang.price_list_id') ?></th>
            <th><?= lang('app_lang.panel_url') ?></th>
            <th><?= lang('app_lang.actions') ?></th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <br/>
</div>

<link rel="stylesheet" href="<?= base_url('assets/css/bill_clients/index.css') ?>">
<script src="<?= base_url('assets/js/bill_clients/index.js') ?>"></script>


<?= $this->endSection() ?>

