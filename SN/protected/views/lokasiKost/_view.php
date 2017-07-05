<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_lokasi')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_lokasi), array('view', 'id'=>$data->id_lokasi)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_lokasi')); ?>:</b>
	<?php echo CHtml::encode($data->nama_lokasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat_lokasi')); ?>:</b>
	<?php echo CHtml::encode($data->alamat_lokasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pengurus_kost')); ?>:</b>
	<?php echo CHtml::encode($data->pengurus_kost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img_kost')); ?>:</b>
<div class="wadah">
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/fotolokasi/'.$data->id_lokasi.'.jpg', 'DORE'); ?>
</div>
	<br />


</div>