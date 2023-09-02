$(document).ready(function() {
    const table = $('#meesClientDocsTable');
    const per_page = 15;
    const not_applicable = 'not_applicable';
    const client_id = $('#meest_client_id').val();
    const url = '/meest_clients/get_meest_client_docs?client_id=' + client_id;

    let datatable_obj = $(table).DataTable({
        ajax: url,
        columns: [
            {
                data: 'id_number',
                render: function(data, type, row) {
                    return row.id_number ? row.id_number : not_applicable;
                }
            }, {
                data: 'issuer',
                render: function(data, type, row) {
                    return row.issuer ? row.issuer : not_applicable;
                }
            }, {
                data: 'name',
                render: function(data, type, row) {
                    return row.name ? row.name : not_applicable;
                }
            }, {
                data: 'number',
                render: function(data, type, row) {
                    return row.number ? row.number : not_applicable;
                }
            }, {
                data: 'series',
                render: function(data, type, row) {
                    return row.series ? row.series : not_applicable;
                }
            }, {
                data: 'date',
                render: function(data, type, row) {
                    return row.date ? row.date : not_applicable;
                }
            }
        ],
    });



    // При изменении содержимого textarea
    $('.bills textarea').on('input', function() {
        this.style.height = 'auto'; // Сначала установите высоту в auto, чтобы сбросить высоту
        this.style.height = (this.scrollHeight) + 'px'; // Установите высоту, чтобы вместить содержимое
    });
})