<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Kamar'),
));

// $this->menu=array(
	// array('label'=>'List Kamar', 'url'=>array('index')),
	// array('label'=>'Create Kamar', 'url'=>array('create')),
// );

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('kamar-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="well">
<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=kamar/admin" title="Refresh data"><img width="30" height="30" src="<?php echo Yii::app()->request->baseUrl;?>/images/refresh.ico"/></a>
<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=kamar/index" title="List data"><img width="30" height="30" src="<?php echo Yii::app()->request->baseUrl;?>/images/admin.ico"/></a>
<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=kamar/create" title="add data"><img width="30" height="30" src="<?php echo Yii::app()->request->baseUrl;?>/images/create.ico"/></a>
</div>

<!--<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>-->
<div class="search-form" style="display:none">

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php
function getStatus($data)
	{
		if($data == 1){
			return "digunakan";
		}else{
			return "-";
		}
		
	}
?>
 
<?php
// $nilai_p = Yii::app()->db->createCommand()
					// ->select('*')
					// ->from('viewpenghuni')
					// // ->join('bayar','bayar.id_penghuni=pelanggan.id_pelanggan')
					 // //->where('pelanggan.id_pelanggan=:ip,penghuni', array('status' => 1))
					// // ->group('pelanggan.nama')
					// ->queryAll();
?>

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

		array(
		'name'=>'id_kamar',
		'header'=>'Id Kamar',
		'type'=>'text',
		),

		array(
		'name'=>'id_lokasi',
		'header'=>'Lokasi',
		'value'=>'$data->lokasi->nama_lokasi',
		'type'=>'text',
		'filter' => CHtml::listData(Viewnamalokasi::model()->findall(), 'id_lokasi', 'nama_lokasi'),
		),
		
		array(
		'name'=>'id_tipe',
		'header'=>' Tipe',
		'value'=>'$data->tipe->nama_tipe',
		'filter' => CHtml::listData(TipeKamar::model()->findall(), 'id_tipe', 'nama_tipe'),
		'type'=>'text',
		),
		
		
		
		
		
		//'nomor_kamar',
			array('name'=>'ukuran',
			  'header'=>'ukuran',
			  //'value'=>'getStatus($data->status_h)',
			  'filter' => CHtml::listData(Kamar::model()->findall(), 'ukuran', 'ukuran'),
			  ),
		
		
			array('name'=>'status_h',
			  'header'=>'status',
			  'value'=>'getStatus($data->status_h)',
			  'filter' => CHtml::listData(Viewstatuskamar::model()->findall(), 'status_angka', 'status_h'),
			  ),
		/*
		'tarif',
		*/
		array('header'=>'Manipulasi',
			'class'=>'CButtonColumn',
		),
	),
)); ?>
