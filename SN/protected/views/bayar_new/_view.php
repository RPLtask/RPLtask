<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bayar')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bayar), array('view', 'id'=>$data->id_bayar)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_penghuni')); ?>:</b>
	<?php echo CHtml::encode($data->id_penghuni); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_dibayar')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_dibayar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nilai_bayar')); ?>:</b>
	<?php echo CHtml::encode($data->nilai_bayar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sisa_bayar')); ?>:</b>
	<?php echo CHtml::encode($data->sisa_bayar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>