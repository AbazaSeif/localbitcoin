<?php include ROOT . '/views/layouts/guest/header.php';

 if(!empty(($submit)))
{
    echo $text;
}
else echo <<<_HTML
    <form method="post">
        <input type="text" name="text"></input>
        <input type="submit" name="submit" value="Ввоfд">
    </form>
_HTML;
    
include ROOT . '/views/layouts/footer.php';
