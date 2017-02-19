<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Users</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="../../template/bit.team/assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="../../template/bit.team/assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="../../template/bit.team/assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <style>
      .container-lk-1{
          padding-bottom: 20px;
      }
      .text-lk-add{
          margin-right: 10px;
      }
      .rm-cart{
          color: #428bca;
      }
      .rm-cart:hover{
          cursor: pointer;
      }
  </style>
</head>
<body>
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/admin">Binary admin</a> 
      </div>
      <div style="color: white;
      padding: 15px 50px 5px 50px;
      float: right;
      font-size: 16px;"> <a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a> </div>
    </nav>   
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li class="text-center">
            <img src="../../template/bit.team/assets/img/find_user.png" class="user-image img-responsive"/>
          </li>
          <li>
            <a href="/admin"><i class="fa fa-dashboard fa-3x"></i> Статистика</a>
          </li>
          <li>
            <a class="active-menu" href="/admin/users"><i class="fa fa-users fa-3x" aria-hidden="true"></i> Пользователи</a>
          </li>
          <li>
              <a href="/admin/recall"><i class="fa fa-comments fa-3x" aria-hidden="true"></i> Отзывы</a>
          </li>
          <li>
            <a href="/admin/ads"><i class="fa fa-desktop fa-3x"></i> Объявления</a>
          </li>
          <li>
            <a href="/admin/messages"><i class="fa fa-envelope-o fa-3x"></i> Сообщения</a>
          </li>
          <li>
            <a href="/admin/tickets"><i class="fa fa-ticket fa-3x"></i> Арбитраж</a>
          </li> 
          <li  >
            <a href="/admin/support"><i class="fa fa-question-circle fa-3x"></i> Поддержка</a>
          </li>
          <li  >
            <a href="/admin/wallets"><i class="fa fa-archive fa-3x"></i> Резерв</a>
          </li>       
        </ul>
      </div>            
    </nav>  
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
      <div id="page-inner">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                Пользователи
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Ads</th>
                        <th>Объявления</th>
                        <th>Сообщения</th>
                        <th>Отзывы</th>
                        <th>Active</th>
                        <th>Blocked?</th>
                        <th>Admin?</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($usersList as $user): ?>
                        <tr>
                            <td><?php echo $user['id_user']; ?></td>
                            <td class="login"><?php echo $user['username']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['count_of_deals']; ?></td>
                            <td><a href="/admin/ads?user_id=<?php echo $user['id_user']; ?>" title="Найти все объявления юзера"><i class="fa fa-search"></i> Показать</a></td>
                            <td><a href="/admin/messages?user_id=<?php echo $user['id_user']; ?>" title="Найти все сообщения юзера"><i class="fa fa-search"></i> Найти</a></td>
                            <td><a href="/admin/recall?user_id=<?php echo $user['id_user']; ?>" title="Найти все отзы о пользователе"><i class="fa fa-search"></i> Показать</a></td>
                            <td><?php echo User::getStrVerifiedOrBlocked($user['verified']); ?></td>
                            <td><?php echo User::getStrVerifiedOrBlocked($user['blocked']); ?></td>
                            <td><?php User::isAdmin($user['id_user'])? print 'Да' : print 'Нет';?></td>
                            <td><button onclick="change_user(this)" class="bt-clear-delete" title="Редактировать" data-toggle="modal" data-target="#edit"><i class="fa fa-pencil-square-o"></i></button></td>
                            <td><button onclick="document.getElementById('user_id').value = <?= $user['id_user']?> " class="bt-clear-delete" title="Удалить" data-toggle="modal" data-target="#delete"><i class="fa fa-times"></i></button></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                    <input type="hidden" id="selectedlogin" value="">
                    <div style="display: none;" id="commission">Коммиссия на вывод: <input id="commission-value" style="width: 40px;" type="number" value="5"></div>
                    <div id="pay_systems" style="display: none;padding-bottom: 10px;">Платежные системы:</div>
                    <div id="cards">
                    </div>
                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel">Удалить</h4>
                        </div>
                        <div class="modal-body">
                          Вы действительно хотите <strong>удалить</strong> этого юзера?<br>
                          Будут удалены все его объявления, а также сообщения в чатах других пользователей
                        </div>
                        <div class="modal-footer">
                          <form method="POST">
                            <button type="button" style="outline: none;" class="btn btn-primary" data-dismiss="modal">Отмена</button>
                            <input type="hidden" id="user_id" name="user_id" value="10">
                            <button type="submit" style="outline: none;" class="btn btn-danger">Удалить</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="POST" role="form">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Редактировать</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label class="text-danger">Заблокировать bitcoin-счёт юзера</label>
                              <select class="form-control" name="blocked" id="blocked">
                                <option value="0">Нет</option>
                                <option value="1">Да</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Логин</label>
                              <input class="form-control" name="username" id="username" />
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" name="email" id="email" />
                            </div>
                            <div class="form-group">
                              <label>Email активирован?</label>
                              <select class="form-control" name="verified" id="verified">
                                <option value="0">Нет</option>
                                <option value="1">Да</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Администратор?</label>
                              <select class="form-control" name="role" id="role">
                                <option value="1">Нет</option>
                                <option value="2">Да</option>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" style="outline: none;" class="btn btn-primary" data-dismiss="modal">Отмена</button>
                            <input type="hidden" id="edit_user_id" name="user_id" value="10">
                            <button type="submit" style="outline: none;" class="btn btn-warning">Редактировать</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <!-- /. ROW  -->
        <hr />

      </div>
      <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
  </div>
  <!-- /. WRAPPER  -->
  <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
  <!-- JQUERY SCRIPTS -->
  <script src="../../template/bit.team/assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="../../template/bit.team/assets/js/bootstrap.min.js"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="../../template/bit.team/assets/js/jquery.metisMenu.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="../../template/bit.team/assets/js/custom.js"></script>
</body>
</html>