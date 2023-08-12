<?= $this->extend('default') ?>
<?= $this->section('content') ?>
<h2>Invoice and Positions (Products)</h2>
    <section id="invoice">
        <fieldset>
            <legend>Invoice's Data</legend>

            <div class="bills">
                <div class="bill1">
                    <div>
                        <label for="bill_id">Invoice Id:</label>
                        <input type="text" id="invoice_id" name="invoice_id" value="<?= $id ?>" readonly>
                        <input type="hidden" id="bill_id" name="bill_id" value="<?= $id ?>" >
                    </div>
                    <div>
                        <label for="kind">Kind:</label>
                        <input type="text" id="kind" name="kind" value="<?= $kind ?>" readonly>
                    </div>
                    <div>
                        <label for="number">Number:</label>
                        <input type="text" id="number" name="number" value="<?= $number ?>" readonly>
                    </div>
                </div>
                <div class="bill2">
                    <div>
                        <label for="sell_date">Sell Date:</label>
                        <input type="date" id="sell_date" name="sell_date" value="<?= $sell_date ?>" readonly>
                    </div>
                    <div>
                        <label for="issue_date">Issue Date:</label>
                        <input type="date" id="issue_date" name="issue_date" value="<?= $issue_date ?>" readonly>
                    </div>
                    <div>
                        <label for="payment_to">Payment To:</label>
                        <input type="date" id="payment_to" name="payment_to" value="<?= $payment_to ?>" readonly>
                    </div>
                </div>
                <div class="bill3">
                    <div>
                        <label for="seller_name">Seller Name:</label>
                        <input type="text" id="seller_name" name="seller_name" value="<?= $seller_name ?>" readonly>
                    </div>
                    <div>
                        <label for="seller_tax_no">Seller Tax No:</label>
                        <input type="text" id="seller_tax_no" name="seller_tax_no" value="<?= $seller_tax_no ?>" readonly>
                    </div>
                </div>
                <div class="bill4">
                    <div>
                        <label for="buyer_name">Buyer Name:</label>
                        <input type="text" id="buyer_name" name="buyer_name" value="<?= $buyer_name ?>" readonly>
                    </div>
                    <div>
                        <label for="buyer_tax_no">Buyer Tax No:</label>
                        <input type="text" id="buyer_tax_no" name="buyer_tax_no" value="<?= $buyer_tax_no ?>" readonly>
                    </div>
                </div>
            </div>


        </fieldset>
    </section>

    <section id="positions">
        <fieldset>
            <legend>Positions (Products) Data</legend>
            <table id="billPositionsTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Invoice Id</th>
                    <th>Name</th>
                    <th>Tax</th>
                    <th>Total Price Gross</th>
                    <th>Qty</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </fieldset>

    </section>


    <link rel="stylesheet" href="<?= base_url('assets/css/bill_invoices/view.css') ?>">
    <script src="<?= base_url('assets/js/bill_invoices/view.js') ?>"></script>


<?= $this->endSection() ?>