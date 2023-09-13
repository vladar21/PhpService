<?= $this->extend('default') ?>
<?= $this->section('content') ?>

<?php
// Load the breadcrumb helper
helper('breadcrumb');

// Breadcrumb items
$breadcrumbs = [
    'Home' => site_url(),
    'Meest Parcels' => base_url('meest_parcels'),
    'Parcel Number "'.($parcelNumber ?? null).'"' => base_url('meest_parcels/'.$id ?? null),
];

// Generate and display the breadcrumbs
echo generate_breadcrumbs($breadcrumbs, ' / ');
?>

    <h2 class="float-left"><?= lang('app_lang.parcel_and_items_products') ?></h2>
    <form id="addUpdateMeestParcel" method="POST" action="/meest_parcels/save">
        <?= csrf_field() ?>
        <!-- Button to save parcel -->
        <button type="submit" id="saveParcelBtn" class="btn btn-primary float-right"><?= lang('app_lang.save') ?></button>
        <div class="clear-both"></div>
        <section id="invoice">
            <fieldset>
                <legend><?= lang('app_lang.parcel_data') ?></legend>

                <div class="bills">
                    <div class="group-bills">
                        <div>
                            <label for="parcel_id"><?= lang('app_lang.id') ?>:</label>
                            <input type="text" id="parcel_id" name="parcel_id" value="<?= $parcel_id ?>" readonly>
                        </div>
                        <div>
                            <label for="bill_invoice_id"><?= lang('app_lang.bill_invoice_id') ?>:</label>
                            <input type="text" id="bill_invoice_id" name="bill_invoice_id" value="<?= $bill_invoice_id ?>" >
                        </div>
                        <div>
                            <label for="parcelNumber"><?= lang('app_lang.parcelNumber') ?>:</label>
                            <input type="text" id="parcelNumber" name="parcelNumber" value="<?= $parcelNumber ?>" readonly>
                        </div>
                        <div>
                            <label for="parcelNumberInternal"><?= lang('app_lang.parcelNumberInternal') ?>:</label>
                            <input type="text" id="parcelNumberInternal" name="parcelNumberInternal" value="<?= $parcelNumberInternal ?>">
                        </div>
                        <div>
                            <label for="parcelNumberParent"><?= lang('app_lang.parcelNumberParent') ?>:</label>
                            <input type="text" id="parcelNumberParent" name="parcelNumberParent" value="<?= $parcelNumberParent ?>">
                        </div>
                        <div>
                            <label for="partnerKey"><?= lang('app_lang.partnerKey') ?>:</label>
                            <input type="text" id="partnerKey" name="partnerKey" value="<?= $partnerKey ?>">
                        </div>
                        <div>
                            <label for="bagId"><?= lang('app_lang.bagId') ?>:</label>
                            <input type="text" id="bagId" name="bagId" value="<?= $bagId ?>">
                        </div>
                        <div>
                            <label for="carrierLastMile"><?= lang('app_lang.carrierLastMile') ?>:</label>
                            <input type="text" id="carrierLastMile" name="carrierLastMile" value="<?= $carrierLastMile ?>">
                        </div>
                        <div>
                            <label for="createReturnParcel"><?= lang('app_lang.createReturnParcel') ?>:</label>
                            <input type="text" id="createReturnParcel" name="createReturnParcel" value="<?= $createReturnParcel ?>">
                        </div>
                    </div>
                    <div class="group-bills">
                        <div>
                            <label for="returnCarrier"><?= lang('app_lang.returnCarrier') ?>:</label>
                            <input type="text" id="returnCarrier" name="returnCarrier" value="<?= $returnCarrier ?>">
                        </div>
                        <div>
                            <label for="cod"><?= lang('app_lang.cod') ?>:</label>
                            <input type="text" id="cod" name="cod" value="<?= $cod ?>">
                        </div>
                        <div>
                            <label for="codCurrency"><?= lang('app_lang.codCurrency') ?>:</label>
                            <input type="text" id="codCurrency" name="codCurrency" value="<?= $codCurrency ?>">
                        </div>
                        <div>
                            <label for="deliveryCost"><?= lang('app_lang.deliveryCost') ?>:</label>
                            <input type="text" id="deliveryCost" name="deliveryCost" value="<?= $deliveryCost ?>">
                        </div>
                        <div>
                            <label for="serviceType"><?= lang('app_lang.serviceType') ?>:</label>
                            <input type="text" id="serviceType" name="serviceType" value="<?= $serviceType ?>">
                        </div>
                        <div>
                            <label for="totalValue"><?= lang('app_lang.totalValue') ?>:</label>
                            <input type="text" id="totalValue" name="totalValue" value="<?= $totalValue ?>">
                        </div>
                        <div>
                            <label for="fulfillment"><?= lang('app_lang.fulfillment') ?>:</label>
                            <input type="text" id="fulfillment" name="fulfillment" value="<?= $fulfillment ?>">
                        </div>
                        <div>
                            <label for="incoterms"><?= lang('app_lang.incoterms') ?>:</label>
                            <input type="text" id="incoterms" name="incoterms" value="<?= $incoterms ?>">
                        </div>

                    </div>
                    <div class="group-bills">
                        <div>
                            <label for="iossVatIDenc"><?= lang('app_lang.iossVatIDenc') ?>:</label>
                            <input type="text" id="iossVatIDenc" name="iossVatIDenc" value="<?= $iossVatIDenc ?>">
                        </div>
                        <div>
                            <label for="senderID"><?= lang('app_lang.senderID') ?>:</label>
                            <input type="text" id="senderID" name="senderID" value="<?= $senderID ?>">
                        </div>
                        <div>
                            <label for="weight"><?= lang('app_lang.weight') ?>:</label>
                            <input type="text" id="weight" name="weight" value="<?= $weight ?>">
                        </div>
                        <div style="margin-bottom:7px;">
                            <label for="select_recipient"><?= lang('app_lang.name_recipient') ?>:</label>
                            <select id="select_recipient" class="select2">
                                <option value=""></option>
                            </select>
