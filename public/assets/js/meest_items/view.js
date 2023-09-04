$(document).ready(function() {
    const table = $('#itemDescriptionsTable');
    const not_applicable = 'not_applicable';
    const per_page = getAppVariable('per_page');
    const title_view = getAppVariable('title_view');
    const base_url = getAppVariable('base_url');
    const language = getAppVariable('language');
    const csrf_token = getAppVariable('csrf_token');

    const item_id = $('#product_id').val();
    const url = '/meest_items/get_meest_item_desc_ajax?item_id=' + item_id;

    let datatable_obj = $(table).DataTable({
        ajax: url,
        columns: [
            {
                data: 'product_id',
                render: function(data, type, row) {
                    return row.id ? row.id : not_applicable;
                }
            }, {
                data: 'description',
                render: function(data, type, row) {
                    return row.description ? row.description : not_applicable;
                }
            }, {
                data: 'lang',
                render: function(data, type, row) {
                    return row.lang ? row.lang : not_applicable;
                }
            }, {
                data: 'created_at',
                render: function(data, type, row) {
                    return row.created_at ? row.created_at : not_applicable;
                }
            },  {
                data: 'updated_at',
                render: function(data, type, row) {
                    return row.updated_at ? row.updated_at : not_applicable;
                }
            },
        ],
    });

    // При изменении содержимого textarea
    $('.bills textarea').on('input', function() {
        this.style.height = 'auto'; // Сначала установите высоту в auto, чтобы сбросить высоту
        this.style.height = (this.scrollHeight) + 'px'; // Установите высоту, чтобы вместить содержимое
    });
})