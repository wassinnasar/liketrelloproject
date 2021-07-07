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
<h3>HaliHalo</h3>
<?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $re): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div>
       <h3><img src="<?php echo e(url('/images/'.$re->image.'.jpg')); ?>"/></h3>
        <h3><img src="<?php echo e(url('/images/'.$re->slice1.'.jpg')); ?>"/></h3><a href="<?php echo e(route('imgslice',['img_id'=>$re->id,'slice_id'=>$re->slice1,])); ?>" method="post">Первый кусок</a>
        <h3><img src="<?php echo e(url('/images/'.$re->slice2.'.jpg')); ?>"/></h3><a href="<?php echo e(route('imgslice',['img_id'=>$re->id,'slice_id'=>$re->slice2,])); ?>" method="post">Второй кусок</a>
        <h3><img src="<?php echo e(url('/images/'.$re->slice3.'.jpg')); ?>"/></h3><a href="<?php echo e(route('imgslice',['img_id'=>$re->id,'slice_id'=>$re->slice3,])); ?>" method="post">Третий кусок</a>
        <h3><img src="<?php echo e(url('/images/'.$re->slice4.'.jpg')); ?>"/></h3><a href="<?php echo e(route('imgslice',['img_id'=>$re->id,'slice_id'=>$re->slice4,])); ?>" method="post">Четвёртый кусок</a>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>
<?php /**PATH /var/www/resources/views/showImage.blade.php ENDPATH**/ ?>