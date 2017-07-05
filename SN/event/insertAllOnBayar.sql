DROP EVENT insertEveryMont;
CREATE EVENT insertEveryMont

ON SCHEDULE EVERY  5 second
STARTS '2013-10-01 00-00-01'
DO
INSERT INTO bayar(id_penghuni,nilai_bayar,tgl_bayar)
SELECT id_penghuni, nilai_kontrak ,now() FROM penghuni where jenis_bayar = 3



