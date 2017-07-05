<?php
$this->breadcrumbs=array(
	'Notifikasis'=>array('index'),
	$model->id_notifikasi=>array('view','id'=>$model->id_notifikasi),
	'Update',
);

$this->menu=array(
	array('label'=>'List Notifikasi', 'url'=>array('index')),
	array('label'=>'Create Notifikasi', 'url'=>array('create')),
	array('label'=>'View Notifikasi', 'url'=>array('view', 'id'=>$model->id_notifikasi)),
	array('label'=>'Manage Notifikasi', 'url'=>array('admin')),
);
?>

<h1>Update Notifikasi <?php echo $model->id_notifikasi; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>