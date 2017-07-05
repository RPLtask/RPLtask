<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'tipe-kamar-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'nama_tipe',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'nama_tipe',array('size'=>20,'maxlength'=>20)); ?>
		</div>
		<?php echo $form->error($model,'nama_tipe'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'fasilitas',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'fasilitas',array('size'=>20,'maxlength'=>20)); ?>
		</div>
		<?php echo $form->error($model,'fasilitas'); ?>
	</div>

	<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->