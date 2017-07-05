<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Penghuni'=>array('admin'),'List Data'),
));
$this->menu=array(
	array('label'=>'Create Penghuni', 'url'=>array('create')),
	array('label'=>'Manage Penghuni', 'url'=>array('admin')),
);
?>

<h1>Penghunis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
