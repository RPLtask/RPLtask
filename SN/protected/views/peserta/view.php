<?php
$this->breadcrumbs=array(
	'Pesertas'=>array('index'),
	$model->nrp,
);

$this->menu=array(
	array('label'=>'List Peserta', 'url'=>array('index')),
	array('label'=>'Create Peserta', 'url'=>array('create')),
	array('label'=>'Update Peserta', 'url'=>array('update', 'id'=>$model->nrp)),
	array('label'=>'Delete Peserta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->nrp),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Peserta', 'url'=>array('admin')),
);
?>

<h1>View Peserta #<?php echo $model->nrp; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nrp',
		'nama',
	),
)); ?>
