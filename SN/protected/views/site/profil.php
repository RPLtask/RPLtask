<br>
<br>
<br>
<center>

<?php 
$html = $this->renderPartial('profil_sejarahsingkat', 
		array(), true);
		
$html2 = $this->renderPartial('profil_sambutan', 
		array(), true);
		
$html3 = $this->renderPartial('profil_sekilas', 
		array(), true);
		
$html4 = $this->renderPartial('profil_sejarahsingkat', 
		array(), true);
		


$this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'tabs', // 'tabs' or 'pills'
    'tabs'=>array(
        array('label'=>'Sejarah Singkat ',
			'content'=>$html, 'active'=>true),
        array('label'=>'Sambutan Direktur Utama', 
			'content'=>$html2),
        array('label'=>'Sekilas Tentang Perusahaan', 
			'content'=>$html3),
      ),
    )); ?>
</center>