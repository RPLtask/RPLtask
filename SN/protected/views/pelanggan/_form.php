<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pelanggan-form',
	'enableAjaxValidation'=>false,
        'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'
	)
)); ?>
     	<fieldset>
		<legend>
			<p class="note">Fields with <span class="required">*</span> are required.</p>
		</legend>

	<?php echo $form->errorSummary($model,'Opps!!!', null,array('class'=>'alert alert-error span12')); ?>
        		
   <div class="control-group">		
			<div class="span4">

	<?php ?>
	
	<?php //echo $form->textFieldRow($model2,'id_user',array('class'=>'span5','maxlength'=>50)); ?>
	<?php echo $form->textFieldRow($model2,'username',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->passwordFieldRow($model2,'password',array('class'=>'span5','maxlength'=>50)); ?>

	
	<?php //echo $form->textField($model2,'hak_akses',array('class'=>'span5','maxlength'=>50,'value'=>1,'style'=>'display:none')); ?>
	
	
	
	<?php //echo $form->textFieldRow($model2,'id_pelanggan',array('class'=>'span5','maxlength'=>50)); ?>
	
	<?//mulai?>
	<?php echo $form->textFieldRow($model,'nama_pelanggan',array('class'=>'span5','maxlength'=>50)); ?>

	<?php// echo $form->textFieldRow($model,'jenis_kelamin',array('class'=>'span5','maxlength'=>10)); ?>
	<?php echo $form->dropDownListRow($model,'jenis_kelamin',array('L'=>'Laki-Laki','P'=>'Perempuan'),array('options'=>array('3'=>array('selected'=>true)))); ?>
		
	
	
	
	
	<?php //echo $form->textFieldRow($model,'id_user',array('class'=>'span5','maxlength'=>10)); ?>

	<?php //echo $form->textFieldRow($model,'alamat',array('class'=>'span5','maxlength'=>60)); ?>
	<?php echo $form->textAreaRow($model,'alamat',array('rows'=>6,'cols'=>80)); ?>

	<?php echo $form->textFieldRow($model,'kelurahan',array('class'=>'span5','maxlength'=>30)); ?>
				
	<?php echo $form->textFieldRow($model,'kecamatan',array('class'=>'span5','maxlength'=>30)); ?>
	<?php echo $form->textFieldRow($model,'kota',array('class'=>'span5','maxlength'=>30)); ?>

	<?php //echo $form->textFieldRow($model,'tanggal_lahir',array('class'=>'span5')); ?>
	<?php //echo $form->textFieldRow($model2,'tanggal_lahir',array('class'=>'span5')); ?>
	
	<div class="control-group">
	<?php echo $form->labelEx($model,'Tanggal Lahir',array('class'=>'control-label')); ?>
	<?php //echo $form->textField($model,'tgl_lahir'); ?>
	<?php //echo $form->error($model,'tgl_lahir'); ?>
	<div class="controls">
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'name'=>'datepicker-Inline',
	'attribute'=>'tanggal_lahir',
	'model'=>$model,
	// additional javascript options for the date picker plugin
	'options'=>array(
	'showAnim'=>'slide',
	'dateFormat'=>'yy-mm-dd',
	
	),
	'htmlOptions'=>array(
	'style'=>'height:20px;'
	),
	));?>
	</div>
	</DIV>	


                        </div>   
  </div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
                        'icon'=>'ok white',  
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
              <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'reset',
                        'icon'=>'remove',  
			'label'=>'Reset',
		)); ?>
	</div>
</fieldset>

<?php $this->endWidget(); ?>

</div>
