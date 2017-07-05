<?php
$this->breadcrumbs=array(
	'Rutes'=>array('index'),
	$model->id_rute=>array('view','id'=>$model->id_rute),
	'Update',
);

?>

<h1>Update Rute <?php echo $model->id_rute; ?></h1>
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
                array('label'=>'Update', 'icon'=>'icon-edit', 'url'=>Yii::app()->controller->createUrl('update',array('id'=>$model->id_rute)),'active'=>true, 'linkOptions'=>array()),
	),
));
$this->endWidget();
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>