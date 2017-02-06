<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wallets</title>
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
              <a href="/admin/recall"><i class="fa fa-comments fa-3x" aria-hidden="true"></i> Отзывы</a>
          </li>
          <li>
            <a href="/admin/ads"><i class="fa fa-desktop fa-3x"></i> Объявления</a>
          </li>
          <li>
            <a href="/admin/messages"><i class="fa fa-envelope-o fa-3x"></i> Сообщения</a>
          </li>
          <li  >
            <a href="/admin/tickets"><i class="fa fa-ticket fa-3x"></i> Арбитраж</a>
          </li> 
          <li  >
            <a href="/admin/support"><i class="fa fa-question-circle fa-3x"></i> Поддержка</a>
          </li>
          <li  >
            <a class="active-menu" href="/admin/wallets"><i class="fa fa-archive fa-3x"></i> Резерв</a>
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
                Резерв
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <?php if($reserve): ?>
                    <h4>Список резервов</h4>
                    <b>FROM</b> - юзер, который перевел BTC в резерв, <b>TO</b> - юзер, которому должны прийти средства после подтверждения оплаты.
                    <br/>
                    <br/>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Владелец</th>
                          <th>Кому</th>
                          <th>BTC</th>
                          <th>Подтвердить перевод вручную</th>
                          <th>Отменить перевод</th>
                        </tr>
                        <?php foreach($reserveList as $reserve): ?>
                          <tr>
                            <td><?php echo $reserve['id_reserve']; ?></td>
                            <td><?php echo User::getUsernameById($reserve['from_id']); ?> <a href="/adminWallets?user_id=<?php echo $reserve['from_id']; ?>" title="Поиск по FROM"><i class="fa fa-search"></i></a></td>
                            <td><?php echo User::getUsernameById($reserve['to_id']); ?> <a href="/adminWallets?user_id=<?php echo $reserve['to_id']; ?>" title="Поиск по TO"><i class="fa fa-search"></i></a></td>
                            <td><?php echo $reserve['amount']; ?></td>
                            <td><a href="/adminUser/send?from=<?= $reserve['from_id'] ?>&amp;to=<?= $reserve['to_id'] ?>" title="Подтвердить перевод"><i class="fa fa-exchange"></i> Confirm</a></td>
                            <td><a href="/adminUser/rollback?from=<?= $reserve['from_id'] ?>&amp;to=<?= $reserve['to_id'] ?>" title="Подтвердить перевод"><i class="fa fa-mail-reply"></i> Rollback</a></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  <?php else: ?>
                    <h4>На резерве:</h4>
                    <b><?= $this->admCoinbase->amount ?></b> <i class="fa fa-btc" title="BTC"></i> [ <a href="?reserve">подробнее</a> ]
                    
                  <?php endif; ?>
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