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

    <?php if (isset($bill_invoices)) {
        foreach ($bill_invoices as $invoice): ?>
            <tr>
                <td><?= $invoice['id']; ?></td>
                <td><?= $invoice['kind']; ?></td>
                <td><?= $invoice['number']; ?></td>
                <td><?= $invoice['sell_date']; ?></td>
                <td><?= $invoice['issue_date']; ?></td>
                <td><?= $invoice['payment_to']; ?></td>
                <td><?= $invoice['seller_name']; ?></td>
                <td><?= $invoice['seller_tax_no']; ?></td>
                <td><?= $invoice['buyer_name']; ?></td>
                <td><?= $invoice['buyer_tax_no']; ?></td>
            </tr>
        <?php endforeach;
    } ?>
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        const table = $('#billInvoicesTable');-->
<!--        const per_page = 15;-->
<!--        const not_applicable = 'not_applicable';-->
<!---->
<!--        let datatable_obj = $(table).DataTable({-->
<!--            ajax: '/bill_invoices/get_invoices_ajax'-->
<!--            // processing: true,-->
<!--            // serverSide: true,-->
<!--            // pageLength: per_page,-->
<!--            // order: [[1, "desc"]],-->
<!--            // ajax: {-->
<!--            //     type: 'GET',-->
<!--            //     url: "/bill_invoices/get_invoices_ajax"-->
<!--            // },-->
<!--        });-->
<!--    })-->
<!--    -->
<!--</script>-->
<?= $this->endSection() ?>

