<h1 class="well"><img width="40" height="40" src="<?php echo Yii::app()->request->baseUrl;?>/images/warning.ico"/>&nbsp; Data Tunggakan<?php echo ' '.$row['nama']; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('penghuni yang menunggak'),
));

// $this->menu=array(
	// array('label'=>'List Pelanggan', 'url'=>array('index')),
	// array('label'=>'Create Pelanggan', 'url'=>array('create')),
// );

// Yii::app()->clientScript->registerScript('search', "
// $('.search-button').click(function(){
	// $('.search-form').toggle();
	// return false;
// });
// $('.search-form form').submit(function(){
	// $.fn.yiiGridView.update('pelanggan-grid', {
		// data: $(this).serialize()
	// });
	// return false;
// });
// ");
?>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php 
// $this->renderPartial('_search',array(
	// 'model'=>$model,
// )); 
?>
</div><!-- search-form -->


<div class="well">
<?php 
$this->widget('bootstrap.widgets.TbGridView', array(
'type'=>'striped bordered condensed',
	'dataProvider'=>$tunggakan,
    'filter'=>$model,
	//'htmlOptions'=>('class'=>'well'),
	 //'template'=>"{items}",
	 'itemsCssClass'=>'gridtablecss',
	 'emptyText'=>'data masih tidak ada',


	'columns'=>array(
		array(
			'header'=>'No.',
			'value'=>'($this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize) + array_search($data,$this->grid->dataProvider->getData())+1',
		),
		// 'id_pelanggan',
		//array('name'=>'id_penghuni','header'=>'ID penghuni'),
		array('name'=>'nama','header'=>'Nama Lengkap'),
		array('name'=>'tlp','header'=>'Telepon'),
		array('name'=>'email','header'=>'E-mail'),
		//array('name'=>'no_ktp','header'=>'No KTP'),
		array('name'=>'tlp_ortu','header'=>' Orang tua'),
		array('name'=>'tgl_masuk','header'=>'Masuk'),
		array('name'=>'total_tunggakan','header'=>'total'),
		// array('name'=>'img_ktp','header'=>'Foto','type'=>'html',
		// 'value'=>'(!empty($data->id_pelanggan))?CHtml::image(Yii::app()->baseUrl."/foto/".$data->id_pelanggan.".jpg","",array("style"=>"width:150px;height:200px;border:10px;")):"no image"',

		// ),
		/*
		'alamat',
		'tgl_lahir',
		'keterangan',
		*/
			array(
			'type'=>'raw',
			'header'=>'Transaksi',
			//'name'=>'nilai_kontrak',
			'value'=>'CHtml::link("Detail",array("pelanggan/detailtransaksi","id"=>$data[id_penghuni]))',
			'htmlOptions'=>array('data-title'=>'Heading', 'data-content'=>'Content ...', 'rel'=>'popover','style'=>'text-align:right'),
		),
			array(
				'type'=>'raw',
				'header'=>'Bayar',
				'value'=>'CHtml::link("Bayar",array("bayar/detailTunggakan","id"=>$data[id_bayar]))',
				'htmlOptions'=>array('data-title'=>'Heading', 'data-content'=>'Content ...', 'rel'=>'popover'),
			),
		// array(
			// 'class'=>'CButtonColumn',
		// ),
	),
)); ?>

 <?php 
// $this->widget('bootstrap.widgets.TbGridView', array(
// 'type'=>'striped bordered condensed',
	// 'id'=>'bayar-grid',
	// 'dataProvider'=>$tunggakan,
    // //'filter'=>$model,
	// //'htmlOptions'=>('class'=>'well'),
	 // 'template'=>"{items}",
	// 'columns'=>array(
		// array(
			// 'header'=>'No.',
			// 'value'=>'($this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize) + array_search($data,$this->grid->dataProvider->getData())+1',
		// ),
		// // 'id_pelanggan',
		// // array('name'=>'nama','header'=>'Nama Lengkap'),
		// // array('name'=>'tlp','header'=>'Telepon'),
		// // array('name'=>'email','header'=>'Email'),
		// // array('name'=>'no_ktp','header'=>'No KTP'),
		// // array('name'=>'tlp_ortu','header'=>'Telepon Ortu'),
		// /*
		// 'img_ktp',
		// 'alamat',
		// 'tgl_lahir',
		// 'keterangan',
		// */
		// array(
			// 'type'=>'raw',
			// 'header'=>'Bayar',
			// 'value'=>'CHtml::link("Bayar",array("bayar/detailTunggakan","id"=>$data[id_penghuni]))',
			// // 'value'=>'$data[id_pelanggan]',
// `		    'htmlOptions'=>array('data-title'=>'Heading', 'data-content'=>'Content ...', 'rel'=>'popover'),
		// ),
		// // array(
			// // 'class'=>'CButtonColumn',
		// // ),
	// ),
// )); ?>
</div>