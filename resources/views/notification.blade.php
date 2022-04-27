
<!DOCTYPE html>
<html>
  <head>
    <title>Pusher Test</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>
    <script>

      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher('{{env("MIX_PUSHER_APP_KEY")}}', {
          cluster: '{{env("PUSHER_APP_CLUSTER")}}',
          encrypted: true
      });

      var channel = pusher.subscribe('my-channel');
          channel.bind('MyEvent', function(data) {
            alert(JSON.stringify(data));
          });
    </script>
  </head>
  <body>
    <h1>Pusher Test</h1>
    <p>
      Try publishing an event to channel <code>my-channel</code>
      with event name <code>my-event</code>.
    </p>
  </body>

</html>




