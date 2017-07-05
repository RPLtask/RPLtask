<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Pelanggan'=>array('admin'),'Kamar baru'),
));


$this->menu=array(
	array('label'=>'List TipeKamar', 'url'=>array('index')),
	array('label'=>'Manage TipeKamar', 'url'=>array('admin')),
);
?>

<h1 class="well"><img width="40" height="40" src="<?php echo Yii::app()->request->baseUrl;?>/images/create.ico"/>&nbsp; Tipe baru</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>