<?php require_once ROOT . '/views/layouts/cabinet/header.php'; ?>

<div class="title-lk-block-2">
        <a href="/cabinet/placebill" class="link-newob"></a>
    <h4>Активные сделки</h4>
    <div class="clear"></div>
</div>
<div class="content-lk-2">
        <div class="table-lk-2">
            <table>
                <tr>
                    <th>Пользователь</th>
                    <th>Система оплаты</th>
                    <th>Кол-во бтк</th>
                    <th>Статус сделки</th>
                </tr>
                <tr>
                    <td>Тест</td>
                    <td>Безнал</td>
                    <td>0.8</td>
                    <td>Проведена</td>
                </tr>
            </table>
        </div>
    <div class="clear"></div>
</div>

<div class="title-lk-block-2">
    <h4>Активные объявления</h4>
    <div class="clear"></div>
</div>
<div class="content-lk-2">
    <?php if (@count($adses) == 0): ?>
        <div class="informate-messege">    
            У вас пока нет объявлений.<br><br> <a href="/cabinet/placebill">Создать</a>
        </div>
    <?php else: ?>
        <div class="table-lk-2">
            <table>
                <tr>
                    <th><span class="lrft-pol-td">Пользователь</span></th>
                    <th>Доп. процент</th>
                    <th>Количество BTC</th>
                    <th>Дата</th>
                    <th class="right-td">Тип сделки</th>
                    <th class="width-td-lk"></th>
                </tr>
                <?php foreach ($adses as $ads): ?>
                    <tr>
                        <td><span class="lrft-pol-td"> <?= User::getUsernameById($ads['user_id']) ?></span></td>
                        <td><?= $ads['price']?>%</td>
                        <td><?= $ads['max_amount'] ?></td>
                        <td><?= date('d.m.Y', strtotime($ads['created_on'])) ?></td>
                        <td class="right-td"><span class="red-lk"><?= Advertisement::getInvertStringType($ads['type']) ?></span></td>
                        <td>
                        <a href="/cabinet/delAds?ads=<?= $ads['id_advertisement'] ?>" class="tab-close"></a> 
                           <a href="/cabinet/editAds?ads=<?= $ads['id_advertisement'] ?>" class="tab-red"></a>
                           <a href="/cabinet/editAds?ads=<?= $ads['id_advertisement'] ?>" class="tab-view"></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>
    <div class="clear"></div>
</div>


<?php require_once ROOT . '/views/layouts/footer.php'; ?>


