<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'penghuni-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_pelanggan'); ?>
		<?php echo $form->textField($model,'id_pelanggan',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'id_pelanggan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_kamar'); ?>
		<?php echo $form->textField($model,'id_kamar',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id_kamar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_masuk'); ?>
		<?php echo $form->textField($model,'tgl_masuk'); ?>
		<?php echo $form->error($model,'tgl_masuk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_keluar'); ?>
		<?php echo $form->textField($model,'tgl_keluar'); ?>
		<?php echo $form->error($model,'tgl_keluar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenis_bayar'); ?>
		<?php echo $form->textField($model,'jenis_bayar',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'jenis_bayar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nilai_kontrak'); ?>
		<?php echo $form->textField($model,'nilai_kontrak'); ?>
		<?php echo $form->error($model,'nilai_kontrak'); ?>
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