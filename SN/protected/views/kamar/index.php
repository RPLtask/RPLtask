<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs',array(
	'links'=>array('Mengatur Kamar'=>array('admin'),'List Kamar'),
));

// $this->menu=array(
	// array('label'=>'Create Kamar', 'url'=>array('create')),
	// array('label'=>'Manage Kamar', 'url'=>array('admin')),
// );
// ?>
<h1 class="well"><img width="40" height="40" src="<?php echo Yii::app()->request->baseUrl;?>/images/admin.ico"/>&nbsp;List Kamar</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
