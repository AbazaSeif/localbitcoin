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
        <h3>Регистрация нового аккаунта</h3>
        <p>Создай свой аккаунт для полноценного пользования сервисом</p>
    </div>
    <div class="content-reg">
        <div class="dop-info-reg">
            <p>
                Поля помеченные звёздочкой обязательны для заполнения.<br><br>

                Пожалуйста, <a href="#"> ознакомьтесь с правилами</a> данного сайта, перед
                тем, как нажать кнопку “Создать аккаунт”
            </p>
        </div>
        <div class="form-reg-main">
            <form>
                <input type="text" placeholder="* Имя пользователя" class="inp-reg">
                <input type="text" placeholder="* Почта e-mail" class="inp-reg">
                <input type="text" placeholder="* Ваш пароль" class="inp-reg">
                <input type="text" placeholder="* Повторите пароль" class="inp-reg">
                <div class="capcha-img">
                    <img src="img/cap.png" alt="">
                </div>
                <input type="text" placeholder="Введите цифры" class="capcha-reg">
                <div class="clear"></div>
                <p class="acc-in">У вас уже есть аккаунт? <a href="#">Войти ›</a> </p>
                <button type="submit" class="btn-reg-main"></button>
            </form>
        </div>
        <div class="clear"></div>
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