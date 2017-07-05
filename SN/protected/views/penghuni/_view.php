<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_penghuni')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_penghuni), array('view', 'id'=>$data->id_penghuni)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pelanggan')); ?>:</b>
	<?php echo CHtml::encode($data->id_pelanggan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kamar')); ?>:</b>
	<?php echo CHtml::encode($data->id_kamar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_masuk')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_masuk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_keluar')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_keluar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_bayar')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_bayar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nilai_kontrak')); ?>:</b>
	<?php echo CHtml::encode($data->nilai_kontrak); ?>
	<br />
<b><?php echo CHtml::encode($data->getAttributeLabel('img_kamar')); ?>:</b>
	<div class="wadah" style="margin-top:-160px;">
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/foto/'.$data->id_pelanggan.'.jpg', 'DORE',array('style'=>'')); ?>
	</div>
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>