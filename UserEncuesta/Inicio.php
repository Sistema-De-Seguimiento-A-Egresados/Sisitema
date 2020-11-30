<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['estado'] != "conectado"){
  header('Location: index.php'); 
}
require_once "Controllers/conexion.php";
$Encuestas=array();
$resultado = mysqli_query($conexion,'select * from tb_encuesta');
while( $row = mysqli_fetch_object($resultado)){
      $Encuestas[] = $row;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gestion</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="Views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="Views/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="Views/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="Views/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  <link href="//www.fuelcdn.com/fuelux/3.13.0/css/fuelux.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" /> 
  <style type="text/css">
  table{
      border: #e0e0e2 1px solid;
      border-radius: 20px;
    }
        thead{
      background: #e0e0e2;
    }
    tr:hover{
      background-image: radial-gradient(#a7a7a7, #e1e1e1) !important;
    }

    tr{
      transition: background-image 2s linear 1s;
    }
    .d-block{
      display: block;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a class="logo">
      <span class="logo-mini"><b>E</b></span>
      <span class="logo-lg"><b>Encuesta</b></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="Views/dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs">User</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="Views/dist/img/avatar5.png" class="img-circle" alt="User Image">
                <p>
                  User
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="Controllers/cerrar_sesion.php" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="Views/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>User</p>
          <a href="#"><i class="fa fa-circle text-success"></i>En línea</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Panel</li>
        <li class="active"><a><i class="fa fa-link"></i> <span>Encuesta</span></a></li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <div class="col-sm-12" style="background: #ecf0f5;">
      <section id="main-content">
      <section class="wrapper" style="background: none;">
          <br>
          <div class="row">
            <div class="col-sm-12">
             <section style="border: 1px solid #e0e0e2;" class="panel">
              <header class="panel  panel-info">
                <div class="panel-heading">.: Listado de Encuestas :.
                  <span class="tools pull-right">
                  <a class="fa fa-chevron-down" href="javascript:;"></a>
                  </span>
                </div>
              </header>
              <div class="panel-body">
                <div class="col-sm-12">
                  <table class="table table-striped table-hover">
                    <thead>
                      <th>Nombre</th>
                      <th></th>
                    </thead>
                    <tbody>      
                     <?php foreach($Encuestas as $encuesta){ ?>
                      <tr>
                        <td><?php echo $encuesta->c_nombre_encuesta?></td>
                       <td>
                        <a class="btn btn-xs btn-info" href="Resolver.php?id_encuesta=<?php echo $encuesta->id_encuesta?>">Resolver</a>
                        </td>
                      </tr>
                     <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
             </section>
           </div>
        </div>
      </section>
      </section>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//www.fuelcdn.com/fuelux/3.13.0/js/fuelux.min.js"></script>
<script src="Views/bower_components/fuelux/spinner.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  $(function(){
    
  });
</script>
</body>
</html>
