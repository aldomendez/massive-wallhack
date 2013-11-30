<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

  <title>Log De Bonders</title>

  <link rel="stylesheet" href="../jsLib/bootstrap3.0.2/css/bootstrap.min.css">
    <link href="jumbotron-narrow.css" rel="stylesheet">
</head>
<body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#/">Inicio</a></li>
          <li><a href="#/todas">Todas</a></li>
          <li><a href="#/comentarios">Comentarios</a></li>
        </ul>
        <h3 class="text-muted">Tiempos Perdidos</h3>
      </div>

      <div class="jumbotron">
        <h1>#BonderName</h1>
        <p class="lead">Causa por la que esta actualmente detenida</p>
        <p><a class="btn btn-lg btn-success" href="#/start" role="button">#time_down[hh:mm]</a></p>
      </div>

      <div class="row hidden" id="downtime_diag">
        <div class="input-group">
          <input type="text" class="form-control input-sm" id="downtime_input">
          <span class="input-group-btn">
            <a class="btn btn-default btn-sm" href="#/Report">Report</a>
          </span>
        </div>
      </div>

      <div class="row marketing">
        <ul class="list-group col-lg-12">
          <a href="#/show_more" class="list-group-item">
            <h4 class="list-group-item-heading">#downtime</h4>
            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          </a>
          <a href="#/show_more" class="list-group-item">
            <h4 class="list-group-item-heading">#downtime</h4>
            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          </a>
          <a href="#/show_more" class="list-group-item">
            <h4 class="list-group-item-heading">#downtime</h4>
            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          </a>
          <a href="#/show_more" class="list-group-item">
            <h4 class="list-group-item-heading">#downtime</h4>
            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          </a>
          <a href="#/show_more" class="list-group-item">
            <h4 class="list-group-item-heading">#downtime</h4>
            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          </a>
          <a href="#/show_more" class="list-group-item">
            <h4 class="list-group-item-heading">#downtime</h4>
            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          </a>
          <a href="#/show_more" class="list-group-item">
            <h4 class="list-group-item-heading">#downtime</h4>
            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          </a>
          <a href="#/show_more" class="list-group-item">
            <h4 class="list-group-item-heading">#downtime</h4>
            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          </a>
          <a href="#/show_more" class="list-group-item">
            <h4 class="list-group-item-heading">#downtime</h4>
            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          </a>
        </ul>
      </div>

      <div class="footer">
        <p>&copy; Avago Tech 2013</p>
      </div>

    </div> <!-- /container -->

<script type="text/javascript" src="../jsLib/jquery/jquery.js"></script>
<script type="text/javascript" src="../jsLib/sammy/lib/min/sammy-latest.min.js"></script>
<script type="text/javascript">
  // Inicializo la aplicacion
  var app = Sammy('body', function () {
    this.get('#/', function () {
      // Fetch actual state
    });

    this.get('#/start', function () {
      $('#downtime_diag').removeClass('hidden');
      $("#downtime_input").focus().val('');
      this.redirect("#/");
    });

    this.get('#/Report', function () {
      $('#downtime_diag').addClass('hidden');
      this.redirect("#/");
    });
  })
  // Pido la informacion de la maquina al Host (si existe [que deberia de existir])
  // Despliego la informacion.
  // Actualizo la direccion.

  app.run('#/');
</script>

</body>
</html>