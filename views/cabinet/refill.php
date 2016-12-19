<?php require_once ROOT . '/views/layouts/cabinet/header.php'; ?>

<div class="content_newob-1">
    <form method="post">
        <div class="informate-messege">
            Переведите деньги на указанный Bitcoin-адрес:
        </div>
        <div class="form-newob">
            <input type="text" value="<?= $this->coinbase->address ?>" readonly class="inp-newob-2">
        </div>
        <div class="clear"></div>
    </form>
</div>

<?php require_once ROOT . '/views/layouts/footer.php'; ?>