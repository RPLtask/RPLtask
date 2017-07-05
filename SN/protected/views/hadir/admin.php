
<h1>Data Absen</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'hadir-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
	array(
			'header'=>'No.',
			'value'=>'($this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize) + array_search($data,$this->grid->dataProvider->getData())+1',
		),
		'nrp',
		'nama',
		array(
		'name'=>'tgl_lahir',
		'header'=>'Tanggal Lahir',
		),
		array(
		'name'=>'waktu',
		'header'=>'Waktu Absen',
		),
			array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{delete}',
			'buttons' =>
			array(
              
				'delete' => array(
					'label'=> 'Delete',
					'url'=>'Yii::app()->createUrl("hadir/delete", array("id"=>$data["nrp"]))',      //A PHP expression for generating the URL of the button.
					'options'=>array(
						'class'=>'btn btn-small delete'
					),
		
				),
				
			
				
				
			),
	),
	
			
       
	),
)); ?>