<!--                            <input type="text" id="name_recipient" name="name_recipient" value="--><?php //= $name_recipient ?><!--" readonly>-->
                        </div>
                        <div>
                            <label for="name_sender"><?= lang('app_lang.name_sender') ?>:</label>
                            <input type="text" id="name_sender" name="name_sender" value="<?= $name_sender ?>">
                        </div>
                        <div>
                            <label for="created_at"><?= lang('app_lang.created_at') ?>:</label>
                            <input type="text" id="created_at" name="created_at" value="<?= $created_at ?>" readonly>
                        </div>
                        <div>
                            <label for="updated_at"><?= lang('app_lang.updated_at') ?>:</label>
                            <input type="text" id="updated_at" name="updated_at" value="<?= $updated_at ?>">
                        </div>
                    </div>
                </div>


            </fieldset>
        </section>

        <section id="positions">
            <fieldset>
                <legend><?= lang('app_lang.parcel_items') ?></legend>
                <table id="parcelItemsTable">
                    <thead>
                    <tr>
                        <th><?= lang('app_lang.p2p') ?></th>
                        <th><?= lang('app_lang.product_id') ?></th>
                        <th><?= lang('app_lang.barcode') ?></th>
                        <th><?= lang('app_lang.brand') ?></th>
                        <th><?= lang('app_lang.description') ?></th>
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
                        <th><?= lang('app_lang.actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot align="center">
                    <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
                    </tfoot>
                </table>
            </fieldset>

        </section>
    </form>


    <link rel="stylesheet" href="<?= base_url('assets/css/meest_parcels/view.css') ?>">
    <script src="<?= base_url('assets/js/meest_parcels/view.js') ?>"></script>
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