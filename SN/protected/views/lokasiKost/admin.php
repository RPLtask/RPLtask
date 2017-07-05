<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Lokasi'),
));


$this->menu=array(
	array('label'=>'List LokasiKost', 'url'=>array('index')),
	array('label'=>'Create LokasiKost', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('lokasi-kost-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="well">
<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=LokasiKost/admin" title="Refresh data"><img width="30" height="30" src="<?php echo Yii::app()->request->baseUrl;?>/images/refresh.ico"/></a>
<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=LokasiKost/index" title="List data"><img width="30" height="30" src="<?php echo Yii::app()->request->baseUrl;?>/images/admin.ico"/></a>
<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=LokasiKost/create" title="add data"><img width="30" height="30" src="<?php echo Yii::app()->request->baseUrl;?>/images/create.ico"/></a>
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
	// 'template'=>"{items}",
	'columns'=>array(
	array(
			'header'=>'No.',
			'value'=>'($this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize) + array_search($data,$this->grid->dataProvider->getData())+1',
		),
		array('name'=>'id_lokasi','header'=>'ID'),
		array('name'=>'nama_lokasi','header'=>'lokasi'),
		array('name'=>'alamat_lokasi','header'=>'alamat'),
		array('name'=>'pengurus_kost','header'=>'pengurus'),
		'keterangan',
		//'img_kost',
		array('header'=>'Manipulasi',
			'class'=>'CButtonColumn',
		),
	),
)); ?>
