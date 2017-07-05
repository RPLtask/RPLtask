<?php
// $data = new pelanggan;
// print_r($tunggakan->getData());

$this->breadcrumbs=array(
	'Daftar Penghuni ',
);

$this->menu=array(
	array('label'=>'List Pelanggan', 'url'=>array('index')),
	array('label'=>'Create Pelanggan', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pelanggan-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=Penghuni/admin" title="Refresh data"><img width="30" height="30" src="<?php echo Yii::app()->request->baseUrl;?>/images/refresh.ico"/></a>
<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=Penghuni/index" title="List data"><img width="30" height="30" src="<?php echo Yii::app()->request->baseUrl;?>/images/admin.ico"/></a>
<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=Penghuni/create" title="add data"><img width="30" height="30" src="<?php echo Yii::app()->request->baseUrl;?>/images/create.ico"/></a>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php 
// $this->renderPartial('_search',array(
	// 'model'=>$model,
// )); 
?>
</div><!-- search-form -->


<?php $this->widget('bootstrap.widgets.TbGridView', array(
'type'=>'striped bordered condensed',
	'id'=>'bayar-grid',
	'dataProvider'=>$tunggakan,
    //'filter'=>$tunggakan,
	//'htmlOptions'=>('class'=>'well'),
	 'template'=>"{items}",
	'columns'=>array(
		array(
			'header'=>'No.',
			'value'=>'($this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize) + array_search($data,$this->grid->dataProvider->getData())+1',
		),
		// 'id_pelanggan',
		array('name'=>'id_penghuni','header'=>'id penghuni'),
		array('name'=>'nama','header'=>'Nama penghuni'),
		array('name'=>'nama_lokasi','header'=>'Lokasi'),
		array('name'=>'nomor_kamar','header'=>'Id kamar'),
		array('name'=>'nama_tipe','header'=>'Tipe'),		
		array('name'=>'tgl_masuk','header'=>'Masuk'),
		array('name'=>'tgl_keluar','header'=>'Keluar'),
		array('name'=>'jenis_bayar','header'=>'jenis bayar'),
		array('name'=>'nilai_kontrak','header'=>'Nilai kontrak'),
		/*
		'img_ktp',
		'alamat',
		'tgl_lahir',
		'keterangan',
		*/
		// array(
			// 'type'=>'raw',
			// 'header'=>'Bayar',
			// 'value'=>'CHtml::link("Bayar",array("bayar/detailTunggakan","id"=>$data[id_pelanggan]))',
			// // 'value'=>'$data[id_pelanggan]',
		    // // 'htmlOptions'=>array('data-title'=>'Heading', 'data-content'=>'Content ...', 'rel'=>'popover'),
		// ),
		array
(
	'header'=>'manipulasi',
    'class'=>'CButtonColumn',
	'deleteButtonUrl'=>'Yii::app()->createUrl("penghuni/delete", array("id"=>$data[id_penghuni]))',
	'updateButtonUrl'=>'Yii::app()->createUrl("penghuni/update", array("id"=>$data[id_penghuni]))',
	'viewButtonUrl'=>'Yii::app()->createUrl("penghuni/view", array("id"=>$data[id_penghuni]))',
	'deleteConfirmation'=>"js:'Data dengan ID '+$(this).parent().parent().children(':first-child').text()+' akan di hapus, apakah anda yakin?'",
   // 'deleteUrl'=>'ad',
	'template'=>'{view}{update}{delete}',
    'buttons'=>array
    (
        'hapus' => array
        (
            'label'=>'',
            //'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.ico',
            'url'=>'Yii::app()->createUrl("penghuni/delete", array("id"=>$data[id_penghuni]))',
			'options'=>array( 'class'=>'icon-remove' ),
        ),
        'apdet' => array
        (
            'label'=>'[-]',
             'url'=>'Yii::app()->createUrl("penghuni/update", array("id"=>$data[id_penghuni]))',
			// 'imageUrl'=>Yii::app()->request->baseUrl.'/images/Edit.ico',
				'options'=>array( 'class'=>'icon-edit' ),
           // 'visible'=>'$data->score > 0',
           // 'click'=>'function(){alert("Going down!");}',
        ),'lihat' => array
        (
            'label'=>'[-]',
			// 'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.ico',
            'url'=>'Yii::app()->createUrl("penghuni/view", array("id"=>$data[id_penghuni]))',
			'options'=>array( 'class'=>'icon-search' ),
            //'visible'=>'$data->score > 0',
            //'click'=>'function(){alert("Going down!");}',
        ),
		
		
    ),
),
	),
)); ?>
