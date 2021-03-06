<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Music Theory</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    </head>

    <body>
        <main id="app">
            <router-view />
        </main>

        <script>
            window.theory = @json($theory);
        </script>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
