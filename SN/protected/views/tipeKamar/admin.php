<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Tipe'),
));

$this->menu=array(
	array('label'=>'List TipeKamar', 'url'=>array('index')),
	array('label'=>'Create TipeKamar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tipe-kamar-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<div class="well">
<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=TipeKamar/admin" title="Refresh data"><img width="30" height="30" src="<?php echo Yii::app()->request->baseUrl;?>/images/refresh.ico"/></a>
<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=TipeKamar/index" title="List data"><img width="30" height="30" src="<?php echo Yii::app()->request->baseUrl;?>/images/admin.ico"/></a>
<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=TipeKamar/create" title="add data"><img width="30" height="30" src="<?php echo Yii::app()->request->baseUrl;?>/images/create.ico"/></a>
</div>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('bootstrap.widgets.TbGridView', array(
'type'=>'',
	'dataProvider'=>$model->search(),
    'filter'=>$model,
	//'htmlOptions'=>('class'=>'well'),
	 //'template'=>"{items}",
	'columns'=>array(
	array(
			'header'=>'No.',
			'value'=>'($this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize) + array_search($data,$this->grid->dataProvider->getData())+1',
		),
		//'id_tipe',
		'nama_tipe',
		'fasilitas',
		array('header'=>'Manipulasi',
			'class'=>'CButtonColumn',
		),
	),
)); ?>
