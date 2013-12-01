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

  <link rel="stylesheet" href="../jsLib/bootstrap3.0.2/css/bootstrap.min.css">
    <link href="jumbotron-narrow.css" rel="stylesheet">
</head>
<body>
<div class="container">
<!-- header
++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="header">
    <ul class="nav nav-pills pull-right">
      <li class="active"><a href="#/edit_bonder">#BonderName</a></li>
      <li><a href="#/todas">Todas</a></li>
      <li><a href="#/comentarios">Comentarios</a></li>
    </ul>
    <h3 class="text-muted">Tiempos Perdidos</h3>
  </div>
<!-- Jumbotron
++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="jumbotron">
    <h1>#BonderName</h1>
    <p class="lead">Causa por la que esta actualmente detenida</p>
    <p><a class="btn btn-lg btn-success" href="#/" role="button" id="downtime-start">#time_down[hh:mm]</a></p>
  </div>
<!-- Formato de alta de nuevas maquinas
++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="row hidden">
    <form role="form">
      <legend>Alta de nuevas maquinas</legend>
      <div class="form-group">
        <label for="bonder_name">Nombre</label>
        <input class="form-control" type="text" id="bonder_name" placeholder="Ingresa el nombre de la Maquina"></input>
      </div>
      <div class="radio">
        <label class="radio-inline">
          <input type="radio" id="env-1" name="Enviroment"> Maquina de produccion
        </label>
        </div><div class="radio">
        <label class="radio-inline">
          <input type="radio" id="env-2" name="Enviroment"> Maquina de revision
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
  <div class="row marketing">
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

<script type="text/javascript" src="../jsLib/jquery/jquery.js"></script>
<script type="text/javascript" src="../jsLib/sammy/lib/min/sammy-latest.min.js"></script>
<script type="text/javascript" src="../jsLib/moment/moment.min.js"></script>
<script type="text/javascript" src="../jsLib/xdate/xdate.js"></script>
<script type="text/javascript">
  // Inicializo la aplicacion

  var app = Sammy('body', function () {
    this.get('#/', function () {
      // Fetch actual state
    });

    this.get('#/Report', function () {
      $('#downtime_diag').addClass('hidden');
      this.redirect("#/");
    });
  })
  // Pido la informacion de la maquina al Host (si existe [que deberia de existir])
  // Despliego la informacion.
  // Actualizo la direccion.
  var App = {
    apiAddress:'Bonder.Name.Class.php',
    clock:{
      display:$('#downtime-start'),
      timerDone:true
    },

    timedUpdate:function (seconds) {
      if (!seconds) {seconds = 1000};
      App.updateTime();
      if (App.clock.timerDone) {
        window.setTimeout(App.timedUpdate,seconds);
      };
    },
    
    updateTime:function () {
      var time = moment("15:18","hh:mm").fromNow();
      App.clock.display.html(time);
    },

    log:function(message) {
      console.log(message);
    }
  };

  $(document).ready(function(){
  
    log = App.log;
    app.run('#/');


    $('#save-machine-data').click(function(){
      $.getJSON(App.apiAddress,function(data){

      })
    });

    $('#downtime-start').click(function (e) {
      e.preventDefault();
      $('#downtime_diag').removeClass('hidden');
      $("#downtime_input").focus().val('');
    });

    $('#downtime-report').click(function (e) {
      e.preventDefault();
      $('#downtime_diag').addClass('hidden');
      $("#downtime_input").focus().val('');
      App.timedUpdate();
    })

    $('#downtime-cancel').click(function (e) {
      e.preventDefault();
      $('#downtime_diag').addClass('hidden');
      $("#downtime_input").focus().val('');
    });

  });

  
</script>

</body>
</html>