<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        {!! HTML::style('css/bootstrap.min.css') !!}
        {!! HTML::style('css/bootstrap-theme.css') !!}
        <meta charset="utf-8">
        <style>.flash {padding: 1em; border: 1px dotted black; }</style>
    </head>

    <body>
        @if (Session::get('flash_message'))
            <div class="flash">
                {!! Session::get('flash_message') !!}
            </div>
        @endif

        <div class="container">
            @yield('content')
        </div>
    </body>

    {!! HTML::script('js/jquery.min.js') !!}

    {!! HTML::script('js/bootstrap.min.js') !!}

</html>
