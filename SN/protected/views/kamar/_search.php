<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_kamar'); ?>
		<?php echo $form->textField($model,'id_kamar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tipe'); ?>
		<?php echo $form->textField($model,'id_tipe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_lokasi'); ?>
		<?php echo $form->textField($model,'id_lokasi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nomor_kamar'); ?>
		<?php echo $form->textField($model,'nomor_kamar',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'img_kamar'); ?>
		<?php echo $form->textField($model,'img_kamar',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ukuran'); ?>
		<?php echo $form->textField($model,'ukuran',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tarif'); ?>
		<?php echo $form->textField($model,'tarif'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->