<?php require_once ROOT . '/views/layouts/cabinet/header.php'; ?>


<div class="bitcoin-operation-cont">
    <div class="content_newob-1">
        <form method="post">
            <div class="informate-messege">
                Отправить Bitсoin
            </div>
            <div class="form-newob">
                <p class="balance_add_btc">Ваш баланс: 
                    <span style="color: black; font-weight:900;" id="refill-amount"></span>BTC
                    <i style="position: relative;left: 0px;top:3px;font-size: 22px;" id="loading-2" class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                </p>
                <p class="info_add_btc">Адрес для пополнения</p>
                <input type="text" class="inp-newob-3" placeholder = "Адрес" maxlength="40">
                <p class="info_add_btc">Сумма пополнения в биткоинах</p>
                <input type="text" class="inp-newob-3" placeholder = "0.0000" maxlength="7" pattern="\d+(\.\d{2})?">
                <p class="info_add_btc">Описание</p>
                <input type="text" class="inp-newob-3" maxlength="50">
                <p class="btc-out-comm-info">Комиссия за вывод - 1%</p>
                <input type="submit" class="add_btc_submit" value="Продолжить">
            </div>
            <div class="clear"></div>
        </form>
    </div>

    <div class="content_newob-1">
        <form method="post">
            <div class="informate-messege">
                Принять Bitcoin
            </div>
            <div class="form-newob">
                <p class="info_get_btc">Используйте Bitcoin-адрес для получения биткоинов</p> 
                <input id="address" type="text" style="text-align:center;" value="Подождите..." readonly class="inp-newob-2">
                <div style="display:flex;flex-direction:column;align-items:center;">
                <p class="info_get_btc">Или QR-код</p>
                <img style="margin:auto;" src="../../template/bit.team/img/elements/q-code.png">
                </div>
            </div>
            <div class="clear"></div>
        </form>
    </div>
</div>


<div class="main-table-bue">
        <h3>История транзакций</h3>
        
        <div class="table-2">
            <table>
                <tr>
                    <th class="left-t">Пользователь</th>
                    <!-- <th>Система оплаты</th> -->
                    <th>Сумма</th>
                    <th class="right-t">Статус</th>
                </tr>
                <tr>
                    <td class="left-t">NewEXE</td>
                    <!-- <td><span class="color_blue">Сбербанк</span> </td> -->
                    <td>0.8 BTC</td>
                    <td><span class="otp-color">Ожидание поступления</span> </td>
                </tr>
                
            </table>
        </div>

</div>

<?php require_once ROOT . '/views/layouts/footer.php'; ?>