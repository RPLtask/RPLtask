<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Pelanggan'=>array('admin'),'List Tipe'),
));



$this->menu=array(
	array('label'=>'Create TipeKamar', 'url'=>array('create')),
	array('label'=>'Manage TipeKamar', 'url'=>array('admin')),
);
?>

<h1>Tipe Kamars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
