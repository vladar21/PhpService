<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?php
// Load the breadcrumb helper
helper('breadcrumb');

// Breadcrumb items
$breadcrumbs = [
    'Home' => site_url(),
    'Meest Parcels' => base_url('meest_items'),
];

// Generate and display the breadcrumbs
echo generate_breadcrumbs($breadcrumbs, ' / ');
?>

<h2 class="float-left"><?= lang('app_lang.meest_items') ?></h2>
<!-- Button  -->
<!--<button type="submit" id="loadInvoicesBtn" class="btn btn-primary float-right">Update Invoices</button>-->
<div class="clear-both"></div>

<div class="table-container">
    <table id="parcelItemsTable">
        <thead>
        <tr>
            <th><?= lang('app_lang.p2p') ?></th>
            <th><?= lang('app_lang.product_id') ?></th>
            <th><?= lang('app_lang.barcode') ?></th>
            <th><?= lang('app_lang.brand') ?></th>
            <th><?= lang('app_lang.description') ?></th>
            <!--                    <th>--><?php //= lang('app_lang.descriptions') ?><!--</th>-->
            <th><?= lang('app_lang.hsCode') ?></th>
            <th><?= lang('app_lang.manufacturer') ?></th>
            <th><?= lang('app_lang.originCountry') ?></th>
            <th><?= lang('app_lang.productCategory') ?></th>
            <th><?= lang('app_lang.productEAN') ?></th>
            <th><?= lang('app_lang.productURL') ?></th>
            <th><?= lang('app_lang.quantity') ?></th>
            <th><?= lang('app_lang.skuCode') ?></th>
            <th><?= lang('app_lang.value') ?></th>
            <th><?= lang('app_lang.weight') ?></th>
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


<link rel="stylesheet" href="<?= base_url('assets/css/meest_items/index.css') ?>">
<script src="<?= base_url('assets/js/meest_items/index.js') ?>"></script>


<?= $this->endSection() ?>

