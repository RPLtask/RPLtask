<?php
$this->breadcrumbs=array(
	'Pelanggans'=>array('index'),
	'Create',
);

?>

<h1>Daftar Pelanggan</h1>
<hr/>
<?php 
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$user = Yii::app()->user->id;
$pengguna = Pengguna::model()->find('username=:un',array(':un'=>$user));
if ($pengguna['hak_akses']==2){
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'),'active'=>true, 'linkOptions'=>array()),
                array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
		array('label'=>'Search', 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
	),
));
}


$this->endWidget();
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>