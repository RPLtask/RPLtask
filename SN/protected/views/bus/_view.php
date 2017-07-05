<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bus')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bus),array('view','id'=>$data->id_bus)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_bus')); ?>:</b>
	<?php echo CHtml::encode($data->nama_bus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_kursi')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_kursi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kategori')); ?>:</b>
	<?php echo CHtml::encode($data->id_kategori); ?>
	<br />


</div>