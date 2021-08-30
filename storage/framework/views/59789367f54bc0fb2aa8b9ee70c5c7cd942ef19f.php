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
<div>
    <form action="/add_item" method="post">
        <?php echo csrf_field(); ?>
        <label>Add item<input type="text" name="item"></label>
        <input type="submit" value="Add to DoList">
    </form>
</div>
</body>
</html>
<?php /**PATH /var/www/resources/views/addItem.blade.php ENDPATH**/ ?>