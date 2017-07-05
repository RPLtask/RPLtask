<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      username		</th>
 		<th width="80px">
		      password		</th>
 		<th width="80px">
		      hak_akses		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->username; ?>
		</td>
       		<td>
			<?php echo $row->password; ?>
		</td>
       		<td>
			<?php echo $row->hak_akses; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
