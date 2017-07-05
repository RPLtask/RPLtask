<?php
$this->breadcrumbs=array(
	'Notifikasis'=>array('index'),
	$model->id_notifikasi,
);

$this->menu=array(
	array('label'=>'List Notifikasi', 'url'=>array('index')),
	array('label'=>'Create Notifikasi', 'url'=>array('create')),
	array('label'=>'Update Notifikasi', 'url'=>array('update', 'id'=>$model->id_notifikasi)),
	array('label'=>'Delete Notifikasi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_notifikasi),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Notifikasi', 'url'=>array('admin')),
);
?>

<h1>View Notifikasi #<?php echo $model->id_notifikasi; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_notifikasi',
		'id_penghuni',
		'tgl_notifikasi',
		'total_tagihan',
		'periode_tagihan',
		'status',
	),
)); ?>
