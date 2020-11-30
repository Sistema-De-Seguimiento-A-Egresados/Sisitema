<?php
//session_start() crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST, o pasado mediante una cookie. 
session_start();
//$_SESSION es un array asociativo que contiene variables de sesión disponibles
if(!isset($_SESSION['admin']) || $_SESSION['estado'] != "conectado"){
  header('Location: index.php'); 
}
?>
<!-- desde la linea 17 a la 20 se llaman librerias como bootstrap y los font style que estan en la carpeta Views. En esta carpeta tambien se encuentran estilos css. Las imagenes e iconos estan en al carpeta img-->
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
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
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="Views/dist/img/avatar5.png" class="img-circle" alt="User Image">
                <p>
                  Admin
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
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i>En línea</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Panel</li>
        <li class="active"><a><i class="fa fa-link"></i> <span>Encuesta</span></a></li>
        <li class="activ"><a href="Resultados.php"><i class="fa fa-table"></i> <span>Resultados</span></a></li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <div class="col-sm-12" style="background: #ecf0f5;">
      <section id="main-content">
      <section class="wrapper" style="background: none;">
        <br>
        <div id="row-encuesta" class="row">
          <div class="col-md-12">
            <section style="border: 1px solid #e0e0e2;" class="panel">
              <header class="panel  panel-info">
                <div class="panel-heading">.: Gestion Encuestas :.
                  <span class="tools pull-right">
                  <a class="fa fa-chevron-down" href="javascript:;"></a>
                  </span>
                </div>
              </header>
              <div class="panel-body">
                <form class="" role="form" onsubmit="return false;">
                  <fieldset>
                    <div class="row">
                         <div class="col-sm-4">
                            <div class="form-group">
                              <button type="button" class="btn btn-success" id="btn-ver-enc"><i class="fa fa-bars"></i> Ver Encuestas <i class="preloader preloader-success hidden"></i></button>
                              <button type="button" class="btn btn-primary" id="btn-crear-encuesta"><i class="fa fa-plus-circle"></i> Nueva Encuesta <i class="preloader preloader-info hidden"></i></button>
                            </div>
                         </div>
                    </div>
                  </fieldset>
                </form>
                <div class="row" id="row-encuestas" style="display: none;">
                  <div class="col-md-12">
                    <section style="border: 1px solid #e0e0e2;" class="panel">
                      <table class="table table-striped table-hover" id="tb-encuesta">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Nombre de la encuesta</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </section>
                  </div>
                </div>
                <div class="row" id="pagination">
                </div>
              </div>
            </section>
          </div>
        </div>
        <div class="row" id="row-bloque" style="display: none;">
          <div class="col-md-12">
            <section style="border: 1px solid #e0e0e2;" class="panel">
              <header class="panel  panel-info">
                <div class="panel-heading">.: Gestion Bloques :.
                  <span class="tools pull-right">
                  <a class="fa fa-chevron-down" href="javascript:;"></a>
                  </span>
                </div>
              </header>
            <div class="panel-body">
              <form class="" role="form" onsubmit="return false;">
                  <fieldset>
                      <div class="row">
                          <div class="col-sm-4">
                              <div class="form-group">
                                <label for="">Encuesta:</label>
                                <input type="hidden" class="id_encuesta" value="">
                                <input type="text" class="form-control nombre_encuesta" disabled value="">
                              </div>
                           </div>
                           <div class="col-sm-4">
                               <div class="form-group">
                                 <div class="form-group">
                                     <label class="d-block">&nbsp;</label>
                                     <button type="button" class="btn btn-primary" id="btn-crear-bloque"><i class="fa fa-plus-circle"></i> Nuevo Bloque <i class="preloader preloader-info hidden"></i></button>
                                 </div>
                               </div>
                            </div>
                        </div>
                    </fieldset>
               </form>
               <section style="border: 1px solid #e0e0e2;" class="panel">
                <table class="table table-striped table-advance table-hover" id="tb-bloque">
                  <thead>
                    <tr>
                      <th>Orden</th>
                      <th>Nombre del Bloque</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </section>
              </div>
            </section>
          </div>
        </div>
        <div class="row" id="row-pregunta" style="display: none;">
          <div class="col-md-12">
            <section style="border: 1px solid #e0e0e2;" class="panel">
              <header class="panel panel-info">
                <div class="panel-heading">.: Gestion Preguntas :.
                  <span class="tools pull-right">
                  <a class="fa fa-chevron-down" href="javascript:;"></a>
                  </span>
                </div>
              </header>
              <div class="panel-body">
                <form class="" role="form" onsubmit="return false;">
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="">Bloque:</label>
                                  <input type="hidden" class="id_bloque" value="">
                                  <input type="text" class="form-control nombre_bloque" disabled value="">
                                </div>
                             </div>
                             <div class="col-sm-4">
                                 <div class="form-group">
                                   <div class="form-group">
                                       <label class="d-block">&nbsp;</label>
                                       <button type="button" class="btn btn-primary" id="btn-crear-pregunta"><i class="fa fa-plus-circle"></i> Nueva Pregunta <i class="preloader preloader-info hidden"></i></button>
                                   </div>
                                 </div>
                              </div>
                          </div>
                      </fieldset>
                 </form>
              <section style="border: 1px solid #e0e0e2;" class="panel">
                <table class="table table-striped table-advance table-hover" id="tb-pregunta">
                  <thead>

                  <tr>
                    <th>Orden</th>
                    <th>Titulo de la Pregunta</th>
                    <th>Tipo Pregunta</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>

                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </section>
              </div>
            </section>
          </div>
        </div>
      </section>
    </section>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-opcion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hide="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form class="form-horizontal tasi-form" method="POST" onsubmit="return false;" id="f-modal-opcion">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hide="true">&times;</button>
            <h4 class="modal-title">Gestion Opciones</h4>
          </div>
          <div class="modal-body">
            <form class="" role="form" onsubmit="return false;">
                <fieldset>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <div class="form-group">
                              <label for="">Pregunta:</label>
                              <input type="hidden" class="id_pregunta" value="">
                              <input type="text" class="form-control nombre_pregunta" disabled value="">
                            </div>
                         </div>
                         <div class="col-sm-4" style="margin-left: 30px;">
                             <div class="form-group">
                               <div class="form-group">
                                   <label class="d-block">&nbsp;</label>
                                   <button type="button" class="btn btn-primary" id="btn-crear-opcion"><i class="fa fa-plus-circle"></i> Nueva Opcion <i class="preloader preloader-info hidden"></i></button>
                               </div>
                             </div>
                          </div>
                      </div>
                  </fieldset>
             </form>
          <section style="border: 1px solid #e0e0e2;" class="panel">
            <table class="table table-striped table-advance table-hover" id="tb-opcion">
              <thead>

              <tr>
                <th>Orden</th>
                <th>Detalle</th>
                <th>Tipo</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

              </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </section>
          </div>
        </form>
      </div>
    </div>
