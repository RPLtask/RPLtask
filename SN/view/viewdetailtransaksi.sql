select b.id_bayar, pel.nama ,  date_format(b.tgl_bayar,'%M-%Y') as bulan,b.tgl_dibayar, b.nilai_bayar, b.sisa_bayar,  if(b.status=0,'belum lunas','lunas') as status
from 
bayar b, penghuni peng, pelanggan pel
where 
peng.id_penghuni = b.id_penghuni
and
pel.id_pelanggan = peng.id_pelanggan
