<?php include ROOT.'/views/layouts/admin/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active"><?= $h4 ?></li>
                </ol>
            </div>

            <!-- <a href="/adminMessages/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить сообщение</a> -->

            <h4><?= $h4 ?></h4>

            <br/>

            <?php if($viewMode == 1): ?>
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID</th>
                        <th>Сообщение</th>
                        <th>От</th>
                        <th>Кому</th>
                        <th>Создано</th>
                        <!-- <th></th> -->
                        <th></th>
                    </tr>
                    <?php foreach($messages as $message): ?>
                        <tr>
                            <td><?php echo $message['id_message']; ?></td>
                            <td><?php echo $message['message']; ?></td>
                            <td><?php echo User::getUsernameById($message['from_user_id']); ?></td>
                            <td><?php echo User::getUsernameById($message['to_user_id']); ?></td>
                            <td><?php echo $message['created_on']; ?></td>
                            <!-- <td><a href="/adminMessages/update?id_message=<?php echo $message['id_message']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td> -->
                            <td><a href="/adminMessages/delete?id_message=<?php echo $message['id_message']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>

            <?php if($viewMode == 2): ?>
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID</th>
                        <th>Объявление</th>
                        <th>Сообщение</th>
                        <th>Кому</th>
                        <th>Создано</th>
                        <!-- <th></th> -->
                        <th></th>
                    </tr>
                    <?php foreach($messages as $message): ?>
                        <tr>
                            <td><?php echo $message['id_message']; ?></td>
                            <td><a href="/cabinet/info?ads=<?php echo $message['ads_id']; ?>" target="_blank" title="Просмотр"><i class="fa fa-external-link"></i> Перейти</a></td>
                            <td><?php echo $message['message']; ?></td>
                            <td><?php echo User::getUsernameById($message['to_user_id']); ?></td>
                            <td><?php echo $message['created_on']; ?></td>
                            <!-- <td><a href="/adminMessages/update?id_message=<?php echo $message['id_message']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td> -->
                            <td><a href="/adminMessages/delete?id_message=<?php echo $message['id_message']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>

            <?php if($viewMode == 3): ?>
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID</th>
                        <th>Сообщение</th>
                        <th>От</th>
                        <th>Кому</th>
                        <th>Создано</th>
                        <th>Объявление</th>
                        <!-- <th></th> -->
                        <th></th>
                    </tr>
                    <?php foreach($messages as $message): ?>
                        <tr>
                            <td><?php echo $message['id_message']; ?></td>
                            <td><?php echo $message['message']; ?></td>
                            <td><?php echo User::getUsernameById($message['from_user_id']); ?></td>
                            <td><?php echo User::getUsernameById($message['to_user_id']); ?></td>
                            <td><?php echo $message['created_on']; ?></td>
                            <td><a href="/cabinet/info?ads=<?php echo $message['ads_id']; ?>" target="_blank" title="Просмотр"><i class="fa fa-external-link"></i> Перейти</a></td>
                            <!-- <td><a href="/adminMessages/update?id_message=<?php echo $message['id_message']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td> -->
                            <td><a href="/adminMessages/delete?id_message=<?php echo $message['id_message']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php include ROOT.'/views/layouts/admin/footer.php'; ?>

