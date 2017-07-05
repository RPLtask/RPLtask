<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipe')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipe), array('view', 'id'=>$data->id_tipe)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_tipe')); ?>:</b>
	<?php echo CHtml::encode($data->nama_tipe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fasilitas')); ?>:</b>
	<?php echo CHtml::encode($data->fasilitas); ?>
	<br />


</div>