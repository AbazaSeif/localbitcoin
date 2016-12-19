<?php include ROOT . '/views/layouts/admin/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление юзерами</li>
                </ol>
            </div>

            <a href="/user/signup" target="_blank" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить юзера <i class="fa fa-external-link"></i></a>
            
            <h4>Список юзеров</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Кол-во объявлений</th>
                    <th>Объявления</th>
                    <th>Сообщения</th>
                    <th>Активирован</th>
                    <th>Заблокирован</th>
                    <th>Администратор?</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($usersList as $user): ?>
                    <tr>
                        <td><?php echo $user['id_user']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['count_of_deals']; ?></td>
                        <td><a href="/adminAds?user_id=<?php echo $user['id_user']; ?>" title="Найти все объявления юзера"><i class="fa fa-search"></i> Показать</a></td>
                        <td><a href="/adminMessages?user_id=<?php echo $user['id_user']; ?>" title="Найти все сообщения юзера"><i class="fa fa-search"></i> Найти</a></td>
                        <td><?php echo User::getStrVerifiedOrBlocked($user['verified']); ?></td>
                        <td><?php echo User::getStrVerifiedOrBlocked($user['blocked']); ?></td>
                        <td><?php User::isAdmin($user['id_user'])? print 'Да' : print 'Нет';?></td>
                        <td><a href="/adminUser/update?id_user=<?php echo $user['id_user']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/adminUser/delete?id_user=<?php echo $user['id_user']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/admin/footer.php'; ?>

