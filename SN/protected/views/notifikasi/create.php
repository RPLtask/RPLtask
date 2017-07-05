<?php
$this->breadcrumbs=array(
	'Notifikasis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Notifikasi', 'url'=>array('index')),
	array('label'=>'Manage Notifikasi', 'url'=>array('admin')),
);
?>

<h1>Create Notifikasi</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>