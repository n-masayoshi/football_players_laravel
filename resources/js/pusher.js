// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('ffd15488324b8e4bdeb4', {
    cluster: 'ap3'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function (data) {
    alert(JSON.stringify(data));
});
