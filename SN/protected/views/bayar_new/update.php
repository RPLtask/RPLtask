<?php
$this->breadcrumbs=array(
	'Bayars'=>array('index'),
	$model->id_bayar=>array('view','id'=>$model->id_bayar),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bayar', 'url'=>array('index')),
	array('label'=>'Create Bayar', 'url'=>array('create')),
	array('label'=>'View Bayar', 'url'=>array('view', 'id'=>$model->id_bayar)),
	array('label'=>'Manage Bayar', 'url'=>array('admin')),
);
?>

<h1>Update Bayar <?php echo $model->id_bayar; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>