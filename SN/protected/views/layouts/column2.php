<?php $this->beginContent('//layouts/main'); ?>
<!--<div class="span-19">-->
<?
// if (Yii::app()->user->isGuest) {
	// $this->redirect(array('Site/login'));
	// }
?>
<a href="<?php echo $this->createUrl('site/index')?>">Home</a>&nbsp;&nbsp;|
<a href="<?php echo $this->createUrl('hadir/admin')?>">Data Absen</a>&nbsp;&nbsp;|
<!--
<a href="<?php echo $this->createUrl('peserta/create')?>">Peserta Baru</a>&nbsp;&nbsp;|
<a href="<?php echo $this->createUrl('peserta/admin')?>">Data Peserta </a>&nbsp;&nbsp;|
<a href="<?php echo $this->createUrl('hadir/ultah')?>">Peserta hadir yang ulang tahun </a>&nbsp;&nbsp;|
	-->
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
<!--</div>-->
<!--
<div class="span-5 last">
	<div id="sidebar">
	<?php
		// $this->beginWidget('zii.widgets.CPortlet', array(
			// 'title'=>'Operations',
		// ));
		// $this->widget('zii.widgets.CMenu', array(
			// 'items'=>$this->menu,
			// 'htmlOptions'=>array('class'=>'operations'),
		// ));
		// $this->endWidget();
	?>
	</div>
	
</div>-->
	<!-- sidebar -->
<?php $this->endContent(); ?>
