<?php
$this->breadcrumbs=array(
	'Pesertas'=>array('index'),
	$model->nrp=>array('view','id'=>$model->nrp),
	'Update',
);

$this->menu=array(
	array('label'=>'List Peserta', 'url'=>array('index')),
	array('label'=>'Create Peserta', 'url'=>array('create')),
	array('label'=>'View Peserta', 'url'=>array('view', 'id'=>$model->nrp)),
	array('label'=>'Manage Peserta', 'url'=>array('admin')),
);
?>

<h1>Update Peserta <?php echo $model->nrp; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>