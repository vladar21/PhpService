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
                d.parcel_id = parcel_id;
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
                    return row.id ? row.id : not_applicable;
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
                data: 'actions',
                orderable: false,
                render: function (data, type, row) {
                    return '<a href="/meest_items/' + row.id + '" class="btn btn-sm btn-blue-outline">' + title_view + '</a>';
                }
            }
        ],
        footerCallback: function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // converting to integer to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };

            // const sum = numbers.reduce((accumulator, currentValue) => {
            //     return accumulator + currentValue;
            // }, 0);

            // computing column Total of the complete result
            var thuTotal = api
                .column( 11 )
                .data()
                .reduce( function (a, b) {
                    return parseFloat(intVal(a).toFixed(2)) + parseFloat(intVal(b).toFixed(2));
                }, 0 );

            var friTotal = api
                .column( 13 )
                .data()
                .reduce( function (a, b) {
                    return parseFloat(intVal(a).toFixed(2)) + parseFloat(intVal(b).toFixed(2));
                }, 0 );

            // Update footer by showing the total with the reference of the column index
            $( api.column( 10 ).footer() ).html('Total');
            $( api.column( 11 ).footer() ).html(thuTotal);
            $( api.column( 13 ).footer() ).html(friTotal);
        },
    });

    // При изменении содержимого textarea
    $('.bills textarea').on('input', function() {
        this.style.height = 'auto'; // Сначала установите высоту в auto, чтобы сбросить высоту
        this.style.height = (this.scrollHeight) + 'px'; // Установите высоту, чтобы вместить содержимое
    });

    $('#meest_recipients_id').select2({
        allowClear: true,
        placeholder: "Choose recipient",
        width: "50%",
        ajax: {
            url: '/meest_clients/select2list',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: function (params) {
                let query = {
                    search: params.term,
                    page: params.page || 1,
                    meest_recipients_id: document.getElementById('meestRecipientsId').value
                }

                // Query parameters will be ?search=[term]&page=[page]
                return query;
            }
        }
    });

})