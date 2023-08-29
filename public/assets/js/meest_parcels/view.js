$(document).ready(function() {
    const table = $('#meestItemsTable');
    const per_page = 15;
    const not_applicable = 'not_applicable';

    if ($('#bill_id').val() !== undefined ){
        const invoice_id = $('#bill_id').val();
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

    // При изменении содержимого textarea
    $('.bills textarea').on('input', function() {
        this.style.height = 'auto'; // Сначала установите высоту в auto, чтобы сбросить высоту
        this.style.height = (this.scrollHeight) + 'px'; // Установите высоту, чтобы вместить содержимое
    });
})