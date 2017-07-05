<?php
$this->breadcrumbs=array(
	'Bayars'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Bayar', 'url'=>array('index')),
	array('label'=>'Create Bayar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('bayar-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
'type'=>'striped bordered condensed',
	'id'=>'bayar-grid',
	'dataProvider'=>$model->search(),
    'filter'=>$model,
	//'htmlOptions'=>('class'=>'well'),
	 'template'=>"{items}",
	'columns'=>array(
		'id_bayar',
		'id_penghuni',
		'tgl_dibayar',
		'nilai_bayar',
		'sisa_bayar',
		'status',
		
		'tgl_bayar',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
