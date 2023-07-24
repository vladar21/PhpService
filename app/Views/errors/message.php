<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<div class="wrap">
    <h1>$code</h1>

    <p>
        <?= nl2br(esc($message)) ?>
    </p>
</div>

<?= $this->endSection() ?>
