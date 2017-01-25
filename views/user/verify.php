<?php require ROOT.'/views/layouts/guest/header.php' ?>

<?php if(!$result): ?>
<div class="error-messege"> 
     Произошла ошибка подтверждения email<br/>
    <a href="/">На главную</a>
</div> 
<?php else: ?>
<div class="informate-messege"> 
    Email успешно подтверждён.<br/>
    <a href="/">На главную</a>
</div> 
<?php endif; ?>
