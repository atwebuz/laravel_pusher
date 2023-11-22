<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/css/app.css' , 'resources/js/app.js'])
    <title>Live Chat</title>
</head>
<body>
<div class="app">
    <div class="row">

        <div class="col-sm-6 offset-sm-3 my-2">
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter a user ..........">
        </div>

        <div class="col-sm-6 offset-sm-3">
            <div class="box box-primary direct-chat direct-chat-primary">

                <div class="box-body">
                    <div class="direct-chat-messages" id="messages"></div>
                </div>

                <div class="box-footer">
                    <form action="#" method="post" id="message_form">
                        <div class="input-group">
                            <input type="text" name="message" id="message" placeholder="Type Message ..." class="form-control">
                            <span class="input-group-btn">
                                <button type="submit" id="send_message"  class="btn btn-primary btn-flat">Send</button>
                          </span>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

<style>
    body{
    margin-top:20px;
    background:#eee;
}
.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}
.box.box-primary {
    border-top-color: #3c8dbc;
}

.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
}

.direct-chat .box-body {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    position: relative;
    overflow-x: hidden;
    padding: 0;
}
.direct-chat-messages {
    padding: 10px;
    height: 150px;
    overflow: auto;
}

</style>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    // Set up CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Laravel Echo and Pusher configuration
    window.Pusher = require('pusher-js');

    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: process.env.MIX_PUSHER_APP_KEY,
        cluster: process.env.MIX_PUSHER_APP_CLUSTER,
        encrypted: true,
    });

    // Listen for the event and update the UI with the received message
    window.Echo.channel('chat')
        .listen('MessageSent', (e) => {
            $('#messages').append('<div><strong>' + e.username + '</strong>: ' + e.message + '</div>');
        });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>
