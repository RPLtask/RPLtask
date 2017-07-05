<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bayar-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_penghuni'); ?>
		<?php echo $form->textField($model,'id_penghuni'); ?>
		<?php echo $form->error($model,'id_penghuni'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_dibayar'); ?>
		<?php echo $form->textField($model,'tgl_dibayar'); ?>
		<?php echo $form->error($model,'tgl_dibayar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nilai_bayar'); ?>
		<?php echo $form->textField($model,'nilai_bayar'); ?>
		<?php echo $form->error($model,'nilai_bayar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sisa_bayar'); ?>
		<?php echo $form->textField($model,'sisa_bayar'); ?>
		<?php echo $form->error($model,'sisa_bayar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->