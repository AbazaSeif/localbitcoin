<?php include ROOT . '/views/layouts/guest/header.php'; ?>

<div class="title-help">
    <h3>Регистрация нового аккаунта</h3>
    <p>Создай свой аккаунт для полноценного пользования сервисом</p>
</div>
<div class="content-reg">
    <?php if($result != true){ ?>
    <div class="dop-info-reg">
        <p>
            Поля, помеченные звёздочкой, обязательны для заполнения.<br><br>

            Пожалуйста, <a href="/help"> ознакомьтесь с правилами</a> данного сайта, перед
            тем, как нажать кнопку “Создать аккаунт”.<br><br>
            
            Нажимая кнопку "Создать аккаунт", Вы автоматически соглашаетесь с правилами сайта.
        </p>
    </div>
    <?php } ?>
    <div class="form-reg-main">
        <?php if ($result == true): ?>
            <div class="informate-messege">Вы зарегистрированы! На email отправлена ссылка для подтверждения аккаунта.</div>
        <?php else: ?>
            <?php if (isset($errors) && is_array($errors)): ?>
                <div class="error-messege"> 
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div> 

            <?php endif; ?>

            <form method="post">
                <input type="text" name="username" value="<?= $username ?>" placeholder="* Имя пользователя" required class="inp-reg">
                <input type="email" name="email" value="<?= $email ?>" placeholder="* Почта e-mail" required class="inp-reg">
                <input type="email" name="email" value="<?= $email ?>" placeholder="* Подтвердить e-mail" required class="inp-reg">
                <input type="tel" name="phone" pattern="[0-9]{10,13}" value="<?= $phone ?>" placeholder="* Мобильный телефон в формате 71234567890" required class="inp-reg">
                <input type="password" name="password" pattern="[A-Za-zА-Яа-яЁё0-9]{6,}" placeholder="* Ваш пароль (от 6 символов)" class="inp-reg" required>
                <input type="password" name="password2" pattern="[A-Za-zА-Яа-яЁё0-9]{6,}" placeholder="* Повторите пароль" class="inp-reg" required>
                <div class="capcha-img">
                    <img src="/upload/img.gif" alt="">
                </div>
                <input type="text" name="inputCaptcha" placeholder="Введите цифры" class="capcha-reg" required>
                <div class="clear"></div>
                <button type="submit" name="submit" value="1" class="btn-reg-main"></button>
            </form>
        </div>
        <div class="clear"></div>
    </div>
<?php endif; ?>

<?php if($result != true){ include ROOT . '/views/layouts/footer.php'; }?>