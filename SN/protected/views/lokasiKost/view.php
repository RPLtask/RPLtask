<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Pelanggan'=>array('admin'),'Detail lokasi'.$model->id_lokasi),
));

// $this->menu=array(
	// array('label'=>'List LokasiKost', 'url'=>array('index')),
	// array('label'=>'Create LokasiKost', 'url'=>array('create')),
	// array('label'=>'Update LokasiKost', 'url'=>array('update', 'id'=>$model->id_lokasi)),
	// array('label'=>'Delete LokasiKost', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_lokasi),'confirm'=>'Are you sure you want to delete this item?')),
	// array('label'=>'Manage LokasiKost', 'url'=>array('admin')),
// );
?>

<h1 class="well"><img width="40" height="40" src="<?php echo Yii::app()->request->baseUrl;?>/images/search.ico"/>&nbsp; Detail Lokasi <?php echo $model->id_lokasi; ?></h1>

<div class="well">
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_lokasi',
		'nama_lokasi',
		'alamat_lokasi',
		'pengurus_kost',
		'keterangan',
			array('name'=>'img_kost','header'=>'Foto','type'=>'raw',
		'value'=> CHtml::image(Yii::app()->request->baseUrl.'/fotolokasi/'.$model->id_lokasi.'.jpg','',array("style"=>"width:500px;height:300px;border:10px;border-radius:10px;")),
),
	),
)); ?>
</div>