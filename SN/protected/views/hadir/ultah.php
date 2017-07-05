<?php

$this->menu=array(
	array('label'=>'List Hadir','url'=>array('index')),
	array('label'=>'Create Hadir','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('hadir-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Data Absen</h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php 
// $this->renderPartial('_search',array(
	// 'model'=>$model,
//)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'hadir-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		'nrp',
		'nama',
		'tgl_lahir',
		
	),
)); ?>