</div>
<div class="modal fade" id="crear-encuesta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hide="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form class="form-horizontal tasi-form" method="POST" onsubmit="return false;" id="f-crear-encuesta">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hide="true">&times;</button>
            <h4 class="modal-title">Nueva Encuesta</h4>
          </div>
          <div class="modal-body">
            <div class="panel-body">
              <div class="form-group">
              <div class="col-sm-12">
                  <label for="fono1">Nombre de la encuesta</label>
                <input class="form-control nomenc" name="nomenc" type="text" required >
              </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="button" id="sbmt-crear-encuesta">Agregar <i class="preloader preloader-success hidden"></i></button>
            <button data-dismiss="modal" class="btn btn-danger" type="button">Cancelar</button>
          </div>
        </form>
    </div>
  </div>
</div>
<div class="modal fade" id="crear-bloque" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hide="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form class="form-horizontal tasi-form" method="POST" onsubmit="return false;" id="f-crear-bloque">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hide="true">&times;</button>
            <h4 class="modal-title">Nuevo Bloque</h4>
          </div>
          <div class="modal-body">
            <div class="panel-body">
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Nombre de la Encuesta</label>
                   <input class="form-control nomenc" name="nomenc" type="text" disabled>
                   <input type="hidden" class="idenc" value="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Nombre del bloque</label>
                  <input class="form-control nomblo" name="nomenc" type="text" required >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Orden del Bloque</label>
                    <div id="spinner1">
                      <div class="input-group input-small">
                            <input class="spinner-input form-control" maxlength="3" readonly="" type="text">
                            <div class="spinner-buttons input-group-btn btn-group-vertical">
                                <button type="button" class="btn spinner-up btn-xs btn-default">
                                    <i class="fa fa-angle-up"></i>
                                </button>
                                <button type="button" class="btn spinner-down btn-xs btn-default">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="button" id="sbmt-crear-bloque">Agregar <i class="preloader preloader-success hidden"></i></button>
            <button data-dismiss="modal" class="btn btn-danger" type="button">Cancelar</button>
          </div>
        </form>
    </div>
  </div>
</div>
<div class="modal fade" id="editar-encuesta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hide="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form class="form-horizontal tasi-form" method="POST" onsubmit="return false;" id="f-editar-encuesta">
          <input type="hidden" class="idenc">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hide="true">&times;</button>
            <h4 class="modal-title">Actualizar Encuesta</h4>
          </div>
          <div class="modal-body">
            <div class="panel-body">
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Nombre de la encuesta</label>
                  <input class="form-control nomenc" name="nomenc" type="text" required >
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="button" id="sbmt-editar-encuesta">Actualizar <i class="preloader preloader-success hidden"></i></button>
            <button data-dismiss="modal" class="btn btn-danger" type="button">Cancelar</button>
          </div>
        </form>
    </div>
  </div>
</div>
<div class="modal fade" id="editar-bloque" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hide="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form class="form-horizontal tasi-form" method="POST" onsubmit="return false;" id="f-editar-bloque">
          <input type="hidden" class="idblo">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hide="true">&times;</button>
            <h4 class="modal-title">Actualizar Bloque</h4>
          </div>
          <div class="modal-body">
            <div class="panel-body">
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Encuesta</label>
                  <input class="form-control nomenc" name="nomenc" type="text" disabled>
                </div>
                <div class="col-sm-12">
                    <label for="fono1">Nombre del bloque</label>
                  <input class="form-control nomblo" name="nomenc" type="text" required >
                </div>
                <div class="col-sm-12">
                    <label for="fono1">Orden del Bloque</label>
                    <div id="spinner2">
                      <div class="input-group input-small">
                            <input class="spinner-input form-control" maxlength="3" readonly="" type="text">
                            <div class="spinner-buttons input-group-btn btn-group-vertical">
                                <button type="button" class="btn spinner-up btn-xs btn-default">
                                    <i class="fa fa-angle-up"></i>
                                </button>
                                <button type="button" class="btn spinner-down btn-xs btn-default">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="button" id="sbmt-editar-bloque">Actualizar <i class="preloader preloader-success hidden"></i></button>
            <button data-dismiss="modal" class="btn btn-danger" type="button">Cancelar</button>
          </div>
        </form>
    </div>
  </div>
</div>
<div class="modal fade" id="crear-pregunta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hide="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form class="form-horizontal tasi-form" method="POST" onsubmit="return false;" id="f-crear-pregunta">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hide="true">&times;</button>
            <h4 class="modal-title">Nueva Pregunta</h4>
          </div>
          <div class="modal-body">
            <div class="panel-body">
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Nombre de la Encuesta</label>
                   <input class="form-control nomenc" name="nomenc" type="text" disabled>
                   <input type="hidden" class="idenc" value="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Nombre del Bloque</label>
                   <input class="form-control nomblo" name="nomblo" type="text" disabled>
                   <input type="hidden" class="idblo" value="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Titulo de la pregunta</label>
                  <input class="form-control nompreg" name="nompreg" type="text" required >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Orden de la pregunta</label>
                    <div id="spinner3">
                      <div class="input-group input-small">
                            <input class="spinner-input form-control" maxlength="3" readonly="" type="text">
                            <div class="spinner-buttons input-group-btn btn-group-vertical">
                                <button type="button" class="btn spinner-up btn-xs btn-default">
                                    <i class="fa fa-angle-up"></i>
                                </button>
                                <button type="button" class="btn spinner-down btn-xs btn-default">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Tipo de pregunta</label>
                    <select name="tipopreg" id="tipopreg" class='form-control'>
                      <option value="SS"  selected="selected">Seleccion Simple</option>                        
                    </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="button" id="sbmt-crear-pregunta">Agregar <i class="preloader preloader-success hidden"></i></button>
            <button data-dismiss="modal" class="btn btn-danger" type="button">Cancelar</button>
          </div>
        </form>
    </div>
  </div>
