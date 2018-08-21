<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bee Game</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .content img {
            width: 100px;
        }

        button{
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <form action="/hit">
            @foreach ($bees as $bee)
                <img src="{{ asset('img/' . $bee->getIcon()) }}">
                <input name="{{ $bee->getType() . '_' . $bee->getId() }}" value="{{$bee->getHitPoints()}}">
            @endforeach
            <br>
            <br>
            <button type="submit">Hit!</button>
        </form>
    </div>
</div>
</body>
</html>
