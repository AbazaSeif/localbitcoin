<?php

defined('_JEXEC') or die('Restricted access');

class User
{

    public $id_user;
    public $username;
    public $email;
    public $phone;
    private $password;
    public $role;
    public $count_of_deals;
    public $transaction_volume;
    public $language;
    public $created_on;
    public $verify_string;
    public $verified;
    public $blocked;

    function __construct()
    {
        $args = func_get_args();
        $numArgs = func_num_args();
        if(method_exists($this, $func = "__construct$numArgs"))
        {
            call_user_func_array(array($this, $func), $args);
        }
    }

    private function __construct1($idUser)
    {
        return $this->setUserDataById($idUser);
    }

    private function __construct4($username, $email, $phone, $password)
    {
        return $this->setUserData($username, $email, $phone, $password);
    }

    public function setUserData($username, $email, $phone, $password, $role = 1)
    {
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->role = $role;
        return $this;
    }

    /**
     * Регистрация пользователя 
     * @param string $username <p>Имя</p>
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public function register()
    {
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $verify_string = EmailActivation::generateVerifyString();
        $sql = 'INSERT INTO users (username, email, phone, password, created_on, verify_string, verified)'
                .' VALUES (:username, :email, :phone, :password, NOW(), :verify_string, 0)';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':username', $this->username, PDO::PARAM_STR);
        $result->bindParam(':email', $this->email, PDO::PARAM_STR);
        $result->bindParam(':phone', $this->phone, PDO::PARAM_INT);
        $result->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $result->bindParam(':verify_string', $verify_string, PDO::PARAM_STR);
        
        if($result->execute())
        {
            $this->id_user = $GLOBALS['DBH']->lastInsertId();
            EmailActivation::sendEmail($this->email, $verify_string);
            return $this;
        }
        else
            return false;
    }

    /**
     * Редактирование данных пользователя
     * @param integer $id_user <p>id пользователя</p>
     * @param string $name <p>Имя</p>
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function edit($id_user, $username, $email, $blocked, $verified, $role)
    {
        $sql = "UPDATE users 
            SET username = :username, email = :email, blocked = :blocked, verified = :verified, role = :role
            WHERE id_user = :id_user";
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':blocked', $blocked, PDO::PARAM_INT);
        $result->bindParam(':verified', $verified, PDO::PARAM_INT);
        $result->bindParam(':role', $role, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function deleteUserById($id_user)
    {
        $sql = 'DELETE FROM users WHERE id_user = :id_user';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return mixed : integer user id or false
     */
    
    static function getTFACode($len = 6) {
        $b = "QWERTYUPASDFGHJKLZXCVBNMqwertyuopasdfghjkzxcvbnm123456789";
        $s = "";
        while ($len-- > 0)
        {
            $s .= $b[mt_rand(0, strlen($b))];
        }  
        return $s;
    }

    public static function checkDataForLogin($username, $password)
    {
        $sql = 'SELECT password, id_user FROM users WHERE username = :username';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->execute();

        $row = $result->fetch();

        if(is_array($row))
        {
            //echo "is array row";
            if(password_verify($password, $row['password']))
            {
                //echo 'pass verify';
                return $row['id_user'];
            }
            else
            {
                //echo 'false1';
                return false;
            }
        }
        //echo 'false2';
        else
            return false;
    }

    public static function updateUserAdses($user_id)
    {
        $count_of_deals = Advertisement::getCountOfUserAds($user_id);
        $sql = 'UPDATE users SET count_of_deals=:count_of_deals WHERE id_user=:user_id';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':count_of_deals', $count_of_deals, PDO::PARAM_INT);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Запоминаем пользователя
     * @param integer $userId <p>id пользователя</p>
     */
    public static function auth($userId)
    {
        $_SESSION['id_user'] = $userId;
        $user = new User($userId);
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
    }

    /**
     * Возвращает идентификатор пользователя, если он авторизирован.<br/>
     * Иначе перенаправляет на страницу входа
     * @return string <p>Идентификатор пользователя</p>
     */
    public static function getUserIdFromSession()
    {
        if(isset($_SESSION['id_user']))
        {
            return $_SESSION['id_user'];
        }
        else
            return false;
        //header("Location: /user/login");
    }

