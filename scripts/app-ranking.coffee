cron = require('cron').CronJob
spawn = require('child_process').spawn

module.exports = (robot) ->
  robot.respond /ranking-ios$/i, (msg) ->
    cli = spawn('php', ['cli/ranking-ios.php'])
    cli.stdout.on 'data', (data) ->
      msg.send data
    cli.stderr.on 'data', (data) ->
      console.log('ranking-ios stderr: ' + data)

  robot.respond /ranking-google$/i, (msg) ->
    cli = spawn('php', ['cli/ranking-android.php'])
    cli.stdout.on 'data', (data) ->
      msg.send data
    cli.stderr.on 'data', (data) ->
      console.log('ranking-android stderr: ' + data)

  robot.respond /ranking-test$/i, (msg) ->
      msg.send "testetst"

  new cron '00 * * * * *', () =>
    cli = spawn('php', ['cli/ranking-ios.php'])
    cli.stdout.on 'data', (data) ->
      robot.send {room: "general"}, data
  , null, true, "Asia/Tokyo"
