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
    this.clock = new StopWatch($('#downtime-start'));
    this.renderName();
    this.url = 'bonder.php/bonder';
    this.bonder = new Bonder({
      ip: this.ip
    });
    this.bonder.fetch();
  }

  App.prototype.renderName = function() {
    var nameDisplay;
    nameDisplay = this.name != null ? this.name : this.ip;
    return this.machineNameContainer.html(nameDisplay);
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
