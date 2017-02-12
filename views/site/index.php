<?php include ROOT . '/views/layouts/guest/header.php';
foreach ($items as $value) {
    //echo '<a href='.$value['link'].'>'.$value['name'].'</a></br>';
}
?>
<div class="content-main">
    <?php if (count($adses) != 0 || (count($adses) == 0 && $search_conditions != '')): ?>
        <div class="block-btn-bur">
            <a href="?type=sell" class="btn-sale-main <?php if ($type == 'sell') echo ' active-bue-m'; ?>">Быстрая продажа</a>
            <a href="?type=buy" class="btn-bue-main <?php if ($type == 'buy') echo ' active-bue-m'; ?>">Быстрая покупка</a>
            <div class="clear"></div>
        </div>
        <div class="form-main-bue">
            <form method="post">
                <input type="text" name="sum" class="inp-sum" placeholder="Сумма">
                <select class="select-2-top" name="currency">
                    <option disabled>Выберите валюту</option>
                    <option value = "1">USD</option>    
                    <option value = "2" selected>RUR</option>
                </select>
                <select class="select-1-top" name="payment">
                    <option disabled>Выберите способ оплаты</option>
                    <option value = "1">Банковской картой (VISA, MasterCard)</option> 
                    <option value = "2">WebМоney</option> 
                    <option value = "3">QIWI Wallet</option> 
                    <option value = "4">Яндекс.Деньги</option>
                </select>
                <!-- <input type="text" name="sum" class="inp-sum" placeholder="Страна"> -->
                <button type="submit" class="btn-serche"><i><img src="/template/bit.team/img/icon/i-lupa.png"></i>Поиск</button>
            </form>
        </div>
        <div class="content-table">
            <h3><?php echo $type == 'buy'?"Купить ":"Продать "; ?> биткоины онлайн</h3>
            <div class="table-1">
                <?php if(($type == 'buy' &&$count_buy > 0)||($type == 'sell' && $count_sell > 0)){ ?>
                <table>
                    <tr>
                        <th>Рейтинг</th>
                        <th>Продавец</th>
                        <th>Способ оплаты</th>
                        <th>Цена</th>
                        <th>Ограничения</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($adses as $ads):
                        $username = User::getUsernameById($ads['user_id']);
                        $currency = Currency::getStringName($ads['currency_id']);
                        $symbol = Currency::getSymbol($ads['currency_id']);
                        if($ads['type'] == ($type == 'buy'?2:1)){
                        ?>
                        <tr>
                            <td><span class="color_100">100%</span></td> <!--  color_100,50,35?> -->
                            <td>
                                <a href="/user?receiver_log=<?= $username ?>" class="<?php echo (User::isOnline($ads['user_id']))?("stic_online"):("off_online"); ?> color_blue table-ads-user-prof"><?= $username ?>
                                    <span class="modalStatus"><?php echo (User::isOnline($ads['user_id']))?("Online"):("Offline"); ?></span>
                                </a>
                            </td>
                            <td><?= Advertisement::getPaymentMethodById($ads['payment_method']) ?></td>
                            <td><span class="price_color"><?= number_format(((($ads['price']/100) *Currency::getExchangeRate($currency))+ Currency::getExchangeRate($currency)), 2, ',', ' '), ' ', $currency?>/1 BTC</span></td>
                            <!-- <td><?= $ads['max_amount']?> </td> -->
                            <td><?= $ads['min_amount'].' - '.$ads['max_amount'] ?></td>
                            <td class="seg-bue-table"><a href="/cabinet/info?ads=<?= $ads['id_advertisement'] ?>" class="table-btn-bue"><?= $ads['user_id'] == User::getUserIdFromSession() ? 'Купить' : Advertisement::getInvertStringType($ads['type']); ?></td>
                        </tr>
                    <?php }endforeach;?>
                </table>
               <?php } else {?> 
               <div style="color:grey;"><?= $search_conditions != '' ? "Поиск не дал результатов" : ("Извините, но предложений по " .($type=="buy"?"покупке ":"продаже ")."пока нет") ?></div><?php }?>
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