<?php echo doctype('html4-trans')."\n"; ?>
<html>
<head>
<?php
echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
echo meta('description', '');
echo meta('author', '');
?>
<?php echo view_var('meta'); ?>

<title><?php echo view_var('title'); ?></title>

<?php echo view_var('head'); ?>

<?php // echo css('welcome.css');  // base layout css  ?>

</head>

<body>

<?php echo view_var('body'); ?>

</body>
</html>