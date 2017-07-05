<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Kamar'=>array('admin'),'Perbaharui kamar'),
));

// $this->menu=array(
	// array('label'=>'List Kamar', 'url'=>array('index')),
	// array('label'=>'Create Kamar', 'url'=>array('create')),
	// array('label'=>'View Kamar', 'url'=>array('view', 'id'=>$model->id_kamar)),
	// array('label'=>'Manage Kamar', 'url'=>array('admin')),
// );
?>
<h1 class="well"><img width="40" height="40" src="<?php echo Yii::app()->request->baseUrl;?>/images/edit.ico"/>&nbsp; Perbaharui Kamar <?php echo $model->id_kamar; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>