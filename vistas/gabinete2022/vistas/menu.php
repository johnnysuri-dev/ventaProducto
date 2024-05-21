<?php require_once "dependencias.php" ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <br><br><br><br><br><br>
  <!-- Begin Navbar -->
  <div id="nav">
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="inicio.php"><img class="img-responsive logo img-thumbnail" src="../img/ok.png" alt="" width="100px" height="100px"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a>
            </li>            
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Administrar U.E.<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="curso.php">Curso</a></li>
              <li><a href="estudiante.php">Estudiante</a></li>
              <li><a href="listasEstudiantes.php">Lista Estudiantes</a></li>
            </a></li>
            <li><a href="listaDatosFamilia.php"> Lista Padre/Madre</a></li>
          </ul>
        </li>
          <li class="dropdown" >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false"><span class="glyphicon glyphicon-user"></span>Agenda <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li> <a href="agendaGeneral.php"><span class="glyphicon glyphicon-user"></span> Agenda</a></li>
            <!--
            <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Agenda2</a></li>-->
          </ul>
        </li>
        <li class="dropdown" >
          <a href="menuSesiones.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false"><span class="glyphicon glyphicon-user"></span>Sesiones <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="menuSesiones.php">Administracion Sesiones</a></li>
          </ul>
        </li>
        <li>
          <a href="MuneReportes.php"><span class="glyphicon glyphicon-user"></span> Reportes</a>
        </li>
        <li>
          <a href="../registro.php"><span class="glyphicon glyphicon-user"></span> Crear Usuario</a>
        </li>
        <li class="dropdown" >
          <a href="#" style="color: red" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuario: <?php //echo$_SESSION['usuario'];?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a style="color: red"href="../procesos/salir.php"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!--/.nav-collapse -->
  </div>
  <!--/.contatiner -->
</div>
</div>
<!-- Main jumbotron for a primary marketing message or call to action -->
<!-- /container -->        
</body>
</html>
