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
<body class="bg-main-bue">
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
                    <div class="user-lk-link">
                        <div class="ava-user">
                            <img src="img/ava-user.png" alt="">
                        </div>
                        <div class="info-lk-top-user">
                        <a href="" class="top-red-btn-lk"></a>
                        <a href="" class="top-clos-btn-lk"></a>
                            <p class="name-user-top">Kuper</p>
                            <p class="valute-1">25.20</p>
                            <p class="valute-2">25.20</p>
                        </div>
                        <div class="clear"></div>
                    </div>
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
        <h3>Личный кабинет пользователя</h3>
        <p>Страница информации по сделакам</p>
        <div class="info-balance-2">
            <div class="block-nav-lk">
                <ul>
                    <li><a href="#"><span class="line-menu"></span>Профиль</a> </li>
                    <li><a href="lk_page3.php"><span class="line-menu"></span>Информация</a> </li>
                    <li><a href="#"><span class="line-menu"></span>Торговая панель</a> </li>
                    <li><a href="lk_page2.php"><span class="line-menu"></span>Активные объявления</a> </li>
                    <li><a href="lk_page1.php"><span class="line-menu"></span>Служба поддержки</a> </li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="title-lk-block-3">
        <a href="new_ob.php" class="link-newob"></a>
        <h4>Активные объявления</h4>
        <div class="clear"></div>
    </div>
    <div class="content-lk-2">
        <div class="table-lk-2">
            <table>
                <tr>
                    <th><span class="lrft-pol-td">Пользователь</span></th>
                    <th>Сумма сделки</th>
                    <th>Дата</th>
                    <th class="right-td">Тип сделки</th>
                    <th class="width-td-lk"></th>
                </tr>
                <tr>
                    <td><span class="lrft-pol-td"> Simbagok</span></td>
                    <td>$ 10.000</td>
                    <td>12.04.16</td>
                    <td class="right-td"><span class="red-lk">Ожидает проверки</span></td>
                    <td><a href="#" class="tab-close"></a><a href="#" class="tab-red"></a></td>
                </tr>
                <tr>
                    <td><span class="lrft-pol-td"> Simbagok</span></td>
                    <td>$ 10.000</td>
                    <td>12.04.16</td>
                    <td class="right-td">Ожидает отправки BTC</td>
                    <td><a href="#" class="tab-close"></a><a href="#" class="tab-red"></a></td>
                </tr>
                <tr>
                    <td><span class="lrft-pol-td"> Simbagok</span></td>
                    <td>$ 10.000</td>
                    <td>12.04.16</td>
                    <td class="right-td"><span class="red-lk">Ожидает проверки</span></td>
                    <td><a href="#" class="tab-close"></a><a href="#" class="tab-red"></a></td>
                </tr>
            </table>
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