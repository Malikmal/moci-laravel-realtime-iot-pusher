<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  {{-- <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('80591f2e6f7d317e5392', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script> --}}
</head>
<body>
  <h1>Pusher Test</h1>

  <button onclick="event(new App\Events\TestEvent('hello world'))">clic</button>
</body>
