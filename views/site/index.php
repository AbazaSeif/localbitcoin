<?php include ROOT . '/views/layouts/guest/header.php';
foreach ($items as $value) {
    //echo '<a href='.$value['link'].'>'.$value['name'].'</a></br>';
}
?>

<div class="content-main">
    <?php if (count($adses) != 0): ?>
        <div class="block-btn-bur">
            <a href="?type=sell" class="btn-sale-main <?php if ($type == 'sell') echo ' active-bue-m'; ?>">Быстрая продажа</a>
            <a href="?type=buy" class="btn-bue-main <?php if ($type == 'buy') echo ' active-bue-m'; ?>">Быстрая покупка</a>
            <div class="clear"></div>
        </div>
        <div class="form-main-bue">
            <form>
                <input type="text" name="sum" class="inp-sum" placeholder="Сумма">
                <select class="select-1-top">
                    <option>RUR</option>
                </select>
                <input type="text" name="sum" class="inp-sum" placeholder="Страна">
                <select class="select-2-top">
                    <option>BTK</option>
                </select>
                <button type="submit" class="btn-serche"><i><img src="/template/bit.team/img/icon/i-lupa.png"></i>Поиск</button>
            </form>
        </div>
        <div class="content-table">
            <h3>Купить биткоины онлайн</h3>
            <div class="table-1">
                <table>
                    <tr>
                        <th>Рейтинг</th>
                        <th>Продавец</th>
                        <th>Способ оплаты</th>
                        <th>Цена</th>
                        <th>Количество BTC</th>
                        <th></th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach ($adses as $ads):
                        $username = User::getUsernameById($ads['user_id']);
                        $currency = Currency::getStringName($ads['currency_id']);
                        $symbol = Currency::getSymbol($ads['currency_id']);
                        $type = Advertisement::getInvertStringType($ads['type']);
                        ?>
                        <tr>
                            <td><span class="color_100">100%</span></td> <!--  color_100,50,35?> -->
                            <td><span class="<?php echo (User::isOnline($ads['user_id']))?("stic_online"):("off_online"); ?> color_blue"><?= $username ?></span></td>
                            <td>Универсальный перевод</td>
                            <!-- <td>Банковские переводы внутри странны (EOSWC)</td> -->
                            <td><span class="price_color"><?= $ads['price'], ' ', $currency . ' / BTC' ?></span></td>
                            <td><?= $ads['max_amount']?> </td>
                            <td class="seg-bue-table"><a href="/cabinet/info?ads=<?= $ads['id_advertisement'] ?>" class="table-btn-bue"><?= $ads['user_id'] == User::getUserIdFromSession() ? 'Просмотр' : $type ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    <?php else: ?>
        <br/>
        <div class="informate-messege">
            Мы создали эту площадку для удобства и простоты покупки и продажи биткоина между людьми, без посредников.
            Сохраняя принцип работы системы Blockchain Bitcoin, задуманной Сатоши Накамото - peer to peer (от равного к равному).<br><br>

            <span id="blue"> Особое внимание на нашем сервисе уделено безопасности, скорости и надежности.</span><br><br>

            Мы регулярно обслуживаем и улучшаем наш сервис для того, чтобы максимизировать Вашу прибыль.
        </div>
    <?php endif; ?>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>