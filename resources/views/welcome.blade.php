<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="container">
        <h1 class="text-center mt-5">Realtime Notification</h1>
            <div class="row">
                <div class="col-12">
                    
                </div>
            </div>
        </div>
    </body>

    <script>
            window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
    </script>
    <script src="//{{ Request::getHost() }}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
    <script src="{{ url('/js/laravel-echo-setup.js') }}" type="text/javascript"></script>
    
    <script type="text/javascript">
        var i = 0;
        window.Echo.channel('user-channel')
         .listen('.UserEvent', (data) => {
            i++;
            $("#notification").append('<div class="alert alert-success">'+i+'.'+data.title+'</div>');
        });
    </script>
</html>
