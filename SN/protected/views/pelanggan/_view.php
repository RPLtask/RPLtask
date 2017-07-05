<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pelanggan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pelanggan),array('view','id'=>$data->id_pelanggan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_pelanggan')); ?>:</b>
	<?php echo CHtml::encode($data->nama_pelanggan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_kelamin')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_kelamin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kelurahan')); ?>:</b>
	<?php echo CHtml::encode($data->kelurahan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kecamatan')); ?>:</b>
	<?php echo CHtml::encode($data->kecamatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kota')); ?>:</b>
	<?php echo CHtml::encode($data->kota); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_lahir); ?>
	<br />

	*/ ?>

</div>