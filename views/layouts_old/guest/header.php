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
<body>
    <?php if(User::isGuest())
    {
        echo '<div id="window-autor">
        <div id="block-auht">
            <img src="/template/localbitcoins/img/icon/auht_win.png" alt=" ">
            <h3>Вход в личный кабинет</h3>
            <form method="post" action="/user/signin">
                <input class="main-inp" type="text" name="username" pattern="^[a-zA-Z0-9]+$" placeholder="Введите логин, латиница" required>
                <input class="main-inp" type="password" name="password" placeholder="Введите пароль" required>
                <div id="capcha">123</div><input type="text" name="capcha" id="cap-form" placeholder="Цифры" required>
                <button id="next-auht" type="submit" name="submitLogin" value="1">Войти в кабинет</button>
            </form>
            <div class="link-aurt">
                <a href="#">Забыли пароль?</a><br>
                <a href="#">У Вас еще нет аккаунта?</a>
            </div>
        </div>
    </div>'; 
    } ?>
    
    <header>
        <div id="header-content">
            <div id="logo-head">
                <a href="/"><img src="/template/localbitcoins/img/logo.png" alt="logo"></a>
            </div>
            <div id="navig-top">
                <ul>
                    <li><a href="/cabinet/placebill">Разместить объявление</a> </li>
                    <li><a href="#">Форумы</a> </li>
                    <li><a href="#">Справка</a> </li>
                </ul>
            </div>
            <div id="pocup-main">
                <a href="/cabinet/placebill?type=1"><div class="buy-btn active_top">Купить</div></a>
                <a href="/cabinet/placebill?type=2"><div class="sell-btn">Продать</div></a>
            </div>
            <div id="lk-top">
                
                <?php if(isset($_SESSION['id_user']))
                 {
                     echo '<a href="/user/signout"><div id="btn-reg">
                        <img src="/template/localbitcoins/img/icon/reg-icon.png" alt=" ">
                        Выход
                    </div> </a>';
                 }
                 else
                 {
                     echo '<a href="/user/signup"><div id="btn-reg">
                        <img src="/template/localbitcoins/img/icon/reg-icon.png" alt=" ">
                        Регистрация
                    </div> </a>';
                 }?>
                
                
                <?php if(isset($_SESSION['id_user'])) echo '<a href="/cabinet"><div id="btn-lk"><img src="/template/localbitcoins/img/icon/auth-icon.png" alt=" ">
                    Личный кабинет</div></a>'; else echo '<div id="btn-lk"><img src="/template/localbitcoins/img/icon/auth-icon.png" alt=" ">
                    Личный кабинет</div>'; ?>
                
                
            </div>
        </div>
    </header>
