<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"> <!--verificar---->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css"><!--verificar---->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css"><!--verificar---->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css"><!--verificar---->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script><!--verificar---->
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script><!--verificar---->
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script><!--verificar---->
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script><!--verificar---->
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script><!--verificar---->
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script><!--verificar---->
	<script src="vendor/daterangepicker/daterangepicker.js"></script><!--verificar---->
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script><!--verificar---->
<!--===============================================================================================-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>

    <link rel="stylesheet" href="<?php echo e(asset('site/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('site/style.css')); ?>">
    <script src="<?php echo e(asset('site/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('site/jquery.js')); ?>"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="py-0">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\GitHub\New-PIUNIVESP\resources\views/layouts/layout.blade.php ENDPATH**/ ?>