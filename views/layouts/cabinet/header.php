<?php
if (!isset($user)) {
    $user = new User(User::getUserIdFromSession());
}
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
        <title><?= SITE_NAME ?></title>
    </head>
    <body>
        <div class="wind-lk-con" id="redact-lk-mail">
            <div class="close-left"></div>
            <div class="close-right"></div>
            <div class="form-radact-win">
                <form>
                    <input type="text" name="new-mail" class="inp-new-mail" placeholder="Введите новый e-mail">
                    <button type="submit" class="save-red-btn">Сохранить</button>
                </form>
            </div>
        </div>
        <div class="wind-lk-con" id="redact-lk-pass">
            <div class="close-left"></div>
            <div class="close-right"></div>
            <div class="form-radact-win">
                <form>
                    <input type="password" name="new-mail" class="inp-new-mail" placeholder="Введите новый пароль">
                    <button type="submit" class="save-red-btn">Сохранить</button>
                </form>
            </div>
        </div>

        <div class="header">
            <div class="bg-top-header">
                <div class="wrapper">
                    <div class="top-header">
                        <div class="btn-bue-top">
                            <a class="bue-top-btn" href="/cabinet/placebill">Купить биткоин</a>
                            <a class="sale-top-btn" href="/cabinet/placebill?type=2">Продать биткоин</a>
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
                            <div class="user-lk-link">
                                <div class="ava-user">
                                    <a href="/cabinet"><img src="/template/bit.team/img/ava-user.png" alt=""></a>
                                </div>
                                <div class="info-lk-top-user">
                                    <a href="/cabinet" class="top-red-btn-lk"></a>
                                    <a href="/user/signout" class="top-clos-btn-lk"></a>
                                    <a href="/cabinet"><p class="name-user-top"><?= $user->username ?></p></a>
                                    
                                    <p class="valute-2"><?= $this->coinbase->amount ?></p>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <a class="menu-phone"></a>
                            <div class="clear"></div>
                        </div>

                        <!-- <div class="block-lk-and-reg">
                            <a href="/user/signout" class="btn-reg">Выход</a>
                            <a href="/cabinet" class="btn-lk">Личный кабинет</a>
                            <a class="menu-phone"></a>
                            <div class="clear"></div>
                        </div> -->

                        <div class="block-logo-top">
                            <a href="/"><img src="/template/bit.team/img/elements/logo-top.png" alt="" /></a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="content-menu-phone">
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
                        <a href="/cabinet">Личный кабинет</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="wrapper">
            <div class="title-help">
                <h3>Личный кабинет пользователя</h3>
                <?php if(!isset($placebill)) { ?>
                <p>Страница информации по сделкам</p>
                <?php }else { ?>
                <p>Cоздание объявления</p>
                <?php } ?>
                <div class="info-balance-2">
                    <div class="block-nav-lk">
                        <ul>
                            <li><a href="/cabinet" <?php if(isset($currloc)&&$currloc == "index") { ?> id="currloc" <?php } ?> ><span class="line-menu"></span>Профиль</a> </li>
                            <li><a href="/cabinet/adses" <?php if(isset($currloc)&&$currloc == "adses") { ?> id="currloc" <?php } ?> ><span class="line-menu"></span>Архив сделок</a> </li>
                            <li><a href="/cabinet/active" <?php if(isset($currloc)&&$currloc == "active") { ?> id="currloc" <?php } ?> ><span class="line-menu"></span>Активные объявления</a> </li>
                            <li><a href="/cabinet/support" <?php if(isset($currloc)&&$currloc == "support") { ?> id="currloc" <?php } ?> ><span class="line-menu"></span>Служба поддержки</a> </li>
                            <li><a href="/cabinet/refill" <?php if(isset($currloc)&&$currloc == "refill") { ?> id="currloc" <?php } ?> ><span class="line-menu"></span>Пополнить</a> </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
