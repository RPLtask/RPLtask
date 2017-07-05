<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Pelanggan'=>array('admin'),'Perbaharui Tipe '.$model->id_tipe),
));


$this->menu=array(
	array('label'=>'List TipeKamar', 'url'=>array('index')),
	array('label'=>'Create TipeKamar', 'url'=>array('create')),
	array('label'=>'View TipeKamar', 'url'=>array('view', 'id'=>$model->id_tipe)),
	array('label'=>'Manage TipeKamar', 'url'=>array('admin')),
);
?>


<h1 class="well"><img width="40" height="40" src="<?php echo Yii::app()->request->baseUrl;?>/images/edit.ico"/>&nbsp; Perbaharui Tipe <?=$model->id_tipe?></h1>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>