<?php include ROOT.'/views/layouts/cabinet/header.php'; ?>

<script type="text/javascript" src="../../template/bit.team/js/js-realst.js"></script>

<div class="block-profil">

    <?php if($from == 'editSuccess'): ?>
        <div class="informate-messege">
            Объявление успешно отредактировано.
        </div>
    <?php endif; ?>

    <div class="title-prof">
        <h4>Пользователь: <span class="color-b"><?= $user->username ?></span>
        <p class="online-lk"> Online</p>
    </div>
    <div class="main-profil-info">
        <div class="block-info-content-1">
            <div class="container-lk-1">
                <a class="btn-redact-lk" id="btn-red-mail"></a>
                <div class="in-lk-1">
                    <span class="text-lk-1">E-mail:</span>
                    <span class="text-lk-2"><?= $user->email ?></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="container-lk-1">
                <a class="btn-redact-lk" id="btn-red-pass"></a>
                <div class="in-lk-1">
                    <span class="text-lk-1">Пароль:</span>
                    <span class="text-lk-2">***********</span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="container-lk-1">
                <div class="in-lk-1">
                    <span class="text-lk-1">Номер телефона:</span>
                    <span class="text-lk-2"><?= '+'.$user->phone ?></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="container-lk-1">
                <a class="btn-status-ok" style="cursor:default;"></a>
                <a class="btn-reduct-lk"></a>
                <div class="in-lk-1">
                    <span class="text-lk-1">Статус:</span>
                    <span class="text-lk-3">Проверенный по email</span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="container-lk-1">
                <a class="btn-authorization" id="btn-double-auth"></a>
                <div class="in-lk-1"><span class="text-lk-1" style="width:230px;">Двухфакторная авторизация</span></div>
            </div>
            <div class="container-lk-1">
                <div class="in-lk-1">
                    <img src="../../template/bit.team/img/system_oplat/op6.png" alt="">
                    <span class="text-lk-add">4587-8977-8756-1235</span>
                    <div class="clear"></div>
                </div>
            </div>
                <div class="container-lk-1" id="sys-1">
                <div class="in-lk-1">
                    <button class="btn-add-cart"></button>
                    <img src="../../template/bit.team/img/system_oplat/op6.png" alt="">
                    <input type="text" placeholder="Введите реквизиты">
                    <div class="clear"></div>
                </div>
                </div>
                <div class="container-lk-1" id="sys-2">
                <div class="in-lk-1">
                    <button class="btn-add-cart"></button>
                    <img src="../../template/bit.team/img/system_oplat/op5.png" alt="">
                    <input type="text" placeholder="Введите реквизиты">
                    <div class="clear"></div>
                </div>
                </div>
                <div class="container-lk-1" id="sys-3">
                <div class="in-lk-1">
                    <button class="btn-add-cart"></button>
                    <img src="../../template/bit.team/img/system_oplat/op4.png" alt="">
                    <input type="text" placeholder="Введите реквизиты">
                    <div class="clear"></div>
                </div>
                </div>
                <div class="container-lk-1" id="sys-4">
                <div class="in-lk-1">
                    <button class="btn-add-cart"></button>
                    <img src="../../template/bit.team/img/system_oplat/op3.png" alt="">
                    <input type="text" placeholder="Введите реквизиты">
                    <div class="clear"></div>
                </div>
                </div>
                <div class="container-lk-1" id="sys-5">
                <div class="in-lk-1">
                    <button class="btn-add-cart"></button>
                    <img src="../../template/bit.team/img/system_oplat/op2.png" alt="">
                    <input type="text" placeholder="Введите реквизиты">
                    <div class="clear"></div>
                </div>
                </div>
                <div class="container-lk-1" id="sys-6">
                <div class="in-lk-1">
                    <button class="btn-add-cart"></button>
                    <img src="../../template/bit.team/img/system_oplat/op1.png" alt="">
                    <input type="text" placeholder="Введите реквизиты">
                    <div class="clear"></div>
                </div>
                </div>

                <div class="block-newcart">
                    <a class="btn-new-cart">   
                    </a>
                    <div class="block-system-cart">
                        <ul>
                            <li>
                            <div class="sysOp" id="btn-sys-1">
                                <img src="../../template/bit.team/img/system_oplat/op6.png" alt="">
                            </div>
                            </li>
                            <li>
                            <div class="sysOp" id="btn-sys-2">
                                <img src="../../template/bit.team/img/system_oplat/op5.png" alt="">
                            </div>
                            </li>
                            <li>
                            <div class="sysOp" id="btn-sys-3">
                                <img src="../../template/bit.team/img/system_oplat/op4.png" alt="">
                            </div>
                            </li>
                            <li>
                            <div class="sysOp" id="btn-sys-4">
                                <img src="../../template/bit.team/img/system_oplat/op3.png" alt="">
                            </div>
                            </li>
                            <li>
                            <div class="sysOp" id="btn-sys-5">
                                <img src="../../template/bit.team/img/system_oplat/op2.png" alt="">
                            </div>
                            </li>
                            <li>
                            <div class="sysOp" id="btn-sys-6">
                                <img src="../../template/bit.team/img/system_oplat/op1.png" alt="">
                            </div>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>

        </div>