    /**
     * Проверяет является ли пользователь гостем
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function isGuest()
    {
        if(isset($_SESSION['id_user']))
        {
            return false;
        }
        else
            return true;
    }

    public static function getUsersList()
    {
        $result = $GLOBALS['DBH']->query('SELECT * FROM users');
        $usersList = array();
        $i = 0;
        while ($row = $result->fetch())
        {
            $usersList[$i]['id_user'] = $row['id_user'];
            $usersList[$i]['username'] = $row['username'];
            $usersList[$i]['email'] = $row['email'];
            $usersList[$i]['phone'] = $row['phone'];
            $usersList[$i]['password'] = $row['password'];
            $usersList[$i]['role'] = $row['role'];
            $usersList[$i]['count_of_deals'] = $row['count_of_deals'];
            $usersList[$i]['transaction_volume'] = $row['transaction_volume'];
            $usersList[$i]['language'] = $row['language'];
            //$usersList[$i]['deal_ids'] = $row['deal_ids'];
            $usersList[$i]['created_on'] = $row['created_on'];
            $usersList[$i]['verify_string'] = $row['verify_string'];
            $usersList[$i]['verified'] = $row['verified'];
            $usersList[$i]['blocked'] = $row['blocked'];
            $i++;
        }
        return $usersList;
    }

    public static function isAdmin($id_user = null)
    {
        if($id_user === null)
        {
            if(isset($_SESSION['id_user']))
            {
                $id_user = $_SESSION['id_user'];
            }
            else
                return false;
        }
        $user = new User($id_user);
        if($user->role == 2)
            return true;

        return false;
    }

    /**
     * Проверяет телефон: не меньше, чем 10 символов
     * @param string $phone <p>Телефон</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkPhone($phone)
    {
        if(strlen($phone) >= 10)
        {
            return '';
        }
        return 'Неверный телефон';
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public function checkPassword()
    {
        if(strlen($this->password) >= 6)
        {
            return '';
        }
        return 'Пароль не должен быть короче 6-ти символов';
    }

    public function checkPin()
    {
        if(is_int((int) $this->pin) && strlen($this->pin) == self::PIN_LENGTH)
        {
            return '';
        }
        return 'PIN - это '.self::PIN_LENGTH.' цифр, которые вы должны запомнить'; //Пин должен состоять из четырёх цифр
    }

    /**
     * Проверяет email
     * @param string $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public function checkEmail()
    {
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            return '';
        }
        return 'Неправильный email';
    }

    /**
     * Проверяет не занят ли email другим пользователем
     * @param type $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkEmailExists($email)
    {
        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return true;
        else
            return false;
    }

    public static function checkUsernameExists($username)
    {
        $sql = 'SELECT COUNT(*) FROM users WHERE username = :username';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return true;
        else
            return false;
    }
    
    public static function GetUsermailByAdsid($ads_id)
    {
        $sql = 'SELECT `email` FROM `users`  INNER JOIN advertisements ON `user_id` = `id_user` WHERE `id_advertisement` = :ads_id';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':ads_id', $ads_id, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch();
        if (is_array($row)) {
            return $row['email'];
        }
    }

    public static function checkUserExistsById($id_user)
    {
        $sql = 'SELECT COUNT(*) FROM users WHERE id_user = :id_user';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return true;
        else
            return false;
    }

    public static function verify($email, $verify_string)
    {
        $sql = 'UPDATE users SET verified = 1 WHERE email = :email AND verify_string = :verify_string AND verified = 0';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':verify_string', $verify_string, PDO::PARAM_STR);
        $result->execute();
        if($result->rowCount())
        {
            return true;
        }
        else
            return false;
    }

    public static function changePassword($idUser)
    {
        $new_password = '';
        for($i = 0; $i < 8; $i++)
        {
            $new_password .= chr(mt_rand(33, 126));
        }
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $sql = 'UPDATE users SET password = :password WHERE id_user = :id_user';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':password', $new_password, PDO::PARAM_STR);
        $result->bindParam(':id_user', $idUser, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Возвращает пользователя с указанным id
     * @param integer $id <p>id пользователя</p>
     * @return array <p>Массив с информацией о пользователе</p>
     */
    private function setUserDataById($id, $userParam = false)
    {
        $sql = 'SELECT * FROM users WHERE id_user = :id_user';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_user', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $row = $result->fetch();
        if(is_array($row))
        {
            if($userParam === false)
            {
                foreach($row as $key => $value)
                {
                    if(property_exists($this, $key))
                    {
                        $this->{$key} = $value;
                    }
                }
            }
            else
            {
                if(property_exists($this, $userParam))
                {
                    $this->{$userParam} = $row[$userParam];
                }
            }
            return $this;
        }
        else
            return false;
    }
    
    public static function  getUsernameByMsgid($id_msg)
    {
        $sql = "SELECT `username` FROM `users` INNER JOIN `support` ON `users`.`id_user` = `support`.`user_id` "
                . "WHERE `support`.`id_msg` = :id_msg";
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_msg', $id_msg, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $row = $result->fetch();
        if (is_array($row)) {
            return $row['username'];
        }
    }
    
