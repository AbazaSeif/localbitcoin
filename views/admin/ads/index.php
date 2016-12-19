<?php include ROOT . '/views/layouts/admin/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление объявлениями</li>
                </ol>
            </div>

            <a href="/cabinet/placebill" target="_blank" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить объявление <i class="fa fa-external-link"></i></a>
            
            <h4>Список объявлений <?php if($user_id) echo 'пользователя ' . User::getUsernameById($user_id); ?></h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Разместил</th>
                    <th>Тип</th>
                    <th>Город</th>
                    <th>Цена (валюта за 1BTC)</th>
                    <th>Min</th>
                    <th>Max</th>
                    <th>Чат обявления</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($adsesList as $ads): ?>
                    <tr>
                        <td><?php echo $ads['id_advertisement']; ?></td>
                        <td><?php echo User::getUsernameById($ads['user_id']); ?></td>
                        <td><?php echo Advertisement::getStringType($ads['type']); ?></td>
                        <td><?php echo $ads['location']; ?></td>
                        <td><?php echo $ads['price'], ' ', Currency::getSymbol($ads['currency_id']), ' /BTC '; ?></td>
                        <td><?php echo $ads['min_amount'], ' ', Currency::getSymbol($ads['currency_id']); ?></td>
                        <td><?php echo $ads['max_amount'], ' ', Currency::getSymbol($ads['currency_id']); ?></td>
                        <td><a href="/adminMessages?ads_id=<?php echo $ads['id_advertisement']; ?>" title="Найти все сообщения по объявлению"><i class="fa fa-search"></i> Показать</a></td>
                        <td><a href="/adminAds/update?id_ads=<?php echo $ads['id_advertisement']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/adminAds/delete?id_ads=<?php echo $ads['id_advertisement']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/admin/footer.php'; ?>

