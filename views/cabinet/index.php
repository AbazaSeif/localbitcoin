<?php include ROOT.'/views/layouts/cabinet/header.php'; ?>
<script type="text/javascript" src="../../template/bit.team/js/js-realst.js"></script>
<div class="block-profil">

    <?php if($from == 'editSuccess'): ?>
        <div class="informate-messege">
            Объявление успешно отредактировано.
        </div>
    <?php endif; ?>

    <div class="title-prof">
        <div class="modalInfoMessege">
            <h5>Новые уведомления</h5>
            <div class="contentVedom">
                <div class="ved_1">
                <h6>Алексей Морозов</h6>
                <p>
                    Разнообразный и богаый опыт слоившяся структуа органзации BTCS
                    позволяет оенить значение систмы обучения кадров
                </p>
                </div>

            </div>
            <div class="contentVedom">
                <div class="ved_2">
                    <h6>Модератор</h6>
                    <p>
                        Сделка завершена успешно
                    </p>
                </div>

            </div>
            <div class="contentVedom">
                <div class="ved_1">
                    <h6>Алексей Морозов</h6>
                    <p>
                        Разнообразный и богаый опыт слоившяся структуа органзации BTCS
                        позволяет оенить значение систмы обучения кадров
                    </p>
                </div>

            </div>
        </div>

        <form method="post" enctype='multipart/form-data'>
            <input type="file" name="user_photo" accept="image/*" style="outline: none;">
            <button type="submit" id="upload_new_photo">Изменить</button>
        </form>
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
                    <span class="text-lk-2">**********</span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="container-lk-1">
                <a class="btn-redact-lk" id="btn-red-phone"></a>
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
                <a href="/cabinet?tfa=1" class="<?php echo(User::isEnableTFA())?"btn-authorized":"btn-unauthorized" ?>" id="btn-double-auth"></a>
                <div class="in-lk-1"><span class="text-lk-1" style="width:230px;">Двухфакторная авторизация</span></div>
            </div>
            <?php foreach ($requistes as $req): ?>
            <div class="container-lk-1">
                <a class="fa fa-times rm-cart" aria-hidden="true" href="/cabinet?rm=<?= $req['id'] ?>"></a>
                <div class="in-lk-1">
                    <img src="../../template/bit.team/img/system_oplat/op<?= $req['system_id'] ?>.png">
                    <span class="text-lk-add"><?= $req['card_num'] ?></span>
                    <div class="clear"></div>
                </div>
            </div>
            
            <?php endforeach; ?>
            <form method="post">
                <input type="hidden" name="chosen_type" id="chosen_req_type" value="a">
                <div class="container-lk-1" id="sys-1">
                <div class="in-lk-1">
                    <button class="btn-add-cart" type="submit"></button>
                    <img src="../../template/bit.team/img/system_oplat/op6.png" alt="">
                    <input type="text" id="6" name="6" pattern="[0-9-]+" placeholder="Введите реквизиты">
                    <div class="clear"></div>
                </div>
                </div>
                <div class="container-lk-1" id="sys-2">
                <div class="in-lk-1">
                    <button class="btn-add-cart" type="submit"></button>
                    <img src="../../template/bit.team/img/system_oplat/op5.png" alt="">
                    <input type="text" id="5" name="5" placeholder="Введите реквизиты">
                    <div class="clear"></div>
                </div>
                </div>
                <div class="container-lk-1" id="sys-3">
                <div class="in-lk-1">
                    <button class="btn-add-cart" type="submit"></button>
                    <img src="../../template/bit.team/img/system_oplat/op4.png" alt="">
                    <input type="text" id="4" name="4" placeholder="Введите реквизиты">
                    <div class="clear"></div>
                </div>
                </div>
                <div class="container-lk-1" id="sys-4">
                <div class="in-lk-1">
                    <button class="btn-add-cart" type="submit"></button>
                    <img src="../../template/bit.team/img/system_oplat/op3.png" alt="">
                    <input type="text" id="3" name="3" placeholder="Введите реквизиты">
                    <div class="clear"></div>
                </div>
                </div>
                <div class="container-lk-1" id="sys-5">
                <div class="in-lk-1">
                    <button class="btn-add-cart" type="submit"></button>
                    <img src="../../template/bit.team/img/system_oplat/op2.png" alt="">
                    <input type="text" id="2" name="2" placeholder="Введите реквизиты">
                    <div class="clear"></div>
                </div>
                </div>
                <div class="container-lk-1" id="sys-6">
                <div class="in-lk-1">
                    <button class="btn-add-cart" type="submit"></button>
                    <img src="../../template/bit.team/img/system_oplat/op1.png" alt="">
                    <input type="text" id="1" name="1" placeholder="Введите реквизиты">
                    <div class="clear"></div>
                </div>
                </div>

                <div class="block-newcart">
                    <input type="submit" class="btn-new-cart" value="" />
                    <div class="block-system-cart">
                        <ul>
                            <li>
                            <div class="sysOp" id="btn-sys-1">
                                <img src="../../template/bit.team/img/system_oplat/op6.png" alt="" onclick="document.getElementById('chosen_req_type').value = 6">
                            </div>
                            </li>
                            <li>
                            <div class="sysOp" id="btn-sys-2">
                                <img src="../../template/bit.team/img/system_oplat/op5.png" alt="" onclick="document.getElementById('chosen_req_type').value = 5">
                            </div>
                            </li>
                            <li>
                            <div class="sysOp" id="btn-sys-3">
                                <img src="../../template/bit.team/img/system_oplat/op4.png" alt="" onclick="document.getElementById('chosen_req_type').value = 4">
                            </div>
                            </li>
                            <li>
                            <div class="sysOp" id="btn-sys-4">
                                <img src="../../template/bit.team/img/system_oplat/op3.png" alt="" onclick="document.getElementById('chosen_req_type').value = 3">
                            </div>
                            </li>
                            <li>
                            <div class="sysOp" id="btn-sys-5">
                                <img src="../../template/bit.team/img/system_oplat/op2.png" alt="" onclick="document.getElementById('chosen_req_type').value = 2">
                            </div>
                            </li>
                            <li>
                            <div class="sysOp" id="btn-sys-6">
                                <img src="../../template/bit.team/img/system_oplat/op1.png" alt="" onclick="document.getElementById('chosen_req_type').value = 1">
                            </div>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </form>
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
            Баланс BTC: <span class="org-color" id="cabinet-amount"></span>
            <i style="position: relative;left: 0px;top:3px;font-size: 22px;" id="loading-2" class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
        </p>
        <a href="/cabinet/refill" class="btn-popol"></a>
        <a href="/cabinet/withdraw" class="btn-viv"></a>