    public static function getMailById($id_usr)
    {
        $sql = "SELECT `email` FROM `users` WHERE `id_user` = :id_user";
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_user', $id_usr, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $row = $result->fetch();
        if (is_array($row)) {
            return $row['email'];
        }
    }

    public static function getUseridByMsgid($id_msg)
    {
        $sql = "SELECT `id_user` FROM `users` INNER JOIN `support` ON `users`.`id_user` = `support`.`user_id` "
                . "WHERE `support`.`id_msg` = :id_msg";
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_msg', $id_msg, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $row = $result->fetch();
        if (is_array($row)) {
            return $row['id_user'];
        }
    }

    public static function getUsernameById($id_user = false)
    {
        $id_user = $id_user == false ? User::getUserIdFromSession() : $id_user;
        $id_user = Security::safe_idval($id_user, false);

        if($id_user)
        {
            $sql = 'SELECT username FROM users WHERE id_user = :id_user';

            $result = $GLOBALS['DBH']->prepare($sql);
            $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            $row = $result->fetch();
            if(is_array($row))
            {
                return $row['username'];
            }
        }
        else
        {
            return '';
        }
    }

    public static function getStrVerifiedOrBlocked($nullOrOne)
    {
        switch ($nullOrOne)
        {
            case 1:
                return 'Да';
                break;
            case 0:
                return 'Нет';
                break;
            default:
                return false;
                break;
        }
    }
    
    public static function setOnline($id_user)
    {
        $time = time();
        $sql = 'UPDATE `users` SET `online`= :time WHERE `id_user` = :id_user';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $result->bindParam(':time', $time, PDO::PARAM_INT);
        $result->execute();
        return true;
    }
    
    public static function isOnline($id_user)
    {
        $time = time();
        $sql = 'SELECT `online` FROM `users` WHERE `id_user` = :id_user';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $row = $result->fetch();
        if(is_array($row))
        {
            return (($time-$row['online']) >600)?false:true;
        }
    }
    
    public static function enableTFA()
    {
        $sql = 'UPDATE `users` SET `tfa`= 1 WHERE `id_user` = :id_user';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_INT);
        $result->execute();
        return true;
    }
    
    public static function disableTFA()
    {
        $sql = 'UPDATE `users` SET `tfa`= 0 WHERE `id_user` = :id_user';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_INT);
        $result->execute();
        return true;
    }
    
    public static function isEnableTFA($id_user = false)
    {
        $sql = 'SELECT `tfa` FROM `users` WHERE `id_user` = :id_user';
        $result = $GLOBALS['DBH']->prepare($sql);
        if(!$id_user)
        {
            $result->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_INT);
        }
        else
        {
            $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        }
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $row = $result->fetch();
        if(is_array($row))
        {
            return ($row['tfa'] == 0)?false:true;
        }
    }
    
    public static function setTFACode()
    {
        $code = User::getTFACode(5);
        $sql = 'UPDATE `users` SET `tfa_code`= :code WHERE `id_user` = :id_user';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_user', $_SESSION['possible_id'], PDO::PARAM_INT);
        $result->bindParam(':code', $code, PDO::PARAM_STR);
        $result->execute();
        return $code;
    }
    
    public static function checkTFACode($code)
    {
        $sql = 'SELECT `tfa_code` FROM `users` WHERE `id_user` = :id_user';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_user', $_SESSION['possible_id'], PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $row = $result->fetch();
        if(is_array($row))
        {
            return ($row['tfa_code'] == $code)?true:false;
        }
    }

    public static function addComment($sender_id, $receiver_id, $content) 
    {
        $comm_date = date("Y-m-d H:i:s");

        $sql_add_comm = "INSERT INTO `comments` (sender_id, receiver_id, content, comm_date)"." VALUES ($sender_id, $receiver_id, '$content', '$comm_date')";

        $result = $GLOBALS['DBH']->prepare($sql_add_comm);
        $result->bindParam(':sender_id', $sender_id, PDO::PARAM_INT);
        $result->bindParam(':receiver_id', $receiver_id, PDO::PARAM_INT);
        $result->bindParam(':content', $content, PDO::PARAM_STR);

        if($result->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    public static function getUserByUsername($username)
    {
        $sql_id = 'SELECT id_user,username,email,phone,count_of_deals FROM users WHERE username=\''.$username.'\'';

        $result = $GLOBALS['DBH']->prepare($sql_id);
        $result->execute();
        $row = $result->fetch();
        return $row;
    }

    public static function getUserCommentsById($id) 
    {
        $sql_deals = 'SELECT * FROM comments WHERE receiver_id=\''.$id.'\'';

        $result = $GLOBALS['DBH']->prepare($sql_deals);
        $result->execute();
        $all_comments = array();

        while($row = $result->fetch())
        {
            $all_comments[] = $row;
        }

        return $all_comments;
    }
}
