$(document).ready(function() {
    const table = $('#meestParcelsTable');
    const not_applicable = 'not_applicable';
    const per_page = getAppVariable('per_page');
    const title_view = getAppVariable('title_view');
    const base_url = getAppVariable('base_url');
    const language = getAppVariable('language');
    const csrf_token = getAppVariable('csrf_token');

    let datatable_obj = $(table).DataTable({
        processing: true,
        serverSide: true,
        pageLength: per_page,
        order: [[0, "desc"]],
        ajax: {
            url: '/meest_parcels/get_parcels_ajax',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: function (d) {
                return JSON.stringify(d);
            },
            contentType: 'application/json',
        },
        columns: [
            {
                data: 'id',
                render: function (data, type, row) {
                    return row.parcel_id ? row.parcel_id : not_applicable;
                }
            }, {
                data: 'parcelNumber',
                render: function (data, type, row) {
                    return row.parcelNumber ? row.parcelNumber : not_applicable;
                }
            }, {
                data: 'parcelNumberInternal',
                render: function (data, type, row) {
                    return row.parcelNumberInternal ? row.parcelNumberInternal : not_applicable;
                }
            }, {
                data: 'parcelNumberParent',
                render: function (data, type, row) {
                    return row.parcelNumberParent ? row.parcelNumberParent : not_applicable;
                }
            }, {
                data: 'partnerKey',
                render: function (data, type, row) {
                    return row.partnerKey ? row.partnerKey : not_applicable;
                }
            }, {
                data: 'bagId',
                render: function (data, type, row) {
                    return row.bagId ? row.bagId : not_applicable;
                }
            }, {
                data: 'carrierLastMile',
                render: function (data, type, row) {
                    return row.carrierLastMile ? row.carrierLastMile : not_applicable;
                }
            }, {
                data: 'createReturnParcel',
                render: function (data, type, row) {
                    return row.createReturnParcel ? row.createReturnParcel : not_applicable;
                }
            }, {
                data: 'returnCarrier',
                render: function (data, type, row) {
                    return row.returnCarrier ? row.returnCarrier : not_applicable;
                }
            }, {
                data: 'cod',
                render: function (data, type, row) {
                    return row.cod ? row.cod : not_applicable;
                }
            }, {
                data: 'codCurrency',
                render: function (data, type, row) {
                    return row.codCurrency ? row.codCurrency : not_applicable;
                }
            }, {
                data: 'deliveryCost',
                render: function (data, type, row) {
                    return row.deliveryCost ? row.deliveryCost : not_applicable;
                }
            }, {
                data: 'serviceType',
                render: function (data, type, row) {
                    return row.serviceType ? row.serviceType : not_applicable;
                }
            }, {
                data: 'totalValue',
                render: function (data, type, row) {
                    return row.totalValue ? row.totalValue : not_applicable;
                }
            }, {
                data: 'currency',
                render: function (data, type, row) {
                    return row.currency ? row.currency : not_applicable;
                }
            }, {
                data: 'fulfillment',
                render: function (data, type, row) {
                    return row.fulfillment ? row.fulfillment : not_applicable;
                }
            }, {
                data: 'incoterms',
                render: function (data, type, row) {
                    return row.incoterms ? row.incoterms : not_applicable;
                }
            }, {
                data: 'iossVatIDenc',
                render: function (data, type, row) {
                    return row.iossVatIDenc ? row.iossVatIDenc : not_applicable;
                }
            }, {
                data: 'senderID',
                render: function (data, type, row) {
                    return row.senderID ? row.senderID : not_applicable;
                }
            }, {
                data: 'weight',
                render: function (data, type, row) {
                    return row.weight ? row.weight : not_applicable;
                }
            },  {
                data: 'name_recipient',
                render: function (data, type, row) {
                    return row.name_recipient ? row.name_recipient : not_applicable;
                }
            },  {
                data: 'name_sender',
                render: function (data, type, row) {
                    return row.name_sender ? row.name_sender : not_applicable;
                }
            }, {
                data: 'created_at',
                render: function (data, type, row) {
                    return row.created_at ? row.created_at : not_applicable;
                }
            }, {
                data: 'updated_at',
                render: function (data, type, row) {
                    return row.updated_at ? row.updated_at : not_applicable;
                }
            }, {
                data: 'actions',
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    return '<a href="/meest_parcels/' + row.id + '" class="btn btn-sm btn-blue-outline">' + title_view + '</a>';
                }
            },
            // {
            //     data: 'meest_recipients_id',
            //     visible: false,
            //     searchable: false,
            //     render: function (data, type, row) {
            //         return row.meest_recipients_id ? row.meest_recipients_id : not_applicable;
            //     }
            // },
            // {
            //     data: 'meest_senders_id',
            //     visible: false,
            //     searchable: false,
            //     render: function (data, type, row) {
            //         return row.meest_senders_id ? row.meest_senders_id : not_applicable;
            //     }
            // },
        ]
    });
});