<!--        <img src="../../template/bit.team/img/elements/q-code.png">-->
    </div>
    <div class="clear"></div>
</div>



<div class="wrapper">
    <div class="title-lk-block-stat">
        <h4>Статистика пользователя</h4>
        <div class="clear"></div>
    </div>
        <div class="list-cont-lk">
        <ul class="list-stat">
            <li><div class="stat_lk_1"><p><?= count($adses) ?><br><span class="style-text-stat">Количество сделок</span></p></div></li>
            <li><div class="stat_lk_1"><p>12.5BTC<br><span class="style-text-stat">Сумма сделок</span></p></div></li>
            <li><div class="stat_lk_1"><p>1400<br><span class="style-text-stat">Рейтинг</span></p></div></li>
            <li><div class="stat_lk_1"><p><?= $comments_count ?><br><span class="style-text-stat">Отзывов</span></p></div></li>
        </ul>
        <div class="clear"></div>
        </div>
</div>
<div class="wrapper">
        <div class="recal-lk">
            <h3>Отзывы о продавце <?= $comments_count == 0 ? 'отсутствуют' : '' ?></h3>
            <?php foreach ($all_comments as $comm): ?>
                <div class="recal-block-lk">
                    <p class="title-recal"> <?= User::getUsernameById($comm['sender_id']) ?>
                        <span class="recal-date">От <?= $comm['comm_date'] ?></span>
                    </p>
                    <p class="text-recall">
                        <?= $comm['content'] ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


<?php include ROOT.'/views/layouts/footer.php'; ?>