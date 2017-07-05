<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id_pelanggan		</th>
 		<th width="80px">
		      nama_pelanggan		</th>
 		<th width="80px">
		      jenis_kelamin		</th>
 		<th width="80px">
		      alamat		</th>
 		<th width="80px">
		      kelurahan		</th>
 		<th width="80px">
		      kecamatan		</th>
 		<th width="80px">
		      kota		</th>
 		<th width="80px">
		      tanggal_lahir		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id_pelanggan; ?>
		</td>
       		<td>
			<?php echo $row->nama_pelanggan; ?>
		</td>
       		<td>
			<?php echo $row->jenis_kelamin; ?>
		</td>
       		<td>
			<?php echo $row->alamat; ?>
		</td>
       		<td>
			<?php echo $row->kelurahan; ?>
		</td>
       		<td>
			<?php echo $row->kecamatan; ?>
		</td>
       		<td>
			<?php echo $row->kota; ?>
		</td>
       		<td>
			<?php echo $row->tanggal_lahir; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
