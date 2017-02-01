<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Support</title>
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
      font-size: 16px;"><a href="admin/logout" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
            <a href="/admin/messages"><i class="fa fa-envelope-o fa-3x"></i> Сообщения</a>
          </li>
          <li  >
            <a href="/admin/tickets"><i class="fa fa-ticket fa-3x"></i> Тикеты</a>
          </li> 
          <li  >
            <a class="active-menu" href="/admin/support"><i class="fa fa-question-circle fa-3x"></i> Поддержка</a>
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
                Поддержка
                <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a onclick="location.reload()">
                                            <i class="fa fa-refresh fa-fw"></i>Refresh
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="#">
                                            <i class="fa fa-check-circle fa-fw"></i>Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-times fa-fw"></i>Busy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-clock-o fa-fw"></i>Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-sign-out fa-fw"></i>Sign Out
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
              </div>
              <div class="panel-body">
                <?php if(!isset($msglist)){ ?>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                      <tr>
                        <th>От</th>
                        <th>Количество</th>
                        <th>Создан</th>
                        <th>подробнее</th>
                        <th>закрыть</th>
                      </tr>
                      <?php foreach ($ticketsList as $ticket): ?>
                        <tr>
                          <td><?php echo $ticket['username']; ?></td>
                          <td><?php echo $ticket['count']; ?></td>
                          <td><?php echo $ticket['created']; ?></td>
                          <td><a href="/admin/support?id_msg=<?php echo $ticket['id_msg']; ?>" title="Подробнее"><i class="fa fa-info"></i> Просмотр</a></td>
                          <td><button onclick="document.getElementById('id_msg').value = <?= $ticket['id_msg']; ?> " class="bt-clear-delete" title="Удалить" data-toggle="modal" data-target="#delete"><i class="fa fa-times"></i></button></td>
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
                          Вы действительно хотите <strong>закрыть</strong> этот вопрос?<br>
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
                <?php }else{ ?>
                <div class="panel-body">
                  <ul class="chat-box">
                    <?php foreach ($msglist as $key): ?>
                    <li class="<?= $key['user_id']==0?'right':'left'; ?>clearfix">
                      <span class="chat-img pull-<?= $key['user_id']==0?'right':'left'; ?>">
                        <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                      </span>
                      <div class="chat-body">                                        
                        <strong <?= $key['user_id']==0?'class="pull-right"':''; ?>><?= $key['user_id']==0?'Admin':$username; ?></strong>
                        <small class="pull-<?= $key['user_id']==0?'left':'right'; ?> text-muted">
                          <i class="fa fa-clock-o fa-fw"></i><?= $key['created_on'] ?>
                        </small>                                      
                        <p <?= $key['user_id']==0?'style="padding-top: 50px;"':''; ?> >
                          <?= $key['message'] ?>
                        </p>
                      </div>
                    </li>
                    <?php endforeach;?>
                    </ul>
                  </div>
                  <div class="panel-footer">
                    <form class="input-group" method="POST">
                      <input name="message" id="btn-input" type="text" class="form-control input-sm" placeholder="Напишите ваше сообщение, чтобы отправить..." />
                      <span class="input-group-btn">
                        <button class="btn btn-warning btn-sm" id="btn-chat">
                          Отправить
                        </button>
                      </span>
                    </form>
                  </div>
                  <?php } ?>
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