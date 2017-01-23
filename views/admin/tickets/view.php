<?php include ROOT . '/views/layouts/admin/header.php'; ?>
<style>
    .content-mess {
        width: 100%;
        height: 550px;
        overflow-y: scroll;
        margin-bottom: 35px;
    }
    .mess-1 {
        background: #f5f6f7;
        border-radius: 4px;
        margin-bottom: 25px;
        padding: 20px;
    }
    .name-chat {
        font: 15px AndaleBold;
        color: #01abe8;
        margin-bottom: 20px;
    }

    .date-chat {
        font: 12px AndaleBold;
        color: #989da6;
        float: right;
    }

    .text-mess {
        font: 12px AndaleBold;
        color: #50565f;
    }
    .text-mess-inp {
        max-width: 100%;
        min-width: 100%;
        max-height: 175px;
        min-height: 175px;
        border-radius: 4px;
        background: #f1f2f4;
        border: 0;
        outline: 0;
        color: #959ba5;
        font: 14px Andale;
        padding-left: 25px;
        padding-top: 15px;
        text-align: left;
    }
    .send-mess-btn {
        cursor: pointer;
        float: right;
        border: 0;
        outline: 0;
        border-radius: 0 0 5px 5px;
        width: 175px;
        height: 50px;
        background: #fc5217;
        margin-top: -5px;
        color: #fff;
        font: 14px AndaleBold;
    }
</style>
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

            <h4>Просмотр диалога с <?php echo $username ?></h4>
            <br/>
            
            <h5>Диалог</h5>
            <div class="chat-bue">
                <div class="content-mess" style="height: auto;max-height: 550px;">
                    <?php foreach ($msglist as $key): ?>
                    <div class="mess-1">
                        <p class="name-chat"><?= $key['user_id']==0?'Admin':$username; ?><span class="date-chat"><?= $key['created_on'] ?></span></p>
                        <p class="text-mess">
                            <?= $key['message'] ?>
                        </p>
                    </div>
                    <?php endforeach;?>
<!--                    <div class="mess-1">
                        <p class="name-chat">Carlos<span class="date-chat">21.02.16</span></p>
                        <p class="text-mess">
                            Я бы хотел задать один вопрос, но они не додят по какой-то причине, ведь я всего
                            лишь спросил бы то, чего не знает никто)
                        </p>
                    </div>-->
                </div>
                <div class="form-send-mess">
                    <form method="post">
                        <textarea class="text-mess-inp" name="message" id="message">
                        </textarea>
                        <script>document.getElementById('message').value = '';</script>
                        <button type="submit" class="send-mess-btn">Отправить запрос</button>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
<!--            <table class="table-admin-small table-bordered table-striped table">
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
            </table>-->


            <a href="/adminTickets?mode=2" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
        </div>

</section>

<?php include ROOT . '/views/layouts/admin/footer.php'; ?>

