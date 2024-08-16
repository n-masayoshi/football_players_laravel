import './bootstrap';
import Alpine from 'alpinejs';
import './pusher';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#submit").click(function () {
        const url = "/posts/create";
        $.ajax({
            url: url,
            data: {
                text: $("#text").val()
            },
            method: "POST"
        });
        return false;
    });
    window.Echo.channel('post')
        .listen('Posted', (e) => {
            $("#board").append('<li>' + e.post.text + '</li>');
        });
});
