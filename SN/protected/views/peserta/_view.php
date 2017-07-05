<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nrp')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nrp), array('view', 'id'=>$data->nrp)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />


</div>