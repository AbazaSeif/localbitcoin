<?php require_once ROOT.'/views/layouts/guest/header.php'; ?>

<div class="block-profil">
    <div class="title-prof">
        <h4>Пользователь: <span class="color-b"><?= $receiver['username'] ?></span>
        <p class="<? echo User::isOnline($receiver['id_user'])? "online-lk" : "offline-lk" ?>"> <? echo User::isOnline($receiver['id_user'])? "Online" : "Offline" ?></p>
    </div>
    <div class="main-profil-info">
        <div class="block-info-content-1">
            <div class="container-lk-1">
                <div class="in-lk-1">
                    <span class="text-lk-1">E-mail:</span>
                    <span class="text-lk-2"><?= $receiver['email'] ?></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="container-lk-1">
                <div class="in-lk-1">
                    <span class="text-lk-1">Номер телефона:</span>
                    <span class="text-lk-2"><?= '+'.$receiver['phone'] ?></span>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="title-lk-block-stat">
        <h4>Статистика пользователя</h4>
        <div class="clear"></div>
    </div>
        <div class="list-cont-lk">
        <ul class="list-stat">
            <li><div class="stat_lk_1"><p><? echo $receiver['count_of_deals']; ?><br><span class="style-text-stat">Количество сделок</span></p></div></li>
            <li><div class="stat_lk_1"><p>12.5BTC<br><span class="style-text-stat">Сумма сделок</span></p></div></li>
            <li><div class="stat_lk_1"><p>1400<br><span class="style-text-stat">Рейтинг</span></p></div></li>
            <li><div class="stat_lk_1"><p><?= $comments_count ?><br><span class="style-text-stat">Отзывов</span></p></div></li>
        </ul>
        <div class="clear"></div>
        </div>
</div>
<div class="wrapper">
        <div class="recal-lk">

            <h3>Отзывы о продавце <?= $comments_count == 0 ? 'отсутствуют' : '' ?></h3>

            <?php 
            	foreach ($all_comments as $comm):   ?>
            <div class="recal-block-lk">
                <p class="title-recal"> <?= User::getUsernameById($comm['sender_id']) ?>
                	<span class="recal-date">От <?= $comm['comm_date'] ?></span>
                </p>
                <p class="text-recall">
                    <?= $comm['content'] ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php require_once ROOT.'/views/layouts/footer.php'; ?>