</div>
<div class="modal fade" id="editar-pregunta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hide="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form class="form-horizontal tasi-form" method="POST" onsubmit="return false;" id="f-editar-pregunta">
          <input type="hidden" class="idpreg" value="">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hide="true">&times;</button>
            <h4 class="modal-title">Actualizar Pregunta</h4>
          </div>
          <div class="modal-body">
            <div class="panel-body">
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Nombre de la Encuesta</label>
                   <input class="form-control nomenc" name="nomenc" type="text" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Nombre del Bloque</label>
                   <input class="form-control nomblo" name="nomblo" type="text" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Titulo de la pregunta</label>
                  <input class="form-control nompreg" name="nompreg" type="text" required >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Orden de la pregunta</label>
                    <div id="spinner4">
                      <div class="input-group input-small">
                            <input class="spinner-input form-control" maxlength="3" readonly="" type="text">
                            <div class="spinner-buttons input-group-btn btn-group-vertical">
                                <button type="button" class="btn spinner-up btn-xs btn-default">
                                    <i class="fa fa-angle-up"></i>
                                </button>
                                <button type="button" class="btn spinner-down btn-xs btn-default">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Tipo de pregunta</label>
                    <select name="tipopreg" id="tipopreg" class='form-control'>
                      <option value="SS"  selected="selected">Seleccion Simple</option>                                             
                    </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="button" id="sbmt-editar-pregunta">Actualizar <i class="preloader preloader-success hidden"></i></button>
            <button data-dismiss="modal" class="btn btn-danger" type="button">Cancelar</button>
          </div>
        </form>
    </div>
  </div>
</div>
<div class="modal fade" id="crear-opcion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hide="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form class="form-horizontal tasi-form" method="POST" onsubmit="return false;" id="f-crear-opcion">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hide="true">&times;</button>
            <h4 class="modal-title">Nueva Opcion</h4>
          </div>
          <div class="modal-body">
            <div class="panel-body">
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Nombre de la Encuesta</label>
                   <input class="form-control nomenc" name="nomenc" type="text" disabled>
                   <input type="hidden" class="idenc" value="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Nombre del Bloque</label>
                   <input class="form-control nomblo" name="nomblo" type="text" disabled>
                   <input type="hidden" class="idblo" value="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Titulo de la Pregunta</label>
                   <input class="form-control nompreg" name="nompreg" type="text" disabled>
                   <input type="hidden" class="idpreg" value="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Detalle de la Opcion</label>
                  <input class="form-control detopc" name="detopc" type="text" required >
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Orden de la Opcion</label>
                    <div id="spinner5">
                      <div class="input-group input-small">
                            <input class="spinner-input form-control" maxlength="3" readonly="" type="text">
                            <div class="spinner-buttons input-group-btn btn-group-vertical">
                                <button type="button" class="btn spinner-up btn-xs btn-default">
                                    <i class="fa fa-angle-up"></i>
                                </button>
                                <button type="button" class="btn spinner-down btn-xs btn-default">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Valor de la Opcion</label>
                    <div id="spinner6">
                      <div class="input-group input-small">
                            <input class="spinner-input form-control" maxlength="3" readonly="" type="text">
                            <div class="spinner-buttons input-group-btn btn-group-vertical">
                                <button type="button" class="btn spinner-up btn-xs btn-default">
                                    <i class="fa fa-angle-up"></i>
                                </button>
                                <button type="button" class="btn spinner-down btn-xs btn-default">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Tipo de pregunta</label>
                    <select name="tipoopc" id="tipoopc" class='form-control'>
                      <option value="OS" selected="selected">Opcion Simple</option>                        
                    </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="button" id="sbmt-crear-opcion">Agregar <i class="preloader preloader-success hidden"></i></button>
            <button data-dismiss="modal" class="btn btn-danger" type="button">Cancelar</button>
          </div>
        </form>
    </div>
  </div>
</div>
<div class="modal fade" id="editar-opcion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hide="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form class="form-horizontal tasi-form" method="POST" onsubmit="return false;" id="f-editar-opcion">
          <input type="hidden" class="idopc" value="">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hide="true">&times;</button>
            <h4 class="modal-title">Actualizar Opcion</h4>
          </div>
          <div class="modal-body">
            <div class="panel-body">
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Nombre de la Encuesta</label>
                   <input class="form-control nomenc" name="nomenc" type="text" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Nombre del Bloque</label>
                   <input class="form-control nomblo" name="nomblo" type="text" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Titulo de la Pregunta</label>
                   <input class="form-control nompreg" name="nompreg" type="text" disabled>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Detalle de la Opcion</label>
                  <input class="form-control detopc" name="detopc" type="text" required >
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Orden de la Opcion</label>
                    <div id="spinner8">
                      <div class="input-group input-small">
                            <input class="spinner-input form-control" maxlength="3" readonly="" type="text">
                            <div class="spinner-buttons input-group-btn btn-group-vertical">
                                <button type="button" class="btn spinner-up btn-xs btn-default">
                                    <i class="fa fa-angle-up"></i>
                                </button>
                                <button type="button" class="btn spinner-down btn-xs btn-default">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Valor de la Opcion</label>
                    <div id="spinner9">
                      <div class="input-group input-small">
                            <input class="spinner-input form-control" maxlength="3" readonly="" type="text">
                            <div class="spinner-buttons input-group-btn btn-group-vertical">
                                <button type="button" class="btn spinner-up btn-xs btn-default">
                                    <i class="fa fa-angle-up"></i>
                                </button>
                                <button type="button" class="btn spinner-down btn-xs btn-default">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <label for="fono1">Tipo de pregunta</label>
                    <select name="tipoopc" id="tipoopc" class='form-control'>
                      <option value="OS" selected="selected">Opcion Simple</option>                    
                    </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="button" id="sbmt-editar-opcion">Actualizar <i class="preloader preloader-success hidden"></i></button>
            <button data-dismiss="modal" class="btn btn-danger" type="button">Cancelar</button>
          </div>
        </form>
    </div>
  </div>
