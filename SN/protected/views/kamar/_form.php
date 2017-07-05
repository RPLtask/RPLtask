<script>
function getidkamar(){
var lokasi = document.getElementById('kombolokasi').value;
var nokamar = document.getElementById('nomor_kamar').value;
document.getElementById('idkamar').value = lokasi;
}
</script>
<?php
$nilai_t = TipeKamar::model()->findAll();
$data_tipe = CHtml::listData($nilai_t,'id_tipe','nama_tipe');

$nilai_k = LokasiKost::model()->findAll();
$data_lokasi = CHtml::listData($nilai_k,'id_lokasi','nama_lokasi');


?>
<div class="form">

<?php 
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'kamar-form',
	#'type'=>'horizon',
	'enableAjaxValidation'=>false,
	 'htmlOptions'=>array('class'=>'well','enctype' => 'multipart/form-data'),
	 'type'=>'horizontal',
)); 
?>

	<?php echo $form->errorSummary($model); ?>

	
	<div class="control-group" style="display:none">
		<?php echo $form->labelEx($model,'id_kamar',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textFieldRow($model,'id_kamar',array('size'=>30,'maxlength'=>30,'id'=>'idkamar')); ?>
		</div>
		<?php echo $form->error($model,'id_kamar'); ?>
	</div>
	
	<div class="control-group" style="display:none">
		<?php echo $form->labelEx($model,'status_h'); ?>
		<?php echo $form->textField($model,'status_h',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'status_h'); ?>
	</div>
	
	<div class="control-group">
	<?php $nilai = TipeKamar::model()->findByPk($model->id_tipe); ?>
	<?php// if($model->isNewRecord!='1'){ //jika update?>
		<?php// echo $form->labelEx($model,'id_tipe'); ?>
		<?php// echo $form->textField($model,'id_tipe',array('size'=>30,'maxlength'=>30,'disabled'=>true,'style'=>'display:none')); ?>
		<?php// echo CHtml::textField('forviewtipe', $nilai['nama_tipe'], array('disabled'=>true)); ?>
  
		<?php echo $form->error($model,'id_tipe'); ?>
		<?//}else{//jika insert
		?>
		<?php echo $form->labelEx($model,'Tipe',array('class'=>'control-label')); //jika insert?>
		<?php //echo $form->dropDownList($model,'id_tipe', CHtml::listData(tipeKamar::model()->findAll(), 'id_tipe', 'nama_tipe')); ?>
			<div class="controls">
			<?php $this->widget('ext.select2.ESelect2', array(
              'name' => 'Kamar[id_tipe]',
              'data' =>$data_tipe,
              'htmlOptions' => array(
                  'multiple' => '',
				  'style'=>'width:220px',
				    'empty'=>array($model->id_tipe=>$nilai['nama_tipe']),
              ),
          )); ?>
			</div>
		<?php echo $form->error($model,'id_tipe'); ?>
		<?//}?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'Lokasi',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php if($model->isNewRecord!='1'){ //jika update?>
		<?php $nilai = LokasiKost::model()->findByPk($model->id_lokasi); ?>
		  <?php echo CHtml::textField('forviewlokasi', $nilai['nama_lokasi'], array('disabled'=>true)); ?>
		  <?}else{//jika selain update?>
		  <?php $this->widget('ext.select2.ESelect2', array(
              'name' => 'Kamar[id_lokasi]',
              'data' =>$data_lokasi,
              'htmlOptions' => array(
                  'multiple' => '',
				  'style'=>'width:220px',
				  'id'=>'kombolokasi',
				  'onchange'=>'getidkamar()',
				  'empty'=>'',
				  
              ),
          )); ?>
		  <?}?>
		  </div>
		<?php echo $form->error($model,'id_lokasi'); ?>
	</div>
<div class="control-group">
		<?php echo $form->labelEx($model,'ukuran',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php $this->widget('ext.select2.ESelect2', array(
              'name' => 'Kamar[ukuran]',
              'data' =>array('2 x 5'=>'2 x 5','10 x 10'=>'10 x 10'),
              'htmlOptions' => array(
                  'multiple' => '',
				  'style'=>'width:220px',
				  'empty'=>array($model->ukuran=>$model->ukuran),
				  
              ),
          )); ?>
		</div>
		<?php echo $form->error($model,'id_lokasi'); ?>
	</div>

	<div class="row" style="display:none">
		<?php //echo $form->labelEx($model,'nomor',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'nomor_kamar',array('size'=>20,'maxlength'=>2,'id'=>'nomor_kamar','onkeyup'=>'getidkamar()')); ?>
		<?php echo $form->error($model,'nomor_kamar'); ?>
	</div>


	<div class="control-group">
		<?php echo $form->labelEx($model,'tarif',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'tarif'); ?>
		</div>
		<?php echo $form->error($model,'tarif'); ?>
	</div>
	<div class="control-group">
		<?php// if($model->isNewRecord!='1'){ //jika update?>
        <?php echo $form->labelEx($model,'Gambar',array('class'=>'control-label')); ?>
		<div class="controls">
        <?php echo CHtml::activeFileField($model, 'img_kamar'); // by this we can upload image ?>  
		</div>
        <?php echo $form->error($model,'img_kamar'); ?>
		<?//}?>
	</div>
	
	<?php if($model->isNewRecord!='1'){ //jika update?>
	<div class="control-group">
		 <?php echo CHtml::image(Yii::app()->request->baseUrl.'/fotokamar/'.$model->id_kamar.'.jpg',"fotokamar",array("width"=>200));
		 } // Image shown here if page is update page ?>  
	</div>

	<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Simpan')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Batal')); ?>
</div>


<?php $this->endWidget(); ?>

</div><!-- form -->