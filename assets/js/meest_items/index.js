$(document).ready(function() {
    const table = $('#parcelItemsTable');
    const not_applicable = 'not_applicable';
    const per_page = getAppVariable('per_page');
    const title_view = getAppVariable('title_view');
    const base_url = getAppVariable('base_url');
    const language = getAppVariable('language');
    const csrf_token = getAppVariable('csrf_token');

    const parcel_id = $('#parcel_id').val();
    const url = '/meest_items/get_parcel_items_ajax';


    let datatable_obj = $(table).DataTable({
        processing: true,
        serverSide: true,
        pageLength: per_page,
        order: [[1, "desc"]],
        ajax: {
            url: url,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: function (d) {
                if (parcel_id){
                    d.parcel_id = parcel_id;
                }
                return JSON.stringify(d);
            },
            contentType: 'application/json',
        },
        columns: [
            {
                data: 'p2p',
                render: function(data, type, row) {
                    return row.p2p ? row.p2p : not_applicable;
                }
            }, {
                data: 'product_id',
                render: function(data, type, row) {
                    return row.product_id ? row.product_id : not_applicable;
                }
            }, {
                data: 'barcode',
                render: function(data, type, row) {
                    return row.barcode ? row.barcode : not_applicable;
                }
            }, {
                data: 'brand',
                render: function(data, type, row) {
                    return row.brand ? row.brand : not_applicable;
                }
            }, {
                data: 'description',
                render: function(data, type, row) {
                    return row.description ? row.description : not_applicable;
                }
            },  {
                data: 'hsCode',
                render: function(data, type, row) {
                    return row.hsCode ? row.hsCode : not_applicable;
                }
            }, {
                data: 'manufacturer',
                render: function(data, type, row) {
                    return row.manufacturer ? row.manufacturer : not_applicable;
                }
            }, {
                data: 'originCountry',
                render: function(data, type, row) {
                    return row.originCountry ? row.originCountry : not_applicable;
                }
            }, {
                data: 'productCategory',
                render: function(data, type, row) {
                    return row.productCategory ? row.productCategory : not_applicable;
                }
            }, {
                data: 'productEAN',
                render: function(data, type, row) {
                    return row.productEAN ? row.productEAN : not_applicable;
                }
            }, {
                data: 'productURL',
                render: function(data, type, row) {
                    return row.productURL ? row.productURL : not_applicable;
                }
            }, {
                data: 'quantity',
                render: function(data, type, row) {
                    return row.quantity ? row.quantity : not_applicable;
                }
            }, {
                data: 'skuCode',
                render: function(data, type, row) {
                    return row.skuCode ? row.skuCode : not_applicable;
                }
            }, {
                data: 'value',
                render: function(data, type, row) {
                    return row.value ? row.value : not_applicable;
                }
            }, {
                data: 'weight',
                render: function(data, type, row) {
                    return row.weight ? row.weight : not_applicable;
                }
            }, {
                data: 'created_at',
                render: function(data, type, row) {
                    return row.created_at ? row.created_at : not_applicable;
                }
            }, {
                data: 'updated_at',
                render: function(data, type, row) {
                    return row.updated_at ? row.updated_at : not_applicable;
                }
            }, {
                data: 'actions',
                orderable: false,
                render: function (data, type, row) {
                    return '<a href="/meest_items/' + row.product_id + '" class="btn btn-sm btn-blue-outline">' + title_view + '</a>';
                }
            }
        ],
    });
})