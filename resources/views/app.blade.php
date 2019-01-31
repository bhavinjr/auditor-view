<!doctype>
<html>
    <head>
        <title>Viewdit</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css', 'vendor/viewdit') }}">
        {{-- <link rel="icon" href="/vendor/viewdit/img/favicon.png" /> --}}
    </head>

    <body>

        <div id="root"></div>

        <div style="height: 0; width: 0; position: absolute; display: none;">
            {!! file_get_contents(public_path('/vendor/viewdit/img/icons.svg')) !!}
        </div>

        <script src="{{ mix('js/app.js', 'vendor/viewdit') }}"></script>
    </body>
</html>
