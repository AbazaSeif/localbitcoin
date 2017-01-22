<?php require_once ROOT . '/views/layouts/cabinet/header.php'; ?>

<div class="content_newob-1">
    <form method="post">
        <div class="informate-messege">
            Переведите деньги на указанный Bitcoin-адрес:
        </div>
        <div class="form-newob">
            <input type="text" value="<?= $this->coinbase->address ?>" readonly class="inp-newob-2">
            <div style="display:flex;flex-direction:column;">
            <p style="margin:auto;margin-bottom:20px;">Или используйте QR-код</p>
	        <img style="margin:auto;" src="../../template/bit.team/img/elements/q-code.png">
	        </div>
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

<?php require_once ROOT . '/views/layouts/footer.php'; ?>