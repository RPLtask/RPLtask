DELIMITER $$;

DROP VIEW IF EXISTS `kostan`.`viewtunggakan`$$

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewtunggakan` AS select `penghuni`.`id_penghuni` AS `id_penghuni`,`pelanggan`.`nama` AS `nama`,`pelanggan`.`tlp` AS `tlp`,`pelanggan`.`email` AS `email`,`pelanggan`.`no_ktp` AS `no_ktp`,`pelanggan`.`tlp_ortu` AS `tlp_ortu`,`bayar`.`status` AS `status`,date_format(penghuni.tgl_masuk,'%d-%b-%y')  AS `tgl_masuk`,`bayar`.`id_bayar` AS `id_bayar`, concat(count(bayar.id_bayar),' bulan') as total_tunggakan
from 
pelanggan, penghuni, bayar
 where  
penghuni.id_pelanggan= pelanggan.id_pelanggan 
and 
bayar.status = 0 
and
bayar.id_penghuni = penghuni.id_penghuni
group by bayar.id_penghuni


$$

DELIMITER ;$$