</div>
<div class="modal" id="cargando" data-backdrop="static" style="top:40%">
  <div class="modal-dialog" style="width: 155px;">
    <div class="modal-content">
      <div class="modal-body">
        <center><img src="loader.gif"></center>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//www.fuelcdn.com/fuelux/3.13.0/js/fuelux.min.js"></script>
<script src="Views/bower_components/fuelux/spinner.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!-- DESDE AQUI COMIENZA EL CODIGO JS QUE SE EJECUTA CUANDO LE DAS CLICKS A LOS BOTONES. ES JQUERY BASICO -->
<script>
  $(function(){
      $('#row-encuestas').hide();
      $('#row-bloque').hide();
      $('#row-pregunta').hide();
      $('#spinner1').spinner();
      $('#spinner2').spinner();
      $('#spinner3').spinner();
      $('#spinner4').spinner();
      $('#spinner5').spinner();
      $('#spinner6').spinner();
      $('#spinner7').spinner();
      $('#spinner8').spinner();
      $('#spinner9').spinner();
      $('#spinner10').spinner();
    ////////////////////////////////////////////////////////
      $('#btn-ver-enc').click(function(){
         listarEncuestas(1);
      });
      /////////////////////////////////////////////////////////
      function listarEncuestas(page){

        $('#row-bloque').hide();
        $('#row-pregunta').hide();
        $('#cargando').modal();
        var data={};
        data['page']=page;
        //SE OBTIENEN LAS ENCUESTAS HACIENDO LLAMADA AL ARCHIVO LISTAR_ENCUESTA.PHP. LA RESPUESTA ES LA VARIABLE RESP
        $.get('Listar_Encuesta.php',data,function(resp){
          $('#tb-encuesta tbody').empty();
          $('#pagination').empty();
          var i=0;
          $.each(resp.data,function(key,Encuesta){
            var tr = '';
            i++;
            tr += '<tr id="enc-'+ Encuesta.id_encuesta +'">';

            tr += '<td width="5%">' + i + '</td>';
            tr += '<td width="70%">' + Encuesta.c_nombre_encuesta + '</td>';
            tr += '<td></td>';
            tr += '<td></td>';
            tr += '<td>';
                      tr += '<button class="btn btn-xs btn-info btn-bloques-encuesta ttip" data-idencuesta="' + Encuesta.id_encuesta + '" data-placement="top" data-toggle="tooltip" title="Gestionar bloques"><i class="fa fa-align-justify"></i> <i class="preloader preloader-info hide"></i></button>';
            tr += '</td>';
            tr += '<td>';
                      tr += '<button class="btn btn-xs btn-warning btn-editar-encuesta ttip" data-idencuesta="' + Encuesta.id_encuesta + '" data-placement="top" data-toggle="tooltip" title="Editar Encuesta"><i class="fa fa-pencil"></i> <i class="preloader preloader-info hide"></i></button>';
            tr += '</td>';
            if(Encuesta.c_tipo_encuesta=='D'){
              tr += '<td>';
                        tr += '<button class="btn btn-xs btn-primary btn-gestionar-encuesta ttip" data-idencuesta="' + Encuesta.id_encuesta + '" data-nomencuesta="'+Encuesta.c_nombre_encuesta +'" data-placement="top" data-toggle="tooltip" title="Asignar la encuesta docente"><i class="fa fa-user fa-fw"></i> <i class="preloader preloader-info hide"></i></button>';
              tr += '</td>';

            }
            tr += '<td>';
                      tr += '<button class="btn btn-xs btn-danger btn-eliminar-encuesta ttip" data-idencuesta="' + Encuesta.id_encuesta + '" data-placement="top" data-toggle="tooltip" title="Borrar Encuesta"><i class="fa fa-trash-o fa-fw"></i> <i class="preloader preloader-info hide"></i></button>';
            tr += '</td>';
            tr += '</tr>';
            $('#tb-encuesta tbody').append(tr);
          });
          $('#tb-encuesta tbody .ttip').tooltip();
          $('#pagination').append(resp.links);
          $('#cargando').modal('toggle');
          $('#row-encuestas').show();
        },'json').fail(function(){
          $('#cargando').modal('toggle');
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });

      };
      ////////////////////////////////////////////////////////
      $('#btn-crear-encuesta').click(function(){
         $('#crear-encuesta').modal();
      });
      ///////////////////////////////////////////////////////
      $('#sbmt-crear-encuesta').click(function(){
        if( $('#crear-encuesta .nomenc').val() == ''){
          toastr.error('DEBE INGRESAR EL NOMBRE');
          return false;
        }
        var data = {};
        data['nomenc'] = $('#crear-encuesta .nomenc').val();

        $('#crear-encuesta').modal('toggle');
        $('#cargando').modal();
        $.post('Agregar_Encuesta.php',data,function(resp){
          if(resp.error){
            $('#cargando').modal('toggle');
            toastr.error('ERROR: ' + resp.message);
            $('#crear-encuesta').modal('');
            return false;
          }else{
            $('#cargando').modal('toggle');
            $('#crear-encuesta .nomenc').val('');
            toastr.success('ENCUESTA AGREGADA CORRECTAMENTE');
            listarEncuestas(1);
          }
        },'json').fail(function(){
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      });
      ////////////////////////////////////////////////////////////////////////////
      $(document).on('click','.btn-eliminar-bloque',function(){
        var id = $(this).data('idbloque');
        var data = {};
        data['id'] = id;
        $('#cargando').modal();
        $.post('Eliminar_Bloque.php',data,function(resp){
          $('#cargando').modal('toggle');
          if(resp.error){
            toastr.error('ERROR: ' + resp.message);
          }else{
            $('#cargando').modal('toggle');
            toastr.success('BLOQUE ELIMINADO CORRECTAMENTE');
            listarBloques($('#row-bloque .id_encuesta').val());
          }
        },'json').fail(function(){
          $('#cargando').modal('toggle');
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      });
      ////////////////////////////////////////////////////////////////////////////
      $(document).on('click','.btn-eliminar-pregunta',function(){
        var id = $(this).data('idpregunta');
        var data = {};
        data['id'] = id;
        $('#cargando').modal();
        $.post('Eliminar_Pregunta.php',data,function(resp){
          $('#cargando').modal('toggle');
          if(resp.error){
            toastr.error('ERROR: ' + resp.message);
          }else{
            $('#cargando').modal('toggle');
            toastr.success('PREGUNTA ELIMINADA CORRECTAMENTE');
            listarPreguntas($('#row-pregunta .id_bloque').val());
          }
        },'json').fail(function(){
          $('#cargando').modal('toggle');
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      });
      ////////////////////////////////////////////////////////////////////////////
      $(document).on('click','.btn-eliminar-opcion',function(){
        var id = $(this).data('idopcion');
        var data = {};
        data['id'] = id;
        $('#cargando').modal();
        $.post('Eliminar_Opcion.php',data,function(resp){
          $('#cargando').modal('toggle');
          if(resp.error){
            toastr.error('ERROR: ' + resp.message);
          }else{
            $('#cargando').modal('toggle');
            toastr.success('OPCION ELIMINADO CORRECTAMENTE');
            listarOpciones($('#modal-opcion .id_pregunta').val());
          }
        },'json').fail(function(){
          $('#cargando').modal('toggle');
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      });
      ////////////////////////////////////////////////////////////////////////////

      $(document).on('click','.btn-editar-encuesta',function(){
        var id = $(this).data('idencuesta');
        var data = {};
        data['id'] = id;
        $.post('Obtener_Encuesta.php',data,function(resp){
          if(resp.error){
            toastr.error('ERROR: ' + resp.message);
          }else{
            $('#f-editar-encuesta .idenc').val(resp.data.id_encuesta);
            $('#f-editar-encuesta .nomenc').val(resp.data.c_nombre_encuesta);
            $('#f-editar-encuesta #tipoenc2').val(resp.data.c_tipo_encuesta);
            $('#editar-encuesta').modal();
          }
        },'json').fail(function(){
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      });
      //////////////////////////////////////////////////////////////////////////////
      $('#sbmt-editar-encuesta').click(function(){
        if( $('#f-editar-encuesta .nomenc').val() == '0'){
          toastr.error('DEBE INGRESAR UN NOMBRE');
          return false;
        }
        if( $('#f-editar-encuesta #tipoenc2').val() == '0'){
          toastr.error('DEBE INGRESAR UN TIPO');
          return false;
        }
        var data = {};
        data['idenc'] = $('#f-editar-encuesta .idenc').val();
        data['nomenc'] = $('#f-editar-encuesta .nomenc').val();
        $.post('Actualizar_Encuesta.php',data,function(resp){
          if(resp.error){
            toastr.error('ERROR: ' + resp.message);
          }else{
            $('#editar-encuesta').modal('toggle');
            toastr.success('ENCUESTA ACTUALIZADA CORRECTAMENTE');
            listarEncuestas(1);
          }
        },'json').fail(function(){
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      });
      ///////////////////////////////////////////////////////////////////////////
      $(document).on('click','.btn-eliminar-encuesta',function(){
        var id = $(this).data('idencuesta');
        swal({
            title: "",
            text: "¿Esta seguro que desea eliminar la encuesta?",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si",
            closeOnConfirm: true
        }, function(isConfirm){
            if (isConfirm) {
              var data = {};
              data['id'] = id;
              $.post('Eliminar_Encuesta.php',data,function(resp){
                if(resp.error){
                  toastr.error('ERROR: ' + resp.message);
                }else{
                  toastr.success('ENCUESTA ELIMINADA CORRECTAMENTE');
                  listarEncuestas(1);
                }

              },'json').fail(function(){
                toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
              });

            }
        });

      });
      ////////////////////////////////////////////////////////////////
      $(document).on('click','.btn-bloques-encuesta',function(){
        var id = $(this).data('idencuesta');
        if( id == ''){
          toastr.error('DEBE SELECCIONAR EL TIPO');
          return false;
        }

        listarBloques(id);
      });
      //////////////////////////////////////////////////
      function listarBloques(id){

        var data = {};
        data['id'] = id;
        $('#cargando').modal();
        $.post('Listar_Bloques.php',data,function(resp){
          if(resp.error){
            $('#cargando').modal('toggle');
            toastr.error('ERROR: ' + resp.message);
            return false;
          }else{
            $('#cargando').modal('toggle');
            $('#row-bloque .nombre_encuesta').val(resp.encuesta.c_nombre_encuesta);
            $('#row-bloque .id_encuesta').val(resp.encuesta.id_encuesta);
            $('#tb-bloque tbody').empty();
            $('#row-pregunta').hide();
            $.each(resp.data,function(key,Bloque){
              var tr = '';
              tr += '<tr data-idbloque="'+ Bloque.id_bloque +'">';

              tr += '<td width="5%">' + Bloque.n_orden_bloque  + '</td>';
              tr += '<td width="70%">' + Bloque.c_nombre_bloque + '</td>';
              tr += '<td></td>';
              tr += '<td></td>';
              tr += '<td></td>';
              tr += '<td>';
                        tr += '<button class="btn btn-xs btn-info btn-preguntas-encuesta ttip" data-idbloque="' + Bloque.id_bloque + '" data-placement="top" data-toggle="tooltip" title="Gestionar preguntas"><i class="fa fa-align-justify"></i> <i class="preloader preloader-info hide"></i></button>';
              tr += '</td>';
              tr += '<td>';
                        tr += '<button class="btn btn-xs btn-warning btn-editar-bloque ttip" data-idbloque="' + Bloque.id_bloque + '" data-placement="top" data-toggle="tooltip" title="Editar Bloque"><i class="fa fa-pencil"></i> <i class="preloader preloader-info hide"></i></button>';
              tr += '</td>';
              tr += '<td>';
                        tr += '<button class="btn btn-xs btn-danger btn-eliminar-bloque ttip" data-idbloque="' + Bloque.id_bloque + '" data-placement="top" data-toggle="tooltip" title="Borrar Bloque"><i class="fa fa-trash-o fa-fw"></i> <i class="preloader preloader-info hide"></i></button>';
              tr += '</td>';
              tr += '</tr>';
              $('#tb-bloque tbody').append(tr);
            });
          }
          $('#tb-bloque tbody .ttip').tooltip();
          $('#row-bloque').show();
        },'json').fail(function(){
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      }
      //////////////////////////////////////////////////////////////////////
      $('#btn-crear-bloque').click(function(){
        var idenc=$('#row-bloque .id_encuesta').val();
        var nomenc=$('#row-bloque .nombre_encuesta').val();
        $('#f-crear-bloque .idenc').val(idenc);
        $('#f-crear-bloque .nomenc').val(nomenc);
        $('#crear-bloque').modal();
      });
      ///////////////////////////////////////////////////////
      $('#sbmt-crear-bloque').click(function(){

        if( $('#crear-bloque .nomblo').val() == '' ){
          toastr.error('DEBE INGRESAR EL NOMBRE');
          return false;
        }
        var data = {};
        data['idenc'] = $('#crear-bloque .idenc').val();
        data['nomblo'] = $('#crear-bloque .nomblo').val();
        data['numblo'] = $('#crear-bloque #spinner1 input').val();

        $('#crear-bloque').modal('toggle');

        $.post('Agregar_Bloque.php',data,function(resp){
          if(resp.error){
            toastr.error('ERROR: ' + resp.message);
              $('#crear-bloque').modal('');
          }else{
            $('#crear-bloque .nomblo').val('');
            $('#crear-bloque #spinner1').spinner('value',1);
            listarBloques( $('#crear-bloque .idenc').val())
            toastr.success('BLOQUE AGREGADO CORRECTAMENTE');
          }
        },'json').fail(function(){
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      });
      ////////////////////////////////////////////////////////////////
      $(document).on('click','.btn-editar-bloque',function(){
        var id = $(this).data('idbloque');
        var data = {};
        data['id'] = id;
        $.post('Obtener_Bloque.php',data,function(resp){
          if(resp.error){
            toastr.error('ERROR: ' + resp.message);
          }else{
            $('#f-editar-bloque .nomenc').val($('#row-bloque .nombre_encuesta').val());
            $('#f-editar-bloque .idblo').val(resp.data.id_bloque);
            $('#f-editar-bloque .nomblo').val(resp.data.c_nombre_bloque);
            $('#f-editar-bloque  #spinner2').spinner('value',resp.data.n_orden_bloque);
           // $('#spinner2').change(resp.data.n_orden_bloque);
            $('#editar-bloque').modal();
          }
        },'json').fail(function(){
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      });
      //////////////////////////////////////////////////////////////////////////////
      $('#sbmt-editar-bloque').click(function(){
        if( $('#editar-bloque .nomblo').val() == '' ){
          toastr.error('DEBE INGRESAR EL NOMBRE');
          return false;
        }
        var data = {};
        data['idblo'] = $('#editar-bloque .idblo').val();
        data['nomblo'] = $('#editar-bloque .nomblo').val();
        data['numblo'] = $('#editar-bloque  #spinner2 input').val();

        $('#editar-bloque').modal('toggle');

        $.post('Actualizar_Bloque.php',data,function(resp){
          if(resp.error){
            toastr.error('ERROR: ' + resp.message);
              $('#editar-bloque').modal('');
          }else{
            listarBloques( $('#row-bloque .id_encuesta').val())
            toastr.success('BLOQUE ACTUALIZADO CORRECTAMENTE');
          }
        },'json').fail(function(){
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      });
      /////////////////////////////////////////////////////////////////////
      $(document).on('click','.btn-preguntas-encuesta',function(){
        var id = $(this).data('idbloque');
        if( id == ''){
          toastr.error('DEBE SELECCIONAR EL TIPO');
          return false;
        }

        listarPreguntas(id);
      });
      //////////////////////////////////////////////////
      function listarPreguntas(id){
        var data = {};
        data['id'] = id;
        $('#cargando').modal();
        $.post('Listar_Preguntas.php',data,function(resp){
          if(resp.error){
            $('#cargando').modal('toggle');
            toastr.error('ERROR: ' + resp.message);
            return false;
          }else{
            $('#cargando').modal('toggle');
            $('#row-pregunta .nombre_bloque').val(resp.bloque.c_nombre_bloque);
            $('#row-pregunta .id_bloque').val(resp.bloque.id_bloque);

            $('#tb-pregunta tbody').empty();
            $.each(resp.data,function(key,Pregunta){
              var tr = '';
              tr += '<tr data-idpregunta="'+ Pregunta.id_pregunta +'">';

              tr += '<td width="5%">' + Pregunta.n_orden_pregunta  + '</td>';
              tr += '<td>' + Pregunta.c_titulo_pregunta + '</td>';
              tr += '<td>' + Pregunta.c_tipo_pregunta + '</td>';
              tr += '<td></td>';
              tr += '<td></td>';
              if(Pregunta.c_tipo_pregunta=='SS'){
                tr += '<td>';
                          tr += '<button class="btn btn-xs btn-info btn-gestion-opciones ttip" data-idpregunta="' + Pregunta.id_pregunta + '" data-placement="top" data-toggle="tooltip" title="Gestionar Opciones"><i class="fa fa-align-justify"></i> <i class="preloader preloader-info hide"></i></button>';
                tr += '</td>';
              }else {
                tr += '<td></td>';
              }
              tr += '<td>';
                        tr += '<button class="btn btn-xs btn-warning btn-editar-pregunta ttip" data-idpregunta="' + Pregunta.id_pregunta + '" data-placement="top" data-toggle="tooltip" title="Editar Pregunta"><i class="fa fa-pencil"></i> <i class="preloader preloader-info hide"></i></button>';
              tr += '</td>';

              tr += '<td>';
                        tr += '<button class="btn btn-xs btn-danger btn-eliminar-pregunta ttip" data-idpregunta="' + Pregunta.id_pregunta + '" data-placement="top" data-toggle="tooltip" title="Borrar Pregunta"><i class="fa fa-trash-o fa-fw"></i> <i class="preloader preloader-info hide"></i></button>';
              tr += '</td>';
              tr += '</tr>';
              $('#tb-pregunta tbody').append(tr);
            });
          }
          $('#tb-pregunta tbody .ttip').tooltip();
          $('#row-pregunta').show();
        },'json').fail(function(){
          $('#cargando').modal('toggle');
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      }
      /////////////////////////////////////////////////////////////////////
      $('#btn-crear-pregunta').click(function(){
        var idenc=$('#row-bloque .id_encuesta').val();
        var nomenc=$('#row-bloque .nombre_encuesta').val();
        $('#f-crear-pregunta .idenc').val(idenc);
        $('#f-crear-pregunta .nomenc').val(nomenc);
        var idblo=$('#row-pregunta .id_bloque').val();
        var nomblo=$('#row-pregunta .nombre_bloque').val();
        $('#f-crear-pregunta .idblo').val(idblo);
        $('#f-crear-pregunta .nomblo').val(nomblo);
        $('#crear-pregunta').modal();
      });
      ///////////////////////////////////////////////////////
      $('#sbmt-crear-pregunta').click(function(){
        if( $('#crear-pregunta .nompreg').val() == '' ){
          toastr.error('DEBE INGRESAR EL NOMBRE');
          return false;
        }
        var data = {};
        data['idenc'] = $('#crear-pregunta .idenc').val();
        data['idblo'] = $('#crear-pregunta .idblo').val();
        data['nompreg'] = $('#crear-pregunta .nompreg').val();
        data['detpreg'] = $('#crear-pregunta .detpreg').val();
        data['numpreg'] = $('#crear-pregunta #spinner3 input').val();
        data['tipopreg'] = $('#crear-pregunta #tipopreg').val();

        $('#crear-pregunta').modal('toggle');

        $.post('Agregar_Pregunta.php',data,function(resp){
          if(resp.error){
            toastr.error('ERROR: ' + resp.message);
              $('#crear-bloque').modal('');
          }else{
            $('#crear-pregunta .nompreg').val('');
            $('#crear-pregunta .detpreg').val('');
            $('#crear-pregunta #spinner3').spinner('value',1);
            $('#crear-pregunta #tipopreg').val('SS');
            listarPreguntas( $('#crear-pregunta .idblo').val())
            toastr.success('PREGUNTA AGREGADA CORRECTAMENTE');
          }
        },'json').fail(function(){
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      });
      /////////////////////////////////////////////////////////////////
      $(document).on('click','.btn-editar-pregunta',function(){
        var id = $(this).data('idpregunta');
        var data = {};
        data['id'] = id;
        $.post('Obtener_Pregunta.php',data,function(resp){
          if(resp.error){
            toastr.error('ERROR: ' + resp.message);
          }else{
            $('#f-editar-pregunta .nomenc').val($('#row-bloque .nombre_encuesta').val());
            $('#f-editar-pregunta .nomblo').val($('#row-pregunta .nombre_bloque').val());
            $('#f-editar-pregunta .idpreg').val(resp.data.id_pregunta);
            $('#f-editar-pregunta .nompreg').val(resp.data.c_titulo_pregunta);
            $('#f-editar-pregunta #spinner4').spinner('value',resp.data.n_orden_pregunta);
            $('#f-editar-pregunta #tipopreg').val(resp.data.c_tipo_pregunta);
            $('#editar-pregunta').modal();
          }
        },'json').fail(function(){
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      });
      //////////////////////////////////////////////////////////////////////////////
      $('#sbmt-editar-pregunta').click(function(){
        if( $('#f-editar-pregunta .nompreg').val() == '0'){
          toastr.error('DEBE INGRESAR UN NOMBRE');
          return false;
        }
        if( $('#f-editar-pregunta #tipopreg').val() == '0'){
          toastr.error('DEBE INGRESAR UN TIPO');
          return false;
        }
        var data = {};
        data['idpreg'] = $('#f-editar-pregunta .idpreg').val();
        data['nompreg'] =  $('#f-editar-pregunta .nompreg').val();
        data['detpreg'] =  $('#f-editar-pregunta .detpreg').val();
        data['numpreg'] =  $('#f-editar-pregunta #spinner4 input').val();
        data['tipopreg'] =  $('#f-editar-pregunta #tipopreg').val();
        $.post('Actualizar_Pregunta.php',data,function(resp){
          if(resp.error){
            toastr.error('ERROR: ' + resp.message);
          }else{
            $('#editar-pregunta').modal('toggle');
            toastr.success('PREGUNTA ACTUALIZADA CORRECTAMENTE');
            listarPreguntas($('#row-pregunta .id_bloque').val());
          }
        },'json').fail(function(){
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      });
      //////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////////
      $(document).on('click','.btn-gestion-opciones',function(){
        var id = $(this).data('idpregunta');
        if( id == ''){
          toastr.error('DEBE SELECCIONAR EL TIPO');
          return false;
        }

        listarOpciones(id);
      });
      //////////////////////////////////////////////////
      function listarOpciones(id){
        var data = {};

        data['id'] = id;
        $('#cargando').modal();
        $.post('Listar_Opciones.php',data,function(resp){
          if(resp.error){
            $('#cargando').modal('toggle');
            toastr.error('ERROR: ' + resp.message);
            return false;
          }else{
            $('#cargando').modal('toggle');
            $('#modal-opcion .nombre_pregunta').val(resp.pregunta.c_titulo_pregunta);
            $('#modal-opcion .id_pregunta').val(resp.pregunta.id_pregunta);

            $('#tb-opcion tbody').empty();
            $.each(resp.data,function(key,Opcion){
              var tr = '';
              tr += '<tr data-idopcione="'+ Opcion.id_opcion +'">';

              tr += '<td width="5%">' + Opcion.n_orden_opcion  + '</td>';
              tr += '<td>' + Opcion.c_detalle_opcion + '</td>';
              tr += '<td>' + Opcion.c_tipo_opcion + '</td>';
              tr += '<td></td>';
              tr += '<td></td>';
              tr += '<td></td>';
              tr += '<td>';
                        tr += '<button class="btn btn-xs btn-warning btn-editar-opcion ttip" data-idopcion="' + Opcion.id_opcion + '" data-placement="top" data-toggle="tooltip" title="Editar Opcion"><i class="fa fa-pencil"></i> <i class="preloader preloader-info hide"></i></button>';
              tr += '</td>';

              tr += '<td>';
                        tr += '<button class="btn btn-xs btn-danger btn-eliminar-opcion ttip" data-idopcion="' + Opcion.id_opcion + '" data-placement="top" data-toggle="tooltip" title="Borrar Opcion"><i class="fa fa-trash-o fa-fw"></i> <i class="preloader preloader-info hide"></i></button>';
              tr += '</td>';
              tr += '</tr>';
              $('#tb-opcion tbody').append(tr);
            });
          }
          $('#tb-opcion tbody .ttip').tooltip();
          $('#modal-opcion').modal();
        },'json').fail(function(){
          $('#cargando').modal('toggle');
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      }
      /////////////////////////////////////////////////////////////////////
      $('#btn-crear-opcion').click(function(){
        var idenc=$('#row-bloque .id_encuesta').val();
        var nomenc=$('#row-bloque .nombre_encuesta').val();
        $('#f-crear-opcion .idenc').val(idenc);
        $('#f-crear-opcion .nomenc').val(nomenc);
        var idblo=$('#row-pregunta .id_bloque').val();
        var nomblo=$('#row-pregunta .nombre_bloque').val();
        $('#f-crear-opcion .idblo').val(idblo);
        $('#f-crear-opcion .nomblo').val(nomblo);
        var idpreg=$('#modal-opcion .id_pregunta').val();
        var nompreg=$('#modal-opcion .nombre_pregunta').val();
        $('#f-crear-opcion .idpreg').val(idpreg);
        $('#f-crear-opcion .nompreg').val(nompreg);
        $('#crear-opcion').modal();
      });
      ///////////////////////////////////////////////////////
      $('#sbmt-crear-opcion').click(function(){

        if( $('#crear-opcion .detopc').val() == '' ){
          toastr.error('DEBE INGRESAR EL NOMBRE');
          return false;
        }
        var data = {};
        data['idenc'] = $('#crear-opcion .idenc').val();
        data['idpreg'] = $('#crear-opcion .idpreg').val();
        data['detopc'] = $('#crear-opcion .detopc').val();
        data['numopc'] = $('#crear-opcion #spinner5 input').val();
        data['valopc'] = $('#crear-opcion #spinner6 input').val();
        data['punopc'] = $('#crear-opcion #spinner7 input').val();
        data['tipoopc'] = $('#crear-opcion #tipoopc').val();

        $('#crear-opcion').modal('toggle');

        $.post('Agregar_Opcion.php',data,function(resp){
          if(resp.error){
            toastr.error('ERROR: ' + resp.message);
            $('#crear-opcion').modal('');
          }else{
            toastr.success('OPCION AGREGADA CORRECTAMENTE');
            $('#crear-opcion .detopc').val('');
            $('#crear-opcion #spinner5').spinner('value',1);
            $('#crear-opcion #spinner6').spinner('value',1);
            $('#crear-opcion #spinner7').spinner('value',1);
            $('#crear-opcion #tipoopc').val('OS');
            listarOpciones( $('#crear-opcion .idpreg').val())

          }
        },'json').fail(function(){
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      });
      /////////////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////////////
      $(document).on('click','.btn-editar-opcion',function(){
        var id = $(this).data('idopcion');
        var data = {};
        data['id'] = id;
        $.post('Obtener_Opcion.php',data,function(resp){
          if(resp.error){
            toastr.error('ERROR: ' + resp.message);
          }else{
            $('#f-editar-opcion .nomenc').val($('#row-bloque .nombre_encuesta').val());
            $('#f-editar-opcion .nomblo').val($('#row-pregunta .nombre_bloque').val());
            $('#f-editar-opcion .nompreg').val($('#modal-opcion .nombre_pregunta').val());
            $('#f-editar-opcion .idopc').val(resp.data.id_opcion);
            $('#f-editar-opcion .detopc').val(resp.data.c_detalle_opcion);
            $('#f-editar-opcion #spinner8').spinner('value',resp.data.n_orden_opcion);
            $('#f-editar-opcion #spinner9').spinner('value',resp.data.n_valor);
            $('#f-editar-opcion #tipoopc').val(resp.data.c_tipo_opcion);
            $('#editar-opcion').modal();
          }
        },'json').fail(function(){
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      });
      //////////////////////////////////////////////////////////////////////////////
      $('#sbmt-editar-opcion').click(function(){
        if( $('#f-editar-opcion .detopc').val() == '0'){
          toastr.error('DEBE INGRESAR UN DETALLE');
          return false;
        }
        if( $('#f-editar-opcion #tipoopc').val() == '0'){
          toastr.error('DEBE INGRESAR UN TIPO');
          return false;
        }
        var data = {};
        data['idopc'] = $('#f-editar-opcion .idopc').val();
        data['detopc'] =  $('#f-editar-opcion .detopc').val();
        data['numopc'] =  $('#f-editar-opcion #spinner8 input').val();
        data['valopc'] =  $('#f-editar-opcion #spinner9 input').val();
        data['punopc'] =  $('#f-editar-opcion #spinner10 input').val();
        data['tipoopc'] =  $('#f-editar-opcion #tipoopc').val();
        $.post('Actualizar_Opcion.php',data,function(resp){
          if(resp.error){
            toastr.error('ERROR: ' + resp.message);
          }else{
            toastr.success('OPCION ACTUALIZADA CORRECTAMENTE');
            $('#editar-opcion').modal('toggle');
            listarOpciones($('#modal-opcion .id_pregunta').val());
          }
        },'json').fail(function(){
          toastr.error('ERROR AL ENVIAR/RECIBIR DATOS');
        });
      });
      //////////////////////////////////////////////////////////////////////////////
  });
</script>
</body>
</html>
