<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Kamar'=>array('admin'),'Kamar baru'),
));
?>


<?php
$this->menu=array(
	array('label'=>'List Kamar', 'url'=>array('index')),
	array('label'=>'Manage Kamar', 'url'=>array('admin')),
);
?>

<h1 class="well"><img width="40" height="40" src="<?php echo Yii::app()->request->baseUrl;?>/images/create.ico"/>&nbsp; Kamar baru</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>