<?php
if(!isset($user))
{
    $user = new User(User::getUserIdFromSession());
}
if(!User::isGuest() && !isset($coinbase))
    $coinbase = new Coinbase();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../../../template/bit.team/css/main.css"/>
        <link rel="stylesheet" type="text/css" href="../../../template/bit.team/css/fonts.css"/>
        <link rel="stylesheet" type="text/css" href="../../../template/bit.team/css/media.css"/>
        <link rel="stylesheet" type="text/css" href="../../../template/bit.team/css/animate.css"/>
        <script src="../../../template/bit.team/js/jquery-1.8.2.min.js"></script>
        <script src="../../../template/bit.team/js/js-realst.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="https://use.fontawesome.com/2edeca68f6.js"></script>
        <title><?= SITE_NAME ?></title>
    </head>
    <body class="bg-main-bue">
<?php if(User::isGuest()): ?>
            <div class="win-container">
                <div class="close-left"></div>
                <div class="popap-login" <?php if(!isset($signup)) { ?> style="height: 370px" <?php }else{ ?> style="height: 300px" <?php } ?>>
                    <div class="popap-title">
                        <h3>Вход в личный кабинет</h3>
                    </div>
                    <form method="post" action="/user/signin">
                        <div class="form-popap">
                            <input style="width: 303px" type="text" name="username" pattern="^[a-zA-Z0-9]+$" required placeholder="Введите логин" class="popap-inp">
                            <input style="width: 303px" type="password" name="password" placeholder="Введите пароль" required class="popap-inp">
                            <div class="clear"></div>
                            <?php if(!isset($signup)&&!isset($login)) { ?>
                            <div style="display: flex;justify-content: center;" class="g-recaptcha" data-sitekey="6LfJDRMUAAAAAG88RE0h_A0sGuACtO0bkEdO1s-3"></div>
                            <?php } ?>
                        </div>
                        <div class="btn-popap" style="width: 303px">
                            <p>Забыли пароль?<br><a class="vost-popap">Востановить</a> </p>
                            <button type="submit" value="1" class="inp-btn-popap">Войти</button>
                        </div>
                    </form>
                </div>
            </div>
<?php endif; ?>
        <div class="header">
            <div class="bg-top-header">
                <div class="wrapper">
                    <div class="top-header">
                        <div class="btn-bue-top">
                            <a class="bue-top-btn" style="background-color: <?php if(isset($type)&&$type == 'sell') echo "#fff;color:#6b727d;border-bottom-color:#fff;"; ?>" href="/?type=buy" style="padding-left: 20px;"><i class="fa fa-arrow-circle-down fa-2x"></i>Купить биткоин</a>
                            <a class="sale-top-btn" href="/?type=sell" style="background-color: <?php if(isset($type)&&$type == 'sell') echo "#fc5217;color:white"; ?>"><i class="fa fa-arrow-circle-up fa-2x"></i>Продать биткоин</a>
                            <div class="clear"></div>
                        </div>
                        <div class="nav-top">
                            <ul>
                                <li><a href="/cabinet/placebill">Разместить объявление</a></li>
                                <li><a href="">Форум</a></li>
                                <li><a href="/help">Справка</a></li>
                            </ul>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="bg-block-top">
                <div class="wrapper">
                    <div class="top-block-2">
                        <div class="block-lk-and-reg">
<?php if(User::isGuest()): ?>
                                <a href="/user/signup" class="btn-reg">Регистрация</a>
                                <a class="btn-lk" style="text-decoration: underline;font-size: 15px;">Вход</a>
                                <a class="menu-phone"></a>
<?php else: ?>
                                <div class="user-lk-link" style="width: 280px;">
                                    <div class="ava-user">
                                    <a href="/cabinet"><img src="/template/bit.team/img/ava-user.png" alt=""></a>
                                </div>
                                <div class="info-lk-top-user">
                                    <a href="/cabinet" class="top-red-btn-lk"></a>
                                    <a href="/user/signout" class="top-clos-btn-lk"></a>
                                    <a href="/cabinet"><p class="name-user-top"><?= $user->username ?></p></a>
                                    
                                    <p class="valute-2" onclick="location.href='/cabinet/refill';"><?= $coinbase->amount ?></p>
                                </div>
                                    <div class="clear"></div>
                                </div>
                                <a class="menu-phone"></a>
<?php endif; ?>

                            <div class="clear"></div>
                        </div>
                        <div class="block-logo-top">
                            <a href="/"><img src="/template/bit.team/img/elements/logo-top.png" alt="" /></a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="content-menu-phone" style="padding-bottom: 0px;">
                <ul>
                    <li>
                        <a href="/cabinet/placebill">Разместить объявление</a>
                    </li>
                    <li>
                        <a href="">Форум</a>
                    </li>
                    <li>
                        <a href="/help">Справка</a>
                    </li>
                    <li>
                        <a href="/user/signup">Регистрация</a>
                    </li>
                    <li>
                        <a href="/user/login">Вход</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="wrapper">