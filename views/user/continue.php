<?php include ROOT . '/views/layouts/guest/header.php'; ?>

<div class="col-sm-4 col-sm-offset-4 padding-right">

    <?php if (isset($errors) && is_array($errors)): ?>
        <div class="error-messege">     
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form method="post" action="/user/continue">
        <div class="form-popap">
            <input style="width: 303px" type="text" name="code" placeholder="Проверочный код" required class="popap-inp">
            <div style="text-align: center;font-size: 14.5px;padding: 5px;">Проверочный код был отправлен на Вашу почту</div>
            <div class="clear"></div>
            <div style="display: flex;justify-content: center;" class="g-recaptcha" data-sitekey="6LfJDRMUAAAAAG88RE0h_A0sGuACtO0bkEdO1s-3"></div>
        </div>
        <div class="btn-popap" style="width: 303px">
            <button type="submit" value="1" class="inp-btn-popap">Войти</button>
        </div>
    </form>
</div>
