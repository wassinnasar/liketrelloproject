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

<?php if($errors->any()): ?>
    <div class ="alert alert-danger">
       <ul>
           <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li><?php echo e($error); ?></li>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </ul>
    </div>
    <?php endif; ?>
<form action="/registration" method="post">
    <?php echo csrf_field(); ?>
    <label> Name </label>
    <input type="text" name="name" /> <br> <br>
    <label> Password </label>
    <input type="password" name="password" /> <br> <br>
    <label> Email </label>
    <input type="text" name="email" /> <br> <br>
    <input type="submit" value ="Registration">
</form>
</body>
</html>
<?php /**PATH /var/www/resources/views/register.blade.php ENDPATH**/ ?>