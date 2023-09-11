$(document).ready(function() {
    const table = $('#billPositionsTable');
    const per_page = 15;
    const not_applicable = 'not_applicable';
    const invoice_id = $('#bill_id').val();

    if ($('#bill_id').val() !== undefined ){

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
                    .column( 4 )
                    .data()
                    .reduce( function (a, b) {
                        return parseFloat(intVal(a).toFixed(2)) + parseFloat(intVal(b).toFixed(2));
                    }, 0 );

                var friTotal = api
                    .column( 5 )
                    .data()
                    .reduce( function (a, b) {
                        return parseFloat(intVal(a).toFixed(2)) + parseFloat(intVal(b).toFixed(2));
                    }, 0 );


                // Update footer by showing the total with the reference of the column index
                $( api.column( 3 ).footer() ).html('Total');
                $( api.column( 4 ).footer() ).html(thuTotal);
                $( api.column( 5 ).footer() ).html(friTotal);
            },
        });

    }

    $('#createParcelBtn').click(function() {
        // Send a GET request when the button is clicked
        $.get('/meest_parcels/add/' + invoice_id)
            .done(function(data) {
                let response = JSON.parse(data);
                if (response.code === '404' || response.code === '500'){
                    let message = response.message || "Error! Parcel didn't creat.";
                    $('#errorMessage').text(message).fadeIn(1000, function () {
                        // Hide the success message after 5 seconds with a fade-out effect
                        setTimeout(function () {
                            $('#errorMessage').fadeOut(1000);
                        }, 5000);
                    });
                    $('#successMessage').hide();
                }else{
                    let message = response.message || 'Parcel created successfully.';
                    // Show the success message with a fade-in effect
                    $('#successMessage').text(message).fadeIn(1000, function () {
                        // Hide the success message after 5 seconds with a fade-out effect
                        setTimeout(function () {
                            $('#successMessage').fadeOut(1000);
                        }, 5000);
                    });
                    // Hide the error message if it's currently displayed
                    $('#errorMessage').hide();
                }

            })
            .fail(function(xhr) {
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message;
                var message = errorMessage || 'Error creating parcel. Please try again later.';
                // Show the error message with a fade-in effect
                $('#errorMessage').text(message).fadeIn(1000, function () {
                    // Hide the error message after 5 seconds with a fade-out effect
                    setTimeout(function () {
                        $('#errorMessage').fadeOut(1000);
                    }, 5000);
                });
                // Hide the success message if it's currently displayed
                $('#successMessage').hide();
            });
    });


})