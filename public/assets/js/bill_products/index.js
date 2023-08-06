$(document).ready(function() {
    const table = $('#billProductsTable');
    const not_applicable = 'not_applicable';
    const per_page = getAppVariable('per_page');
    const title_view = getAppVariable('title_view');
    const base_url = getAppVariable('base_url');
    const language = getAppVariable('language');

    let datatable_obj = $(table).DataTable({
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
            url: "/billapi/fetchProducts", // Use the defined route URL for the AJAX request
            method: "GET",
            dataType: "json",
            success: function(response) {
                // Handle the success response
                if (response.success) {
                    // Update the billProductsTable on the page with the new data (if applicable)
                    // Display a success message popup
                    alert("Products successfully updated!");
                } else {
                    // Handle the error response
                    // Display an error message popup
                    alert("Error updating products: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                // Handle the AJAX request error
                alert("An error occurred while updating products.");
            }
        });
    });

})