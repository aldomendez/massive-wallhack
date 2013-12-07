sammy = Sammy 'body',()->
	@get '#/',()->
		# ----------------------------------------------------------------
		# Los inicializadores de la aplicacion van aqui ------------------
		# Tendra que obtener los datos actuales de la aplicacion que estan
		# guardados en el servidor ---------------------------------------
		return false

	@get '#/report',()->
		$('#downtime_diag').addClass 'hidden'
		@redirect("#/")
		return false

	return false

class App
	constructor:(@ip)->
		@machineNameContainer = $('#machine-name')
		@clock = new StopWatch $('#downtime-start'),60000
		@bonder = new Bonder {
			ip:@ip
		}
		@renderName()
		@loadCurrentState()

	loadCurrentState:()->
		@bonder.fetch {
			success:(model,response,options)->
				app.timerStart response.currentTimer if response.currentTimer?
				app.renderName()
			error:(model,response,options)->
				$('#machine-setup').removeClass 'hidden'
				$('.jumbotron').addClass 'hidden'
				$('.downtime').addClass 'hidden'
		}

	renderName:()->
		nameDisplay = if @bonder.attributes.name? then @bonder.attributes.name else @ip
		@machineNameContainer.html nameDisplay

	timerStart:(miliseconds)->
		@bonder.set 'currentTimer', @clock.start(miliseconds)

Bonder = Backbone.Model.extend {
	defaults:{
		name:''
		ip:''
	}
	url:'bonder.php/bonder'
}

$('#save-machine-data').click (e)->
	e.preventDefault()
	app.bonder.set 'name', $('#bonder-name').val()
	app.bonder.set 'enviroment', $('[name=enviroment]').val()
	app.bonder.save()