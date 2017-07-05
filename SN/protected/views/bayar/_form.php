<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bayar-form',
	'enableAjaxValidation'=>false,
	 'htmlOptions'=>array('class'=>'well'),
)); ?>
<?
$nilai_p = Yii::app()->db->createCommand()
					->select('*')
					->from('viewpenghuni')
					// ->join('bayar','bayar.id_penghuni=pelanggan.id_pelanggan')
					 //->where('pelanggan.id_pelanggan=:ip,penghuni', array('status' => 1))
					// ->group('pelanggan.nama')
					->queryAll();
//$nilai_p = Penghuni::model()->findAll();
$data_pelanggan = CHtml::listData($nilai_p,'id_penghuni','nama');

?>


	<?php echo $form->errorSummary($model); ?>
	
	<?php
	// $pelanggan = Pelanggan::model()->findAll();
	// $data = CHtml::listData($pelanggan,'id_pelanggan','pelanggan');
	?>
<script>
function getNilaiKontrak(){
var id = $("#id_penghuni").val();
 $.ajax({
			url : '/kost/index.php?r=bayar/Getid',
			data : '&id='+id,
			 success : function(data)
			{
			$("#nilaikontrak").val(data)
			$("#ip").val(id)
			}
		
		});
}
</script>	
	<div class="row">
		<?php echo $form->labelEx($model,'Nama Penghuni'); ?>
		<?php //echo $form->textField($model,'id_penghuni'); ?>
		<?php //echo $form->dropDownList($model,'id_penghuni', CHtml::listData(Pelanggan::model()->findAll(), 'id_pelanggan', 'nama')); ?>
		<?php $this->widget('ext.select2.ESelect2', array(
              'name' => 'Bayar[id_penghuni]',
              'data' =>$data_pelanggan,
              'htmlOptions' => array(
                  'multiple' => '',
				  'style'=>'width:220px',
				  'id'=>'id_penghuni',
				  'onchange'=>'getNilaiKontrak()'
              ),
          )); ?>
		<?php echo $form->error($model,'id_penghuni'); ?>
	</div>
	<div class="row">
	
	<?php echo $form->labelEx($model,'Nilai Kontrak'); ?>
	<input type="text" id="nilaikontrak" value="0" disabled />
	</div>
		
		
	<div class="row">
	<? //$now = date('Y-m-d');?>
		<?php //echo $form->labelEx($model,'bulan bayar'); ?>
		<?php //$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			// 'name'=>'hahi',
			// 'attribute'=>'tgl_bayar',
			// //'value'=>now(),
			// 'model'=>$model,
			// // additional javascript options for the date picker plugin
			// 'options'=>array(
				// 'showAnim'=>'fold',
				// //'viewMode'=> 'months', 
				// 'dateFormat'=>'yy-mm-dd',
				
			// ),
			// 'htmlOptions'=>array(
				// 'style'=>'height:20px;',
				// //'value'=>$now,
			// ),
		// ));?>
	 </div>
	
		<?php echo $form->labelEx($model,'Bulan bayar'); ?>
		<?php 
			$this->widget('ext.EJuiMonthPicker.EJuiMonthPicker', array(
				'model' => $model,  
				'attribute' => 'tgl_bayar',
				'options'=>array(
					'yearRange'=>'-5:+5',
					'dateFormat'=>'yy-mm-01',
				),
				'htmlOptions'=>array(
					'onChange'=>'',
				),
			));  
		?>
		<?php echo $form->error($model,'tgl_bayar'); ?>
	
	
		<div class="row">
		<?php echo $form->labelEx($model,'Bulan bayar'); ?>
		<?php// $ik = Kamar::model()->findByPk($model->id_kamar); ?>
		<?php 
		
		$bayar = Viewbayar::model()->findAll(array('condition'=>'status = 0 and id_penghuni = 152 order by sisa_bayar desc'));
		$bayar = CHtml::listData($bayar,'tgl_bayar','tgl_bayar_str');
		?>
		<?php $this->widget('ext.select2.ESelect2', array(
              'name' => 'penyuplai',
              'data' =>$bayar,
              'htmlOptions' => array(
                  'multiple' => true,
				  'style'=>'width:220px',
				  'id'=>'penyuplai',
				  //'onchange'=>'getTgl()',
				  //'onmousemove'=>'getSisa()'
				  //'empty'=>array($model->id_kamar=>$ik['id_kamar']),//kalo update
              ),
          )); ?>
		<?php echo $form->error($model,'tgl_bayar'); ?>
	</div>
	
		<div class="row">
		<?php echo $form->labelEx($model,'tanggal dibayar'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'haha',
			'attribute'=>'tgl_dibayar',
			//'value'=>now(),
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
	
	

	

	<div class="row">
		<?php echo $form->labelEx($model,'nilai_bayar'); ?>
		<?php echo $form->textField($model,'nilai_bayar'); ?>
		<?php echo $form->error($model,'nilai_bayar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sisa_bayar'); ?>
		<?php echo $form->textField($model,'sisa_bayar'); ?>
		<?php echo $form->error($model,'sisa_bayar'); ?>
	</div>

<div class="row" style="display:none">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>10,'maxlength'=>10,'value'=>'1')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	
	<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->