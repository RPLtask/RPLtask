<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Kamar'=>array('admin'),'Detail kamar'.$data->id_kamar),
));

// $this->menu=array(
	// array('label'=>'List Kamar', 'url'=>array('index')),
	// array('label'=>'Create Kamar', 'url'=>array('create')),
	// array('label'=>'Update Kamar', 'url'=>array('update', 'id'=>$model->id_kamar)),
	// array('label'=>'Delete Kamar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_kamar),'confirm'=>'Are you sure you want to delete this item?')),
	// array('label'=>'Manage Kamar', 'url'=>array('admin')),
// );
?>

<h1 class="well"><img width="40" height="40" src="<?php echo Yii::app()->request->baseUrl;?>/images/search.ico"/>&nbsp; Detail Kamar <?php echo $model->id_kamar; ?></h1>

<div class="well">
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array('name'=>'id_kamar','header'=>'id','align'=>'left'),
		//array('name'=>'id_tipe','header'=>'Tipe'),
		array('name'=>'id_tipe','value'=>$model->tipe->nama_tipe,'type'=>'raw'),
		array('name'=>'id_lokasi','value'=>$model->lokasi->nama_lokasi,'type'=>'raw'),
		
		array('name'=>'nomor_kamar','header'=>''),
	//	'value'=>'CHtml::image(Yii::app()->baseUrl./fotokamar/.$data->id_kamar'.jpg'))',

		'ukuran',
			array('name'=>'tarif','type'=>'number','htmlOptions'=>array('style'=>'text-align:right;color:red')),
		array('name'=>'img_kamar','header'=>'Foto','type'=>'raw','value'=> CHtml::image(Yii::app()->request->baseUrl.'/fotokamar/'.$model->id_kamar.'.jpg','',array("style"=>"width:150px;height:200px;border:10px;border-radius:10px;")),),
	),
)); ?>
</div>