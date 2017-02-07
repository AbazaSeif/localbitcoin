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

                <select class="sel-new-ob" name="currency_id">
                    <option disabled>Выберете валюту</option>
                    <option <?= $ads['currency_id'] == 1 ? 'selected ' : '' ?>value = "1">USD</option>
                    <option <?= $ads['currency_id'] == 2 ? 'selected ' : '' ?>value = "2">RUR</option>
                </select>
                <select class="sel-new-ob" name="payment_id" >
                    <option disabled>Выберите способ оплаты</option>
                    <option <?= $ads['payment_method'] == 1 ? 'selected ' : '' ?> value = "1">Банковской картой (VISA, MasterCard)</option>
                    <option <?= $ads['payment_method'] == 2 ? 'selected ' : '' ?> value = "2">WebМоney</option>
                    <option <?= $ads['payment_method'] == 3 ? 'selected ' : '' ?> value = "3">QIWI Wallet</option>
                    <option <?= $ads['payment_method'] == 4 ? 'selected ' : '' ?> value = "4">Яндекс.Деньги</option>
                </select>
                <input type="number" step="0.1" name="price" class="inp-newob" value="<?= $ads['price'] ?>" style="width: 45%;">
                <span style="color: #666;font-style: italic;"><span class="input-group-addon">%</span>Размер прибыли, которую вы хотите получить сверх рыночной цены</span>
                <input style="padding-right:5px" type="number" step="0.1" value="<?= $ads['min_amount'] ?>" name="min_amount" class="inp-newob"><span style="color: #666;font-style: italic;">Минимальный лимит транзакции</span>
                <input style="padding-right:5px" type="number" step="0.1" value="<?= $ads['max_amount'] ?>" name="max_amount" class="inp-newob"><span style="color: #666;font-style: italic;">Максимальный лимит транзакции</span>
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