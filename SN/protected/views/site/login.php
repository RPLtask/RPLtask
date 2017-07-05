<?php
	// if (!Yii::app()->user->isGuest) {
	// $this->redirect(array('Site/Index'));
	// }
	//$this->redirect(array('Site/login'));	
	//} else {
?>
<br>
<br>

<h1>Login</h1>

<p>Mohon masukan username dan password terlebih dahulu</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>
	<div class="row buttons">
		<?php echo "Belum punya akun ? klik ".CHtml::link('Disini',array('Pelanggan/create')); ?>
	</div>
	
<?php $this->endWidget(); ?>
</div><!-- form -->
