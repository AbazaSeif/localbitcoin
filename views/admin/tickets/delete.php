<?php include ROOT . '/views/layouts/admin/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/adminTickets">Управление тикетами</a></li>
                    <li class="active">Закрыть вопрос</li>
                </ol>
            </div>


            <h4>Закрыть вопрос?</h4>


            <p>Вы действительно хотите <b>закрыть</b> этот вопрос?</p>
            <p>Отменить действие будет невозможно</p>
        
            <form method="post">
                <input type="submit" name="submit" value="Продолжить" />
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/admin/footer.php'; ?>

