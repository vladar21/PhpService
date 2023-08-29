<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?php
// Load the breadcrumb helper
helper('breadcrumb');

// Breadcrumb items
$breadcrumbs = [
    'Home' => site_url(),
    'Meest Parcels' => base_url('meest_parcels'),
];

// Generate and display the breadcrumbs
echo generate_breadcrumbs($breadcrumbs, ' / ');
?>

<h2 class="float-left"><?= lang('app_lang.meest_parcels') ?></h2>
<!-- Button  -->
<!--<button type="submit" id="loadInvoicesBtn" class="btn btn-primary float-right">Update Invoices</button>-->
<div class="clear-both"></div>

<div class="table-container">
    <table id="meestParcelsTable" class="dataTable">
        <thead>
        <tr>
            <th><?= lang('app_lang.id') ?></th>
            <th><?= lang('app_lang.parcelNumber') ?></th>
            <th><?= lang('app_lang.parcelNumberInternal') ?></th>
            <th><?= lang('app_lang.parcelNumberParent') ?></th>
            <th><?= lang('app_lang.partnerKey') ?></th>
            <th><?= lang('app_lang.bagId') ?></th>
            <th><?= lang('app_lang.carrierLastMile') ?></th>
            <th><?= lang('app_lang.createReturnParcel') ?></th>
            <th><?= lang('app_lang.returnCarrier') ?></th>
            <th><?= lang('app_lang.cod') ?></th>
            <th><?= lang('app_lang.codCurrency') ?></th>
            <th><?= lang('app_lang.deliveryCost') ?></th>
            <th><?= lang('app_lang.serviceType') ?></th>
            <th><?= lang('app_lang.totalValue') ?></th>
            <th><?= lang('app_lang.currency') ?></th>
            <th><?= lang('app_lang.fulfillment') ?></th>
            <th><?= lang('app_lang.incoterms') ?></th>
            <th><?= lang('app_lang.iossVatIDenc') ?></th>
            <th><?= lang('app_lang.senderID') ?></th>
            <th><?= lang('app_lang.weight') ?></th>
            <th><?= lang('app_lang.name_recipient') ?></th>
            <th><?= lang('app_lang.name_sender') ?></th>
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


<link rel="stylesheet" href="<?= base_url('assets/css/meest_parcels/index.css') ?>">
<script src="<?= base_url('assets/js/meest_parcels/index.js') ?>"></script>


<?= $this->endSection() ?>

