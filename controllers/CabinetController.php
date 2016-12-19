<?php
defined('_JEXEC') or die('Restricted access');

class CabinetController
{

    private $coinbase;
    
    public function __construct()
    {
        $this->coinbase = new Coinbase();
    }
    
    public function actionIndex($params)
    {
        if(User::isGuest())
        {
            Router::headerLocation();
        }
        
        $from = isset($params['get']['from']) ? $params['get']['from'] : false;
        
        $adses = Advertisement::getAdsesByUserId(User::getUserIdFromSession());
       
        require_once(ROOT.'/views/cabinet/index.php');
        return true;
    }

    public function actionPlaceBill($params)
    {
        if(User::isGuest())
        {
            Router::headerLocation('/user/signup');
        }
        

        $location = $currency_id = $price = $min_amount = $max_amount = $time_of_work = $comment = $expires_in = false;
        $submit = false;
        extract($params['post'], EXTR_IF_EXISTS);
        $type = isset($params['get']['type']) ? Security::safe_intval($params['get']['type']) : 1;
        $currency_id = Security::safe_idval($currency_id);
        if($type != 1 && $type != 2)
        {
            $type = 1;
        }
        
        $todayHtml = date("Y-m-d");
        $plusMonthHtml = date('Y-m-d', strtotime($todayHtml . '+1 month'));
        $plusYearHtml = date('Y-m-d', strtotime($todayHtml . '+1 year'));
        
        if (!PlaceBillForm::checkDateValid($expires_in))
        {
            $expires_in = $plusMonthHtml;
        }
        $dt = new DateTime($expires_in);
        $expires_in = $dt->format('Y-m-d');
        
        //var_dump($params['post']);
        
        $errors = false;

        if($type == 1 && !$this->coinbase->checkBalanceNotNull())
        {
            $errors[] = 'Вы не можете разместить объявление на продажу BTC, сначала пополните кошелёк';
        }
        if ($type == 1)
        {
            //BTCtoReserve!!!!!!!!!!!!!!!!!!!!!!
        }

        $result = false;

        if($submit !== false && $errors == false)
        {
            if($id_ads = PlaceBillForm::save($type, $location, $currency_id, $price, $min_amount, $max_amount, $time_of_work, $comment, $expires_in, User::getUserIdFromSession()))
            {
                $result = true;
                Router::headerLocation("/cabinet/info?ads=$id_ads");
            }
        }
        require_once(ROOT.'/views/cabinet/placebill.php');
        return true;
    }
    
    public function actionEditAds($params)
    {
        if(User::isGuest())
        {
            Router::headerLocation();
        }
        
        $submit = $status = $location = $price = $currency_id = $min_amount = $max_amount = $time_of_work = $comment = $expires_in = false;
        extract($params['post'], EXTR_IF_EXISTS);
        
        $id_ads = isset($params['get']['ads'])? $params['get']['ads'] : false;
        $currency_id = Security::safe_idval($currency_id);
        $status = Security::safe_intval($status);
        
        $todayHtml = date("Y-m-d");
        $plusMonthHtml = date('Y-m-d', strtotime($todayHtml . '+1 month'));
        $plusYearHtml = date('Y-m-d', strtotime($todayHtml . '+1 year'));
        if (!PlaceBillForm::checkDateValid($expires_in))
        {
            $expires_in = $plusMonthHtml;
        }
        $dt = new DateTime($expires_in);
        $expires_in = $dt->format('Y-m-d');
        
        $errors = false;
        $result = false;

        if($id_ads !== false && Advertisement::getAdvertisementById($id_ads))
        {
            $ads = Advertisement::getAdvertisementById($id_ads);
            
            $type = $ads['type'];
            $user_id = $ads['user_id'];
            $expires_in = $ads['expires_in'];
            $status = $ads['status'];
            
            
            if(User::getUserIdFromSession() == $ads['user_id'] && $ads['status'] == 0)
            {
                if($submit)
               {
                 if($result = Advertisement::edit($id_ads, $type, $status, $location, $price, $currency_id, $min_amount, $max_amount, $time_of_work, $comment, $expires_in))
                {
                        Router::headerLocation('/cabinet?from=editSuccess');
                }
                else
                    $errors[] = 'Ошибка при обновлении бд';
              }
            }
            else
            {
                $errors[] = 'Доступ запрещён. Вы можете редактировать только свои активные объявления, на которые пока никто не согласился';
            }
        }
        else
        {
            $errors[] = 'Ошибка в id сообщения';
        }
        
        
        require_once(ROOT.'/views/cabinet/editAds.php');
        return true;
    }

