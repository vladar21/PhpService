$(document).ready(function() {
    const table = $('#billInvoicesTable');
    const not_applicable = 'not_applicable';
    const per_page = getAppVariable('per_page');
    const title_view = getAppVariable('title_view');
    const base_url = getAppVariable('base_url');
    const language = getAppVariable('language');

    let datatable_obj = $(table).DataTable({
        ajax: '/bill_invoices/get_invoices_ajax',
        columns: [
            {
                data: 'id',
                render: function(data, type, row) {
                    return row.id ? row.id : not_applicable;
                }
            }, {
                data: 'kind',
                render: function(data, type, row) {
                    return row.kind ? row.kind : not_applicable;
                }
            }, {
                data: 'number',
                render: function(data, type, row) {
                    return row.number ? row.number : not_applicable;
                }
            }, {
                data: 'sell_date',
                render: function(data, type, row) {
                    return row.sell_date ? row.sell_date : not_applicable;
                }
            }, {
                data: 'issue_date',
                render: function(data, type, row) {
                    return row.issue_date ? row.issue_date : not_applicable;
                }
            }, {
                data: 'payment_to',
                render: function(data, type, row) {
                    return row.payment_to ? row.payment_to : not_applicable;
                }
            }, {
                data: 'seller_name',
                render: function(data, type, row) {
                    return row.seller_name ? row.seller_name : not_applicable;
                }
            }, {
                data: 'seller_tax_no',
                render: function(data, type, row) {
                    return row.seller_tax_no ? row.seller_tax_no : not_applicable;
                }
            },{
                data: 'buyer_name',
                render: function(data, type, row) {
                    return row.buyer_name ? row.buyer_name : not_applicable;
                }
            },{
                data: 'buyer_tax_no',
                render: function(data, type, row) {
                    return row.buyer_tax_no ? row.buyer_tax_no : not_applicable;
                }
            },{
                data: 'actions',
                orderable: false,
                render: function (data, type, row){
                    return '<a href="/bill_invoices/' + row.id + '" class="btn btn-sm btn-blue-outline">' + title_view + '</a>';
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
})