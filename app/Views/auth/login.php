<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

    <!-- Форма для входа -->
<div class="login">
    <fieldset>
        <legend><?= lang('app_lang.login') ?>:</legend>
        <form method="post" action="/auth/processLogin">
            <label for="email"><?= lang('app_lang.email') ?>:
            <input type="email" name="email" id="email" required></label>

            <label for="password"><?= lang('app_lang.password') ?>:
            <input type="password" name="password" id="password" required></label>
            <p><?= lang('app_lang.not_account') ?>&nbsp; <a href="/auth/register"><?= lang('app_lang.sign_up') ?></a></p>
            <button type="submit"><?= lang('app_lang.enter') ?></button>
        </form>

    </fieldset>

</div>


<link rel="stylesheet" href="<?= base_url('assets/css/auth/login.css') ?>">
<script src="<?= base_url('assets/js/auth/login.js') ?>"></script>


<?= $this->endSection() ?>