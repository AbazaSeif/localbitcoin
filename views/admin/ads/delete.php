<?php include ROOT . '/views/layouts/admin/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/adminAds">Управление объявлениями</a></li>
                    <li class="active">Удалить объявление</li>
                </ol>
            </div>


            <h4>Удалить объявление #<?php echo $ads['id_advertisement'] . ', username = ' . User::getUsernameById($ads['user_id']) ?></h4>


            <p>Вы действительно хотите <b>удалить</b> это объявление?</p>
            <p>Отменить действие невозможно.</p>
        
            <form method="post">
                <input type="submit" name="submit" value="Продолжить" />
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/admin/footer.php'; ?>

