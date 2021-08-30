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
   <?php $__currentLoopData = $userItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <h3><?php echo e($uItem->item); ?></h3><a href="<?php echo e(route('deleteItem',['item_id'=>$uItem->id,])); ?>" method="post">Delete</a>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <a href="<?php echo e(route('itemForm')); ?>">Add item</a>
</body>
</html>
<?php /**PATH /var/www/resources/views/showMyItems.blade.php ENDPATH**/ ?>