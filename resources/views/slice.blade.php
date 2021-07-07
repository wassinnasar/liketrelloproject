<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{--@foreach($pic as $p)--}}
<h3><img src="{{ url('/images/'.$pic.'.jpg') }}"/></h3>
{{--    {{ $pic }}--}}
{{--@endforeach--}}
</body>
</html>
