<?php
defined('_JEXEC') or die('Restricted access');

function __autoload($className)
{
    // Массив папок, в которых могут находиться необходимые классы
    $directories = array(
        '/models/',
        '/components/',
    );

    // Проходим по массиву папок
    foreach($directories as $path)
    {
        // Формируем имя и путь к файлу с классом
        $path = ROOT.$path.$className.'.php';

        // Если такой файл существует, подключаем его
        if(is_file($path))
        {
            include_once $path;
        }
    }
}

//set_include_path('controllers'.PATH_SEPARATOR.'controllers/admin'.PATH_SEPARATOR.'views/layouts');