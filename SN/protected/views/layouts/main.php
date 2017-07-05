<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?
// if (Yii::app()->user->isGuest) {
	// $this->redirect(array('Site/login'));
	// }
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	  <link rel="SHORTCUT ICON" href="<?php echo Yii::app()->request->baseUrl;?>/images/home.ico"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<?php Yii::app()->bootstrap->register(); ?>
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <?php Yii::app()->getClientScript()->registerCoreScript('jquery.ui'); ?>
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/bootstrap.min.css'); ?>
	
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title>SN 	</title>
</head>

<body bgcolor="red">
<br>
<br>
<div class="container" id="page" style="border:none">

	<div id="header" style="border:none;margin-top:-18px;">
	</div><!-- header -->

	<div id="mainmenus" style="display:block">	


	</div><!-- mainmenu -->

	<?php echo $content; ?>

	<div class="clear"></div>

		<?php //echo Yii::powered(); ?>
	</div><!-- footer -->
</div><!-- page -->

</body>
</html>
