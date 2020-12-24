<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['estado'] != "conectado"){
  header('Location: index.php'); 
}
require_once "Controllers/conexion.php";

$data['c_estado']='';

$resultado = mysqli_query($conexion,"select * from tb_encuesta_respuesta where id_user = '".$_SESSION['user']."' and id_encuesta = '".$_GET['id_encuesta']."'");

while( $row = mysqli_fetch_assoc($resultado)){
    $data = $row;
} 

if ($data['c_estado']=='') {
  $query="insert into tb_encuesta_respuesta values (".$_GET['id_encuesta'].",".$_SESSION['user'].",CURRENT_TIMESTAMP(),'','I')";
  $resultado = mysqli_query($conexion,$query);
}

$Preguntas=array();
$PreguntasOpciones=array();
$Bloques=array();

$resultado = mysqli_query($conexion,'select * from tb_encuesta_pregunta where id_encuesta = '.$_GET['id_encuesta'].' order by n_orden_pregunta ASC');
while( $row = mysqli_fetch_object($resultado)){
      $Preguntas[] = $row;
}
$resultado = mysqli_query($conexion,'select * from tb_encuesta_pregunta_opcion where id_encuesta = '.$_GET['id_encuesta'].' order by n_orden_opcion ASC');
while( $row = mysqli_fetch_object($resultado)){
      $PreguntasOpciones[] = $row;
}
$resultado = mysqli_query($conexion,'select * from tb_encuesta_bloque where id_encuesta = '.$_GET['id_encuesta'].' order by n_orden_bloque ASC');
while( $row = mysqli_fetch_object($resultado)){
      $Bloques[] = $row;
}

$PreguntaOpcionPorPregunta = [];
foreach($PreguntasOpciones as $PreguntaOpcion){
  $PreguntaOpcionPorPregunta[$PreguntaOpcion->id_pregunta][$PreguntaOpcion->id_opcion] = $PreguntaOpcion;
}

foreach($Preguntas as $Pregunta){
  if(isset($PreguntaOpcionPorPregunta[$Pregunta->id_pregunta])){
    $Pregunta->Opciones = $PreguntaOpcionPorPregunta[$Pregunta->id_pregunta];
  }
}
$PreguntasPorBloque = [];
foreach ($Preguntas as $Pregunta) {
    $PreguntasPorBloque [$Pregunta->id_bloque][$Pregunta->id_pregunta] = $Pregunta;
}

foreach ($Bloques as $Bloque) {
  if(isset($PreguntasPorBloque[$Bloque->id_bloque])){
    $Bloque->Preguntas=$PreguntasPorBloque[$Bloque->id_bloque];
  }
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
        <li class="active"><a  href="Inicio.php"><i class="fa fa-link"></i> <span>Resolver</span></a></li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <div class="col-sm-12" style="background: #ecf0f5;">
      <section id="main-content">
      <section class="wrapper" style="background: none;">
          <br>
          <?php if ($data['c_estado']=='F') { ?>
                <div class="panel">
                <div class="row" style="text-align: center;padding: 5rem;">
                  Usted ya completo esta encuesta
                </div>
                </div>
                      
           <?php  }else{ ?>
                   <div class="row"> 
                   <div  class="col-sm-12"> 
                    <section class="panel">
                      <form action="Finalizar.php" method="post" id="sendEncuesta">
                       <?php foreach($Bloques as $Bloque){ ?>
                          <?php if(count($Bloque->Preguntas)>0){ ?>
                         <div class="row">
                           <div class="col-md-10 col-md-offset-1" >
                             <h3 style="color: #39b5aa;"><i><?php echo $Bloque->c_nombre_bloque;  ?></i></h3>
                           </div>
                           <div class="col-md-10 col-md-offset-1 well" style="padding: 2rem 0 0 0">
                            <?php foreach((array) $Bloque->Preguntas as $Pregunta){ ?>
                              <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                  <section class="panel">
                                    <header class="panel-heading tab-bg-dark-navy-blue ">
                                      <?php if($Pregunta->c_tipo_pregunta == 'SS'){ ?>
                                        <span class="hidden-sm" style="color: red;">*</span>
                                      <?php } ?>
                                        <span class="hidden-sm wht-color"><?php echo $Pregunta->n_orden_pregunta.".- ".$Pregunta->c_titulo_pregunta; ?></span>
                                    </header>
                                    <div class="panel-body">
                                      <div class="form-group">
                                          <div class="col-sm-12">
                                            <?php if($Pregunta->c_tipo_pregunta == 'SS'){ ?>
                                              <?php foreach($Pregunta->Opciones as $Opcion){ ?>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="pregunta[<?php echo $Pregunta->id_pregunta; ?>]" id="optionsRadios1" value="<?php 
                                                        echo $Opcion->id_opcion; ?>" required>
                                                        <?php echo $Opcion->c_detalle_opcion; ?>
                                                    </label>
                                                </div>
                                              <?php } ?>
                                            <?php } ?>
                                          </div>
                                        </div>
                                      </div>
                                    </section>
                                  </div>
                                </div>
                              <?php } ?>
                            </div>
                          </div>
                        <?php } ?>
                      <?php } ?>
                      <input type="hidden" name="id_encuesta" value="<?php echo $_GET['id_encuesta']; ?>">
                      <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                          <span class="hidden-sm" style="color: red;">* Campos obligatorios</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                          <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                              <div class="form-group">
                                  <button id="buttonEncuesta" type="button" class="btn btn-info btn-block">
                                    <i style="margin-right: 5px;" class="fa fa-save"></i>Enviar
                                  </button>
                               </div>
                             </div>
                          </div>
                        </div>
                      </div>
                      </form>
                    </section>
                    </div>
                    </div>
            <?php } ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
  $(function(){
      $('#buttonEncuesta').on('click',function(){
          var flag=true;
          $('#sendEncuesta .form-group .radio input:first-child').each(function(){
            var name=$(this).attr('name');
            if(!$("input[name^='"+name+"']:checked").val()){
              flag=false;
            }
          });
          if(flag){
            swal({
                title: "",
                text: "¿Esta seguro que desea finalizar la encuesta?",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si",
                closeOnConfirm: true
            }, function(isConfirm){
                if (isConfirm) {
                  $('#sendEncuesta').submit();
                }
            });
        }else{
          swal(
              '',
              'Debe llenar todos los campos obligatorios',
              'error'
            );
        }
    });
  });
</script>
</body>
</html>
