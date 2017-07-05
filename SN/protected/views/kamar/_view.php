<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kamar')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_kamar), array('view', 'id'=>$data->id_kamar)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipe')); ?>:</b>
	<?php echo CHtml::encode($data->tipe->nama_tipe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_lokasi')); ?>:</b>
	<?php echo CHtml::encode($data->lokasi->nama_lokasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_kamar')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_kamar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img_kamar')); ?>:</b>
	<div class="wadah" style="margin-top:-100px;">
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/fotokamar/'.$data->id_kamar.'.jpg', 'DORE',array('style'=>'')); ?>
	</div>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ukuran')); ?>:</b>
	<?php echo CHtml::encode($data->ukuran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tarif')); ?>:</b>
	<?php echo CHtml::encode(number_format($data->tarif)); ?>
	<br />
	<br />
	<br />


</div>