<?php include ROOT . '/views/layouts/admin/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/adminTickets">Тикеты и поддержка</a></li>
                    <li class="active">Просмотр сообщения в поддержку</li>
                </ol>
            </div>

            <h4>Просмотр сообщения #<?php echo $ticket['id_msg']; ?></h4>
            <br/>
            
            <h5>Информация о сообщении</h5>
            <table class="table-admin-small table-bordered table-striped table">
                <tr>
                    <td>Номер сообщения</td>
                    <td><?php echo $ticket['id_msg']; ?></td>
                </tr>
                <tr>
                    <td>Имя юзера</td>
                    <td><?php echo User::getUsernameById($ticket['user_id']); ?></td>
                </tr>
                <tr>
                    <td>Указанный e-mail</td>
                    <td><?php echo $ticket['email']; ?></td>
                </tr>
                <tr>
                    <td>Тема</td>
                    <td><?php echo $ticket['topic']; ?></td>
                </tr>
                <tr>
                    <td>Текст сообщения</td>
                    <td><?php echo '<pre>'. $ticket['message'] . '</pre>'; ?></td>
                </tr>
                <tr>
                    <td><b>Создано</b></td>
                    <td><?php echo $ticket['created_on']; ?></td>
                </tr>
            </table>


            <a href="/adminTickets?mode=2" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
        </div>

</section>

<?php include ROOT . '/views/layouts/admin/footer.php'; ?>

