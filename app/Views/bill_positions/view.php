<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<h2>Bill Invoices</h2>
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

<link rel="stylesheet" href="<?= base_url('assets/css/bill_positions/view.css') ?>">
<script src="<?= base_url('assets/js/bill_positions/view.js') ?>"></script>


<?= $this->endSection() ?>
