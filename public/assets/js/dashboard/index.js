$(document).ready(function() {

    // datatables
    const table = $('#usersTable');
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
        ajax: '/dashboard/get_users_ajax',
        columns: [
            {
                data: 'id',
                render: function(data, type, row) {
                    return row.id ? row.id : not_applicable;
                }
            }, {
                data: 'username',
                render: function(data, type, row) {
                    return row.username ? row.username : not_applicable;
                }
            }, {
                data: 'status',
                render: function(data, type, row) {
                    return row.status ? row.status : not_applicable;
                }
            }, {
                data: 'status_message',
                render: function(data, type, row) {
                    return row.status_message ? row.status_message : not_applicable;
                }
            }, {
                data: 'active',
                render: function(data, type, row) {
                    return row.active ? row.active : not_applicable;
                }
            }, {
                data: 'last_active',
                render: function(data, type, row) {
                    return row.last_active ? row.last_active : not_applicable;
                }
            }, {
                data: 'created_at',
                render: function(data, type, row) {
                    return row.created_at ? row.created_at : created_at;
                }
            }, {
                data: 'updated_at',
                render: function(data, type, row) {
                    return row.updated_at ? row.updated_at : not_applicable;
                }
            }, {
                data: 'deleted_at',
                render: function(data, type, row) {
                    return row.deleted_at ? row.deleted_at : not_applicable;
                }
            }, {
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