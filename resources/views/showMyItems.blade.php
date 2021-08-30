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
   @foreach($userItems as $uItem)
      <h3>{{ $uItem->item }}</h3><a href="{{ route('deleteItem',['item_id'=>$uItem->id,]) }}" method="post">Delete</a>
   @endforeach
      <a href="{{route('itemForm')}}">Add item</a>
</body>
</html>
