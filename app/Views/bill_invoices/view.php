<?= $this->extend('default') ?>
<?= $this->section('content') ?>
<h2>Invoice and Positions (Products)</h2>
    <section id="invoice">
        <fieldset>
            <legend>Invoice's Data</legend>

            <div class="bills">
                <div class="bill1">
                    <div>
                        <label for="bill_id"><?= lang('app_lang.invoice_id') ?>:</label>
                        <input type="text" id="invoice_id" name="invoice_id" value="<?= $id ?>" readonly>
                        <input type="hidden" id="bill_id" name="bill_id" value="<?= $id ?>" >
                    </div>
                    <div>
                        <label for="user_id"><?= lang('app_lang.user_id') ?>:</label>
                        <input type="text" id="user_id" name="user_id" value="<?= $user_id ?>" readonly>
                    </div>
                    <div>
                        <label for="number"><?= lang('app_lang.number') ?>:</label>
                        <input type="text" id="number" name="number" value="<?= $number ?>" readonly>
                    </div>
                    <div>
                        <label for="place"><?= lang('app_lang.place') ?>:</label>
                        <input type="text" id="place" name="place" value="<?= $place ?>" readonly>
                    </div>
                    <div>
                        <label for="sell_date"><?= lang('app_lang.sell_date') ?>:</label>
                        <input type="date" id="sell_date" name="sell_date" value="<?= $sell_date ?>" readonly>
                    </div>
                    <div>
                        <label for="price_net"><?= lang('app_lang.price_net') ?>:</label>
                        <input type="text" id="price_net" name="price_net" value="<?= $price_net ?>" readonly>
                    </div>
                    <div>
                        <label for="price_gross"><?= lang('app_lang.price_gross') ?>:</label>
                        <input type="text" id="price_gross" name="price_gross" value="<?= $price_gross ?>" readonly>
                    </div>
                    <div>
                        <label for="currency"><?= lang('app_lang.currency') ?>:</label>
                        <input type="text" id="currency" name="currency" value="<?= $currency ?>" readonly>
                    </div>
                </div>
                <div class="bill2">
                    <div>
                        <label for="token"><?= lang('app_lang.token') ?>:</label>
                        <input type="text" id="token" name="token" value="<?= $token ?>" readonly>
                    </div>
                    <div>
                        <label for="client_id"><?= lang('app_lang.client_id') ?>:</label>
                        <input type="text" id="client_id" name="client_id" value="<?= $client_id ?>" readonly>
                    </div>
                    <div>
                        <label for="lang"><?= lang('app_lang.lang') ?>:</label>
                        <input type="text" id="lang" name="lang" value="<?= $lang ?>" readonly>
                    </div>
                    <div>
                        <label for="product_cache"><?= lang('app_lang.product_cache') ?>:</label>
                        <textarea id="product_cache" name="product_cache" readonly><?= $product_cache ?></textarea>
                    </div>
                    <div>
                        <label for="description"><?= lang('app_lang.description') ?>:</label>
                        <textarea id="description" name="description" readonly><?= $description ?></textarea>
                    </div>
                    <div>
                        <label for="delivery_date"><?= lang('app_lang.delivery_date') ?>:</label>
                        <input type="date" id="delivery_date" name="delivery_date" value="<?= $delivery_date ?>" readonly>
                    </div>
                    <div>
                        <label for="created_at"><?= lang('app_lang.created_at') ?>:</label>
                        <input type="text" id="created_at" name="created_at" value="<?= $created_at ?>" readonly>
                    </div>
                    <div>
                        <label for="updated_at"><?= lang('app_lang.updated_at') ?>:</label>
                        <input type="text" id="updated_at" name="updated_at" value="<?= $updated_at ?>" readonly>
                    </div>

                </div>
                <div class="bill3">
                    <div>
                        <label for="seller_name"><?= lang('app_lang.seller_name') ?>:</label>
                        <textarea id="seller_name" name="seller_name" readonly><?= $seller_name ?> </textarea>
                    </div>
                    <div>
                        <label for="seller_tax_no"><?= lang('app_lang.seller_tax_no') ?>:</label>
                        <input type="text" id="seller_tax_no" name="seller_tax_no" value="<?= $seller_tax_no ?>" readonly>
                    </div>
                    <div>
                        <label for="seller_street"><?= lang('app_lang.seller_street') ?>:</label>
                        <input type="text" id="seller_street" name="seller_street" value="<?= $seller_street ?>" readonly>
                    </div>
                    <div>
                        <label for="seller_post_code"><?= lang('app_lang.seller_post_code') ?>:</label>
                        <input type="text" id="seller_post_code" name="seller_post_code" value="<?= $seller_post_code ?>" readonly>
                    </div>
                    <div>
                        <label for="seller_city"><?= lang('app_lang.seller_city') ?>:</label>
                        <input type="text" id="seller_city" name="seller_city" value="<?= $seller_city ?>" readonly>
                    </div>
                    <div>
                        <label for="seller_country"><?= lang('app_lang.seller_country') ?>:</label>
                        <input type="text" id="seller_country" name="seller_country" value="<?= $seller_country ?>" readonly>
                    </div>
                    <div>
                        <label for="seller_email"><?= lang('app_lang.seller_email') ?>:</label>
                        <input type="text" id="seller_email" name="seller_email" value="<?= $seller_email ?>" readonly>
                    </div>
                    <div>
                        <label for="seller_phone"><?= lang('app_lang.seller_phone') ?>:</label>
                        <input type="text" id="seller_phone" name="seller_phone" value="<?= $seller_phone ?>" readonly>
                    </div>
                    <div>
                        <label for="seller_www"><?= lang('app_lang.seller_www') ?>:</label>
                        <input type="text" id="seller_www" name="seller_www" value="<?= $seller_www ?>" readonly>
                    </div>
                    <div>
                        <label for="seller_bank"><?= lang('app_lang.seller_bank') ?>:</label>
                        <input type="text" id="seller_bank" name="seller_bank" value="<?= $seller_bank ?>" readonly>
                    </div>
                    <div>
                        <label for="seller_bank_account"><?= lang('app_lang.seller_bank_account') ?>:</label>
                        <input type="text" id="seller_bank_account" name="seller_bank_account" value="<?= $seller_bank_account ?>" readonly>
                    </div>
                </div>
                <div class="bill4">
                    <div>
                        <label for="buyer_name"><?= lang('app_lang.buyer_name') ?>:</label>
                        <input type="text" id="buyer_name" name="buyer_name" value="<?= $buyer_name ?>" readonly>
                    </div>
                    <div>
                        <label for="buyer_post_code"><?= lang('app_lang.buyer_post_code') ?>:</label>
                        <input type="text" id="buyer_post_code" name="buyer_post_code" value="<?= $buyer_post_code ?>" readonly>
                    </div>
                    <div>
                        <label for="buyer_city"><?= lang('app_lang.buyer_city') ?>:</label>
                        <input type="text" id="buyer_city" name="buyer_city" value="<?= $buyer_city ?>" readonly>
                    </div>
                    <div>
                        <label for="buyer_street"><?= lang('app_lang.buyer_street') ?>:</label>
                        <input type="text" id="buyer_street" name="buyer_street" value="<?= $buyer_street ?>" readonly>
                    </div>
                    <div>
                        <label for="buyer_first_name"><?= lang('app_lang.buyer_first_name') ?>:</label>
                        <input type="text" id="buyer_first_name" name="buyer_first_name" value="<?= $buyer_first_name ?>" readonly>
                    </div>
                    <div>
                        <label for="buyer_last_name"><?= lang('app_lang.buyer_last_name') ?>:</label>
                        <input type="text" id="buyer_last_name" name="buyer_last_name" value="<?= $buyer_last_name ?>" readonly>
                    </div>
                    <div>
                        <label for="buyer_country"><?= lang('app_lang.buyer_country') ?>:</label>
                        <input type="text" id="buyer_country" name="buyer_country" value="<?= $buyer_country ?>" readonly>
                    </div>
                    <div>
                        <label for="buyer_email"><?= lang('app_lang.buyer_email') ?>:</label>
                        <input type="text" id="buyer_email" name="buyer_email" value="<?= $buyer_email ?>" readonly>
                    </div>
                </div>

            </div>


        </fieldset>
    </section>

<!--    <section id="positions">-->
<!--        <fieldset>-->
<!--            <legend>Positions (Products) Data</legend>-->
<!--            <table id="billPositionsTable">-->
<!--                <thead>-->
<!--                <tr>-->
<!--                    <th>Id</th>-->
<!--                    <th>Invoice Id</th>-->
<!--                    <th>Name</th>-->
<!--                    <th>Tax</th>-->
<!--                    <th>Total Price Gross</th>-->
<!--                    <th>Qty</th>-->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!---->
<!--                </tbody>-->
<!--            </table>-->
<!--        </fieldset>-->
<!---->
<!--    </section>-->


    <link rel="stylesheet" href="<?= base_url('assets/css/bill_invoices/view.css') ?>">
    <script src="<?= base_url('assets/js/bill_invoices/view.js') ?>"></script>
<script>
    $(document).ready(function() {
        // При изменении содержимого textarea
        $('.bills textarea').on('input', function() {
            this.style.height = 'auto'; // Сначала установите высоту в auto, чтобы сбросить высоту
            this.style.height = (this.scrollHeight) + 'px'; // Установите высоту, чтобы вместить содержимое
        });
    });
</script>

<?= $this->endSection() ?>