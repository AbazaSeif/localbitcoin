<?php require_once ROOT.'/views/layouts/cabinet/header.php'; ?>
   
    <div class="content_newob-1">
        <form method="post">
            <div class="form-newob">
                <input type="text" placeholder="Сумма платежа, BTC" name="amount" class="inp-newob-2">
                <input type="text" placeholder="Номер BTC-кошелька" name="address" class="inp-newob-2">
            </div>
            <div class="newob-create-2">
                <button type="submit" class="btn-create-2"><i><img src="/template/bit.team/img/icon/i-reg-2.png" alt=""></i>Перевести средства</button>
            </div>
            <div class="clear"></div>
        </form>
    </div>

<div class="main-table-bue">
        <h3>История транзакций</h3>
        
        <div class="table-2">
            <table>
                <tr>
                    <th class="left-t">Пользователь</th>
                    <th>Система оплаты</th>
                    <th>Сумма</th>
                    <th class="right-t">Статус</th>
                </tr>
                <tr>
                    <td class="left-t">NewEXE</td>
                    <td><span class="color_blue">Сбербанк</span> </td>
                    <td>0.8 BTC</td>
                    <td><span class="otp-color">Ожидание поступления</span> </td>
                </tr>
                
            </table>
        </div>

</div>

<?php require_once ROOT.'/views/layouts/footer.php'; ?>