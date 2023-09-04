<?= $this->extend('default') ?>
<?= $this->section('content') ?>

<?php
// Load the breadcrumb helper
helper('breadcrumb');

// Breadcrumb items
$breadcrumbs = [
    'Home' => site_url(),
    'Meest Items' => base_url('meest_items'),
    'Item "'.$barcode.'"' => base_url('meest_item/'.$id),
];

// Generate and display the breadcrumbs
echo generate_breadcrumbs($breadcrumbs, ' / ');
?>

<h2><?= lang('app_lang.parcel_item') ?></h2>
    <section id="invoice">
        <fieldset>
            <legend><?= lang('app_lang.items_data') ?></legend>

            <div class="bills">
                <div class="group-bills">
                    <div>
                        <label for="product_id"><?= lang('app_lang.product_id') ?>:</label>
                        <input type="text" id="product_id" name="product_id" value="<?= $id ?>" readonly>
                    </div>
                    <div>
                        <label for="barcode"><?= lang('app_lang.barcode') ?>:</label>
                        <input type="text" id="barcode" name="barcode" value="<?= $barcode ?>" readonly>
                    </div>
                    <div>
                        <label for="brand"><?= lang('app_lang.brand') ?>:</label>
                        <input type="text" id="brand" name="brand" value="<?= $brand ?>">
                    </div>
                    <div>
                        <label for="description"><?= lang('app_lang.description') ?>:</label>
                        <input type="text" id="description" name="description" value="<?= $description ?>">
                    </div>
                    <div>
                        <label for="hsCode"><?= lang('app_lang.hsCode') ?>:</label>
                        <input type="text" id="hsCode" name="hsCode" value="<?= $hsCode ?>">
                    </div>
                    <div>
                        <label for="manufacturer"><?= lang('app_lang.manufacturer') ?>:</label>
                        <input type="text" id="manufacturer" name="manufacturer" value="<?= $manufacturer ?>">
                    </div>
                    <div>
                        <label for="originCountry"><?= lang('app_lang.originCountry') ?>:</label>
                        <input type="text" id="originCountry" name="originCountry" value="<?= $originCountry ?>">
                    </div>
                </div>
                <div class="group-bills">
                    <div>
                        <label for="productCategory"><?= lang('app_lang.productCategory') ?>:</label>
                        <input type="text" id="productCategory" name="productCategory" value="<?= $productCategory ?>">
                    </div>
                    <div>
                        <label for="productEAN"><?= lang('app_lang.productEAN') ?>:</label>
                        <input type="text" id="productEAN" name="productEAN" value="<?= $productEAN ?>">
                    </div>
                    <div>
                        <label for="productURL"><?= lang('app_lang.productURL') ?>:</label>
                        <input type="text" id="productURL" name="productURL" value="<?= $productURL ?>">
                    </div>
                    <div>
                        <label for="quantity"><?= lang('app_lang.quantity') ?>:</label>
                        <input type="text" id="quantity" name="quantity" value="<?= $quantity ?>">
                    </div>
                    <div>
                        <label for="skuCode"><?= lang('app_lang.skuCode') ?>:</label>
                        <input type="text" id="skuCode" name="skuCode" value="<?= $skuCode ?>">
                    </div>
                    <div>
                        <label for="value"><?= lang('app_lang.value') ?>:</label>
                        <input type="text" id="value" name="value" value="<?= $value ?>">
                    </div>
                    <div>
                        <label for="weight"><?= lang('app_lang.weight') ?>:</label>
                        <input type="text" id="weight" name="weight" value="<?= $weight ?>">
                    </div>

                </div>

            </div>


        </fieldset>
    </section>

    <section id="positions">
        <fieldset>
            <legend><?= lang('app_lang.descriptions') ?></legend>
            <table id="itemDescriptionsTable">
                <thead>
                <tr>
                    <th><?= lang('app_lang.id') ?></th>
                    <th><?= lang('app_lang.description') ?></th>
                    <th><?= lang('app_lang.lang') ?></th>
                    <th><?= lang('app_lang.created_at') ?></th>
                    <th><?= lang('app_lang.updated_at') ?></th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </fieldset>

    </section>


    <link rel="stylesheet" href="<?= base_url('assets/css/meest_items/view.css') ?>">
    <script src="<?= base_url('assets/js/meest_items/view.js') ?>"></script>
<script>
    // $(document).ready(function() {
    //     // При изменении содержимого textarea
    //     $('.bills textarea').on('input', function() {
    //         this.style.height = 'auto'; // Сначала установите высоту в auto, чтобы сбросить высоту
    //         this.style.height = (this.scrollHeight) + 'px'; // Установите высоту, чтобы вместить содержимое
    //     });
    // });
</script>

<?= $this->endSection() ?>