<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_notifikasi')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_notifikasi), array('view', 'id'=>$data->id_notifikasi)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_penghuni')); ?>:</b>
	<?php echo CHtml::encode($data->id_penghuni); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_notifikasi')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_notifikasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_tagihan')); ?>:</b>
	<?php echo CHtml::encode($data->total_tagihan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periode_tagihan')); ?>:</b>
	<?php echo CHtml::encode($data->periode_tagihan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>