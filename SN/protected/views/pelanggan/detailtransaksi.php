<?php
$row = Yii::app()->db->createCommand()
					->select('distinct(nama)')
					->from('viewdetailtransaksi')
					// ->join('bayar','bayar.id_penghuni=pelanggan.id_pelanggan')
					->where('id_penghuni=:ip', array(':ip' => $_GET['id'] ))
					// ->group('pelanggan.nama')
					->queryRow();
?>

<h1 class="well"><img width="40" height="40" src="<?php echo Yii::app()->request->baseUrl;?>/images/money.png"/>&nbsp; Detail Pembayaran<?php echo ' '.$row['nama']; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(

	'links'=>array('Mengatur Pelanggan'=>array('penghuni/admin'),$row['nama']),
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
	'dataProvider'=>$detailtransaksi,
    'filter'=>$model,
	//'htmlOptions'=>('class'=>'well'),
	 //'template'=>"{items}",
	 'itemsCssClass'=>'gridtablecss',
	 'emptyText'=>'Pelanggan masih tidak ada',


	'columns'=>array(
		array(
			'header'=>'No.',
			'value'=>'($this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize) + array_search($data,$this->grid->dataProvider->getData())+1',
		),
		// 'id_pelanggan',
		//array('name'=>'id_penghuni','header'=>'ID penghuni'),
	//	array('name'=>'nama','header'=>'Nama Lengkap'),
		array('name'=>'bulan','header'=>'bulan'),
		array('name'=>'tgl_dibayar','header'=>'tanggal bayar',
		//'value'=>'Yii::app()->dateFormatter->format("dd-MMM-y",strtotime($data->tgl_masuk))',
		),
		//array('name'=>'no_ktp','header'=>'No KTP'),
		array('name'=>'nilai_bayar',
		'header'=>'nilai bayar',
		'type'=>'number',
		'htmlOptions'=>array('style'=>'text-align:right'),
		'class'=>'ext.gridcolumns.TotalColumn',
		'footer'=>true,
		),
		array(
		'name'=>'sisa_bayar',
		'header'=>'sisa',
		'htmlOptions'=>array('style'=>'text-align:right'),
		'class'=>'ext.gridcolumns.TotalColumn',
		'type'=>'number',
		'footer'=>true,
		),
		array('name'=>'status','header'=>'status'),
		// array('name'=>'img_ktp','header'=>'Foto','type'=>'html',
		// 'value'=>'(!empty($data->id_pelanggan))?CHtml::image(Yii::app()->baseUrl."/foto/".$data->id_pelanggan.".jpg","",array("style"=>"width:150px;height:200px;border:10px;")):"no image"',

		// ),
		/*
		'alamat',
		'tgl_lahir',
		'keterangan',
		*/
		// array(
			// 'type'=>'raw',
			// 'header'=>'Bayar',
			// 'value'=>'CHtml::link("Bayar",array("bayar/detailTunggakan","id"=>$data[id_bayar]))',
			// 'htmlOptions'=>array('data-title'=>'Heading', 'data-content'=>'Content ...', 'rel'=>'popover'),
		// ),
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