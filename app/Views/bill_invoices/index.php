<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<h2>Bill Invoices</h2>
<table id="billInvoicesTable">
    <thead>
    <tr>
        <th>Id</th>
        <th>Kind</th>
        <th>Number</th>
        <th>Sell date</th>
        <th>Issue date</th>
        <th>Payment to</th>
        <th>Seller name</th>
        <th>Seller tax no</th>
        <th>Buyer name</th>
        <th>Buyer tax no</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<link rel="stylesheet" href="<?= base_url('assets/css/bill_invoices/index.css') ?>">
<script src="<?= base_url('assets/js/bill_invoices/index.js') ?>"></script>


<?= $this->endSection() ?>

