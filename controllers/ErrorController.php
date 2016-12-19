<?php
defined('_JEXEC') or die('Restricted access');
class ErrorController
{
     public function action404()
    {
        header('Location: /404');
        return true;
    }
    
    public function actionActionReturnsFalse()
    {
        $text = 'Что-то пошло не так. Вызванный Action вернул false. Сообщите об этом администратору';
        
        require_once ROOT .'/views/errors/actionreturnsfalse.php';
        
        return true;
    }
}
