$(document).ready(function() {
    const table = $('#meestClientsTable');
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
        order: [[1, "desc"]],
        ajax: {
            url: '/meest_clients/get_meest_clients_ajax',
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
                render: function(data, type, row) {
                    return row.id ? row.id : not_applicable;
                }
            }, {
                data: 'companyName',
                render: function(data, type, row) {
                    return row.companyName ? row.companyName : not_applicable;
                }
            }, {
                data: 'name',
                render: function(data, type, row) {
                    return row.name ? row.name : not_applicable;
                }
            }, {
                data: 'phone',
                render: function(data, type, row) {
                    return row.phone ? row.phone : not_applicable;
                }
            }, {
                data: 'email',
                render: function(data, type, row) {
                    return row.email ? row.email : not_applicable;
                }
            }, {
                data: 'zipCode',
                render: function(data, type, row) {
                    return row.zipCode ? row.zipCode : not_applicable;
                }
            }, {
                data: 'country',
                render: function(data, type, row) {
                    return row.country ? row.country : not_applicable;
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
                data: 'buildingNumber',
                render: function(data, type, row) {
                    return row.buildingNumber ? row.buildingNumber : not_applicable;
                }
            }, {
                data: 'flatNumber',
                render: function(data, type, row) {
                    return row.flatNumber ? row.flatNumber : not_applicable;
                }
            }, {
                data: 'pickupPoint',
                render: function(data, type, row) {
                    return row.pickupPoint ? row.pickupPoint : not_applicable;
                }
            }, {
                data: 'region1',
                render: function(data, type, row) {
                    return row.region1 ? row.region1 : not_applicable;
                }
            }, {
                data: 'region2',
                render: function(data, type, row) {
                    return row.region2 ? row.region2 : not_applicable;
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
                render: function (data, type, row){
                    return '<a href="/meest_clients/' + row.id + '" class="btn btn-sm btn-blue-outline">' + title_view + '</a>';
                }
            }
        ]
    });
});

$(document).ready(function() {
// Handler for the "Load Clients" button click
// Add click event listener to the "Load Clients" button
    $("#loadClientsBtn").on("click", function () {
        $('.spinner-overlay').show();
        // Send an AJAX request to fetch clients
        $.ajax({
            url: "/billapi/fetchClients",
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                $('.spinner-overlay').hide();
                var message = response.message || 'Clients fetching completed successfully.';
                // Show the success message with a fade-in effect
                $('#successMessage').text(message).fadeIn(1000, function () {
                    // Hide the success message after 5 seconds with a fade-out effect
                    setTimeout(function () {
                        $('#successMessage').fadeOut(1000);
                    }, 5000);
                });
                // Hide the error message if it's currently displayed
                $('#errorMessage').hide();
                $('#billClientsTable').DataTable().ajax.reload();
            },
            error: function (xhr) {
                $('.spinner-overlay').hide();
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message;
                var message = errorMessage || 'Error fetching clients. Please try again later.';
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