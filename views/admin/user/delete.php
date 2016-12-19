<?php include ROOT . '/views/layouts/admin/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/adminUser">Управление юзерами</a></li>
                    <li class="active">Удалить юзера</li>
                </ol>
            </div>


            <h4>Удалить юзера <?php echo $user->username . ', id = ' . $user->id_user?></h4>


            <p>Вы действительно хотите <b>удалить</b> этого юзера?</p>
            <p>Будут удалены все его объявления, а также сообщения в чатах других пользователей</p>
        

            <form method="post">
                <input type="submit" name="submit" value="Продолжить" />
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/admin/footer.php'; ?>

