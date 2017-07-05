<?php
$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	$model->id_kategori=>array('view','id'=>$model->id_kategori),
	'Update',
);

?>

<h1>Update Kategori <?php echo $model->id_kategori; ?></h1>
<hr/>

<?php 
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
                array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
                array('label'=>'Update', 'icon'=>'icon-edit', 'url'=>Yii::app()->controller->createUrl('update',array('id'=>$model->id_kategori)),'active'=>true, 'linkOptions'=>array()),
	),
));
$this->endWidget();
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>