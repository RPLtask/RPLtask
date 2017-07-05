<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id_bus		</th>
 		<th width="80px">
		      nama_bus		</th>
 		<th width="80px">
		      jumlah_kursi		</th>
 		<th width="80px">
		      id_kategori		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id_bus; ?>
		</td>
       		<td>
			<?php echo $row->nama_bus; ?>
		</td>
       		<td>
			<?php echo $row->jumlah_kursi; ?>
		</td>
       		<td>
			<?php echo $row->id_kategori; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
