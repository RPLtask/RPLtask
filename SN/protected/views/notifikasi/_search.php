<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_notifikasi'); ?>
		<?php echo $form->textField($model,'id_notifikasi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_penghuni'); ?>
		<?php echo $form->textField($model,'id_penghuni'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_notifikasi'); ?>
		<?php echo $form->textField($model,'tgl_notifikasi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_tagihan'); ?>
		<?php echo $form->textField($model,'total_tagihan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'periode_tagihan'); ?>
		<?php echo $form->textField($model,'periode_tagihan'); ?>
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