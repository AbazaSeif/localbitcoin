<?php include ROOT.'/views/layouts/admin/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/adminAds">Управление объявлениями</a></li>
                    <li class="active">Редактировать объявление</li>
                </ol>
            </div>


            <h4>Редактировать объявление #<?php echo $ads['id_advertisement']; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="" method="post">

                        <p>Тип объявления</p>
                        <select name="type">
                            <option value="1" <?php if($ads['type'] == 1) echo ' selected="selected"'; ?>>Купить</option>
                            <option value="2" <?php if($ads['type'] == 2) echo ' selected="selected"'; ?>>Продать</option>
                        </select>
                        
                        <br /><br />

                        <p>Город</p>
                        <input type = "text" name = "location" pattern="^[А-Яа-яЁё\s]+$" value = "<?= $ads['location'] ?>" placeholder = "Введите местоположение, только русские буквы" required />

                        <p>Валюта</p>
                        <select name = "currency_id">
                            <option value = "1" <?php if($ads['currency_id'] == 1) echo ' selected="selected"'; ?>>USD</option>
                            <option value = "2" <?php if($ads['currency_id'] == 2) echo ' selected="selected"'; ?>>RUR</option>
                        </select>
                        
                        <br /><br />
                        
                        <p>Цена</p>
                        <input class = "text-form" type = "text" name = "price" pattern = "\d+(\.\d{2,})?" value = "<?= $ads['price'] ?>" placeholder = "Укажите цену за 1 BTC, последние цены с BTC-e <?php
                        echo Currency::getExchangeRate('rur').' для рублей и '.Currency::getExchangeRate('usd').' для долларов';
                        ?>" required>

                        <p>Min</p>
                        <input type = "text" name = "min_amount" pattern="[0-9]{1,6}" value = "<?= $ads['min_amount'] ?>" placeholder = "Минимальная сумма сделки, от 1 до 100000" required>
                        
                        <p>Max</p>
                        <input class = "text-form" type = "text" name = "max_amount" pattern="[0-9]{1,6}" value = "<?= $ads['max_amount'] ?>" placeholder = "Максимальная сумма сделки, от 1 до 100000" required>
                        
                        Время работы
                        <input class = "text-form" type = "text" name = "time_of_work" value = "<?= $ads['time_of_work'] ?>" placeholder = "Дни и часы работы (например, &laquo;с 9 утра до 12 вечера, пн-сб&raquo;)" required>
                        
                        Комментарий
                        <textarea placeholder = "Комментарий к объявлению" name = "comment"><?php isset($ads['comment']) ? print $ads['comment'] : print '';
                        ?></textarea>
                        <br/><br/>

                        <input type="submit" value="Сохранить" name="submit" class="btn btn-default">

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT.'/views/layouts/admin/footer.php'; ?>

