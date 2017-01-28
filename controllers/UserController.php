<?php
defined('_JEXEC') or die('Restricted access');

class UserController
{

    private $html_heading = array(
        'title' => SITE_NAME,
        'css' => '',
        'js' => ''
    );

    public function actionSignup($params)
    {
        if(!User::isGuest() && !User::isAdmin())
        {
            Router::headerLocation();
        }
        $username = $email = $phone = $password = $password2 = false;
        $submit = false;
        extract($params['post'], EXTR_IF_EXISTS);
        if(isset($params['post']['g-recaptcha-response']))
        {
            $response = $params['post']['g-recaptcha-response'];
        }
        $result = false;

        if (!empty($submit)&&!$errors = SignupForm::validateInput($username, $email, $phone, $password, $password2, $response)) {
            $user = new User($username, $email, $phone, $password);
            if ($user->register()) {
                Service::timeEvents();
                $result = true;
            } else
            {
                $errors[] = 'Что-то пошло не так при записи пользователя в базу данных';
            }
                
        }
        $signup = true;
        require_once(ROOT.'/views/user/signup.php');
        return true;
    }

    public function actionSignin($params)
    {        
        $username = false;
        $password = false;
        //$submitLogin = false;
        extract($params['post'], EXTR_IF_EXISTS);
        if(isset($params['post']['g-recaptcha-response']))
        {
            $response = $params['post']['g-recaptcha-response'];
            require_once 'components/recaptchalib.php';
            $reCaptcha = new ReCaptcha("6LfJDRMUAAAAAPMoEPoKOa88SIykGLbqnSWAu3av");
            $resp = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $response);
        }
        if(isset($response)&&!$resp->success)
        {
            $errors = false;
            $errors[] = 'Вы робот?';
        }
        else if($username && $password)
        {
            $idUser = User::checkDataForLogin($username, $password);
            if($idUser !== false)
            {
                $user = new User($idUser);
                if($user->verified != 0)
                {
                    if(User::isEnableTFA($idUser))
                    {
                        $_SESSION['possible_id'] = $idUser;
                        Router::headerLocation('/user/continue');
                    }
                    else
                    {
                        User::auth($idUser);
                        User::updateUserAdses($idUser);
                        Router::headerLocation('/cabinet/placebill');
                    }
                }
                else
                {
                    $errors[] = 'Данные верны, однако e-mail не подтверждён. Зайдите на почту, указанную при регистрации, и активируйте аккаунт';
                }
            }
            else
            {
                $errors[] = 'Неправильные данные для входа';
            }
        }
        else
            $errors[] = 'Данные для входа не отосланы на сервер, попробуйте ещё раз';
        require_once(ROOT.'/views/user/signin.php');
        return true;
    }

    public function actionSignout()
    {
        unset($_SESSION["id_user"]);
        unset($_SESSION["username"]);
        unset($_SESSION["email"]);
        Router::headerLocation();
    }

    public function actionVerify($params)
    {
        $email = false;
        $verify_string = false;
        extract($params['get'], EXTR_IF_EXISTS);

        $result = false;

        if(($email && $verify_string) === true)
        {
            if(User::verify($email, $verify_string))
            {
                $result = true;
            }
        }

        require_once(ROOT.'/views/user/verify.php');
        return true;
    }

    public function actionPasswordRecovery($params)
    {
        $email = false;
        $submitted = false;
        extract($params['post'], EXTR_IF_EXISTS);
        $result = false;
        
        if($submitted)
        {
            if(User::changePassword($idUser))
            {
                
            }
        }
    }
    
    public function actionLogin($params)
    {
        $login = true;
        require_once(ROOT.'/views/user/login.php');
        return true;
    }
    
    public function actionContinue($params)
    {
        $code = false;
        extract($params['post'], EXTR_IF_EXISTS);
        if(!$code&&isset($_SESSION['possible_id']))
        {
            EmailActivation::sendTFACode(User::getMailById($_SESSION['possible_id']) ,User::setTFACode());;
        }
        else if($code)
        {
            if(isset($_SESSION['possible_id'])&&User::checkTFACode($code))
            {
                $idUser = $_SESSION['possible_id'];
                $user = new User($idUser);
                User::auth($idUser);
                User::updateUserAdses($idUser);
                Router::headerLocation('/cabinet/placebill');
            }
            else
            {
                $errors[] = 'Неправильный проверочный код';
            }
        }
        require_once(ROOT.'/views/user/continue.php');
        return true;
    }
}
