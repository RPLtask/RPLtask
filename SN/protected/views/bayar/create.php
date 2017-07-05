<?php
$this->breadcrumbs=array(
	//'Bayars'=>array('index'),
	'Pembayaran',
);

$this->menu=array(
	array('label'=>'List Bayar', 'url'=>array('index')),
	array('label'=>'Manage Bayar', 'url'=>array('admin')),
);
?>

<h1>Pembayaran Uang Kost</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>