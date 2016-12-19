<?php
if(!isset($user))
{
    $user = new User(User::getUserIdFromSession());
}
$currentCoinbaseObj = new Coinbase();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/template/bit.team/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/template/bit.team/css/fonts.css"/>
    <link rel="stylesheet" type="text/css" href="/template/bit.team/css/media.css"/>
    <script src="/template/bit.team/js/jquery-1.8.2.min.js"></script>
    <script src="/template/bit.team/js/js-realst.js"></script>
    <title><?= SITE_NAME ?></title>
</head>
<body class="bg-main-bue">
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
                    <a href="/user/signout" class="btn-reg">Выход</a>
                    <a href="/cabinet" class="btn-lk">Личный кабинет</a>
                    <a class="menu-phone"></a>
                    <div class="clear"></div>
                </div>
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
        <h3>Пополнить баланс</h3>
        <p>На данной странице вы можете пополнить Ваш Bitcoin-кошелёк</p>
        <div class="info-balance">
            <div class="balanc_usd">
                <p>
                    Баланс BTC:<br>
                    <span class="balance-color"><?= $this->coinbase->amount ?></span>
                </p>
            </div>
            <div class="balanc_btc">
                <p>
                    Баланс USD:<br>
                    <span class="balance-color"><?= number_format(Service::BTCtoUSD($this->coinbase->amount), 2, '.', '') ?></span>
                </p>
            </div>
        </div>
    </div>