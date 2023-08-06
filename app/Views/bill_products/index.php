<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<h2>Bill Products</h2>
<!-- Button to load products -->
<button id="loadProductsBtn" class="btn btn-primary">Update Products from API</button>
<br>
<br>
<table id="billProductsTable">
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

<link rel="stylesheet" href="<?= base_url('assets/css/bill_products/index.css') ?>">
<script src="<?= base_url('assets/js/bill_products/index.js') ?>"></script>


<?= $this->endSection() ?>

