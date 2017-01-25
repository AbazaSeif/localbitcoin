<?php require_once ROOT . '/views/layouts/guest/header.php'; ?>

<?php if ($errors != false): ?>
    <h3>Обнаружены следующие ошибки:</h3>    

    <div class="error-messege"> 
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php echo '<a href="/">На главную</a>'; ?>
    </div> 

<?php endif; ?>
