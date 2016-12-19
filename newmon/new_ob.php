<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/fonts.css"/>
    <link rel="stylesheet" type="text/css" href="css/media.css"/>
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/js-realst.js"></script>
    <title>Document</title>
</head>
<body>
<div class="win-container">
<div class="close-left"></div>
    <div class="popap-login">
        <div class="popap-title">
            <h3>Вход в личный кабинет</h3>
        </div>
        <form>
            <div class="form-popap">
                <input type="text" placeholder="Введите логин" class="popap-inp">
                <input type="text" placeholder="Введите пароль" class="popap-inp">
            </div>
            <div class="btn-popap">
                <p>Забыли пароль?<br><a class="vost-popap">Востановить</a> </p>
                <button type="submit" class="inp-btn-popap">Войти</button>
            </div>
        </form>
    </div>
</div>
<div class="header">
    <div class="bg-top-header">
        <div class="wrapper">
            <div class="top-header">
                <div class="btn-bue-top">
                    <a class="bue-top-btn" href="#">Купить биткоин</a>
                    <a class="sale-top-btn" href="#">Продать биткоин</a>
                    <div class="clear"></div>
                </div>
                <div class="nav-top">
                    <ul>
                        <li><a href="new_ob.php">Разместить объявление</a></li>
                        <li><a href="#">Форум</a></li>
                        <li><a href="help.php">Справка</a></li>
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
                    <a href="reg.php" class="btn-reg">Регистрация</a>
                    <a href="" class="btn-lk">Личный кабинет</a>
                    <a class="menu-phone"></a>
                    <div class="clear"></div>
                </div>
                <div class="block-logo-top">
                    <img src="img/elements/logo-top.png" alt=""/>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="content-menu-phone">
        <ul>
            <li>
                <a href="">Разместить объявление</a>
            </li>
            <li>
                <a href="">Форум</a>
            </li>
            <li>
                <a href="">Справка</a>
            </li>
            <li>
                <a href="">Регистрация</a>
            </li>
            <li>
                <a href="">Личный кабинет</a>
            </li>
        </ul>
    </div>
</div>
<div class="wrapper">
    <div class="title-help">
        <h3>Справка</h3>
        <p>Здесь содержиться основная информация о сайте</p>
        <div class="info-balance">
            <div class="balanc_usd">
                <p>
                    Баланс USD:<br>
                    <span class="balance-color">2500.0</span>

                </p>
            </div>
            <div class="balanc_btc">
                <p>
                    Баланс BTC:<br>
                    <span class="balance-color">2500.0</span>

                </p>
            </div>
        </div>
    </div>

    <div class="content_newob">
        <div class="block-btn-bur">
            <a class="btn-sale-main">Быстрая продажа</a>
            <a class="btn-bue-main active-bue-m">Быстрая покупка</a>
            <div class="clear"></div>
        </div>
        <form>

            <div class="form-newob">
                <select class="sel-new-ob">
                    <option>Выберете местоположение</option>
                    <option>Выберете местоположение</option>
                    <option>Выберете местоположение</option>
                </select>
                <select class="sel-new-ob">
                    <option>Выберете валюту</option>
                    <option>Выберете валюту</option>
                    <option>Выберете валюту</option>
                </select>
                <select class="sel-new-ob">
                    <option>Выберете систему оплаты</option>
                    <option>Выберете систему оплаты</option>
                    <option>Выберете систему оплаты</option>
                </select>
                <input type="text" placeholder="Введите реквизиты" name="day" class="inp-newob-2">
                <input type="text" placeholder="Минимальная сумма сделки" name="min" class="inp-newob">
                <input type="text" placeholder="Максимальная сумма сделки" name="max" class="inp-newob">
                <div class="clock-ob-content">
                    <span class="labDayClock">Часы работы ›     От</span>
                    <input type="text" value="10:00" class="inp-clock">
                    <span class="labDayClock">До</span>
                    <input type="text" value="10:00" class="inp-clock">
                </div>
                <div class="clock-ob-content-2">
                    <span class="labDayClock-2">Дни работы ›</span>
                    <input type="checkbox" class="ch-day" id="chk-3">
                    <label for="chk-3">
                        ПН
                    </label>
                    <input type="checkbox" class="ch-day" id="chk-2">
                    <label for="chk-2">
                        ВТ
                    </label>
                    <input type="checkbox" class="ch-day" id="chk-1">
                    <label for="chk-1">
                        СР
                    </label>
                    <input type="checkbox" class="ch-day" id="chk-5">
                    <label for="chk-5">
                        ЧТ
                    </label>
                    <input type="checkbox" class="ch-day" id="chk-6">
                    <label for="chk-6">
                        ПН
                    </label>
                    <input type="checkbox" class="ch-day" id="chk-7">
                    <label for="chk-7">
                        СБ
                    </label>
                    <input type="checkbox" class="ch-day" id="chk-8">
                    <label for="chk-8">
                        ВС
                    </label>


                    <div class="clear"></div>
                </div>
                <textarea class="are-new">Комментарий к платежу
                </textarea>
            </div>
            <div class="newob-create">
                <button type="submit" class="btn-create"><i><img src="img/icon/i-new.png" alt=""></i>Опубликовать объявление</button>
            </div>
            <div class="clear"></div>
        </form>
    </div>

</div>
<footer class="foot-bg">
    <div class="wrapper">
        <div class="block-footer">
            <img src="img/elements/logo-foot.png" alt="">
            <ul>
                <li>
                    <ul class="inp-menu-foot">
                        <li class="title-menu">Продукты</li>
                        <li><a href="#">Купить / Продать BitCoin</a></li>
                        <li><a href="#">GDAX</a></li>
                        <li><a href="#">Платформа разработчика</a></li>
                        <li><a href="#">Торговые инструменты</a></li>
                    </ul>
                </li>
                <li>
                    <ul class="inp-menu-foot">
                        <li class="title-menu">Социум</li>
                        <li><a href="#">Блог</a></li>
                        <li><a href="#">Сообщество</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ul>
                </li>
                <li>
                    <ul class="inp-menu-foot">
                        <li class="title-menu">Информация</li>
                        <li><a href="#">Купить BitCoin</a></li>
                        <li><a href="#">Купить эфир</a></li>
                        <li><a href="#">Поддерживаемые страны</a></li>
                    </ul>
                </li>
                <li>
                    <ul class="inp-menu-foot">
                        <li class="title-menu">Компания</li>
                        <li><a href="#">О нас</a></li>
                        <li><a href="#">Карьера</a></li>
                        <li><a href="#">Пресса</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
</footer>
</body>
</html>