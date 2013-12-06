// Generated by CoffeeScript 1.6.3
var App, Bonder, sammy;

sammy = Sammy('body', function() {
  this.get('#/', function() {
    return false;
  });
  this.get('#/report', function() {
    $('#downtime_diag').addClass('hidden');
    this.redirect("#/");
    return false;
  });
  return false;
});

App = (function() {
  function App(ip) {
    this.ip = ip;
    this.machineNameContainer = $('#machine-name');
    this.clock = new StopWatch($('#downtime-start'), 60000);
    this.renderName();
    this.bonder = new Bonder({
      ip: this.ip
    });
    this.loadCurrentState();
  }

  App.prototype.loadCurrentState = function() {
    return this.bonder.fetch({
      success: function(model, response, options) {
        if (response.currentTimer != null) {
          return app.timerStart(response.currentTimer);
        }
      }
    });
  };

  App.prototype.renderName = function() {
    var nameDisplay;
    nameDisplay = this.name != null ? this.name : this.ip;
    return this.machineNameContainer.html(nameDisplay);
  };

  App.prototype.timerStart = function(miliseconds) {
    return this.bonder.set('currentTimer', this.clock.start(miliseconds));
  };

  return App;

})();

Bonder = Backbone.Model.extend({
  defaults: {
    name: '',
    ip: ''
  },
  url: 'bonder.php/bonder'
});
