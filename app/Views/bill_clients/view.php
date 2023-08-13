<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?php
// Load the breadcrumb helper
helper('breadcrumb');

// Breadcrumb items
$breadcrumbs = [
    'Home' => site_url(),
    'Bill Clients' => base_url('bill_clients'),
    'Client "'.$name.'"' => base_url('bill_clients/'.$id),
];

// Generate and display the breadcrumbs
echo generate_breadcrumbs($breadcrumbs, ' / ');
?>

<h2>Bill Product</h2>
<section id="billclient">
    <fieldset>
        <legend>Client's Data</legend>
        <form class="product-form">
            <div class="product-item">
                <label for="id"><?= lang('app_lang.id') ?>:</label>
                <input type="text" id="id" name="id" value="<?= $id ?>" >
            </div>
            <div class="product-item">
                <label for="name"><?= lang('app_lang.name') ?>:</label>
                <input type="text" id="name" name="name" value="<?= $name ?>" >
            </div>
            <div class="product-item">
                <label for="description"><?= lang('app_lang.description') ?>:</label>
                <input type="text" id="description" name="description" value="<?= $description ?>" >
            </div>
            <div class="product-item">
                <label for="price_net"><?= lang('app_lang.price_net') ?>:</label>
                <input type="date" id="price_net" name="price_net" value="<?= $price_net ?>" >
            </div>
            <div class="product-item">
                <label for="quantity"><?= lang('app_lang.quantity') ?>:</label>
                <input type="date" id="quantity" name="quantity" value="<?= $quantity ?>" >
            </div>
            <div class="product-item">
                <label for="quantity_unit"><?= lang('app_lang.quantity_unit') ?>:</label>
                <input type="date" id="quantity_unit" name="quantity_unit" value="<?= $quantity_unit ?>" >
            </div>
            <div class="product-item">
                <label for="additional_info"><?= lang('app_lang.additional_info') ?>:</label>
                <input type="text" id="additional_info" name="additional_info" value="<?= $additional_info ?>" >
            </div>
            <div class="product-item">
                <label for="price_gross"><?= lang('app_lang.price_gross') ?>:</label>
                <input type="text" id="price_gross" name="price_gross" value="<?= $price_gross ?>" readonly>
            </div>
            <div class="product-item">
                <label for="form_name"><?= lang('app_lang.form_name') ?>:</label>
                <input type="text" id="form_name" name="form_name" value="<?= $form_name ?>" >
            </div>
            <div class="product-item">
                <label for="code"><?= lang('app_lang.code') ?>:</label>
                <input type="text" id="code" name="code" value="<?= $code ?>" >
            </div>
            <div class="product-item">
                <label for="currency"><?= lang('app_lang.currency') ?>:</label>
                <input type="text" id="currency" name="currency" value="<?= $currency ?>" >
            </div>
            <div class="product-item">
                <label for="weight_unit"><?= lang('app_lang.weight_unit') ?>:</label>
                <input type="text" id="weight_unit" name="weight_unit" value="<?= $weight_unit ?>" >
            </div>
            <div class="product-item">
                <label for="supplier_code"><?= lang('app_lang.supplier_code') ?>:</label>
                <input type="text" id="supplier_code" name="supplier_code" value="<?= $supplier_code ?>" >
            </div>
            <div class="product-item">
                <label for="created_at"><?= lang('app_lang.created_at') ?>:</label>
                <input type="text" id="created_at" name="created_at" value="<?= $created_at ?>" >
            </div>
            <div class="product-item">
                <label for="updated_at"><?= lang('app_lang.updated_at') ?>:</label>
                <input type="text" id="updated_at" name="updated_at" value="<?= $updated_at ?>" >
            </div>
        </form>
    </fieldset>
    <br/>
    <button id="submit" type="submit" class="btn btn-primary">Save change</button>
</section>

    <link rel="stylesheet" href="<?= base_url('assets/css/bill_products/view.css') ?>">
    <script src="<?= base_url('assets/js/bill_products/view.js') ?>"></script>


<?= $this->endSection() ?>