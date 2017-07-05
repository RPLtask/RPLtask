<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Pelanggan'=>array('admin'),'Update'),
));

$this->menu=array(
	array('label'=>'List Penghuni', 'url'=>array('index')),
	array('label'=>'Create Penghuni', 'url'=>array('create')),
	array('label'=>'View Penghuni', 'url'=>array('view', 'id'=>$model->id_penghuni)),
	array('label'=>'Manage Penghuni', 'url'=>array('admin')),
);
?>


<h1 class="well"><img width="40" height="40" src="<?php echo Yii::app()->request->baseUrl;?>/images/edit.ico"/>&nbsp; Perbaharui Penghuni <?php echo $model->id_penghuni; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>