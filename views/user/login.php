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

    <div class="signup-form"><!--sign up form-->
        <h2>Вход на сайт</h2>
        <form class="form-horizontal col-md-8" role="form" action="/user/signin" method="post">
            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
            <br /><br />
            <input type="submit" name="submit" class="btn btn-default" value="Вход" />
        </form>
    </div><!--/sign up form-->

    <br/>
    <br/>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>