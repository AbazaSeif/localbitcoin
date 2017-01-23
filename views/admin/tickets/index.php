<?php include ROOT . '/views/layouts/admin/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Тикеты и поддержка</li>
                </ol>
            </div>

            <?php if($mode == 1): ?>
            <h4>Список тикетов</h4> [ <b>тикеты</b> | <a href="?mode=2">поддержка</a> ]
            <?php else: ?>
            <h4>Сообщений в поддержку</h4> [ <a href="?mode=1">тикеты</a> | <b>поддержка</b> ]
            <?php endif; ?>
            
            <br/><br/>

            <table class="table-bordered table-striped table">

                <?php if ($mode == 1): ?>
                    <tr>
                        <th>ID</th>
                        <th>Причина спора</th>
                        <th>От</th>
                        <th>Сделка</th>
                        <th>Создан</th>

                        <th>удалить</th>
                    </tr>
                    <?php foreach ($ticketsList as $ticket): ?>
                        <tr>
                            <td><?php echo $ticket['id_ticket']; ?></td>
                            <td><?php echo Ticket::getStrReason($ticket['reason']); ?></td>
                            <td><?php echo User::getUsernameById($ticket['from_id']); ?></td>
                            <td><a href="/cabinet/info?ads=<?php echo $ticket['ads_id']; ?>" target="_blank">Просмотр <i class="fa fa-external-link"></i></a></td>
                            <td><?php echo $ticket['created_on']; ?></td>

                            <td><a href="/adminTickets/delete?id_ticket=<?php echo $ticket['id_ticket']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <th>От</th>
                        <th>Количество</th>
                        <th>Создан</th>

                        <th>подробнее</th>
                        <th>закрыть</th>
                    </tr>
                    <?php foreach ($ticketsList as $ticket): ?>
                        <tr>
                            <td><?php echo $ticket['username']; ?></td>
                            <td><?php echo $ticket['count']; ?></td>
                            <td><?php echo $ticket['created']; ?></td>

                            <td><a href="/adminTickets/viewsupport?id_msg=<?php echo $ticket['id_msg']; ?>" title="Подробнее"><i class="fa fa-info"></i> Просмотр</a></td>
                            <td><a href="/adminTickets/deletesupport?id_msg=<?php echo $ticket['id_msg']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>

            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/admin/footer.php'; ?>

