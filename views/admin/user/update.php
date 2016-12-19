<?php include ROOT . '/views/layouts/admin/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/adminUser">Управление юзерами</a></li>
                    <li class="active">Редактировать юзера</li>
                </ol>
            </div>


            <h4>Редактировать юзера #<?php echo $user->id_user; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="" method="post">
                        
                        <p class="text-danger">Заблокировать bitcoin-счёт юзера</p> (блокируется программная возможность вывода биткоинов)
                        <select name="blocked">
                            <option value="1" <?php if ($user->blocked == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($user->blocked == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>

                        <br/><br/>
                        
                        <p>Username</p>
                        <input type="text" name="username" placeholder="" value="<?php echo $user->username; ?>" />
                        
                        <p>Email</p>
                        <input type="email" name="email" placeholder="" value="<?php echo $user->email; ?>" />

                        <p>Прошёл Email-активацию?</p>
                        <select name="verified">
                            <option value="1" <?php if ($user->verified == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($user->verified == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        
                        <br/><br/>
                        
                        <p>Администратор?</p>
                        <?php
                        if($user->id_user == User::getUserIdFromSession())
                        {
                            echo '<b>Внимание!</b> Вы редактируете юзера, под которым авторизованы в системе. Если поставиь "Администратор?" - "Нет", доступ к админ-панели сразу же заблокируется. <p class="text-danger">Будьте осторожны.</p>';
                        }
                        ?>
                        <select name="role">
                            <option value="2" <?php if ($user->role == 2) echo ' selected="selected"'; ?>>Да</option>
                            <option value="1" <?php if ($user->role == 1) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        
                        <br/><br/>
                        
                        <input type="submit" value="Сохранить" name="submit" class="btn btn-default">
                        
                        <br/><br/>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/admin/footer.php'; ?>

