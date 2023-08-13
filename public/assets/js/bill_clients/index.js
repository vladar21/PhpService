$(document).ready(function() {
    const table = $('#billClientsTable');
    const not_applicable = 'not_applicable';
    const per_page = getAppVariable('per_page');
    const title_view = getAppVariable('title_view');
    const base_url = getAppVariable('base_url');
    const language = getAppVariable('language');

    let datatable_obj = $(table).DataTable({
        ajax: '/bill_clients/get_clients_ajax',
        columns: [
            {
                data: 'id',
                render: function(data, type, row) {
                    return row.id ? row.id : not_applicable;
                }
            }, {
                data: 'name',
                render: function(data, type, row) {
                    return row.name ? row.name : not_applicable;
                }
            }, {
                data: 'tax_no',
                render: function(data, type, row) {
                    return row.tax_no ? row.tax_no : not_applicable;
                }
            }, {
                data: 'post_code',
                render: function(data, type, row) {
                    return row.post_code ? row.post_code : not_applicable;
                }
            }, {
                data: 'city',
                render: function(data, type, row) {
                    return row.city ? row.city : not_applicable;
                }
            }, {
                data: 'street',
                render: function(data, type, row) {
                    return row.street ? row.street : not_applicable;
                }
            }, {
                data: 'first_name',
                render: function(data, type, row) {
                    return row.first_name ? row.first_name : not_applicable;
                }
            }, {
                data: 'country',
                render: function(data, type, row) {
                    return row.country ? row.country : not_applicable;
                }
            }, {
                data: 'email',
                render: function(data, type, row) {
                    return row.email ? row.email : not_applicable;
                }
            },{
                data: 'phone',
                render: function(data, type, row) {
                    return row.phone ? row.phone : not_applicable;
                }
            },{
                data: 'www',
                render: function(data, type, row) {
                    return row.www ? row.www : not_applicable;
                }
            },{
                data: 'fax',
                render: function(data, type, row) {
                    return row.fax ? row.fax : not_applicable;
                }
            },{
                data: 'created_at',
                render: function(data, type, row) {
                    return row.created_at ? row.created_at : not_applicable;
                }
            },{
                data: 'updated_at',
                render: function(data, type, row) {
                    return row.updated_at ? row.updated_at : not_applicable;
                }
            },{
                data: 'street_no',
                render: function(data, type, row) {
                    return row.street_no ? row.street_no : not_applicable;
                }
            },{
                data: 'kind',
                render: function(data, type, row) {
                    return row.kind ? row.kind : not_applicable;
                }
            },{
                data: 'bank',
                render: function(data, type, row) {
                    return row.bank ? row.bank : not_applicable;
                }
            },{
                data: 'bank_account',
                render: function(data, type, row) {
                    return row.bank_account ? row.bank_account : not_applicable;
                }
            },{
                data: 'bank_account_id',
                render: function(data, type, row) {
                    return row.bank_account_id ? row.bank_account_id : not_applicable;
                }
            },{
                data: 'shortcut',
                render: function(data, type, row) {
                    return row.shortcut ? row.shortcut : not_applicable;
                }
            },{
                data: 'note',
                render: function(data, type, row) {
                    return row.note ? row.note : not_applicable;
                }
            },{
                data: 'last_name',
                render: function(data, type, row) {
                    return row.last_name ? row.last_name : not_applicable;
                }
            },{
                data: 'referrer',
                render: function(data, type, row) {
                    return row.referrer ? row.referrer : not_applicable;
                }
            },{
                data: 'token',
                render: function(data, type, row) {
                    return row.token ? row.token : not_applicable;
                }
            },{
                data: 'fuid',
                render: function(data, type, row) {
                    return row.fuid ? row.fuid : not_applicable;
                }
            },{
                data: 'fname',
                render: function(data, type, row) {
                    return row.fname ? row.fname : not_applicable;
                }
            },{
                data: 'femail',
                render: function(data, type, row) {
                    return row.femail ? row.femail : not_applicable;
                }
            },{
                data: 'department_id',
                render: function(data, type, row) {
                    return row.department_id ? row.department_id : not_applicable;
                }
            },{
                data: 'import',
                render: function(data, type, row) {
                    return row.import ? row.import : not_applicable;
                }
            },{
                data: 'discount',
                render: function(data, type, row) {
                    return row.discount ? row.discount : not_applicable;
                }
            },{
                data: 'payment_to_kind',
                render: function(data, type, row) {
                    return row.payment_to_kind ? row.payment_to_kind : not_applicable;
                }
            },{
                data: 'category_id',
                render: function(data, type, row) {
                    return row.category_id ? row.category_id : not_applicable;
                }
            },{
                data: 'use_delivery_address',
                render: function(data, type, row) {
                    return row.use_delivery_address ? row.use_delivery_address : not_applicable;
                }
            },{
                data: 'delivery_address',
                render: function(data, type, row) {
                    return row.delivery_address ? row.delivery_address : not_applicable;
                }
            },{
                data: 'person',
                render: function(data, type, row) {
                    return row.person ? row.person : not_applicable;
                }
            },{
                data: 'panel_user_id',
                render: function(data, type, row) {
                    return row.panel_user_id ? row.panel_user_id : not_applicable;
                }
            },{
                data: 'use_mass_payment',
                render: function(data, type, row) {
                    return row.use_mass_payment ? row.use_mass_payment : not_applicable;
                }
            },{
                data: 'mass_payment_code',
                render: function(data, type, row) {
                    return row.mass_payment_code ? row.mass_payment_code : not_applicable;
                }
            },{
                data: 'external_id',
                render: function(data, type, row) {
                    return row.external_id ? row.external_id : not_applicable;
                }
            },{
                data: 'company',
                render: function(data, type, row) {
                    return row.company ? row.company : not_applicable;
                }
            },{
                data: 'title',
                render: function(data, type, row) {
                    return row.title ? row.title : not_applicable;
                }
            },{
                data: 'mobile_phone',
                render: function(data, type, row) {
                    return row.mobile_phone ? row.mobile_phone : not_applicable;
                }
            },{
                data: 'register_number',
                render: function(data, type, row) {
                    return row.register_number ? row.register_number : not_applicable;
                }
            },{
                data: 'tax_no_check',
                render: function(data, type, row) {
                    return row.tax_no_check ? row.tax_no_check : not_applicable;
                }
            },{
                data: 'attachments_count',
                render: function(data, type, row) {
                    return row.attachments_count ? row.attachments_count : not_applicable;
                }
            },{
                data: 'default_payment_type',
                render: function(data, type, row) {
                    return row.default_payment_type ? row.default_payment_type : not_applicable;
                }
            },{
                data: 'tax_no_kind',
                render: function(data, type, row) {
                    return row.tax_no_kind ? row.tax_no_kind : not_applicable;
                }
            },{
                data: 'accounting_id',
                render: function(data, type, row) {
                    return row.accounting_id ? row.accounting_id : not_applicable;
                }
            },{
                data: 'disable_auto_reminders',
                render: function(data, type, row) {
                    return row.disable_auto_reminders ? row.disable_auto_reminders : not_applicable;
                }
            },{
                data: 'buyer_id',
                render: function(data, type, row) {
                    return row.buyer_id ? row.buyer_id : not_applicable;
                }
            },{
                data: 'price_list_id',
                render: function(data, type, row) {
                    return row.price_list_id ? row.price_list_id : not_applicable;
                }
            },{
                data: 'panel_url',
                render: function(data, type, row) {
                    return row.panel_url ? row.panel_url : not_applicable;
                }
            },{
                data: 'actions',
                orderable: false,
                render: function (data, type, row){
                    console.log('route ' + "/bill_clients/" + row.id)
                    return '<a href="/bill_clients/' + row.id + '" class="btn btn-sm btn-blue-outline">' + title_view + '</a>';
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


    // Handler for the "Load Products" button click
    // Add click event listener to the "Load Products" button
    $("#loadProductsBtn").on("click", function() {
        // Send an AJAX request to fetch products
        $.ajax({
            url: "/billapi/fetchProducts",
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var message = response.message || 'Products fetching completed successfully.';
                // Show the success message with a fade-in effect
                $('#successMessage').text(message).fadeIn(1000, function() {
                    // Hide the success message after 5 seconds with a fade-out effect
                    setTimeout(function() {
                        $('#successMessage').fadeOut(1000);
                    }, 5000);
                });
                // Hide the error message if it's currently displayed
                $('#errorMessage').hide();
            },
            error: function(xhr) {
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message;
                var message = errorMessage || 'Error fetching products. Please try again later.';
                // Show the error message with a fade-in effect
                $('#errorMessage').text(message).fadeIn(1000, function() {
                    // Hide the error message after 5 seconds with a fade-out effect
                    setTimeout(function() {
                        $('#errorMessage').fadeOut(1000);
                    }, 5000);
                });
                // Hide the success message if it's currently displayed
                $('#successMessage').hide();
            }
        });
    });

})