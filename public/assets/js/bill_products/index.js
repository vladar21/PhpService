$(document).ready(function() {

    // datatables
    const table = $('#billProductsTable');
    const not_applicable = 'not_applicable';
    const per_page = getAppVariable('per_page');
    const title_view = getAppVariable('title_view');
    const base_url = getAppVariable('base_url');
    const language = getAppVariable('language');

    let datatable_obj = $(table).DataTable({
        searching: true,
        processing: true,
        serverSide: true,
        pageLength: per_page,
        order: [[0, "desc"]],
        ajax: '/bill_products/get_products_ajax',
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
                data: 'description',
                render: function(data, type, row) {
                    return row.description ? row.description : not_applicable;
                }
            }, {
                data: 'price_net',
                render: function(data, type, row) {
                    return row.price_net ? row.price_net : not_applicable;
                }
            }, {
                data: 'quantity',
                render: function(data, type, row) {
                    return row.quantity ? row.quantity : not_applicable;
                }
            }, {
                data: 'quantity_unit',
                render: function(data, type, row) {
                    return row.quantity_unit ? row.quantity_unit : not_applicable;
                }
            }, {
                data: 'additional_info',
                render: function(data, type, row) {
                    return row.additional_info ? row.additional_info : not_applicable;
                }
            }, {
                data: 'price_gross',
                render: function(data, type, row) {
                    return row.price_gross ? row.price_gross : not_applicable;
                }
            }, {
                data: 'form_name',
                render: function(data, type, row) {
                    return row.form_name ? row.form_name : not_applicable;
                }
            },{
                data: 'code',
                render: function(data, type, row) {
                    return row.code ? row.code : not_applicable;
                }
            },{
                data: 'currency',
                render: function(data, type, row) {
                    return row.currency ? row.currency : not_applicable;
                }
            },{
                data: 'weight_unit',
                render: function(data, type, row) {
                    return row.weight_unit ? row.weight_unit : not_applicable;
                }
            },{
                data: 'supplier_code',
                render: function(data, type, row) {
                    return row.supplier_code ? row.supplier_code : not_applicable;
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
                data: 'actions',
                orderable: false,
                render: function (data, type, row){
                    console.log('route ' + "/bill_products/" + row.id)
                    return '<a href="/bill_products/' + row.id + '" class="btn btn-sm btn-blue-outline">' + title_view + '</a>';
                }
            }
        ]
    });
})

$(document).ready(function() {
// Handler for the "Load Products" button click
// Add click event listener to the "Load Products" button
    $("#loadProductsBtn").on("click", function() {
        $('.spinner-overlay').show();
        // Send an AJAX request to fetch products
        $.ajax({
            url: "/billapi/fetchProducts",
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                $('.spinner-overlay').hide();
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
                $('#billProductsTable').DataTable().ajax.reload();
            },
            error: function(xhr) {
                $('.spinner-overlay').hide();
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