<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_tipe'); ?>
		<?php echo $form->textField($model,'id_tipe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_tipe'); ?>
		<?php echo $form->textField($model,'nama_tipe',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fasilitas'); ?>
		<?php echo $form->textField($model,'fasilitas',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->