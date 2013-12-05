class StopWatch
  constructor:(@display,rate)->
    @refreshRate = rate ? 1000
    @startTime = 0
    @stopTime = 0

  start:()->
    @startTime = new Date()
    @running = true
    console.log @selfRunner(@)
    @startTime

  selfRunner:(that)->
    that.render()
    that.timer = setTimeout that.selfRunner,that.refreshRate,that
    return that.timer

  elapsed:()->
    elapsed = (new Date() - @startTime)/1000
    remain = 0
    dd = Math.floor elapsed / 86400
    hh = Math.floor (elapsed%86400) / 3600
    mi = Math.floor (elapsed - (dd*86400)-(hh*3600))/60
    return if dd==0 and hh==0 and mi ==0 then "Hace unos segundos" else "#{dd}d #{hh}h #{mi}m"

  stop:()->
    @stopTime = new Date()
    @render()
    window.clearTimeout @timer
    @elapsed()

  render:()->
    @display.html(@elapsed())