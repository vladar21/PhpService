<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?php
// Load the breadcrumb helper
helper('breadcrumb');

// Breadcrumb items
$breadcrumbs = [
    'Home' => site_url(),
    'Bill Clients' => base_url('bill_clients'),
    'Client "'.$shortcut.'"' => base_url('bill_clients/'.$id),
];

// Generate and display the breadcrumbs
echo generate_breadcrumbs($breadcrumbs, ' / ');
?>

<h2>Bill Client</h2>
<section id="billclient">
    <fieldset>
        <legend>Client's Data</legend>
        <form class="product-form">
            <div class="bills">
                <div class="group-bills">
                    <div class="product-item">
                        <label for="id"><?= lang('app_lang.id') ?>:</label>
                        <input type="text" id="id" name="id" value="<?= $id ?>" >
                    </div>
                    <div class="product-item">
                        <label for="name"><?= lang('app_lang.name') ?>:</label>
                        <input type="text" id="name" name="name" value="<?= $name ?>" >
                    </div>
                    <div class="product-item">
                        <label for="tax_no"><?= lang('app_lang.tax_no') ?>:</label>
                        <input type="text" id="tax_no" name="tax_no" value="<?= $tax_no ?>" >
                    </div>
                    <div class="product-item">
                        <label for="post_code"><?= lang('app_lang.post_code') ?>:</label>
                        <input type="text" id="post_code" name="post_code" value="<?= $post_code ?>" >
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
                        <label for="street_no"><?= lang('app_lang.street_no') ?>:</label>
                        <input type="text" id="street_no" name="street_no" value="<?= $street_no ?>" >
                    </div>
                    <div class="product-item">
                        <label for="first_name"><?= lang('app_lang.first_name') ?>:</label>
                        <input type="text" id="first_name" name="first_name" value="<?= $first_name ?>" >
                    </div>
                    <div class="product-item">
                        <label for="last_name"><?= lang('app_lang.last_name') ?>:</label>
                        <input type="text" id="last_name" name="last_name" value="<?= $last_name ?>" >
                    </div>
                    <div class="product-item">
                        <label for="shortcut"><?= lang('app_lang.shortcut') ?>:</label>
                        <input type="text" id="shortcut" name="shortcut" value="<?= $shortcut ?>" >
                    </div>
                    <div class="product-item">
                        <label for="country"><?= lang('app_lang.country') ?>:</label>
                        <input type="text" id="country" name="country" value="<?= $country ?>" readonly>
                    </div>
                    <div class="product-item">
                        <label for="email"><?= lang('app_lang.email') ?>:</label>
                        <input type="text" id="email" name="email" value="<?= $email ?>" >
                    </div>
                    <div class="product-item">
                        <label for="phone"><?= lang('app_lang.phone') ?>:</label>
                        <input type="text" id="phone" name="phone" value="<?= $phone ?>" >
                    </div>
                    <div class="product-item">
                        <label for="www"><?= lang('app_lang.www') ?>:</label>
                        <input type="text" id="www" name="www" value="<?= $www ?>" >
                    </div>
                    <div class="product-item">
                        <label for="fax"><?= lang('app_lang.fax') ?>:</label>
                        <input type="text" id="fax" name="fax" value="<?= $fax ?>" >
                    </div>
                    <div class="product-item">
                        <label for="created_at"><?= lang('app_lang.created_at') ?>:</label>
                        <input type="text" id="created_at" name="created_at" value="<?= $created_at ?>" >
                    </div>
                    <div class="product-item">
                        <label for="updated_at"><?= lang('app_lang.updated_at') ?>:</label>
                        <input type="text" id="updated_at" name="updated_at" value="<?= $updated_at ?>" >
                    </div>
                    <div class="product-item">
                        <label for="kind"><?= lang('app_lang.kind') ?>:</label>
                        <input type="text" id="kind" name="kind" value="<?= $kind ?>" >
                    </div>
                    <div class="product-item">
                        <label for="bank"><?= lang('app_lang.bank') ?>:</label>
                        <input type="text" id="bank" name="bank" value="<?= $bank ?>" >
                    </div>
                    <div class="product-item">
                        <label for="bank_account"><?= lang('app_lang.bank_account') ?>:</label>
                        <input type="text" id="bank_account" name="bank_account" value="<?= $bank_account ?>" >
                    </div>
                    <div class="product-item">
                        <label for="bank_account_id"><?= lang('app_lang.bank_account_id') ?>:</label>
                        <input type="text" id="bank_account_id" name="bank_account_id" value="<?= $bank_account_id ?>" >
                    </div>

                    <div class="product-item">
                        <label for="note"><?= lang('app_lang.note') ?>:</label>
                        <input type="text" id="note" name="note" value="<?= $note ?>" >
                    </div>

                    <div class="product-item">
                        <label for="referrer"><?= lang('app_lang.referrer') ?>:</label>
                        <input type="text" id="referrer" name="referrer" value="<?= $referrer ?>" >
                    </div>
                    <div class="product-item">
                        <label for="token"><?= lang('app_lang.token') ?>:</label>
                        <input type="text" id="token" name="token" value="<?= $token ?>" >
                    </div>
                    <div class="product-item">
                        <label for="panel_url"><?= lang('app_lang.panel_url') ?>:</label>
                        <input type="text" id="panel_url" name="panel_url" value="<?= $panel_url ?>" >
                    </div>
                </div>

                <div class="group-bills">
                    <div class="product-item">
                        <label for="fuid"><?= lang('app_lang.fuid') ?>:</label>
                        <input type="text" id="fuid" name="fuid" value="<?= $fuid ?>" >
                    </div>
                    <div class="product-item">
                        <label for="fname"><?= lang('app_lang.fname') ?>:</label>
                        <input type="text" id="fname" name="fname" value="<?= $fname ?>" >
                    </div>
                    <div class="product-item">
                        <label for="femail"><?= lang('app_lang.femail') ?>:</label>
                        <input type="text" id="femail" name="femail" value="<?= $femail ?>" >
                    </div>
                    <div class="product-item">
                        <label for="department_id"><?= lang('app_lang.department_id') ?>:</label>
                        <input type="text" id="department_id" name="department_id" value="<?= $department_id ?>" >
                    </div>
                    <div class="product-item">
                        <label for="import"><?= lang('app_lang.import') ?>:</label>
                        <input type="text" id="import" name="import" value="<?= $import ?>" >
                    </div>
                    <div class="product-item">
                        <label for="discount"><?= lang('app_lang.discount') ?>:</label>
                        <input type="text" id="discount" name="discount" value="<?= $discount ?>" >
                    </div>
                    <div class="product-item">
                        <label for="payment_to_kind"><?= lang('app_lang.payment_to_kind') ?>:</label>
                        <input type="text" id="payment_to_kind" name="payment_to_kind" value="<?= $payment_to_kind ?>" >
                    </div>
                    <div class="product-item">
                        <label for="category_id"><?= lang('app_lang.category_id') ?>:</label>
                        <input type="text" id="category_id" name="category_id" value="<?= $category_id ?>" >
                    </div>
                    <div class="product-item">
                        <label for="use_delivery_address"><?= lang('app_lang.use_delivery_address') ?>:</label>
                        <input type="text" id="use_delivery_address" name="use_delivery_address" value="<?= $use_delivery_address ?>" >
                    </div>
                    <div class="product-item">
                        <label for="delivery_address"><?= lang('app_lang.delivery_address') ?>:</label>
                        <input type="text" id="delivery_address" name="delivery_address" value="<?= $delivery_address ?>" >
                    </div>
                    <div class="product-item">
                        <label for="person"><?= lang('app_lang.person') ?>:</label>
                        <input type="text" id="person" name="person" value="<?= $person ?>" >
                    </div>
                    <div class="product-item">
                        <label for="panel_user_id"><?= lang('app_lang.panel_user_id') ?>:</label>
                        <input type="text" id="panel_user_id" name="panel_user_id" value="<?= $panel_user_id ?>" >
                    </div>
                    <div class="product-item">
                        <label for="use_mass_payment"><?= lang('app_lang.use_mass_payment') ?>:</label>
                        <input type="text" id="use_mass_payment" name="use_mass_payment" value="<?= $use_mass_payment ?>" >
                    </div>
                    <div class="product-item">
                        <label for="mass_payment_code"><?= lang('app_lang.mass_payment_code') ?>:</label>
                        <input type="text" id="mass_payment_code" name="mass_payment_code" value="<?= $mass_payment_code ?>" >
                    </div>
                    <div class="product-item">
                        <label for="external_id"><?= lang('app_lang.external_id') ?>:</label>
                        <input type="text" id="external_id" name="external_id" value="<?= $external_id ?>" >
                    </div>
                    <div class="product-item">
                        <label for="company"><?= lang('app_lang.company') ?>:</label>
                        <input type="text" id="company" name="company" value="<?= $company ?>" >
                    </div>
                    <div class="product-item">
                        <label for="title"><?= lang('app_lang.title') ?>:</label>
                        <input type="text" id="title" name="title" value="<?= $title ?>" >
                    </div>
                    <div class="product-item">
                        <label for="mobile_phone"><?= lang('app_lang.mobile_phone') ?>:</label>
                        <input type="text" id="mobile_phone" name="mobile_phone" value="<?= $mobile_phone ?>" >
                    </div>
                    <div class="product-item">
                        <label for="register_number"><?= lang('app_lang.register_number') ?>:</label>
                        <input type="text" id="register_number" name="register_number" value="<?= $register_number ?>" >
                    </div>
                    <div class="product-item">
                        <label for="tax_no_check"><?= lang('app_lang.tax_no_check') ?>:</label>
                        <input type="text" id="tax_no_check" name="tax_no_check" value="<?= $tax_no_check ?>" >
                    </div>
                    <div class="product-item">
                        <label for="attachments_count"><?= lang('app_lang.attachments_count') ?>:</label>
                        <input type="text" id="attachments_count" name="attachments_count" value="<?= $attachments_count ?>" >
                    </div>
                    <div class="product-item">
                        <label for="default_payment_type"><?= lang('app_lang.default_payment_type') ?>:</label>
                        <input type="text" id="default_payment_type" name="default_payment_type" value="<?= $default_payment_type ?>" >
                    </div>
                    <div class="product-item">
                        <label for="tax_no_kind"><?= lang('app_lang.tax_no_kind') ?>:</label>
                        <input type="text" id="tax_no_kind" name="tax_no_kind" value="<?= $tax_no_kind ?>" >
                    </div>
                    <div class="product-item">
                        <label for="accounting_id"><?= lang('app_lang.accounting_id') ?>:</label>
                        <input type="text" id="accounting_id" name="accounting_id" value="<?= $accounting_id ?>" >
                    </div>
                    <div class="product-item">
                        <label for="disable_auto_reminders"><?= lang('app_lang.disable_auto_reminders') ?>:</label>
                        <input type="text" id="disable_auto_reminders" name="disable_auto_reminders" value="<?= $disable_auto_reminders ?>" >
                    </div>
                    <div class="product-item">
                        <label for="panel_user_id"><?= lang('app_lang.panel_user_id') ?>:</label>
                        <input type="text" id="panel_user_id" name="panel_user_id" value="<?= $panel_user_id ?>" >
                    </div>
                    <div class="product-item">
                        <label for="buyer_id"><?= lang('app_lang.buyer_id') ?>:</label>
                        <input type="text" id="buyer_id" name="buyer_id" value="<?= $buyer_id ?>" >
                    </div>
                    <div class="product-item">
                        <label for="price_list_id"><?= lang('app_lang.price_list_id') ?>:</label>
                        <input type="text" id="price_list_id" name="price_list_id" value="<?= $price_list_id ?>" >
                    </div>

                </div>

            </div>

        </form>
    </fieldset>
    <br/>
    <button id="submit" type="submit" class="btn btn-primary">Save change</button>
</section>

    <link rel="stylesheet" href="<?= base_url('assets/css/bill_clients/view.css') ?>">
    <script src="<?= base_url('assets/js/bill_clients/view.js') ?>"></script>


<?= $this->endSection() ?>