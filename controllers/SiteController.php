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

        $search_conditions = isset($params['post']['currency']) ? 'WHERE currency_id = \''. $params['post']['currency']. '\' AND min_amount <= '.str_replace(',', '.', $params['post']['sum']). ' AND max_amount >= '.str_replace(',', '.', $params['post']['sum']). ' AND payment_method = \''.$params['post']['payment'].'\'' : '';
        // echo $search_conditions;
        $adses = Advertisement::getAdvertisementsList('Active', $search_conditions);
        $count_sell = 0;
        $count_buy = 0;
        foreach ($adses as $ads){
            if($ads['type'] == 1)
            {
                $count_sell++;
            }
            else
            {
                $count_buy++;
            }
        }
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

    public function actionUser($params)
    {
        $sender_id = isset($_SESSION['id_user'])?$_SESSION['id_user']:false;
        $receiver = isset($params['get']['receiver_log'])?User::getUserByUsername($params['get']['receiver_log']):false;
        // if($sender_id !== false&&isset($params['post']['comment']) && strlen($params['post']['comment']) > 0) {
        //     if(!User::addComment($sender_id, $receiver['id_user'], $params['post']['comment'])) {
        //         $errors[] = "Отзыв не был добавлен. Попробуйте позже";
        //     }
        // }
        if($receiver !== false)
        {
            $all_comments = User::getUserCommentsById($receiver['id_user']);
            $comments_count = count($all_comments);
        }
        require_once(ROOT.'/views/site/user.php');
        return true;
    }

}
