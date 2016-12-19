<?php include ROOT . '/views/layouts/admin/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/adminMessages">Управление сообщениями</a></li>
                    <li class="active">Удалить сообщение</li>
                </ol>
            </div>


            <h4>Удалить сообщение #<?php echo $msg['id_message'] ?></h4>


            <p>Вы действительно хотите удалить сообщение? Отменить будет невозможно</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/admin/footer.php'; ?>

