<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'bus-form',
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

	<?php echo $form->textFieldRow($model,'id_bus',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'nama_bus',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'jumlah_kursi',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_kategori',array('class'=>'span5','maxlength'=>10)); ?>

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
