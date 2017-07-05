<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id_rute		</th>
 		<th width="80px">
		      berangkat		</th>
 		<th width="80px">
		      tujuan		</th>
 		<th width="80px">
		      waktu		</th>
 		<th width="80px">
		      harga		</th>
 		<th width="80px">
		      kelas		</th>
 		<th width="80px">
		      id_bus		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id_rute; ?>
		</td>
       		<td>
			<?php echo $row->berangkat; ?>
		</td>
       		<td>
			<?php echo $row->tujuan; ?>
		</td>
       		<td>
			<?php echo $row->waktu; ?>
		</td>
       		<td>
			<?php echo $row->harga; ?>
		</td>
       		<td>
			<?php echo $row->kelas; ?>
		</td>
       		<td>
			<?php echo $row->id_bus; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
