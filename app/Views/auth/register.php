<?= $this->extend('layout') ?>

<?= $this->section('content') ?>


    <!-- Форма для регистрации -->
<div class="register">
    <fieldset>
        <legend><?= lang('app_lang.register') ?>:</legend>
        <form method="post" action="/auth/processRegister">
            <label for="username"><?= lang('app_lang.name') ?>:
                <input type="text" name="username" id="username" required></label>

            <label for="email"><?= lang('app_lang.email') ?>:
                <input type="email" name="email" id="email" required></label>

            <label for="password"><?= lang('app_lang.password') ?>:
                <input type="password" name="password" id="password" required></label>

            <button type="submit"><?= lang('app_lang.sign_in') ?></button>
        </form>
    </fieldset>
</div>


    <link rel="stylesheet" href="<?= base_url('assets/css/auth/register.css') ?>">
    <script src="<?= base_url('assets/js/auth/register.js') ?>"></script>


<?= $this->endSection() ?>