<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'viewpenghuni-viewpenghuni-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama'); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_penghuni'); ?>
		<?php echo $form->textField($model,'id_penghuni'); ?>
		<?php echo $form->error($model,'id_penghuni'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nilai_kontrak'); ?>
		<?php echo $form->textField($model,'nilai_kontrak'); ?>
		<?php echo $form->error($model,'nilai_kontrak'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_lokasi'); ?>
		<?php echo $form->textField($model,'nama_lokasi'); ?>
		<?php echo $form->error($model,'nama_lokasi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nomor_kamar'); ?>
		<?php echo $form->textField($model,'nomor_kamar'); ?>
		<?php echo $form->error($model,'nomor_kamar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_tipe'); ?>
		<?php echo $form->textField($model,'nama_tipe'); ?>
		<?php echo $form->error($model,'nama_tipe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenis_bayar'); ?>
		<?php echo $form->textField($model,'jenis_bayar'); ?>
		<?php echo $form->error($model,'jenis_bayar'); ?>
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


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->