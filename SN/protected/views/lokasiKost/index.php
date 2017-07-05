<?php

$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Pelanggan'=>array('admin'),'List Lokasi'),
));


$this->menu=array(
	array('label'=>'Create LokasiKost', 'url'=>array('create')),
	array('label'=>'Manage LokasiKost', 'url'=>array('admin')),
);
?>

<h1>Lokasi Kosts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
