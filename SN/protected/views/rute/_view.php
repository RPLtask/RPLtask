<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rute')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rute),array('view','id'=>$data->id_rute)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('berangkat')); ?>:</b>
	<?php echo CHtml::encode($data->berangkat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tujuan')); ?>:</b>
	<?php echo CHtml::encode($data->tujuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('waktu')); ?>:</b>
	<?php echo CHtml::encode($data->waktu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga')); ?>:</b>
	<?php echo CHtml::encode($data->harga); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kelas')); ?>:</b>
	<?php echo CHtml::encode($data->kelas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bus')); ?>:</b>
	<?php echo CHtml::encode($data->id_bus); ?>
	<br />


</div>