<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'notifikasi-form',
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
		<?php echo $form->labelEx($model,'tgl_notifikasi'); ?>
		<?php echo $form->textField($model,'tgl_notifikasi'); ?>
		<?php echo $form->error($model,'tgl_notifikasi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_tagihan'); ?>
		<?php echo $form->textField($model,'total_tagihan'); ?>
		<?php echo $form->error($model,'total_tagihan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'periode_tagihan'); ?>
		<?php echo $form->textField($model,'periode_tagihan'); ?>
		<?php echo $form->error($model,'periode_tagihan'); ?>
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