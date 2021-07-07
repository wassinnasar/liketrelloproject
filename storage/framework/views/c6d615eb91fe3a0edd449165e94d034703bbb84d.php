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
         <form action="/images_load" method="post" enctype="multipart/form-data">

             <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
             <input type ="file" name="uploaded_file">
             <input type="submit">
         </form>
     </div>
</body>
</html>
<?php /**PATH /var/www/resources/views/welcome.blade.php ENDPATH**/ ?>