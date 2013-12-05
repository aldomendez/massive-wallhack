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
		@clock = new StopWatch $('#downtime-start')
		@renderName()

	renderName:()->
		nameDisplay = if @name? then @name else @ip 
		@machineNameContainer.html nameDisplay