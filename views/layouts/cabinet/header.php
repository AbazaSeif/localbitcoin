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
        <script src="https://use.fontawesome.com/2edeca68f6.js"></script>
        <title><?= SITE_NAME ?></title>
    </head>
    <body class="bg-main-bue">
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
                            <a class="bue-top-btn" href="/?type=buy" style="padding-left: 20px;"><i class="fa fa-arrow-circle-down fa-2x"></i>Купить биткоин</a>
                            <a class="sale-top-btn" href="/?type=sell"><i class="fa fa-arrow-circle-up fa-2x"></i>Продать биткоин</a>
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
                            <div class="user-lk-link" style="width: 280px;">
                                <a href="#" class="top-yved-btn">
                                    <span class="col-opov-top">
                                        3
                                    </span>
                                </a>
                                <div class="ava-user" style="width: 60px;">
                                    <a href="/cabinet"><img src="/template/bit.team/img/ava-user.png" alt=""></a>
                                </div>
                                <div class="info-lk-top-user">
                                    <a href="/cabinet" class="top-red-btn-lk"></a>
                                    <a href="/user/signout" class="top-clos-btn-lk"></a>
                                    <a href="/cabinet"><p class="name-user-top" style="font-size: 18px;margin-bottom: 3px;"><?= $user->username ?></p></a>
                                    
                                    <p class="valute-2" id="valute-2-2-2" style="#valute-2-2-2:hover{cursor: pointer;}" onclick="location.href='/cabinet/refill';"><?= $this->coinbase->amount ?></p>
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
                <p>Страница информации по сделкам</p>
                <div class="info-balance-2">
                    <div class="block-nav-lk">
                        <ul>
                            <li>
                                <a href="/cabinet/refill" <?php if(isset($currloc)&&$currloc == "refill") { ?> id="currloc" <?php } ?> ><span class="line-menu"></span>Пополнить/Вывести</a>
                            </li>
                            <li>
                                <a href="/cabinet/active" <?php if(isset($currloc)&&$currloc == "active") { ?> id="currloc" <?php } ?> ><span class="line-menu"></span>История сделок/объявлений</a>
                            </li>
                            <li>
                                <a href="/cabinet/adses" <?php if(isset($currloc)&&$currloc == "adses") { ?> id="currloc" <?php } ?> ><span class="line-menu"></span>Архив сделок</a>
                            </li>
                            <li>
                                <a href="/cabinet/support" <?php if(isset($currloc)&&$currloc == "support") { ?> id="currloc" <?php } ?> ><span class="line-menu"></span>Служба поддержки</a>
                            </li>
                            <li>
                                <a href="/cabinet" <?php if(isset($currloc)&&$currloc == "index") { ?> id="currloc" <?php } ?> ><span class="line-menu"></span>Профиль</a>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
