<br>
<br>
<?php
$html = $this->renderPartial('layanan_jurusan', 
		array(), true);
$html2 = $this->renderPartial('layanan_lainya', 
		array(), true);

?>
<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'tabs',
    'placement'=>'left', // 'above', 'right', 'below' or 'left'
    'tabs'=>array(
        array('label'=>'Pemeliharaan', 'content'=>$html, 'active'=>true),
        array('label'=>'Jurusan', 'content'=>$html2 ),
        // array('label'=>'Section 3', 'content'=>'<p>What up girl, this is Section 3.</p>'),
    ),
)); ?>
