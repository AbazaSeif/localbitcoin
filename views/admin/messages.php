<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Messages</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="../../template/bit.team/assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="../../template/bit.team/assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="../../template/bit.team/assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
      font-size: 16px;"><a href="/admin/logout" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
            <a href="/admin/users"><i class="fa fa-users fa-3x" aria-hidden="true"></i> Пользователи</a>
          </li>
          <li>
            <a href="/admin/ads"><i class="fa fa-desktop fa-3x"></i> Объявления</a>
          </li>
          <li>
            <a class="active-menu" href="/admin/messages"><i class="fa fa-envelope-o fa-3x"></i> Сообщения</a>
          </li>
          <li  >
            <a href="/admin/tickets"><i class="fa fa-ticket fa-3x"></i> Тикеты</a>
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
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Сообщения
                </div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Объявление</th>
                          <th>Сообщение</th>
                          <th>Кому</th>
                          <th>Создано</th>
                          <!-- <th></th> -->
                          <th></th>
                        </tr>
                        <?php foreach($messages as $message): ?>
                          <tr>
                            <td><?php echo $message['id_message']; ?></td>
                            <td><a href="/cabinet/info?ads=<?php echo $message['ads_id']; ?>" target="_blank" title="Просмотр"><i class="fa fa-external-link"></i> Перейти</a></td>
                            <td><?php echo $message['message']; ?></td>
                            <td><?php echo User::getUsernameById($message['to_user_id']); ?></td>
                            <td><?php echo $message['created_on']; ?></td>
                            <td><button onclick="document.getElementById('id_msg').value = <?= $message['id_message']; ?> " class="bt-clear-delete" title="Удалить" data-toggle="modal" data-target="#delete"><i class="fa fa-times"></i></button></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Удалить</h4>
                          </div>
                          <div class="modal-body">
                            Вы действительно хотите <strong>удалить</strong> это сообщение?<br>
                            Отменить действие будет будет невозможно
                          </div>
                          <div class="modal-footer">
                            <form method="POST">
                              <button type="button" style="outline: none;" class="btn btn-primary" data-dismiss="modal">Отмена</button>
                              <input type="hidden" id="id_msg" name="id_msg" value="10">
                              <button type="submit" style="outline: none;" class="btn btn-danger">Удалить</button>
                            </form>
                          </div>
                        </div>
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