<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Encuesta - Registro</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="Views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="Views/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" >
  <div height="100%" width="50%" align="center">
    <div class="login" style=" padding-top: 7%; width: 400px">
      <div class="login-logo">
        <a href="index.php"><b>Sistema de Encuesta</b></a>
      </div>
  
      <div class="login-box-body">
        <form action="Controllers/Registrar_user.php" method="post">

           <div class="form-group has-feedback">
            <input type="Cuenta" name="nombre_usuario" class="form-control" placeholder="Nombre" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]{1,5}" title="Nombre" required>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div> 

          <div class="form-group has-feedback">
            <input type="Cuenta" name="apellido_usuario" class="form-control" placeholder="Apellidos" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]{1,5}" title="Apellidos" required>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div> 

          <div class="form-group has-feedback">
            <input type="Cuenta" name="codigo_usuario" class="form-control" placeholder="Numero de Control" pattern="^[a-zA-Z0-9]+$" title="Codigo" required>
              <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
          </div> 
          <div class="form-group has-feedback">
          	 <p>
                Fecha de Nacimiento:
            <input type="date" name="fecha_nacimiento"  class="form-control" placeholder="Fecha de Nacimiento" name="fc"value="2020-01-01"min="1900-01-01" max="2020-12-31" title="Fecha de Nacimiento" required>
             </p>
          </div> 

           <div class="form-group has-feedback">
             <p>
             	Sexo:
              <label><input type="radio" name="sexo" value="Masculino."> Masculino.</label>
              <label><input type="radio" name="sexo" value="Femenino."> Femenino.</label>
              <label><input type="radio" name="sexo" value="Indefinido."> Indefinido.</label>
             </p>
           </div>

          <div class="form-group has-feedback">
            <p>
                  Estado Civil:
                  <br>
                  <select name="estado_civil">
                  <option></option>
                  <option>Soltero.</option>
                  <option>Casado.</option>
                  <option>Divorciado.</option>
                  <option>Separación en proceso judicial.</option>
                  <option>Viudo.</option>
                  <option>Concubinato.</option>
              </select>
              </p>
          </div> 

          <div class="form-group has-feedback">
            <input type="Cuenta" name="domicilio" class="form-control" placeholder="Domicilio" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]{1,5}" title="Domicilio" required>
               <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="number" maxlength="15" name="numero_telefono" class="form-control" placeholder="Numero de Telefono" pattern="^[0-9]" title="Numero de Telefono" required>
               <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
          </div>

           <div class="form-group has-feedback">
            <p>
                  Carrera que Estudio:
                  <select name="carrera">
                  <option></option>
                  <option>INGENIERÍA EN ADMINISTRACIÓN.</option>
                  <option>INGENIERÍA EN INDUSTRIAS ALIMENTARIAS.</option>
                  <option>INGENIERÍA EN SISTEMAS COMPUTACIONALES.</option>
                  <option>INGENIERÍA INDUSTRIAL.</option>
                  <option>INGENIERÍA AMBIENTAL.</option>
                  <option>INGENIERÍA EN TECNOLOGÍAS DE LA INFORMACIÓN.</option>
              </select>
              </p>
          </div> 

          <div class="form-group has-feedback">
          	<p>
          		Año de Ingreso:
            <input type="date" name="año_ingreso"  class="form-control" placeholder="Año de Ingreso" name="fc"value="2020-01-01"min="1900-01-01" max="2020-12-31" title="Año de Ingreso" required>
            </p>
          </div>

           <div class="form-group has-feedback">
          	<p>
          		Año de Egreso:
            <input type="date" name="año_egreso"  class="form-control" placeholder="Año de Egreso" name="fc"value="2020-01-01"min="1900-01-01" max="2020-12-31" title="Año de Egreso" required>
            </p>
          </div> 

          <div class="form-group has-feedback">
             <p>
             	Titulado:
              <label><input type="radio" name="titulado" value="Si"> Si.</label>
              <label><input type="radio" name="titulado" value="No"> No.</label>
             </p>
           </div>

          <div class="form-group has-feedback">
            <input type="Cuenta" name="cuenta_usuario" class="form-control" placeholder="Correo Electronico" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="ejemplo@gmail.com" required>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password" name="contraseña_usuario" class="form-control" placeholder="Contraseña">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <div class="row" >
            <div class="col-xs-4"  style="width: 40% !important;">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar Usuario</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
