<?php require_once ROOT . '/views/layouts/cabinet/header.php'; ?>

<div class="title-help">
    <h3>Редактировать объявление</h3>
    <p>Редактировать Ваше объявление № <?= isset($ads['id_advertisement']) ? $ads['id_advertisement'] : '' ?></p>
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

    <?php if ($result): ?>
        <div class="informate-messege">Объявление изменено.<br /><a href="/">На главную</a></div>
    <?php else: ?>
        <?php if (isset($errors) && is_array($errors)): ?>
            <div class="error-messege">     
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php require_once ROOT . '/views/layouts/footer.php';die; ?>
        <?php endif; ?>

        <form method="post">
            <div class="form-newob">
                <!-- <input class = "text-form" type = "text" name = "price"  -->

                <input type = "text" name = "location" pattern="^[А-Яа-яЁё\s]+$" value = "<?= $ads['location'] ?>" placeholder = "Введите местоположение, только русские буквы" required class="inp-newob-2">
                <select class="sel-new-ob" name="currency_id">
                    <option disabled>Выберете валюту</option>
                    <option <?= $ads['currency_id'] == 1 ? 'selected ' : '' ?>value = "1">USD</option>
                    <option <?= $ads['currency_id'] == 2 ? 'selected ' : '' ?>value = "2">RUR</option>
                </select>
                <input type="text" name="price" pattern = "\d+(\.\d{2,})?" value = "<?= $ads['price'] ?>" placeholder = "Укажите цену за 1 BTC, например <?= Currency::getExchangeRate('rur') . ' для рублей или ' . Currency::getExchangeRate('usd') . ' для долларов'; ?>" required class="inp-newob-2">
                <input type="number" min="0" step="0.000001" placeholder="Количество BTC" name="min_amount" value = "<?= $ads['max_amount'] ?>" class="inp-newob-2">
                Объявление активно до: 
                <input type="date" name="expires_in" min="<?= $todayHtml ?>" max="<?= $plusYearHtml ?>" value="<?= date('Y-m-d', strtotime($ads['expires_in'])) ?>" class="inp-newob">
                <input type="text" placeholder="Дни и часы работы (например, &laquo;с 9 утра до 12 вечера, пн-сб&raquo;)" name="time_of_work" value="<?= $ads['time_of_work'] ?>" class="inp-newob-2">
                <textarea class="are-new" name="comment" placeholder = "Комментарий к объявлению"><?php isset($ads['comment']) ? print $ads['comment'] : ''; ?></textarea>
            </div>
            <div class="newob-create">
                <button type="submit" name="submit" value="1" class="btn-create"><i><img src="/template/bit.team/img/icon/i-new.png" alt=""></i>Редактировать объявление</button>
            </div>
            <div class="clear"></div>
        </form>
    </div>
<?php endif; ?>


<?php require_once ROOT . '/views/layouts/footer.php'; ?>