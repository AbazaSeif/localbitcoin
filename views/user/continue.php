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
    <?php endif;if(User::isEnableTFA($_SESSION['possible_id'])){ ?>
    <form method="post" action="/user/continue">
        <div class="form-popap">
            <input style="width: 303px" type="text" name="code" placeholder="Проверочный код" required class="popap-inp">
            <div style="text-align: center;font-size: 14.5px;padding: 5px;">Проверочный код был отправлен на Вашу почту</div>
            <div class="clear"></div>
        </div>
        <div class="btn-popap" style="width: 303px">
            <button type="submit" value="1" class="inp-btn-popap">Войти</button>
        </div>
    </form>
    <?php } else{ ?>
    <form method="post" action="/user/continue">
        <div class="form-popap">
            <div style="text-align: center;font-size: 18.5px;padding: 5px;padding-top: 15px;">Ключ: <span><?php echo $ga_secret; ?></span></div>
            <div style="text-align: center;font-size: 19px;padding: 5px;">Или </div>
            <div style="text-align: center;font-size: 14.5px;padding: 5px;"><img src="<?=$sqr?>" /></div>
            <input style="width: 303px" type="text" name="code" placeholder="Проверочный код" required class="popap-inp">
            
            <div class="clear"></div>
        </div>
        <div class="btn-popap" style="width: 303px">
            <button type="submit" value="1" class="inp-btn-popap">Войти</button>
        </div>
    </form>
    <?php } ?>
</div>
