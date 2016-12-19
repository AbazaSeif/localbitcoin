<?php require_once ROOT.'/views/layouts/cabinet/header.php'; ?>

<div class="title-help">

    <?php if(isset($errors) && is_array($errors)): ?>
        <div class="error-messege">    
            <ul>
                <?php foreach($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
        require_once ROOT.'/views/layouts/footer.php';
        exit;
        ?>
    <?php endif; ?>

    <h3>Объявление №<?= $ads_id, " ({$ads['price']}", Currency::getSymbol($ads['currency_id']), '/BTC ', ')' ?></h3>
    <p><?= Advertisement::getStringType($ads['type']), " BTC на {$ads['price']}", Currency::getSymbol($ads['currency_id']) ?> </p>
    <div class="info-balance-1">
        <p>Автор объявления: <?= User::getUsernameById($author_ads) ?></p>
    </div>
</div>
<div class="block-bue-2">
    <div class="left-bue-block">
        <div class="info-o-dog">
            <h4>Информация о сделке</h4>

            <div class="block-info-plat">
                <ul>
                    <li class="block-l-inf">
                        <ul>
                            <li>
                                <div class="sposob-op-seg-2">
                                    <p>5489-5893-4577-1255</p>
                                    <img src="/template/bit.team/img/system_oplat/op6.png" alt="">
                                    <div class="clear"></div>
                                </div>
                                <div class="sposob-op-seg-2">
                                    <p>5489-5893-4577-1255</p>
                                    <img src="/template/bit.team/img/system_oplat/op5.png" alt="">
                                    <div class="clear"></div>
                                </div>
                                <div class="sposob-op-seg-2">
                                    <p>5489-5893-4577-1255</p>
                                    <img src="/template/bit.team/img/system_oplat/op4.png" alt="">
                                    <div class="clear"></div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li  class="block-l-inf">
                        <ul>
                            <li>
                                <div class="sposob-op-seg-2">
                                    <p>5489-5893-4577-1255</p>
                                    <img src="/template/bit.team/img/system_oplat/op3.png" alt="">
                                    <div class="clear"></div>
                                </div>
                                <div class="sposob-op-seg-2">
                                    <p>5489-5893-4577-1255</p>
                                    <img src="/template/bit.team/img/system_oplat/op2.png" alt="">
                                    <div class="clear"></div>
                                </div>
                                <div class="sposob-op-seg-2">
                                    <p>5489-5893-4577-1255</p>
                                    <img src="/template/bit.team/img/system_oplat/op1.png" alt="">
                                    <div class="clear"></div>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
                <div class="clear"></div>
            </div>

            <p>Цена: <span class="right-text or-color"><?= "{$ads['price']} ", Currency::getStringName($ads['currency_id']), ' / BTC ' ?></span></p>
            <p>Способ оплаты: <span class="right-text">Универсальный (Webmoney, QIWI, на карту...)</span></p>
            <p>Автор объявления: <span class="right-text cast-client"><?= User::getUsernameById($author_ads) ?></span></p>
            <p>Количество BTC: <span class="right-text"><?= $ads['max_amount'] ?></span></p>
            <p>Местоположение: <span class="right-text color-b"><?= $ads['location'] ?></span></p>
        </div>

        <div class="block-send">

            <!--
            <h4>Статус сделки</h4>
            <div class="informate-messege">
                ВНИМАНИЕ. Опция покупки-продажи отключена.
            </div> 
            <p>На данном этапе мы внедряем статусную систему для модуля "Сделка". До этого сделка работала с помощью сложных условий. Условия будут упрощены для обеспечения лучшей поддержки модуля.</p>
            <div class="send-info-2">
                <p>
                    Сделка НЕ может быть совершена в даный момент.
                </p>
            </div>
            -->



            <?php if(Advertisement::getStatusByIdAds($ads_id) == 4): ?>
                <h4>Статус сделки</h4>
                <p>Обе стороны сочли сделку совершенной. Средства обеих сторон переведены. Если Вы всё же хотите оспорить сделку, <a href="/cabinet/support">обратитесь в поддержку</a></p>
                <div class="send-info-2">
                    <p>
                        Сделка совершена
                    </p>
                </div>

            <?php elseif(!$isAuthor && $ads['type'] == 1): ?>
                <?php if(Advertisement::getStatusByIdAds($ads_id) == 0): ?>
                    <h4>Статус сделки</h4>
                    <p></p>
                    <div class="send-info-2">
                        <p>
                            Активна, статус 0
                        </p>
                    </div>
                <?php elseif(Advertisement::getStatusByIdAds($ads_id) == 1): ?>
                    <h4>Статус сделки</h4>
                    <p></p>
                    <div class="send-info-2">
                        <p>
                            Активна, статус 1
                        </p>
                    </div>
                <?php elseif(Advertisement::getStatusByIdAds($ads_id) == 2): ?>
                    <h4>Статус сделки</h4>
                    <p></p>
                    <div class="send-info-2">
                        <p>
                            Активна, статус 2
                        </p>
                    </div>
                <?php elseif(Advertisement::getStatusByIdAds($ads_id) == 3): ?>
                    <h4>Статус сделки</h4>
                    <p></p>
                    <div class="send-info-2">
                        <p>
                            Статус 3
                        </p>
                    </div>
                <?php endif; ?>

            <?php elseif(!$isAuthor && $ads['type'] == 2): ?>
                <?php if(Advertisement::getStatusByIdAds($ads_id) == 0): ?>
                    <h4>Статус сделки</h4>
                    <p></p>
                    <div class="send-info-2">
                        <p>
                            Активна, статус 0
                        </p>
                    </div>
                <?php elseif(Advertisement::getStatusByIdAds($ads_id) == 1): ?>
                    <h4>Статус сделки</h4>
                    <p></p>
                    <div class="send-info-2">
                        <p>
                            Активна, статус 1
                        </p>
                    </div>
                <?php elseif(Advertisement::getStatusByIdAds($ads_id) == 2): ?>
                    <h4>Статус сделки</h4>
                    <p></p>
                    <div class="send-info-2">
                        <p>
                            Активна, статус 2
                        </p>
                    </div>
                <?php elseif(Advertisement::getStatusByIdAds($ads_id) == 3): ?>
                    <h4>Статус сделки</h4>
                    <p></p>
                    <div class="send-info-2">
                        <p>
                            Статус 3
                        </p>
                    </div>
                <?php endif; ?>
            <?php elseif($isAuthor && $ads['type'] == 1): ?>
                <?php if(Advertisement::getStatusByIdAds($ads_id) == 0): ?>
                    <h4>Статус сделки</h4>
                    <p></p>
                    <div class="send-info-2">
                        <p>
                            Активна, статус 0
                        </p>
                    </div>
                <?php elseif(Advertisement::getStatusByIdAds($ads_id) == 1): ?>
                    <h4>Статус сделки</h4>
                    <p></p>
                    <div class="send-info-2">
                        <p>
                            Активна, статус 1
                        </p>
                    </div>
                <?php elseif(Advertisement::getStatusByIdAds($ads_id) == 2): ?>
                    <h4>Статус сделки</h4>
                    <p></p>
                    <div class="send-info-2">
                        <p>
                            Активна, статус 2
                        </p>
                    </div>
                <?php elseif(Advertisement::getStatusByIdAds($ads_id) == 3): ?>
                    <h4>Статус сделки</h4>
                    <p></p>
                    <div class="send-info-2">
                        <p>
                            Статус 3
                        </p>
                    </div>
                <?php endif; ?>
            <?php elseif($isAuthor && $ads['type'] == 2): ?>
                <?php if(Advertisement::getStatusByIdAds($ads_id) == 0): ?>
                    <h4>Статус сделки</h4>
                    <p></p>
                    <div class="send-info-2">
                        <p>
                            Активна, статус 0
                        </p>
                    </div>
                <?php elseif(Advertisement::getStatusByIdAds($ads_id) == 1): ?>
                    <h4>Статус сделки</h4>
                    <p></p>
                    <div class="send-info-2">
                        <p>
                            Активна, статус 1
                        </p>
                    </div>
                <?php elseif(Advertisement::getStatusByIdAds($ads_id) == 2): ?>
                    <h4>Статус сделки</h4>
                    <p></p>
                    <div class="send-info-2">
                        <p>
                            Активна, статус 2
                        </p>
                    </div>
                <?php elseif(Advertisement::getStatusByIdAds($ads_id) == 3): ?>
                    <h4>Статус сделки</h4>
                    <p></p>
                    <div class="send-info-2">
                        <p>
                            Статус 3
                        </p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="clear"></div>

        </div>


        <div class="block-spor">
            <h4>Оспаривание сделки</h4>
            <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать
                несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинаю
                ющему оратору отточить навык публичных выступлений в домашних условиях.

                При создании генератора мы использовали небезызвестный универсальный код речей.
                Текст генерируется абзацами случайным образом от двух до десяти предложений.</p>
            <?php if($ticketSend === false): ?>
                <form method="post">
                    <select class="sel-new-ob-3" name="reason">
                        <option value="0" disabled="">Выберите причину спора</option>
                        <option value="1">Не оплачено</option>
                        <option value="2">Обман</option>
                        <option value="3">Отказываюсь</option>
                    </select>
                    <button class="spor-btn" type="submit" name="dispute" value="1">Оспорить</button>
                </form>
            <?php elseif($ticketSend == 1): ?>
                <div class="informate-messege"> 
                    Тикет создан 
                </div> 
            <?php elseif($ticketSend == 0): ?>
                <div class="error-messege"> 
                    Ошибка при создании тикета, возможно, Вы не указали причину. Попробуйте ещё раз
                </div>
                <div class="clear"></div>
                <form method="post">
                    <select class="sel-new-ob-3" name="reason">
                        <option value="0" disabled="">Выберите причину спора</option>
                        <option value="1">Не оплачено</option>
                        <option value="2">Обман</option>
                        <option value="3">Отказываюсь</option>
                    </select>
                    <button class="spor-btn" type="submit" name="dispute" value="1">Оспорить</button>
                </form>
            <?php endif; ?>
            <div class="clear"></div>

        </div>
        <div class="block-uslov">
            <h4>Условия сделки</h4>
            <p>Идейные соображения высшего порядка, а также реализация намеченных плановых
                заданий в значительной степени обуславливает создание позиций, занимаемых участн
                иками в отношении поставленных задач.<br><br>

                Разнообразный и богатый опыт сложившаяся структура оргаизации представляет собой
                интересный эксперимент проверки дальнейших направлений развития.<br><br>

                Не следует, однако забывать, что начало повседневной работы по формированию
                позиции требуют определения и уточнения форм развития. Разнообразный и богатый
                опыт новая модель организационной деятелости требуют от нас анализа форм развития.</p>
            <div class="clear"></div>
        </div>

    </div>
    <div class="right-bue-blok">

        <div class="chat-bue-2">
            <h4>Сколько вы хотите купить?</h4>
            <div class="block-ost-zav">
                <form>
                    <input type="text" value="250.25" class="inp-sale-3">
                    <input type="text" value="25.25" class="inp-sale-4">
                    <textarea class="area-bue" placeholder="Сообщите трейдеру контактную или другую необходимую
информацию здесь (не обязательно)"></textarea>
                    <button type="submit" class="send-mess-btn">Отправить запрос</button>
                </form>
                <div class="clear"></div>
            </div>
        </div>

        <?php if(!$isAuthor && $ads['type'] == 1 && (Agreement::getToIdByAds($ads_id)) == 0): ?>
            <div class="chat-bue-2">
                <h4>На какую сумму Вы хотите продать BTC (в <?= Currency::getStringName($ads['currency_id']) ?>)?</h4>
                <div class="block-ost-zav">
                    <form method="post">
                        <input type="text" name="agreeSum" pattern="^[ 0-9]+$" value="<?= $agreeSum ?>" class="inp-sale-3">
                        <textarea name="message" class="area-bue" placeholder="Сообщите трейдеру контактную или другую необходимую информацию здесь (не обязательно; будет отображено в вашем приватном чате здесь)"><?= $message ?></textarea>
                        <button type="submit" name="agree" value="1" class="send-mess-btn">Отправить запрос</button>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>
        <?php elseif(!$isAuthor && $ads['type'] == 1 && $confirm === false && (Agreement::getToIdByAds($ads_id)) == $loggined_user): ?>
            <div class="chat-bue-2">
                <h4>Сколько BTC перевести автору?</h4>
                <div class="block-ost-zav">
                    <form method="post">
                        <input type="text" name="agreeBTCSum" pattern="^[ 0-9]+$" value="<?= $agreeSum ?>" class="inp-sale-3">
                        <textarea name="message" class="area-bue" placeholder="Сообщите трейдеру контактную или другую необходимую информацию здесь (не обязательно; будет отображено в вашем приватном чате здесь)">
                            <?= $message ?></textarea>
                        <button type="submit" name="confirm" value="1" class="send-mess-btn">Отправить запрос</button>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>

        <?php endif;
        ?>

        <div class="chat-bue">
            <h4>Online чат</h4>
            <div class="content-mess">
                <?php if(!empty($messages) && is_array($messages)): ?>
                    <?php foreach($messages as $message): ?>
                        <div class="mess-1">
                            <p class="name-chat"><?= User::getUsernameById($message['from_user_id']) ?><span class="date-chat"><?= $message['created_on'] ?></span></p>
                            <p class="text-mess">
                                <?= $message['message'] ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php elseif($isAuthor): ?>
                    <div class="informate-messege">Вы - создатель объявления, поэтому Ваши сообщения здесь видны всем.</div>
                <?php else: ?>
                    <div class="informate-messege">Начать переписку с автором:</div>
                <?php endif; ?>
            </div>
            <div class="form-send-mess">
                <form method="post">
                    <textarea name="message" class="text-mess-inp" placeholder="Введите сообщение"></textarea>
                    <button type="submit" name="submit" value="1" class="send-mess-btn">Отправить запрос</button>
                    <div class="clear"></div>
                </form>
            </div>
        </div>
        <div class="block-uslov-2">
            <h4>Информация о безопасности</h4>
            <p>Задача организации, в особенности же постоянное информационно-пропагандистское
                обеспечение нашей деятельности в значительной степени обуславливает создание
                направлений прогрессивного развития.<br><br>

                Идейные соображения высшего порядка, а также постоянное информационно-пропаган
                дистское обеспечение нашей деятельности представляет собой интересный
                эксперимент проверки соответствующий условий активизации.</p>
            <ul>
                <li>Пользователь подтвердил адрес электронной почты</li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
</div>

<?php require_once ROOT.'/views/layouts/footer.php'; ?>