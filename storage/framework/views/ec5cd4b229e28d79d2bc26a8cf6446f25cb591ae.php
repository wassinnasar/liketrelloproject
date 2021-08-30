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
<form action="/login_check" method="post">
    <?php echo csrf_field(); ?>
    <label> Name </label>
    <input type="text" name="name" /> <br> <br>
    <?php echo csrf_field(); ?>
    <label> Password </label>
    <input type="password" name="password" /> <br> <br>
    <input type="submit" value ="Login">
</form>
</body>
</html>
<?php /**PATH /var/www/resources/views/login.blade.php ENDPATH**/ ?>