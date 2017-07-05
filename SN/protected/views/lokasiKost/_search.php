<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_lokasi'); ?>
		<?php echo $form->textField($model,'id_lokasi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_lokasi'); ?>
		<?php echo $form->textField($model,'nama_lokasi',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alamat_lokasi'); ?>
		<?php echo $form->textField($model,'alamat_lokasi',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pengurus_kost'); ?>
		<?php echo $form->textField($model,'pengurus_kost',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keterangan'); ?>
		<?php echo $form->textField($model,'keterangan',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'img_kost'); ?>
		<?php echo $form->textField($model,'img_kost',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->