{{-- plantilla general donde se ejecutara vue --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel + Vue</title>
    {{-- CDN de bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
</head>
<body>
    {{-- Contenedor principal de nuestra app Vue --}}
    <div id="app">

    </div>

    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    {{-- CDN de font awesome; para poner iconos en la app--}}
    <script src="https://kit.fontawesome.com/41dfd82ed4.js" crossorigin="anonymous"></script>
</body>
</html>