<?php
$this->breadcrumbs=array(
	'Notifikasis',
);

$this->menu=array(
	array('label'=>'Create Notifikasi', 'url'=>array('create')),
	array('label'=>'Manage Notifikasi', 'url'=>array('admin')),
);
?>

<h1>Notifikasis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
