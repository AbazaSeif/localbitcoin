<?php

defined('_JEXEC') or die('Restricted access');

/**
 * Description of ServiceController
 *
 * @author NewEXE
 */
class ServiceController
{

    private $html_heading = array('title' => '', 'css' => '', 'js' => '');

    public function __construct()
    {
        $this->html_heading['title'] = SITE_NAME;
    }

    public function actionIndex()
    {
        $this->html_heading['title'] .= 'Полезные сервисы';
        $text = 'Выберите один из сервисов: <ul>'
                .'<li><a href="/service/PoloniexWithdrawals">Калькулятор выведеных средств с Poloniex</a></li></ul>';

        require_once ROOT.'/views/service/index.php';
    }

    public function actionPoloniexWithdrawals($params)
    {
        $where = '';
        extract($params['get'], EXTR_IF_EXISTS);

        $submitted = $result = false;
        $errors = array();
        $csv_data = array();
        $amountInBTC = $amountInUSD = $amountInUAH = 0;


        if(isset($_POST['submitted']) && ($_FILES))
        {
            $csv_data = Service::getCSVData($_FILES['file']['tmp_name']);

            if($csv_data)
            {
                foreach($csv_data as $row)
                {
                    if(is_numeric($row['Amount']) && $row['Currency'] == 'BTC')
                    {
                        $amountInBTC += $row['Amount'];
                    }
                }
            }
            else
                $errors[] = 'Невозможно обработать файл';
            if(empty($errors))
            {
                $amountInUSD = Service::BTCtoUSD($amountInBTC);
                $amountInUAH = Service::USDtoUAH($amountInUSD);
                $result = true;
            }
        }

        require_once ROOT.'/views/service/poloniexwithdrawals.php';
        return true;
    }

    public function actionGetFromLoveread($params)
    {
        $id = false;
        $submit = false;
        extract($params['post'], EXTR_IF_EXISTS);
        $id = Security::safe_idval($id, false);
        
        $result = false;
        $errors = array();

        if($submit != false)
        {
            if($id != false)
            {
                $result = true;
                $html_first_page = iconv('windows-1251', 'utf-8', file_get_contents("http://loveread.ec/read_book.php?id=$id&p=1"));
                @preg_match("~&#8230;<a href='read_book.php\?id=$id&p=[0-9]+~", $html_first_page, $pages_count);
                $pages_count = ltrim(substr($pages_count[0], -3), '=');
                if(!Security::safe_intval($pages_count, false))
                {
                    $pages_count = ltrim(substr($pages_count[0], -4), '=');
                }
                $pages_count = Security::safe_intval($pages_count, false);
                $patterns = array('~(\<(/?[^>]+)>)~is', '~&#769;~', '~&#039;~', '~&#252;~');
                $content = '';

                /* if(!$fh = tmpfile())
                  {
                  $errors[] = 'Ошибка при создании txt-файла книги на сервере!';
                  } */
                //else
                //{
                if($pages_count !== false)
                {
                    header('Content-type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="'.$id.'.txt"');
                    for($p = 1; $p <= $pages_count; $p++)
                    {
                        $url = "http://loveread.ec/read_book.php?id=$id&p=$p";
                        $html = file_get_contents($url);
                        $html = iconv('windows-1251', 'utf-8', $html);
                        preg_match('~<p.*class=MsoNormal>(.*?)</p>~is', $html, $matches);
                        $content = preg_replace($patterns, '', $matches[0]);
                        echo $content;
                        /* if(!fwrite($fh, $content))
                          {
                          $errors[] = 'Ошибка записи в файл!';
                          break;
                          } */
                    }
                    exit('Книга сформирована, скачивание...');
                }
                else
                    $errors[] = 'Что-то не так с книгой, возможно, введён неправильный id.';
                //fclose($fh);
                //}
            }
            else $errors[] = 'Неверный id';
        }
        require_once ROOT.'/views/service/getfromloveread.php';
        return true;
    }

}
