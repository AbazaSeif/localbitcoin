<?php require_once ROOT . '/views/layouts/cabinet/header.php'; ?>

<div class="title-help">
    <div class="info-balance">
        <div class="balanc_btc" style="float: right">
            <p>
                Баланс BTC:<br>
                <span class="balance-color"><?= $this->coinbase->amount ?></span>
            </p>
        </div>
    </div>
</div>

<div class="content_newob">
    <div class="block-btn-bur">
        <a href="?type=1" class="btn-sale-main<?php $type == 1 ? print ' active-bue-m' : ''; ?>">Быстрая продажа</a>
        <a href="?type=2" class="btn-bue-main<?php $type == 2 ? print ' active-bue-m' : ''; ?>">Быстрая покупка</a>
        <div class="clear"></div>
    </div>

    <?php if ($result): ?>
        <p>Объявление размещено. <a href="/">На главную</a>.</p>
    <?php else: ?>
        <?php if (isset($errors) && is_array($errors)): ?>
            <div class="error-messege">     
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="form-newob">
                <!-- <input class = "text-form" type = "text" name = "price" pattern = "\d+(\.\d{2,})?" value = "<?= $price ?>" placeholder = "Укажите цену за 1 BTC, например
                <?php
                echo Currency::getExchangeRate('rur') . '  для рублей или ' . Currency::getExchangeRate('usd') . ' для долларов';
                ?>" required> -->

                <input type = "text" name = "location" pattern="^[А-Яа-яЁё\s]+$" value = "<?= $location ?>" placeholder = "Введите местоположение, только русские буквы" required class="inp-newob-2">
                <select class="sel-new-ob" name="currency_id">
                    <option disabled>Выберите валюту</option>
                    <option value = "2">RUR</option>
                    <option value = "1">USD</option>
                    <option value = "3">EUR</option>
                </select>
                <select class="sel-new-ob" name="payment_id">
                    <option disabled>Выберите способ оплаты</option>
                    <option value = "1">Банковской картой (VISA, MasterCard)</option>
                    <option value = "2">WebМоney</option>
                    <option value = "3">QIWI Wallet</option>
                    <option value = "3">Яндекс.Деньги</option>
                </select>
                <input type="text" placeholder="Цена за BTC" name="price" value = "<?= $price ?>" class="inp-newob-2">
                <input type="text" placeholder="Реквизиты для оплаты" name="reqs" class="inp-newob-2">
                <input type="number" min="0" value="0.000000" step="0.000001" placeholder="Количество BTC" name="max_amount" value = "<?= $max_amount ?>" class="inp-newob-2">
                Объявление активно до: 
                <input type="date" name="expires_in" min="<?= $todayHtml ?>" max="<?= $plusYearHtml ?>" value="<?= $plusMonthHtml ?>" class="inp-newob">
                <input type="text" placeholder="Дни и часы работы (например, &laquo;с 9 утра до 12 вечера, пн-сб&raquo;)" name="time_of_work" class="inp-newob-2">
                <textarea class="are-new" name="comment" placeholder = "Комментарий к объявлению"><?php isset($comment) ? print $comment : ''; ?></textarea>
                <input class="inp-newob" type="password" name="password" placeholder="Пароль">
            </div>
            <div class="newob-create">
                <button type="submit" name="submit" value="1" class="btn-create"><i><img src="/template/bit.team/img/icon/i-new.png" alt=""></i>Опубликовать объявление</button>
            </div>
            <div class="clear"></div>
        </form>
    </div>
<?php endif; ?>


<?php require_once ROOT . '/views/layouts/footer.php'; ?>