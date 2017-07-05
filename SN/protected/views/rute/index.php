<br>
<br>
<br>
<?php
$this->breadcrumbs=array(
	'Rutes',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('rute-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>
<h1>5 Langkah Pemesana Tiket </h1>
<br>
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
    'buttons'=>array(
        array('label'=>'1. Pilih Tanggal Keberangkatan', 'url'=>'#'),
        array('label'=>'2. Pilih Kota Asal', 'url'=>'#'),
        array('label'=>'3. Pilih Kota Tujuan', 'url'=>'#'),
        array('label'=>'4. Pilih Kelas Keberangkat', 'url'=>'#'),
        array('label'=>'5. Pilih Detail Keberangkatan', 'url'=>'#'),
    ),
)); ?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Modal header</h4>
</div>
 
<div class="modal-body">
    <p>One fine body...</p>
</div>
 
<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Save changes',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>
 
<?php $this->endWidget(); ?>


<hr />

<?php 
// $user = Yii::app()->user->id;
// $pengguna = Pengguna::model()->find('username=:un',array(':un'=>$user));

// if ($pengguna['hak_akses']==2){
// }
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
                array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
		array('label'=>'Search', 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
		array('label'=>'Export to PDF', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GeneratePdf'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
		array('label'=>'Export to Excel', 'icon'=>'icon-download', 'url'=>Yii::app()->controller->createUrl('GenerateExcel'), 'linkOptions'=>array('target'=>'_blank'), 'visible'=>true),
	),
));
$this->endWidget();
?>




<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->




<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pelanggan-form',
	'enableAjaxValidation'=>false,
        'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'
	)
)); ?>
<?
$Rute= Rute::model()->findAll(array());
$data_rute = CHtml::listData($Rute,'berangkat','berangkat');
$data_rute2 = CHtml::listData($Rute,'tujuan','tujuan');
?>
<div class="control-group">
<?php echo $form->labelEx($model,'Berangkat',array('class'=>'control-label')); ?>
	<?php //$nilai = Pelanggan::model()->findByPk($model->id_pelanggan); ?>
	<div class="controls">
	<?php $this->widget('ext.select2.ESelect2', array(
		  'name' => 'Rute[berangkat]',
		  'data' =>$data_rute,
		  'value' =>$berangkat,
		  'htmlOptions' => array(
			  'multiple' => '',
			  'style'=>'width:220px',
			  'empty'=>'',//kalo update
		  ),
	  )); ?>
	 </div>
	<?php echo $form->error($model,'tujuan'); ?>
</div>
<div class="control-group">
<?php echo $form->labelEx($model,'tujuan',array('class'=>'control-label')); ?>
	<?php //$nilai = Pelanggan::model()->findByPk($model->id_pelanggan); ?>
	<div class="controls">
	<?php $this->widget('ext.select2.ESelect2', array(
		  'name' => 'Rute[tujuan]',
		  'value'=>$tujuan,
		  'data' =>$data_rute2,
		  'htmlOptions' => array(
			  'multiple' => '',
			  'style'=>'width:220px',
			  'empty'=>'',//kalo update
		  ),
	  )); ?>
	 </div>
	<?php echo $form->error($model,'tujuan'); ?>
</div>


 <?php 
//Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
    // $this->widget('CJuiDateTimePicker',array(
        // 'name'=>'define a model attribute here', // like Event[start_date]
        // 'model'=>$model,
        // 'value'=>"define a value here",
         // //  'attribute'=>'['.$i.']timein', //attribute name

                // 'mode'=>'datetime', //use "time","date" or "datetime" (default)
        // 'options'=>array('timeFormat'=>'hh:mm:ss','hour'=>'8'

// ) // jquery plugin options
    // ));
?>

<div class="control-group">
	<?php echo $form->labelEx($model,'Tanggal Berangkat',array('class'=>'control-label')); ?>
	<?php //echo $form->textField($model,'tgl_lahir'); ?>
	<?php //echo $form->error($model,'tgl_lahir'); ?>
	<div class="controls">
	<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
    $this->widget('CJuiDateTimePicker',array(
        'model'=>$model, //Model object
		'value'=>"define a value here",
		// 'currentText'=>'xxx',
        'attribute'=>'waktu', //attribute name
		'mode'=>'date', //use "time","date" or "datetime" (default)
        'options'=>array(
			'dateFormat'=>'yy-mm-dd', 

		// 'empty'=>$waktu,//kalo update
		 'showSecond'=>true,
		 
		), // jquery plugin options
		'htmlOptions'=>array('value'=>$waktu),
		'language' => '',
    ));
?>
	</div>
</DIV>
<?
// echo $berangkat ;
// echo "<br>";
// echo $tujuan; 
// echo "<br>";
// echo $waktu;
// echo "<br>";
// echo $kelas;

?>
<div class="control-group">
<?php echo $form->labelEx($model,'kelas',array('class'=>'control-label')); ?>
	<?php //$nilai = Pelanggan::model()->findByPk($model->id_pelanggan); ?>
	<div class="controls">
	<?php $this->widget('ext.select2.ESelect2', array(
		  'name' => 'Rute[kelas]',
		  'data' => array('AC'=>'AC','AG'=>'AG') ,
		  'value'=>$kelas,
		  'htmlOptions' => array(
			  'multiple' => '',
			  'style'=>'width:220px',
			  'empty'=>'',//kalo update
		  ),
	  )); ?>
	 </div>
	<?php echo $form->error($model,'kelas'); ?>
</div>
	

	<div class="controls">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'search white',  
			'label' => 'Cari'			
			//'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>
		
		
              <?php
			  // $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'reset',
                        // 'icon'=>'remove',  
			// 'label'=>'Reset',
		// )); ?>


<?php $this->endWidget(); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'rute-grid',
	'dataProvider'=>$data,
        'type'=>'striped bordered condensed',
        'template'=>'{summary}{pager}{items}{pager}',
	'columns'=>array(
		// 'id_rute',
		'waktu',
		'berangkat',
		'tujuan',
		'harga',
		'kelas',
		/*
		'id_bus',
		*/
		
       // array(
            // 'class'=>'bootstrap.widgets.TbButtonColumn',
			// 'template' => '{view} {update} {delete}',
			 // 'buttons' => array(
				
			      // // 'view' => array(
					// // 'label'=> 'View',
					// // 'options'=>array(
						// // 'class'=>'btn btn-small view'
					// // )
				// // ),	
                              // // 'update' => array(
					// // 'label'=> 'Update',
					// // 'options'=>array(
						// // 'class'=>'btn btn-small update'
					// // )
				// // ),
				// // 'delete' => array(
					// // 'label'=> 'Delete',
					// // 'options'=>array(
						// // 'class'=>'btn btn-small delete'
					// // )
				// // )
			// ),
            // 'htmlOptions'=>array('style'=>'width: 115px'),
           // ),
		
		array(
		'type'=>'raw',
		'header'=>'Lihat',
		'value'=>'CHtml::link("Detail",array("pemesanan/create","id_rute"=>$data[id_rute]),array("style"=>"text-decoration:none"))',
		'visible'=>!Yii::app()->user->isGuest,
		),
		
	),
)); ?>