    public function actionSupport($params)
    {
        if(User::isGuest())
        {
            Router::headerLocation();
        }

        $topic = $email = $message = false;
        extract($params['post'], EXTR_IF_EXISTS);

        $result = false;

        if($topic && $email && $message)
        {
            if(Ticket::createSupportTicket($topic, $email, $message, User::getUserIdFromSession()))
            {
                $result = true;
            }
        }

        require_once(ROOT.'/views/cabinet/support.php');
        return true;
    }

    public function actionActive()
    {
        if(User::isGuest())
        {
            Router::headerLocation();
        }

        $adses = Advertisement::getAdsesByUserId(User::getUserIdFromSession(), 0);

        require_once(ROOT.'/views/cabinet/active.php');
        return true;
    }

    public function actionDelAds($params)
    {
        if(User::isGuest())
        {
            Router::headerLocation();
        }
        
        $id_ads = isset($params['get']['ads']) ? $params['get']['ads'] : false;
        
        if($id_ads !== false && ($ads = Advertisement::getAdvertisementById($id_ads)))
        {
            if($ads['user_id'] == User::getUserIdFromSession())
            {
                Advertisement::deleteAdsByAdsId($id_ads);
            }
        }
        Router::headerLocation('/cabinet/active');
        return true;
    }

    public function actionRefill()
    {
        if(User::isGuest())
        {
            Router::headerLocation();
        }

        require_once(ROOT.'/views/cabinet/refill.php');
        return true;
    }

    public function actionWithdraw($params)
    {
        if(User::isGuest())
        {
            Router::headerLocation();
        }
        
        $amount = $address = false;
        extract($params['post'], EXTR_IF_EXISTS);
        
        $trans = $this->coinbase->getAccountTransactions();
        
        if($amount <= $this->coinbase->amount && Service::checkBTCaddress($address) != false && $address != $this->coinbase->address)
        {
            if($this->coinbase->sendBTCto($address, $amount))
            {
                echo 'send+';
            }
        }

        require_once(ROOT.'/views/cabinet/withdraw.php');
        return true;
    }

    public function actionAds()
    {
        if(User::isGuest())
        {
            Router::headerLocation();
        }
        require_once(ROOT.'/views/cabinet/pagelk3.php');
        return true;
    }
    
