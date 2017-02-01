<?php include ROOT . '/views/layouts/admin/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            
            <br/>
            
            <h4>Добрый день, администратор!</h4>
            
            <br/>
            
            <p>Вам доступны такие возможности:</p>
            
            <br/>
            
            <ul>
                <li><a href="/adminUser">Управление пользователями</a></li>
                <li><a href="/adminAds">Управление объявлениями</a></li>
                <li><a href="/adminMessages">Управление сообщениями</a></li>
                <li><a href="/adminTickets">Тикеты и поддержка</a></li>
                <li><a href="/adminWallets">Управление кошельками</a></li>
            </ul>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/admin/footer.php';