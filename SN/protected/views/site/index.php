<style>
body{
	background-image:url(images/sn.png);
	background-size: cover;
	background-position: center center;

	/*
	*/

	}
	#page{
		background: transparent!important;
	}
#logo{
	width:350px;height:200px;margin-left:-10px
	border-radius:20px;
}
#wrapper{
	width: 100vw;
	height: 100vh;
	background-color: rgba(1,1,1,0.8); 
	position: fixed;
	left: 0px;
	top: 0px;
	z-index: -1;

}
#bahan{
	z-index: 1000;

}

/*img:hover{
	border-radius:50px;
	-webkit-box-shadow: -3px -3px 41px 3px rgba(90,184,66,1);
	-moz-box-shadow: -3px -3px 41px 3px rgba(90,184,66,1);
	box-shadow: -3px -3px 41px 3px rgba(90,184,66,1);
}*/
#content{
	background:transparent;
	border-radius:100px;
}
</style>

<body onload="$('#nrp').focus()"  >
<div id="wrapper"></div>

<div id="bahan">
	<center style="margin-top:200px;">
	<a href="<?php echo $this->createUrl('hadir/admin')?>">
	<img id="logo" style="" src ="<?=Yii::app()->request->baseUrl ?>/images/sn.png" />
	</a>
	<input id="nrp" maxlength="13" required name="nrp" on  onkeyup="masukNrp(event)" onKeypress="simpan(event)" type="number" style="width:700px;height:90px;font-size:90px;	font: bolder Arial;" />
	</center>
</div>
<script>
var isValid = true;
function simpan(e){
		var id = $('#nrp').val();
		var key;
		if (window.event)
			key = window.event.keyCode;     //IE
		else
			key = e.which; 

		if (isValid) {
			// alert(isValid);   
		if (key == 13){
			if (id==""){
				$('#nama').html('<h3 style=color:red>NRP tidak terdaftar</font>');
				exit;
			}

			$.ajax({
			type : 'POST',
			url:'<?php echo $this->createUrl('hadir/absen')?>',
			data:'nrp='+id,
			success:function(data){
				if (data=="sukses"){	
					$('#nama').hide();
					$('#nrp').val('');
					$('#nrp').focus();
					$('#nama').show();
					$('#nama').html('<font color=green>Terima Kasih, NRP '+id+' telah terabsen</font>');
				}else{
					alert(data);
				}
				// $('#nama').hide();
				
				// alert(data);
				// alert('sukses');
				// $('#nama').show();
				// $('#nama').html(data);
				 // alert('success'+data);
			},
			error: function(data){
				alert('gagal');
				// $('#nama').html(data);
				// alert('gagal'+data);
			}
						
			});
		}
		}
			
}

function masukNrp(e) {
	if (window.event)
		key = window.event.keyCode;     //IE
	else
		key = e.which; 
	if (key!=13){
		var id = $('#nrp').val();
		if (id.length>=7){
			$.ajax({
				url:'<?php echo $this->createUrl('peserta/search')?>',
				data:'id='+id,
				success:function(data){
					// alert(data);

					var a = data;
					var a = a.length;
					if(a>60){
						$('#nrp').val('');
					}
					// alert(data);
				
					
					$('#nama').show();

					$('#nama').html(data);
					// if ($('#nama').html()!="<h3 style=color:red>NRP tidak terdaftar</h3>" || $('#nama').html()!="" ){
					// 	isValid = true;
					// }
					// else{
					// 	isValid = false;
					// }
				},
				error: function(data){
					$('#nama').html(data);
					// alert('gagal'+data);
				}
							
				});
		}
		else{
			$('#nama').html('');
		
		}
	}
}
</script>
<center>
<h3 id="nama" style="font:arial;display:none" ></h3>
</body>
<style>
.penulisan{
	font-size:100px;
	border:2px;
	border-style:thick;
	font: normal 10pt Arial,Helvetica,sans-serif;
}
</style>


<!--<img  style="width:750px;height:400px;border-radius:10px;padding:0;background-image" src="<?php echo Yii::app()->request->baseUrl;?>/images/logo.png"/>
--->