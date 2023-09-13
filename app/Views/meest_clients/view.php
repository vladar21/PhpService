<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?php
// Load the breadcrumb helper
helper('breadcrumb');

// Breadcrumb items
$breadcrumbs = [
    'Home' => site_url(),
    'Meest Clients' => base_url('meest_clients'),
    'Client "'.$name.'"' => base_url('meest_clients/'.$id),
];

// Generate and display the breadcrumbs
echo generate_breadcrumbs($breadcrumbs, ' / ');
?>

<h2><?= lang('app_lang.meest_client') ?></h2>
    <br/>
    <button id="submit" type="submit" class="btn btn-primary">Save change</button>
<section id="billclient">
    <br/>
    <fieldset>
        <legend><?= lang('app_lang.clients_data') ?></legend>
        <form class="product-form">
            <div class="bills">
                <div class="group-bills">
                    <div class="product-item">
                        <label for="meest_client_id"><?= lang('app_lang.id') ?>:</label>
                        <input type="text" id="meest_client_id" name="meest_client_id" value="<?= $id ?>" >
                    </div>
                    <div class="product-item">
                        <label for="bill_client_id"><?= lang('app_lang.bill_client_id') ?>:</label>
                        <input type="text" id="bill_client_id" name="bill_client_id" value="<?= $bill_client_id ?>" >
                    </div>
                    <div class="product-item">
                        <label for="companyName"><?= lang('app_lang.company_name') ?>:</label>
                        <input type="text" id="companyName" name="companyName" value="<?= $companyName ?>" >
                    </div>
                    <div class="product-item">
                        <label for="name"><?= lang('app_lang.name') ?>:</label>
                        <input type="text" id="name" name="name" value="<?= $name ?>" >
                    </div>
                    <div class="product-item">
                        <label for="phone"><?= lang('app_lang.phone') ?>:</label>
                        <input type="text" id="phone" name="phone" value="<?= $phone ?>" >
                    </div>
                    <div class="product-item">
                        <label for="email"><?= lang('app_lang.email') ?>:</label>
                        <input type="text" id="email" name="email" value="<?= $email ?>" >
                    </div>
                </div>
                <div class="group-bills">
                    <div class="product-item">
                        <label for="zipCode"><?= lang('app_lang.zip_code') ?>:</label>
                        <input type="text" id="zipCode" name="zipCode" value="<?= $zipCode ?>" >
                    </div>
                    <div class="product-item">
                        <label for="country"><?= lang('app_lang.country') ?>:</label>
                        <input type="text" id="country" name="country" value="<?= $country ?>" >
                    </div>
                    <div class="product-item">
                        <label for="city"><?= lang('app_lang.city') ?>:</label>
                        <input type="text" id="city" name="city" value="<?= $city ?>" >
                    </div>
                    <div class="product-item">
                        <label for="street"><?= lang('app_lang.street') ?>:</label>
                        <input type="text" id="street" name="street" value="<?= $street ?>" >
                    </div>
                    <div class="product-item">
                        <label for="buildingNumber"><?= lang('app_lang.building_number') ?>:</label>
                        <input type="text" id="buildingNumber" name="buildingNumber" value="<?= $buildingNumber ?>" >
                    </div>
                    <div class="product-item">
                        <label for="flatNumber"><?= lang('app_lang.flat_number') ?>:</label>
                        <input type="text" id="flatNumber" name="flatNumber" value="<?= $flatNumber ?>" readonly>
                    </div>
                </div>
                <div class="group-bills">
                    <div class="product-item">
                        <label for="pickupPoint"><?= lang('app_lang.pickup_point') ?>:</label>
                        <input type="text" id="pickupPoint" name="pickupPoint" value="<?= $pickupPoint ?>" >
                    </div>
                    <div class="product-item">
                        <label for="region1"><?= lang('app_lang.region1') ?>:</label>
                        <input type="text" id="region1" name="region1" value="<?= $region1 ?>" >
                    </div>
                    <div class="product-item">
                        <label for="region2"><?= lang('app_lang.region2') ?>:</label>
                        <input type="text" id="region2" name="region2" value="<?= $region2 ?>" >
                    </div>
                    <div class="product-item">
                        <label for="created_at"><?= lang('app_lang.created_at') ?>:</label>
                        <input type="text" id="created_at" name="created_at" value="<?= $created_at ?>" readonly>
                    </div>
                    <div class="product-item">
                        <label for="updated_at"><?= lang('app_lang.updated_at') ?>:</label>
                        <input type="text" id="updated_at" name="updated_at" value="<?= $updated_at ?>" readonly>
                    </div>
                </div>
            </div>
        </form>
    </fieldset>


</section>

    <section id="docs">
        <fieldset>
            <legend><?= lang('app_lang.documents') ?></legend>
            <table id="meesClientDocsTable">
                <thead>
                <tr>
                    <th><?= lang('app_lang.id_number') ?></th>
                    <th><?= lang('app_lang.issuer') ?></th>
                    <th><?= lang('app_lang.name') ?></th>
                    <th><?= lang('app_lang.number') ?></th>
                    <th><?= lang('app_lang.series') ?></th>
                    <th><?= lang('app_lang.date') ?></th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </fieldset>

    </section>

    <link rel="stylesheet" href="<?= base_url('assets/css/meest_clients/view.css') ?>">
    <script src="<?= base_url('assets/js/meest_clients/view.js') ?>"></script>


<?= $this->endSection() ?>