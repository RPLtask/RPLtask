<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Penghuni'),
));

$this->menu=array(
	array('label'=>'List Penghuni', 'url'=>array('index')),
	array('label'=>'Create Penghuni', 'url'=>array('create')),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('penghuni-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="well">
<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=Penghuni/admin" title="Refresh data"><img width="30" height="30" src="<?php echo Yii::app()->request->baseUrl;?>/images/refresh.ico"/></a>
<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=Penghuni/index" title="List data"><img width="30" height="30" src="<?php echo Yii::app()->request->baseUrl;?>/images/admin.ico"/></a>
<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php?r=Penghuni/create" title="add data"><img width="30" height="30" src="<?php echo Yii::app()->request->baseUrl;?>/images/create.ico"/></a>
</div>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php// $this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div><!-- search-form -->
<?php
function getJenisBayar($data)
	{
		if($data == 1){	return "tahunan";
		}else if($data == 2){return "bulanan";}
		else{return "kontrak";}
		
	}
?> 
<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('penghuni-grid');
}

function gagal(data){
alert('eror '+data);
}

</script>
<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
)); ?>
<?php
 $this->widget('bootstrap.widgets.TbGridView', array(
'type'=>' condensed',
	'dataProvider'=>$model->search(),
    'filter'=>$model,	
	'id'=>'penghuni-grid',
	'columns'=>array(
	
		array(
            'id'=>'id',
            'class'=>'CCheckBoxColumn',
            'selectableRows' => '50',   
        ),
		array(
			'header'=>'No.',
			'value'=>'($this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize) + array_search($data,$this->grid->dataProvider->getData())+1',
		),
		//'id_penghuni',
		array('name'=>'id_pelanggan','header'=>'Nama ','value'=>'$data->pelanggan->nama',),
		'id_kamar',
		
		array('name'=>'tgl_masuk','header'=>'Masuk',
		'value'=>'Yii::app()->dateFormatter->format("dd-MMM-y",strtotime($data->tgl_masuk))'),
		//'tgl_keluar',
		array('name'=>'jenis_bayar'
		,'header'=>'pembayaran',
		'value'=>'getJenisBayar($data->jenis_bayar)',
		'filter' => CHtml::listData(Viewjenisbayar::model()->findall(), 'jenis_bayar', 'n_jenis_bayar'),
		
		),
		
		array('name'=>'nilai_kontrak','type'=>'number','htmlOptions'=>array('style'=>'text-align:right')),
		array(
		'name'=>'status',
		'header'=>'status ',
		 'value'=>'($data->status=="1")?("aktif"):("keluar")'
		),
		
		
			array(
			'type'=>'raw',
			'header'=>'Transaksi',
			//'name'=>'nilai_kontrak',
			'value'=>'CHtml::link("Detail",array("pelanggan/detailtransaksi","id"=>$data[id_penghuni]))',
			'htmlOptions'=>array('data-title'=>'Heading', 'data-content'=>'Content ...', 'rel'=>'popover','style'=>'text-align:right'),
		),
		
		array('header'=>'manipulasi',
			'class'=>'CButtonColumn',
			'deleteConfirmation'=>'yakin berhenti ?',
			'buttons'=>array('delete' => array
			(
			//'label'=>'Delete',
			//'imageUrl'=>Yii::app()->request->baseUrl.'/images/money.png',
			//'htmlOptions'=>'style=width:10',
			//'url'=>'Yii::app()->createUrl("admin/delete", array("id"=>$data["id"]))',
			'options'=>array('class'=>'delete'),

			)),
		),
		
		
		
	),
));
?>
<?php //echo CHtml::ajaxSubmitButton('Filter',array('menu/ajaxupdate'), array(),array("style"=>"display:none;")); ?>
<?php //echo CHtml::ajaxSubmitButton('Activate',array('menu/ajaxupdate','act'=>'doActive'), array('success'=>'reloadGrid')); ?>
<?php //echo CHtml::ajaxSubmitButton('In Activate',array('penghuni/ajaxupdate','act'=>'doInactive'), array('success'=>'reloadGrid')); ?>
<?php echo CHtml::ajaxSubmitButton('Berhenti',array('penghuni/ajaxupdate','act'=>'doDelete'), array('beforeSend'=>'function() { if(confirm("Are You Sure ...")) return true; return false; }','success'=>'reloadGrid','error'=>'gagal')); ?>
<?php// echo CHtml::ajaxSubmitButton('Update sort order',array('menu/ajaxupdate','act'=>'doSortOrder'), array('success'=>'reloadGrid')); ?> 
<?php $this->endWidget(); ?>