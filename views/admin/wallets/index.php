<?php include ROOT.'/views/layouts/admin/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление кошельками</li>
                </ol>
            </div>

            <?php if($reserve): ?>

                <h4>Список резервов</h4>
                <b>FROM</b> - юзер, который перевел BTC в резерв, <b>TO</b> - юзер, которому должны прийти средства после подтверждения оплаты.
                <br/>
                <br/>

                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID</th>
                        <th>Владелец</th>
                        <th>Кому</th>
                        <th>BTC</th>
                        <th>Подтвердить перевод вручную</th>
                        <th>Отменить перевод</th>
                    </tr>
                    <?php foreach($reserveList as $reserve): ?>
                        <tr>
                            <td><?php echo $reserve['id_reserve']; ?></td>
                            <td><?php echo User::getUsernameById($reserve['from_id']); ?> <a href="/adminWallets?user_id=<?php echo $reserve['from_id']; ?>" title="Поиск по FROM"><i class="fa fa-search"></i></a></td>
                            <td><?php echo User::getUsernameById($reserve['to_id']); ?> <a href="/adminWallets?user_id=<?php echo $reserve['to_id']; ?>" title="Поиск по TO"><i class="fa fa-search"></i></a></td>
                            <td><?php echo $reserve['amount']; ?></td>
                            <td><a href="/adminUser/send?from=<?= $reserve['from_id'] ?>&amp;to=<?= $reserve['to_id'] ?>" title="Подтвердить перевод"><i class="fa fa-exchange"></i> Confirm</a></td>
                            <td><a href="/adminUser/rollback?from=<?= $reserve['from_id'] ?>&amp;to=<?= $reserve['to_id'] ?>" title="Подтвердить перевод"><i class="fa fa-mail-reply"></i> Rollback</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            <?php else: ?>

                <h4>На резерве:</h4>
            <b><?= $this->admCoinbase->amount ?></b> <i class="fa fa-btc" title="BTC"></i> [ <a href="?reserve">подробнее</a> ]
                
            <?php endif; ?>
        </div>
    </div>
</section>
<?php include ROOT.'/views/layouts/admin/footer.php'; ?>

