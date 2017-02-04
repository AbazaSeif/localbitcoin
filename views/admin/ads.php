<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Объявления</title>
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
      font-size: 16px;"><a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
              <a href="/admin/recall"><i class="fa fa-comments fa-3x" aria-hidden="true"></i> Отзывы</a>
          </li>
          <li>
            <a class="active-menu" href="/admin/ads"><i class="fa fa-desktop fa-3x"></i> Объявления</a>
          </li>
          <li>
            <a href="/admin/messages"><i class="fa fa-envelope-o fa-3x"></i> Сообщения</a>
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
            <div class="panel panel-default">
              <div class="panel-heading">
                Объявления
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Разместил</th>
                        <th>Тип</th>
                        <th>Город</th>
                        <th>Цена (валюта за 1BTC)</th>
                        <th>Max</th>
                        <th>Чат обявления</th>
                        <th></th>
                        <th></th>
                      </tr>
                      <?php foreach ($adsesList as $ads): ?>
                        <tr>
                          <td><?php echo $ads['id_advertisement']; ?></td>
                          <td><?php echo User::getUsernameById($ads['user_id']); ?></td>
                          <td><?php echo Advertisement::getStringType($ads['type']); ?></td>
                          <td><?php echo $ads['location']; ?></td>
                          <td><?php echo $ads['price'], ' ', Currency::getSymbol($ads['currency_id']), ' /BTC '; ?></td>
                          <td><?php echo $ads['max_amount'], ' ', Currency::getSymbol($ads['currency_id']); ?></td>
                          <td><a href="/admin/messages?ads_id=<?php echo $ads['id_advertisement']; ?>" title="Найти все сообщения по объявлению"><i class="fa fa-search"></i> Показать</a></td>
                          <td><button onclick="change_ads(this)" class="bt-clear-delete" title="Редактировать" data-toggle="modal" data-target="#edit"><i class="fa fa-pencil-square-o"></i></button></td>
                          <td><button onclick="document.getElementById('id_ads').value = <?= $ads['id_advertisement']; ?> " class="bt-clear-delete" title="Удалить" data-toggle="modal" data-target="#delete"><i class="fa fa-times"></i></button></td>
                          <td style="display: none;"><?= $ads['comment'] ?></td>
                          <td style="display: none;"><?= $ads['currency_id'] ?></td>
                          <td style="display: none;"><?= $ads['price'] ?></td>
                          <td style="display: none;"><?= $ads['max_amount'] ?></td>
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
                          Вы действительно хотите <strong>удалить</strong> это объявление?<br>
                          Отменить действие будет будет невозможно
                        </div>
                        <div class="modal-footer">
                          <form method="POST">
                            <button type="button" style="outline: none;" class="btn btn-primary" data-dismiss="modal">Отмена</button>
                            <input type="hidden" id="id_ads" name="id_ads" value="10">
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
                              <label>Тип объявления</label>
                              <select class="form-control" name="type" id="type">
                                <option value="1">Купить</option>
                                <option value="2">Продать</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Город</label>
                              <input class="form-control" name="location" id="location" />
                            </div>
                            <div class="form-group">
                              <label>Валюта</label>
                              <select class="form-control" name="currency_id" id="currency_id">
                                <option value="1">BTK</option>
                                <option value="2">RUR</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Цена</label>
                              <input class="form-control" name="price" id="price" />
                            </div>
                            <div class="form-group">
                              <label>Max</label>
                              <input class="form-control" name="max_amount" id="max_amount" />
                            </div>
                            <div class="form-group">
                              <label>Комментарий</label>
                              <textarea class="form-control" name="comment" id="comment">
                                
                              </textarea>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" style="outline: none;" class="btn btn-primary" data-dismiss="modal">Отмена</button>
                            <input type="hidden" id="edit_ads_id" name="id_ads" value="10">
                            <button type="submit" style="outline: none;" class="btn btn-success">Редактировать</button>
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