select 
jenis_bayar,
case when jenis_bayar=1 then "tahunan"
when jenis_bayar=2 then "bulanan"
else "kontrak"
end as n_jenis_bayar

from penghuni