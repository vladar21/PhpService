$(document).ready(function() {
    const table = $('#billInvoicesTable');
    const not_applicable = 'not_applicable';
    const per_page = getAppVariable('per_page');
    const title_view = getAppVariable('title_view');
    const base_url = getAppVariable('base_url');
    const language = getAppVariable('language');

    let datatable_obj = $(table).DataTable({
        // processing: true,
        serverSide: true,
        pageLength: per_page,
        order: [[0, "desc"]],
        ajax: '/bill_invoices/get_invoices_ajax',
        columns: [
            {
                data: 'id',
                render: function (data, type, row) {
                    return row.id ? row.id : not_applicable;
                }
            }, {
                data: 'kind',
                render: function (data, type, row) {
                    return row.user_id ? row.user_id : not_applicable;
                }
            }, {
                data: 'number',
                render: function (data, type, row) {
                    return row.number ? row.number : not_applicable;
                }
            }, {
                data: 'sell_date',
                render: function (data, type, row) {
                    return row.place ? row.place : not_applicable;
                }
            }, {
                data: 'issue_date',
                render: function (data, type, row) {
                    return row.sell_date ? row.sell_date : not_applicable;
                }
            }, {
                data: 'payment_to',
                render: function (data, type, row) {
                    return row.price_net ? row.price_net : not_applicable;
                }
            }, {
                data: 'seller_name',
                render: function (data, type, row) {
                    return row.price_gross ? row.price_gross : not_applicable;
                }
            }, {
                data: 'seller_tax_no',
                render: function (data, type, row) {
                    return row.currency ? row.currency : not_applicable;
                }
            }, {
                data: 'buyer_name',
                render: function (data, type, row) {
                    return row.description ? row.description : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.seller_name ? row.seller_name : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.seller_tax_no ? row.seller_tax_no : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.seller_street ? row.seller_street : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.seller_post_code ? row.seller_post_code : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.seller_city ? row.seller_city : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.seller_country ? row.seller_country : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.seller_email ? row.seller_email : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.seller_phone ? row.seller_phone : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.seller_www ? row.seller_www : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.seller_bank ? row.seller_bank : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.seller_bank_account ? row.seller_bank_account : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.buyer_name ? row.buyer_name : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.buyer_post_code ? row.buyer_post_code : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.buyer_city ? row.buyer_city : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.buyer_street ? row.buyer_street : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.buyer_first_name ? row.buyer_first_name : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.buyer_country ? row.buyer_country : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.created_at ? row.created_at : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.updated_at ? row.updated_at : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.token ? row.token : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.buyer_email ? row.buyer_email : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.client_id ? row.client_id : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.lang ? row.lang : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.product_cache ? row.product_cache : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.buyer_last_name ? row.buyer_last_name : not_applicable;
                }
            }, {
                data: 'buyer_tax_no',
                render: function (data, type, row) {
                    return row.delivery_date ? row.delivery_date : not_applicable;
                }
            }, {
                data: 'actions',
                orderable: false,
                render: function (data, type, row) {
                    return '<a href="/bill_invoices/' + row.id + '" class="btn btn-sm btn-blue-outline">' + title_view + '</a>';
                }
            }
        ]
    });
});

$(document).ready(function() {
// Handler for the "Load Invoices" button click
// Add click event listener to the "Load Invoices" button
    $("#loadInvoicesBtn").on("click", function () {
        // Send an AJAX request to fetch invoices
        $.ajax({
            url: "/billapi/fetchInvoices",
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                var message = response.message || 'Invoices fetching completed successfully.';
                // Show the success message with a fade-in effect
                $('#successMessage').text(message).fadeIn(1000, function () {
                    // Hide the success message after 5 seconds with a fade-out effect
                    setTimeout(function () {
                        $('#successMessage').fadeOut(1000);
                    }, 5000);
                });
                // Hide the error message if it's currently displayed
                $('#errorMessage').hide();
                $('#billInvoicesTable').DataTable().ajax.reload();
            },
            error: function (xhr) {
                if ( xhr.status == 200){
                    var message =
                        'Invoices fetching completed successfully.';
                    // Show the success message with a fade-in effect
                    $('#successMessage').text(message).fadeIn(1000, function () {
                        // Hide the success message after 5 seconds with a fade-out effect
                        setTimeout(function () {
                            $('#successMessage').fadeOut(1000);
                        }, 5000);
                    });
                    // Hide the error message if it's currently displayed
                    $('#errorMessage').hide();
                    $('#billInvoicesTable').DataTable().ajax.reload();
                    return true;
                }
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message;
                var message = errorMessage || 'Error fetching invoices. Please try again later.';
                // Show the error message with a fade-in effect
                $('#errorMessage').text(message).fadeIn(1000, function () {
                    // Hide the error message after 5 seconds with a fade-out effect
                    setTimeout(function () {
                        $('#errorMessage').fadeOut(1000);
                    }, 5000);
                });
                // Hide the success message if it's currently displayed
                $('#successMessage').hide();
            }
        });
    });
});
