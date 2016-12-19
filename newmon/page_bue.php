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
                    <a class="btn-lk">Личный кабинет</a>
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
        <h3>Пополнить баланс</h3>
        <p>На данной странице вы можете пополнить баланс счета</p>
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

    <div class="content_newob-1">
        <form>
		<!--Окно информирования об ошибке-->
			<div class="informate-messege">
				Вы ввели не правильный пароль
			</div>
			<!------------------------->
			<!--Окно информирования простое-->
			<div class="error-messege">
				Вы ввели не правильный пароль
			</div>
			<!------------------------->
            <div class="form-newob">
                <input type="text" placeholder="Сумма платежа" name="day" class="inp-newob-2">
                <input type="text" placeholder="Сумма платежа" name="day" class="inp-newob-2">
                <select class="sel-new-ob">
                    <option>Выберете валюту</option>
                    <option>Выберете валюту</option>
                    <option>Выберете валюту</option>
                </select>
				
                <input type="text" placeholder="Введите пароль" name="day" class="inp-newob-2">
                <textarea type="text" class="are-new">Комментарий к платежу
                </textarea>
            </div>
            <div class="newob-create-2">
                <button type="submit" class="btn-create-2"><i><img src="img/icon/i-reg-2.png" alt=""></i>Опубликовать объявление</button>
            </div>
            <div class="clear"></div>
        </form>
    </div>

    <div class="main-table-bue">
        <h3>История транзакций</h3>
        <div class="table-2">
            <table>
                <tr>
                    <th class="left-t">Пользователь</th>
                    <th>Система оплаты</th>
                    <th>Мин.Сумма</th>
                    <th>Макс.Сумма</th>
                    <th class="right-t">Статус</th>
                </tr>
                <tr>
                    <td class="left-t">Lulli Music</td>
                    <td><span class="color_blue">Сбербанк</span> </td>
                    <td>Min. 1.500$</td>
                    <td>Max. 1.500$</td>
                    <td><span class="otp-color">Ожидает проверки</span> </td>
                </tr>
                <tr>
                    <td class="left-t">Lulli Music</td>
                    <td><span class="color_blue">Сбербанк</span> </td>
                    <td>Min. 1.500$</td>
                    <td>Max. 1.500$</td>
                    <td><span class="otp-color">Ожидает проверки</span> </td>
                </tr>
                <tr>
                    <td class="left-t">Lulli Music</td>
                    <td><span class="color_blue">Сбербанк</span> </td>
                    <td>Min. 1.500$</td>
                    <td>Max. 1.500$</td>
                    <td><span class="otp-color">Ожидает проверки</span> </td>
                </tr>
                <tr>
                    <td class="left-t">Lulli Music</td>
                    <td><span class="color_blue">Сбербанк</span> </td>
                    <td>Min. 1.500$</td>
                    <td>Max. 1.500$</td>
                    <td><span class="">Ожидает проверки</span> </td>
                </tr>
                <tr>
                    <td class="left-t">Lulli Music</td>
                    <td><span class="color_blue">Сбербанк</span> </td>
                    <td>Min. 1.500$</td>
                    <td>Max. 1.500$</td>
                    <td><span class="otp-color">Ожидает проверки</span> </td>
                </tr>
                <tr>
                    <td class="left-t">Lulli Music</td>
                    <td><span class="color_blue">Сбербанк</span> </td>
                    <td>Min. 1.500$</td>
                    <td>Max. 1.500$</td>
                    <td><span class="">Ожидает проверки</span> </td>
                </tr>
                <tr>
                    <td class="left-t">Lulli Music</td>
                    <td><span class="color_blue">Сбербанк</span> </td>
                    <td>Min. 1.500$</td>
                    <td>Max. 1.500$</td>
                    <td><span class="otp-color">Ожидает проверки</span> </td>
                </tr>
                <tr>
                    <td class="left-t">Lulli Music</td>
                    <td><span class="color_blue">Сбербанк</span> </td>
                    <td>Min. 1.500$</td>
                    <td>Max. 1.500$</td>
                    <td><span class="">Ожидает проверки</span> </td>
                </tr>
                <tr>
                    <td class="left-t">Lulli Music</td>
                    <td><span class="color_blue">Сбербанк</span> </td>
                    <td>Min. 1.500$</td>
                    <td>Max. 1.500$</td>
                    <td><span class="otp-color">Ожидает проверки</span> </td>
                </tr>
            </table>
        </div>
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