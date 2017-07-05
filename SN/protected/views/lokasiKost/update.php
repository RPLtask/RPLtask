<?php

$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Pelanggan'=>array('admin'),'Perbaharui Lokasi'.$data->id_lokasi),
));


$this->menu=array(
	array('label'=>'List LokasiKost', 'url'=>array('index')),
	array('label'=>'Create LokasiKost', 'url'=>array('create')),
	array('label'=>'View LokasiKost', 'url'=>array('view', 'id'=>$model->id_lokasi)),
	array('label'=>'Manage LokasiKost', 'url'=>array('admin')),
);
?>

<h1 class="well"><img width="40" height="40" src="<?php echo Yii::app()->request->baseUrl;?>/images/edit.ico"/>&nbsp; Perbaharui Lokasi <?=$model->id_lokasi?> </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>