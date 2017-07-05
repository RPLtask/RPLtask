<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Penghuni'=>array('admin'),'Detail Penghuni'),
));
$this->menu=array(
	array('label'=>'List Penghuni', 'url'=>array('index')),
	array('label'=>'Create Penghuni', 'url'=>array('create')),
	array('label'=>'Update Penghuni', 'url'=>array('update', 'id'=>$model->id_penghuni)),
	array('label'=>'Delete Penghuni', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_penghuni),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Penghuni', 'url'=>array('admin')),
);
?>

<h1 class="well"><img width="40" height="40" src="<?php echo Yii::app()->request->baseUrl;?>/images/search.ico"/>&nbsp; Detail Penghuni <?php echo $model->id_penghuni; ?></h1>

<div class="well">  
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_penghuni',
		array('name'=>'id_pelanggan','value'=>$model->pelanggan->nama,'type'=>'raw'),
		'id_kamar',
		'tgl_masuk',
		'tgl_keluar',
		//'jenis_bayar',
		array('name'=>'nilai_kontrak','type'=>'number'),
		array('name'=>'','header'=>'Foto','type'=>'raw',
		//if $model->img_kamar!=''
		'value'=> CHtml::image(Yii::app()->request->baseUrl.'/foto/'.$model->id_pelanggan.'.jpg','',array("style"=>"width:150px;height:200px;border:10px;border-radius:10px;")),
		
		),
		//'status',
	),
)); ?>
</div> 	
