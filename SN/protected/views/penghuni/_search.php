<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_penghuni'); ?>
		<?php echo $form->textField($model,'id_penghuni'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_pelanggan'); ?>
		<?php echo $form->textField($model,'id_pelanggan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_kamar'); ?>
		<?php echo $form->textField($model,'id_kamar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_masuk'); ?>
		<?php echo $form->textField($model,'tgl_masuk'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_keluar'); ?>
		<?php echo $form->textField($model,'tgl_keluar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jenis_bayar'); ?>
		<?php echo $form->textField($model,'jenis_bayar',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nilai_kontrak'); ?>
		<?php echo $form->textField($model,'nilai_kontrak'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->