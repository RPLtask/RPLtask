<?php
$this->breadcrumbs=array(
	'Bayars'=>array('index'),
	$model->id_bayar,
);

$this->menu=array(
	array('label'=>'List Bayar', 'url'=>array('index')),
	array('label'=>'Create Bayar', 'url'=>array('create')),
	array('label'=>'Update Bayar', 'url'=>array('update', 'id'=>$model->id_bayar)),
	array('label'=>'Delete Bayar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bayar),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bayar', 'url'=>array('admin')),
);
?>

<h1>View Bayar #<?php echo $model->id_bayar; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_bayar',
		'id_penghuni',
		'tgl_dibayar',
		'nilai_bayar',
		'sisa_bayar',
		'status',
	),
)); ?>
