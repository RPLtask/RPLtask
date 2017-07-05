<div class="form">
<body>
<?php 
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'penghuni-form',
	#'type'=>'horizon',
	'enableAjaxValidation'=>false,
	 'htmlOptions'=>array('class'=>'well'),
	 'type'=>'horizontal',
)); 
?>
<?$nilai_p = Pelanggan::model()->findAll(array('condition'=>'status_p = 0'));
$data_pelanggan = CHtml::listData($nilai_p,'id_pelanggan','nama');
$nilai_k = Kamar::model()->findAll(array('condition'=>'status_h = 0'));
$data_kamar = CHtml::listData($nilai_k,'id_kamar','id_kamar');?>

<!--design form-->
	 <?php// echo $form->textFieldRow($model, 'id_pelanggan', array('hint'=>'In addition to freeform text, any HTML5 text-based input appears like so.')); ?>

	<p class="note">isi Form dengan lengkaps.</p>
	<?php echo $form->errorSummary($model); ?>
	<?php
		$criteria = new CDbCriteria;
		$criteria->mergeWith(array(
			'join'=>'LEFT JOIN penghuni ON penghuni.id_pelanggan = t.id_pelanggan',
			'condition'=>'penghuni.id_pelanggan is null',
		));?>
	<div class="control-group">
	<?php echo $form->labelEx($model,'Nama Pelanggan',array('class'=>'control-label')); ?>
		<?php $nilai = Pelanggan::model()->findByPk($model->id_pelanggan); ?>
		<div class="controls">
		<?php $this->widget('ext.select2.ESelect2', array(
              'name' => 'Penghuni[id_pelanggan]',
              'data' =>$data_pelanggan,
              'htmlOptions' => array(
                  'multiple' => '',
				  'style'=>'width:220px',
				  'empty'=>array($model->id_pelanggan=>$nilai['nama']),//kalo update
              ),
          )); ?>
		 </div>
		<?php echo $form->error($model,'id_pelanggan'); ?>
	</div>
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'id Kamar',array('class'=>'control-label')); ?>
		<?php $ik = Kamar::model()->findByPk($model->id_kamar); ?>
		<div class="controls">
		<?php $this->widget('ext.select2.ESelect2', array(
              'name' => 'Penghuni[id_kamar]',
              'data' =>$data_kamar,
              'htmlOptions' => array(
                  'multiple' => false,
				  'style'=>'width:220px',
				  'empty'=>array($model->id_kamar=>$ik['id_kamar']),//kalo update
              ),
          )); ?>
		</div>
		<?php echo $form->error($model,'id_kamar'); ?>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'tgl_masuk',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'publishDate',
			'attribute'=>'tgl_masuk',
			'model'=>$model,
			// additional javascript options for the date picker plugin
			'options'=>array(
				'showAnim'=>'fold',
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				'style'=>'height:20px;'
			),
		));?>
		</div>
	</div>
	
	
	
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'Jenis Bayar',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->dropDownList($model,'jenis_bayar',array('1'=>'tahunan','2'=>'bulanan','3'=>'kontrak'),array('onchange'=>'opsibayar()','id'=>'jenis_bayar','empty'=>''),array('options'=>array('3'=>array('selected'=>true)))); ?>
		</div >
		<?php echo $form->error($model,'jenis_bayar'); ?>
		<?php ///array('options'=>array('3'=>array('selected'=>true))),?>
	</div>
	

<script>
function opsibayar(){ //fungsi untuk menghilangkan tanggal keluar
var tipe_bayar = document.getElementById('jenis_bayar').value;
if (tipe_bayar==3)
{document.getElementById('tgl_keluar').style.display="block";}
else
{document.getElementById('tgl_keluar').style.display="none";}

var jenis = $('#jenis_bayar').val();

if (jenis==3)
$('#status').val('3');
else
$('#status').val('1');
// alert("selamat ya");
}

</script>

	<div class="control-group" style="display:block" id="tgl_keluar">
		<?php echo $form->labelEx($model,'tgl_keluar',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'pu',
			'attribute'=>'tgl_keluar',
			'model'=>$model,
			// additional javascript options for the date picker plugin
			'options'=>array(
				'showAnim'=>'fold',
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				'style'=>'height:20px;'
			),
		));?>
		</div>
	</div>
	

	<div class="control-group">
		<?php// echo $form->labelEx($model,'nilai_kontrak'); ?>
		<?php echo $form->textFieldRow($model,'nilai_kontrak'); ?>
		<?php echo $form->error($model,'nilai_kontrak'); ?>
	</div>

	<div class="control-group" style="display:none">
		<?php echo $form->labelEx($model,'status Lunas'); ?>
		<?php echo $form->textFieldRow($model,'status',array('size'=>10,'maxlength'=>10,'value'=>1,'id'=>'status')); ?>
		<?php// echo $form->textField($model,'status',array('size'=>10,'maxlength'=>10,'value'=>1,'id'=>'status')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	
	
	<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->