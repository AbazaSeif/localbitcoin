</div>
<?php if(User::isGuest()): ?>
<div class="block-info-main">
            <div class="wrapper">
                <div class="block-video">
                    <video controls="controls">
                    <source src="video/duel.ogv" type='video/ogg; codecs="theora, vorbis"'>
                    <source src="video/duel.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                    <source src="video/duel.webm" type='../../video/webm; codecs="vp8, vorbis"'>
                    Тег video не поддерживается вашим браузером. 
                    <a href="video/duel.mp4">Скачайте видео</a>.
                </video>
                </div>
                <div class="block-info">
                    <h3>На нашем сайте вы можете купить или же продать биткоины</h3>
                    <p>Для того что бы купить, выберите в списке подходящего вам продавца и нажмите
                        кнопку купить › Затем оформите и подтвердите сделку<br><br>

                        Для того что бы продать, выберите в списке подходящего вам продавца и нажмите
                        кнопку купить › Затем оформите и подтвердите сделку<br><br>

                        С уважением, команда проекта <span class="color-b"> “BitTeam”</span></p>
                    <a href="/user/signup" class="reg-btn-bot">Зарегистрировать аккаунт</a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
<?php endif; ?>

<footer class="foot-bg">
    <div class="wrapper">
        <div class="block-footer">
            <img src="/template/bit.team/img/elements/logo-foot.png" alt="">
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