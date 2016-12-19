<?php

defined('_JEXEC') or die('Restricted access');

class AdminUserController extends AdminBase
{

    public function actionIndex()
    {
        self::adminAccessLimiter();

        $usersList = User::getUsersList();

        require_once(ROOT.'/views/admin/user/index.php');
        return true;
    }

    /*
      public function actionCreate()
      {
      // Проверка доступа
      self::checkAdmin();

      // Получаем список категорий для выпадающего списка
      $categoriesList = Category::getCategoriesListAdmin();

      // Обработка формы
      if (isset($_POST['submit'])) {
      // Если форма отправлена
      // Получаем данные из формы
      $options['name'] = $_POST['name'];
      $options['code'] = $_POST['code'];
      $options['price'] = $_POST['price'];
      $options['category_id'] = $_POST['category_id'];
      $options['brand'] = $_POST['brand'];
      $options['availability'] = $_POST['availability'];
      $options['description'] = $_POST['description'];
      $options['is_new'] = $_POST['is_new'];
      $options['is_recommended'] = $_POST['is_recommended'];
      $options['status'] = $_POST['status'];

      // Флаг ошибок в форме
      $errors = false;

      // При необходимости можно валидировать значения нужным образом
      if (!isset($options['name']) || empty($options['name'])) {
      $errors[] = 'Заполните поля';
      }

      if ($errors == false) {
      // Если ошибок нет
      // Добавляем новый товар
      $id = Product::createProduct($options);

      // Если запись добавлена
      if ($id) {
      // Проверим, загружалось ли через форму изображение
      if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
      // Если загружалось, переместим его в нужную папке, дадим новое имя
      move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
      }
      };

      // Перенаправляем пользователя на страницу управлениями товарами
      header("Location: /admin/product");
      }
      }

      // Подключаем вид
      require_once(ROOT . '/views/admin_product/create.php');
      return true;
      }
     */

    public function actionUpdate($params)
    {
        self::adminAccessLimiter();

        $submit = $username = $email = $blocked = $verified = $role = false;
        extract($params['post'], EXTR_IF_EXISTS);
        $id_user = isset($params['get']['id_user']) ? $params['get']['id_user'] : false;
        if($id_user !== false && User::checkUserExistsById($id_user))
        {
            $user = new User($id_user);

            if(!empty($submit))
            {
                if($result = User::edit($id_user, $username, $email, $blocked, $verified, $role))
                {
                    Router::headerLocation('/adminUser');
                }
                else
                    $errors[] = 'Ошибка при обновлении бд';
            }
        }
        else
        {
            $errors[] = 'Ошибка в id юзера';
        }

        require_once(ROOT.'/views/admin/user/update.php');
        return true;
    }

    public function actionDelete($params)
    {
        self::adminAccessLimiter();

        $submit = isset($params['post']['submit']) ? $params['post']['submit'] : false;
        $id_user = isset($params['get']['id_user']) ? $params['get']['id_user'] : false;


        if($id_user !== false && User::checkUserExistsById($id_user))
        {
            $user = new User($id_user);
            
            if($submit != false)
            {
                if(User::deleteUserById($id_user) && Advertisement::deleteAdsesByUserId($id_user) && Messages::deleteMessagesByFromUserId($from_user_id))
                {
                    Router::headerLocation('/adminUser');
                }
                
            }
        }
        else $errors[] = 'Неверный id';

        require_once(ROOT.'/views/admin/user/delete.php');
        return true;
    }

}
