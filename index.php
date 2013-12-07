<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aldo Mendez Reyes">
    <meta name="description" content="Control de tiempos perdidos de las bonder">
    <!-- Favicon, que por cierto aun no hago
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png"> -->

  <title>Log De Bonders</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="jumbotron-narrow.css" rel="stylesheet">
</head>
<body>
<div class="container">
<!-- header
++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="header">
    <ul class="nav nav-pills pull-right">
      <li class="active"><a href="#/edit_bonder">#BonderName</a></li>
      <li><a href="#/celda">Celda</a></li>
      <li><a href="#/todas">Todas</a></li>
      <li><a href="#/comentarios">Comentarios</a></li>
    </ul>
    <h3 class="text-muted hidden-xs">Tiempos Perdidos</h3>
  </div>
<!-- Jumbotron
++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="jumbotron">
    <h1 id="machine-name">#machine-name</h1>
    <p class="lead">Causa por la que esta actualmente detenida</p>
    <p><a class="btn btn-lg btn-success" href="#/" role="button" id="downtime-start">Reportar falla</a></p>
  </div>
<!-- Formato de alta de nuevas maquinas
++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="row hidden" id="machine-setup">
    <form role="form">
      <legend>Alta de nuevas maquinas</legend>
      <div class="form-group">
        <label for="bonder-name">Nombre</label>
        <input class="form-control" type="text" id="bonder-name" placeholder="Ingresa el nombre de la Maquina"></input>
      </div>
      <div class="radio">
        <label class="radio-inline">
          <input type="radio" id="env-1" name="enviroment" value="prod"> Maquina de produccion
        </label>
        </div><div class="radio">
        <label class="radio-inline">
          <input type="radio" id="env-2" name="enviroment" value="rev"> Maquina de revision
        </label>
      </div>
      <a href="#/" class="btn btn-default" id="save-machine-data">Guardar</a>
    </form>
  </div>
<!-- Downtime dialog
++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="row hidden" id="downtime_diag">
    <div class="input-group">
      <input type="text" class="form-control input-sm" id="downtime_input">
      <span class="input-group-btn">
        <a class="btn btn-default btn-sm" href="#/" id="downtime-report">Report</a>
      </span>
      <span class="input-group-btn">
        <a class="btn btn-default btn-sm" href="#/" id="downtime-cancel">Cancel</a>
      </span>
    </div>
  </div>
<!-- Lista de Downtimes pasados
++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="row downtime">
    <ul class="list-group col-lg-12">
      <a href="#/show_more" class="list-group-item">
        <h4 class="list-group-item-heading">#downtime</h4>
        <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
      </a>
    </ul>
  </div>
<!-- Footer
++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="footer">
    <p>&copy; Avago Tech 2013</p>
  </div>

</div> <!-- /container -->

<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/underscore-1.5.2.min.js"></script>
<script type="text/javascript" src="js/sammy.js"></script>
<script type="text/javascript" src="js/backbone-1.1.0min.js"></script>
<script type="text/javascript" src="js/stopwatch.js"></script>
<!-- <script type="text/javascript" src="js/moment.js"></script> -->
<!-- <script type="text/javascript" src="js/xdate.js"></script> -->
<script type="text/javascript" src="js/app.js"></script>
<script>
  $(function () {
      sammy.run('#/');
      window.app = new App('<?php echo $_SERVER['REMOTE_ADDR']; ?>');
    });
</script>
</body>
</html>