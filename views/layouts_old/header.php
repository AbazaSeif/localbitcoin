<?php
if(!isset($user))
{
    $user = new User(User::getUserIdFromSession());
}
$currentCoinbaseObj = new Coinbase();
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/template/localbitcoins/css/main.css"/>
        <link rel="stylesheet" type="text/css" href="/template/localbitcoins/css/fonts.css"/>
        <link rel="stylesheet" type="text/css" href="/template/localbitcoins/css/animate.css"/>
        <script src="/template/localbitcoins/js/jquery-1.8.2.min.js"></script>
        <script src="/template/localbitcoins/js/mon.js"></script>
        <title><?php echo SITE_NAME ?></title>
    </head>
    <body class="in-bg-main">
        <header class="in-bg">
            <div id="header-content">
                <div id="logo-head-inter">
                    <a href="/"><img src="/template/localbitcoins/img/logo.png" alt="logo"></a>
                </div>
                <div id="navig-top-inter">
                    <ul>
                        <li><a href="/cabinet/placebill">Разместить объявление</a> </li>
                        <li><a href="#">Форумы</a> </li>
                        <li><a href="#">Справка</a> </li>
                    </ul>
                </div>
                <div id="lk-top-inter">
                    <div id="img-ava">
                        <img src="/template/localbitcoins/img/icon/ava.png" alt=" ">
                    </div>
                    <div id="name-ava"><span id="name-user"><?= $user->username ?></span></div>
                </div>
            </div>
        </header>
        <section id="tool-lk">

            <ul>
                <li><a href="#"><div id="redact"></div></a></li>
                <li><a href="#"><div id="info-lk"></div></a></li>
                <li><a href="#"><div id="score-lk"></div></a></li>
                <li><a href="#"><div id="testedlk"></div></a></li>
                <li><a href="#"><div id="supportlk"></div></a></li>
            </ul>
        </section>
        <section id="lk-infomain">
            <div id="panel-history">
                <div class="shadow-content">
                    <div class="bg-panel-top">
                        <div id="btn-his">
                            <ul>
                                <li><a href="/cabinet/refill" id="refill"></a></li>
                                <li><a href="/cabinet/withdraw" id="withdraw"></a></li>
                            </ul>
                        </div>
                        <div id="balnce">
                            <h3>Мой баланс BTC: <span id="balance-color"><?= $currentCoinbaseObj->amount ?></span> </h3>
                        </div>
                        <div id="balnce-1">
                            <h3>Примерно USD: <span id="balance-color"><?= number_format(Service::BTCtoUSD($currentCoinbaseObj->amount), 2, '.', ''); ?></span> </h3>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
