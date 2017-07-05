<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Pelanggan'=>array('admin'),'Detail Tipe Kamar'),
));

$this->menu=array(
	array('label'=>'List TipeKamar', 'url'=>array('index')),
	array('label'=>'Create TipeKamar', 'url'=>array('create')),
	array('label'=>'Update TipeKamar', 'url'=>array('update', 'id'=>$model->id_tipe)),
	array('label'=>'Delete TipeKamar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipe),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipeKamar', 'url'=>array('admin')),
);
?>

<h1 class="well"><img width="40" height="40" src="<?php echo Yii::app()->request->baseUrl;?>/images/search.ico"/>&nbsp; Detail Tipe Kamar <?php echo $model->id_tipe; ?></h1>

<div class="well">
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_tipe',
		'nama_tipe',
		'fasilitas',
	),
)); ?>
</div>