    public function actionAdses()
    {
        if(User::isGuest())
        {
            Router::headerLocation();
        }
        
        $adses = Advertisement::getAdsesByUserId(User::getUserIdFromSession());
        
        require_once(ROOT.'/views/cabinet/adses.php');
        return true;
    }
    public function actionStatistics()
    {
        if(User::isGuest())
        {
            Router::headerLocation();
        }
        
        $adses = Advertisement::getAdsesByUserId(User::getUserIdFromSession());
        
        require_once(ROOT.'/views/cabinet/statistics.php');
        return true;
    }
    public function actionInfo($params)
    {
        if(User::isGuest())
        {
            Router::headerLocation('/user/signup');
        }
        
        $router = new Router();

        $submit = $message = $dispute = $reason = false;
        extract($params['post'], EXTR_IF_EXISTS);
        $ads_id = isset($params['get']['ads']) ? $params['get']['ads'] : false;
        $ticketSend = isset($params['get']['ticketSend']) ? $params['get']['ticketSend'] : false;
        if($ads_id)
        {
            $ads = Advertisement::getAdvertisementById($ads_id);

            /* переменные для чата */
            $from_user_id = User::getUserIdFromSession();
            $to_user_id = isset($ads['user_id']) ? $ads['user_id'] : false;
            $to_user_id = Security::safe_idval($to_user_id, false);
            if($to_user_id !== false && User::checkUserExistsById($to_user_id))
            {
                $userTo = new User($to_user_id);
            }
            else
                $errors[] = 'Ошибка в id_ads';
            /* -------------------- */


            $author_ads = (int) $ads['user_id'];
            $loggined_user = (int) User::getUserIdFromSession();

            $isAuthor = $author_ads == $loggined_user ? true : false;
            if($isAuthor)
            {
                $agreement_ads_id = false;
            }
            else
            {
                $agreement_ads_id = Agreement::getAdsIdByFromTo($author_ads, $loggined_user);
            }

            if($ads_id == $agreement_ads_id && Agreement::getIsMoneyTransfered($ads_id))
            {
                Advertisement::setStatus(4, $ads_id);
            }

            if(Advertisement::getStatusByIdAds($ads_id) != 4 && Advertisement::getStatusByIdAds($ads_id) != -1)
            {
                $isMoneyTransfered = Agreement::getIsMoneyTransfered($ads_id);

                if($isAuthor) //я автор и
                {
                    if($ads['type'] == 1) //я хочу купить биткоины
                    {
                        $to_id = Agreement::getToIdByAds($ads_id); //я смотрю, кто нажал на кнопку "Я хочу перевести ему битки" (у него они пошли на резерв админу)
                        if($to_id)
                        {
                            Advertisement::setStatus(2, $ads_id);
                        }
                        //я перевожу вручную ему рубли на вебмини, и, когда это сделал, нажимаю на кнопку..
                        $confirm = isset($params['post']['confirm']) ? $params['post']['confirm'] : false; //.."я перевёл"
                        if($to_id && $confirm) //если я нажал на кнопку "я перевёл"..
                        {
                            if(Agreement::updateFromId($author_ads, $ads_id))
                            {
                                Advertisement::setStatus(3, $ads_id);
                                if($isMoneyTransfered) //..и НЕавтор согласился, что деньги ему пришли
                                {
                                    //if(Coinbase::sendBTCfromReserveTo($author_ads, $amountInBtc, $ads_id))
                                    //{
                                    Advertisement::setStatus(4, $ads_id);
                                    //}
                                    //else
                                    //{
                                    //    $errors[] = 'Проблема с переводом денег';
                                    //}
                                }
                            }
                            else
                            {
                                $errors[] = 'Что-то пошло не так при подтверждении';
                            }
                        }
                    }
                    elseif($ads['type'] == 2) // я автор и я хочу продать биткоины
                    {
                        $to_id = Agreement::getToIdByAds($ads_id); //я смотрю, кто нажал "я ему перевёл рубли"
                        if ($to_id)
                        {
                            Advertisement::setStatus(2, $ads_id);
                        }
                        $confirm = isset($params['post']['confirm']) ? $params['post']['confirm'] : false; //..и, если он их перевёл, нажимаю
                        if($confirm) //"Он перевёл мне рубли, перевести битки"
                        {
                            Advertisement::setStatus(3, $ads_id);
                            Agreement::updateFromId($author_ads, $ads_id);
                            Agreement::setIsMoneyTransfered($ads_id, true);
                            //if(Coinbase::sendBTCfromReserveTo($to_id, $amountInBtc, $ads_id))
                            //{

                            Advertisement::setStatus(4, $ads_id);
                            //}
                            //else
                            //{
                            //    $errors[] = 'Проблема с переводом денег';
                            //}
                        }
                    }
                }
                elseif(!$isAuthor) //если я не автор
                {
                    if($ads['type'] == 1) //и хочу продать битки автору
                    {
                        if((Agreement::getToIdByAds($ads_id)) == $loggined_user) //если я уже нажимал на "я хочу перевести ему битки"
                        {
                            Advertisement::setStatus(2, $ads_id);
                            
                            if (Agreement::getFromIdByAds($ads_id) == $author_ads)
                            {
                                Advertisement::setStatus(3, $ads_id);
                                $confirm = isset($params['post']['confirm']) ? $params['post']['confirm'] : false; //..и, если он перевёл рубли, нажимаю
                                if($confirm) //"перевести битки"
                                {
                                   Agreement::setIsMoneyTransfered($ads_id, true);
                                
                                //if(Coinbase::sendBTCfromReserve($author_ads, $amountInBtc, $ads_id))
                                //{
                                     Advertisement::setStatus(4, $ads);
                                //}
                                //else
                                //{
                                //    $errors[] = 'Проблема с переводом денег';
                                //}
                                }
                            }
                            
                        }
                        elseif(isset($params['post']['agree'])) //нажимаю на "я хочу перевести ему битки"
                        {
                            $coinbaseObj = new Coinbase();
                            if(!$coinbaseObj->checkBalanceNotNull())
                            {
                                $errors[] = 'Вы не можете согласиться, т.к. на кошельке нет минимальной суммы сделки';
                            }
                            else
                            {
                                //BTCgoToReserve
                                Agreement::updateToId($loggined_user, $ads_id);
                                Advertisement::setStatus(2, $ads_id);
                            }
                        }
                    }
                    elseif($ads['type'] == 2) //если я не автор и хочу купить бтк
                    {
                        if((Agreement::getToIdByAds($ads_id)) == $loggined_user) //если я уже нажимал на "я хочу перевести ему рубли"
                        {   
                            if (Agreement::getFromIdByAds($ads_id) == $author_ads) //и он согласился,что я ему перевёл оубли
                            {
                                Advertisement::setStatus(3, $ads_id);
                                
                                   Agreement::setIsMoneyTransfered($ads_id, true);
                                
                                //if(Coinbase::sendBTCfromReserve($loggined_user, $amountInBtc, $ads_id))
                                //{
                                     Advertisement::setStatus(4, $ads);
                                //}
                                //else
                                //{
                                //    $errors[] = 'Проблема с переводом денег';
                                //}
                                
                            }
                            
                        }
                        elseif(isset($params['post']['agree'])) //нажимаю на "я хочу перевести ему рубли"
                        {
                                Agreement::updateToId($loggined_user, $ads_id);
                                Advertisement::setStatus(2, $ads_id);
                            
                        }
                    }
                }
            }
            elseif(Advertisement::getStatusByIdAds($ads_id) == -1)
            {
                $errors[] = 'Объявление неактивно. Вы не можете производить с ним какие-либо манипуляции. Обратитесь в <a href="/cabinet/support">службу поддержки</a>';
            }


            if($submit !== false && $message != false && !empty(trim($message)) && $to_user_id !== false)
            {
                if(Messages::saveMessage($message, $from_user_id, $to_user_id, $ads_id))
                {
                    Router::headerLocation('/'.$router->getParsedURI()['address']."?ads=$ads_id");
                }
            }
            
            $messages = Messages::getMessagesByIdsUsers($from_user_id, $to_user_id, $ads_id);
            
            if($dispute !== false && $reason !== false)
            {
                if(Ticket::create($reason, $loggined_user, $ads_id))
                { 
                    Router::headerLocation('/'.$router->getParsedURI()['address'].'?ticketSend=1&ads='.$ads_id);
                }
                else Router::headerLocation ('/'.$router->getParsedURI()['address'].'?ticketSend=0&ads='.$ads_id);
            }
        }
        else
        {
            $errors[] = 'Ошибка в ads_id';
        }

        require_once(ROOT.'/views/cabinet/info.php');
        return true;
    }
}