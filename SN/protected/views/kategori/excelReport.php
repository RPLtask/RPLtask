<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id_kategori		</th>
 		<th width="80px">
		      nama_kategori		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id_kategori; ?>
		</td>
       		<td>
			<?php echo $row->nama_kategori; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
