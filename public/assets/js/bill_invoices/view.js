$(document).ready(function() {
    const table = $('#billPositionsTable');
    const per_page = 15;
    const not_applicable = 'not_applicable';

    if ($('#bill_id').val() !== undefined ){
        const invoice_id = $('#bill_id').val();
        const url = '/bill_positions/get_positions_ajax?invoice_id=' + invoice_id;

        let datatable_obj = $(table).DataTable({
            ajax: url,
            columns: [
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return row.id ? row.id : not_applicable;
                    }
                }, {
                    data: 'invoice_id',
                    render: function(data, type, row) {
                        return row.invoice_id ? row.invoice_id : not_applicable;
                    }
                }, {
                    data: 'name',
                    render: function(data, type, row) {
                        return row.name ? row.name : not_applicable;
                    }
                }, {
                    data: 'tax',
                    render: function(data, type, row) {
                        return row.tax ? row.tax : not_applicable;
                    }
                }, {
                    data: 'total_price_gross',
                    render: function(data, type, row) {
                        return row.total_price_gross ? row.total_price_gross : not_applicable;
                    }
                }, {
                    data: 'quantity',
                    render: function(data, type, row) {
                        return row.quantity ? row.quantity : not_applicable;
                    }
                }
            ]
            // processing: true,
            // serverSide: true,
            // pageLength: per_page,
            // order: [[1, "desc"]],
            // ajax: {
            //     type: 'GET',
            //     url: "/bill_invoices/get_invoices_ajax"
            // },
        });
    }
})