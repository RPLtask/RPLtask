<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Pembayaran penghuni'),
));?>
<?php $data = Viewpenghuni::model()->find('id_penghuni=:ip',array(':ip'=>$model->id_penghuni));?>
<?php $penghuni = penghuni::model()->find('id_penghuni=:ip',array(':ip'=>$model->id_penghuni));?>
<?php $bayar = Viewbayar::model()->find('id_penghuni=:ip',array(':ip'=>$model->id_penghuni));?>
<h1 class="well"><img width="40" height="40" src="<?php echo Yii::app()->request->baseUrl;?>/images/money.png"/>&nbsp; Pembayaran tunggakan <?=$data['nama']?></h1>
<fieldset><legend><hr></legend>
<div class="form">

<?php 
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'bayar-form',
	'enableAjaxValidation'=>false,
	'action'=>Yii::app()->createUrl('//bayar/bayar_penghuni'),
	 'type'=>'horizontal'
)); ?>



	<?php echo $form->errorSummary($model);//,array('class'=>'control-label') ?>
	
	
	<div class="control-group" style="display:none" >
		<?php echo $form->labelEx($model,'id_penghuni',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'id_penghuni'); ?>
		</div>
		<?php //echo $form->dropDownList($model,'id_penghuni', CHtml::listData(Pelanggan::bayar()->findAll(), 'id_pelanggan', 'nama')); ?>
		<?php echo $form->error($model,'id_penghuni'); ?>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'Nama penghuni',array('class'=>'control-label')); ?>
		<div class="controls">
		<input type="text" value="<?=$data['nama'];?>" disabled/>
		</div>
		<?php //echo $form->dropDownList($model,'id_penghuni', CHtml::listData(Pelanggan::bayar()->findAll(), 'id_pelanggan', 'nama')); ?>
		<?php// echo $form->error($model,'id_penghuni'); ?>
	</div>	
	
	<div class="control-group" style="display:none" >
		<?php echo $form->labelEx($model,'id_bayar'); ?>
		<?php echo $form->textField($model,'id_bayar'); ?>
		<?php //echo $form->dropDownList($model,'id_penghuni', CHtml::listData(Pelanggan::bayar()->findAll(), 'id_pelanggan', 'nama')); ?>
		<?php echo $form->error($model,'id_bayar'); ?>
	</div>
	
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'Bulan bayar',array('class'=>'control-label')); ?>
		<?php// $ik = Kamar::model()->findByPk($model->id_kamar); ?>
		<?php 
		$bayar = Viewbayar::model()->findAll(array('condition'=>'status = 0 and id_penghuni ='.$model->id_penghuni.' order by sisa_bayar desc'));
		$bayar = CHtml::listData($bayar,'tgl_bayar','tgl_bayar_str');
		?>
		<div class="controls">
		<?php $this->widget('ext.select2.ESelect2', array(
              'name' => 'penyuplai',
              'data' =>$bayar,
              'htmlOptions' => array(
                  'multiple' => true,
				  'style'=>'width:220px',
				  'id'=>'penyuplai',
				  'onchange'=>'getTgl()',
				  'onmousemove'=>'getSisa()'
				  //'empty'=>array($model->id_kamar=>$ik['id_kamar']),//kalo update
              ),
          )); ?>
		  </div>
		<?php echo $form->error($model,'tgl_bayar'); ?>
	</div>
	
	<script>
	function getTgl(){
	//alert($('#tgl_bayar').val());
	//alert("Selected value is: "+$("#penyuplai").val());
	$('#tgl_bayar').val($("#penyuplai").val());
	var tanggal_bayar = $('#tgl_bayar').val();
	var array = tanggal_bayar.split(',');
	var jumlah_bulan = array.length;
	var nilai_bayar = $('#nb').val();
	$('#nk').val(jumlah_bulan*<?=$penghuni['nilai_kontrak']?>);
	}
	</script>

	<div class="control-group" style="display:none">
	<?php echo $form->labelEx($model,'tgl_bayar'); ?>
		<?php echo $form->textField($model,'tgl_bayar',array('id'=>'tgl_bayar','value'=>'')); ?>
		<?php echo $form->error($model,'tgl_bayar'); ?>
	</div>
	
	
	<div class="control-group">
		 <?php 
		 echo $form->labelEx($model,'tgl_dibayar',array('class'=>'control-label')); ?>
		 <div class="controls">
		  <?php 
		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'publishDate',
			'attribute'=>'tgl_dibayar',
			'model'=>$model,
			// additional javascript options for the date picker plugin
			'options'=>array(
				'showAnim'=>'fold',
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				'style'=>'height:20px;',
				'value'=>date('Y-m-d'),
			),
		));?>
		</div>
		<?php echo $form->error($model,'tgl_dibayar'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'Nilai kontrak',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo CHtml::textField('nkk',$penghuni['nilai_kontrak'],array('disabled'=>true,'id'=>'nk')); ?>
		</div>
		<?php //echo $form->error($model,'nilai_kontrak'); ?>
	</div>
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'Nilai bayar',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'nilai_bayar',array('value'=>$bayar['nilai_bayar'],'onkeydown'=>'getSisa()','id'=>'nb','onmousemove'=>'getSisa()')); ?> 
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'button', 'type'=>'primary', 'label'=>'Lunasi','htmlOptions'=> array('onclick'=> 'lunasi()','onkeydown'=>'getSisa()','id'=>'nb','onmousemove'=>'getSisa()'))); ?>
		</div >

		<?php echo $form->error($model,'nilai_bayar'); ?>
	</div>
	
	<script>
	function lunasi(){
	$('#nb').val($('#nk').val());
	}
	</script>
	
	<Script>
	function getSisa(){
	var sisa_bayar = $('#sb').val();
	var  nilai_kontrak = $('#nk').val();
	var  nilai_bayar = $('#nb').val();
	$('#sb').val(nilai_kontrak-nilai_bayar);
	//----deklarasi jumlah bulan-----------
	var tanggal_bayar = $('#tgl_bayar').val();
	var array = tanggal_bayar.split(',');
	var jumlah_bulan = array.length;
	//--------------------------------------
	//alert(jumlah_bulan);
	//if (jumlah_bulan>'1')
//		document.getElementById("checkstatus").checked=true;
	if (jumlah_bulan>0){
		//alert(sisa_bayar);
		//$('#checkstatus').val('0');
		if (sisa_bayar=='0')
			//$('#checkstatus').checked = true;
			document.getElementById("checkstatus").checked=true;
		else if (sisa_bayar!=0)
			document.getElementById("checkstatus").checked=false;
		}
	}
	</Script>
	<div class="control-group">
		<?php echo $form->labelEx($model,'sisa_bayar',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'sisa_bayar',array('id'=>'sb','onkeyup'=>'getSisa()')); ?>
		</div>
		<?php echo $form->error($model,'sisa_bayar'); ?>
	</div>

	<div class="control-group" style="display:block">
		<?php echo $form->labelEx($model,'status Lunas',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->CheckBox($model,'status',array('size'=>11,'maxlength'=>11,'id'=>'checkstatus')); ?>
		</div>
		<?php //echo $form->textField($model,'status',array('size'=>11,'maxlength'=>11,'id'=>'checkstatus','value'=>'1')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Bayar','htmlOptions'=>array('onmousemove'=>'getSisa()'))); ?>
    <?php// $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Batal')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<fieldset>
