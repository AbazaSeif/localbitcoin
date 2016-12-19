<?php

defined('_JEXEC') or die('Restricted access');

class SiteController
{

    private $html_heading = array(
        'title' => SITE_NAME,
        'css' => '',
        'js' => ''
    );

    public function actionIndex($params)
    {
        $this->html_heading = array(
            'title' => 'Главная страница'.HTML_TITLE_DELIMITER.SITE_NAME,
        );
        
        $type = isset($params['get']['type']) ? $params['get']['type'] : false;
        if($type === false && $type != 'buy' && $type != 'sell' )
        {
            $type = 'buy';
        }

        $items = array(
            array('name' => 'Регистрация', 'link' => '/user/signup'),
            array('name' => 'Кабинет пользователя', 'link' => '/cabinet'),
            array('name' => 'Разместить объявление', 'link' => '/cabinet/PlaceBill'),
            array('name' => 'Страница лк1', 'link' => '/cabinet/PageLk1'),
            array('name' => 'Пополнить', 'link' => '/cabinet/refill'),
            array('name' => 'Мои объявления', 'link' => '/cabinet/ads'),
            array('name' => 'Информация о продавце', 'link' => '/cabinet/info'),
        );

        $adses = Advertisement::getAdvertisementsList('only active, yeah bitch');

        require_once(ROOT.'/views/site/index.php');
        return true;
    }

    /**
     * Action для страницы "Контакты"
     */
    public function actionContacts($params)
    {
        $this->html_heading = array(
            'title' => 'Обратная связь'.HTML_TITLE_DELIMITER.SITE_NAME,
        );

        // Переменные для формы
        $userEmail = false;
        $userText = false;
        $subject = false;
        $submit = false;
        extract($params['post'], EXTR_IF_EXISTS);

        $result = false;

        // Обработка формы
        if(isset($submit))
        {

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if(!User::checkEmail($userEmail))
            {
                $errors[] = 'Неправильный email';
            }

            //$errors = array('Извините, отправка письма временно закрыта.');

            if($errors == false)
            {
                // Если ошибок нет
                // Отправляем письмо администратору 
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                //$result = mail(ADMIN_EMAIL, $subject, $message);
                $result = true;
                if(!$result)
                {
                    $errors[] = 'Что-то пошло не так. Сообщите администратору.';
                }
            }
        }

        // Подключаем вид
        require_once(ROOT.'/views/site/contact.php');
        return true;
    }

    public function actionAbout()
    {
        require_once(ROOT.'/views/site/about.php');
        return true;
    }

    public function actionTest($params)
    {
        $submit = isset($params['post']['submit']) ? $params['post']['submit'] : false;
        $text = isset($params['post']['text']) ? $params['post']['text'] : false;
        echo '<pre>';
        echo '</pre>';
        require_once(ROOT.'/views/site/test.php');
        return true;
    }
    
    public function actionHelp()
    {
        require_once(ROOT.'/views/site/help.php');
        return true;
    }

    public function action404()
    {
        $text = 'Error 404';
        require_once ROOT.'/views/errors/404.php';
        return true;
    }

}