<!--        <div class="block-lk-balance">
            <div class="sposob-op-seg">
                <p>5489-5893-4577-1255</p>
                <img src="/template/bit.team/img/system_oplat/op6.png" alt="">
            </div>
            <div class="sposob-op-seg">
                <p>5489-5893-4577-1255</p>
                <img src="/template/bit.team/img/system_oplat/op5.png" alt="">
            </div>
            <div class="sposob-op-seg">
                <p>5489-5893-4577-1255</p>
                <img src="/template/bit.team/img/system_oplat/op4.png" alt="">
            </div>
            <div class="sposob-op-seg">
                <p>5489-5893-4577-1255</p>
                <img src="/template/bit.team/img/system_oplat/op3.png" alt="">
            </div>

            <div class="sposob-op-seg">
                <p>5489-5893-4577-1255</p>
                <img src="/template/bit.team/img/system_oplat/op2.png" alt="">
            </div>
            <div class="sposob-op-seg">
                <p>5489-5893-4577-1255</p>
                <img src="/template/bit.team/img/system_oplat/op1.png" alt="">
            </div>
        </div>-->
    </div>
    <div class="btn-link-lk">
        <p class="balance-lk-main">
            Баланс BTC:<span class="org-color"> 2.5015</span>
        </p>
        <a href="#" class="btn-popol"></a>
        <a href="#" class="btn-viv"></a>
        <img src="../../template/bit.team/img/elements/q-code.png">
    </div>
    <div class="clear"></div>
</div>


<div class="title-lk-block-4">
    <a href="/cabinet/placebill" class="link-newob"></a>
    <h4>Архив сделок</h4>
    <div class="clear"></div>
</div>
<div class="content-lk-2">
    <div class="table-lk-3">
        <table>
            <tr>
                <th><span class="lrft-pol-td">Пользователь</span></th>
                <th>Система оплаты</th>
                <th>Мин.Сумма</th>
                <th>Макс.Сумма</th>
                <th><span class="right-prof">Тип сделки</span></th>
            </tr>
            <?php foreach($adses as $ads): ?>
                <tr>
                    <td><span class="lrft-pol-td"> <?= $user->username ?></span></td>
                    <td><span class="color-b">Сбербанк</span></td>
                    <td>Min <?= Currency::getSymbol($ads['currency_id']), ' ', $ads['min_amount'] ?></td>
                    <td>Max <?= Currency::getSymbol($ads['currency_id']), ' ', $ads['max_amount'] ?></td>
                    <td><span class="red-lk right-prof">Активно, никто не согласился</span></td>   
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="clear"></div>
</div>



<?php include ROOT.'/views/layouts/footer.php'; ?>