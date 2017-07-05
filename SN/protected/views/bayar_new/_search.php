<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_bayar'); ?>
		<?php echo $form->textField($model,'id_bayar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_penghuni'); ?>
		<?php echo $form->textField($model,'id_penghuni'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_dibayar'); ?>
		<?php echo $form->textField($model,'tgl_dibayar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nilai_bayar'); ?>
		<?php echo $form->textField($model,'nilai_bayar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sisa_bayar'); ?>
		<?php echo $form->textField($model,'sisa_bayar'); ?>
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