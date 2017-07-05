<div class="form">

<?php 
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'lokasi-form',
	#'type'=>'horizon',
	'enableAjaxValidation'=>false,
	 'htmlOptions'=>array('class'=>'well','enctype' => 'multipart/form-data'),
	 'type'=>'horizontal',
)); 
?>

	<?php echo $form->errorSummary($model); ?>

	
<div class="row">
		<?php// echo $form->labelEx($model,'nama_lokasi'); ?>
		<?php echo $form->textFieldRow($model,'nama_lokasi',array('size'=>50,'maxlength'=>50,'class'=>'span3','onkeyup'=>'getID()','id'=>'nama_lokasi')); ?>
		<?php echo $form->error($model,'nama_lokasi'); ?>
	</div>
	
<script>	
function enabel()
{
$('#id_lokasi').focus();
}
</script>	
	
	<div class="row">
		<?php //echo $form->labelEx($model,'id_lokasi'); ?>
		<?php echo $form->textFieldRow($model,'id_lokasi',array('size'=>50,'maxlength'=>50,'class'=>'span3','id'=>'id_lokasi','disabled'=>false,'maxlength'=>'3')); ?> 
		<?php //$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'button', 'type'=>'primary', 'label'=>'edit','htmlOptions'=> array('onclick'=> 'enabel()'))); ?>
		<?php echo $form->error($model,'id_lokasi'); ?>
	</div>
<script>
function getID(){
var nama_lokasi = document.getElementById('nama_lokasi').value;
var id_lokasi = nama_lokasi.substring(0,3);
var id_lokasi = id_lokasi.toUpperCase();
document.getElementById('id_lokasi').value=id_lokasi;
// document.getElementById('idkamar').value = lokasi;
}
</script>
<div class="row">
		<?php //echo $form->labelEx($model,'alamat'); ?>
		<?php echo $form->textAreaRow($model,'alamat_lokasi',array('rows'=>6,'cols'=>50)); ?>
		<?php echo $form->error($model,'alamat_lokasi'); ?>
	</div>
	



	<div class="row">
		<?php //echo $form->labelEx($model,'pengurus_kost'); ?>
		<?php echo $form->textFieldRow($model,'pengurus_kost',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'pengurus_kost'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'keterangan'); ?>
		<?php echo $form->textAreaRow($model,'keterangan',array('rows'=>6,'cols'=>50)); ?>
		<?php echo $form->error($model,'keterangan'); ?>
	</div>

	<div class="row">
        <?php// echo $form->labelEx($model,'img_kost'); ?>
        <?php echo $form->fileFieldRow($model, 'img_kost'); // by this we can upload image ?>  
        <?php echo $form->error($model,'img_kost'); ?>
	</div>
	<?php if($model->isNewRecord!='1'){ ?>
	<div class="control-group">
	<div class="controls">
		 <?php echo CHtml::image(Yii::app()->request->baseUrl.'/fotolokasi/'.$model->id_lokasi.'.jpg',"foto",array("width"=>200));} // Image shown here if page is update page ?>  
	</div>
	</div>

	<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->