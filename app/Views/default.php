<?= $base_url = base_url('/'); ?>
<!doctype html>
<html>
<head>
    <title>User Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" src= <?= $base_url."assets/js/helper.js" ?>></script>

</head>
<body>
<?= $this->renderSection('content') ?>

<!--BEGIN: APP variables-->
<div class="app-variables" style="display: none;"
     data-csrf_token="<?= csrf_token() ?>"

     data-base_url="<?= $base_url ?>"
     data-per_page="<?= !empty($per_page) ? $per_page : 10 ?>"
     data-language="<?= service('request')->getLocale(); ?>"

     data-not_applicable="<?= lang('not_applicable') ?>"
     data-title_active="<?= lang('active') ?>"
     data-title_deactive="<?= lang('deactive') ?>"
     data-title_activate="<?= lang('activate') ?>"
     data-title_deactivate="<?= lang('deactivate') ?>"
     data-title_edit="<?= lang('edit') ?>"
     data-title_restore="<?= lang('restore') ?>"
     data-title_delete="<?= lang('delete') ?>"
     data-title_report="<?= lang('report') ?>"
     data-title_profile="<?= lang('profile') ?>"
     data-title_view="<?= lang('view') ?>"
     data-title_history="<?= lang('history') ?>"
>
</div>
</body>
</html>