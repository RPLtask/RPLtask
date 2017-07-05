DELIMITER $$;

DROP TRIGGER `kostan`.`afterdeletepenghuni`$$

CREATE TRIGGER `kostan`.`afterdeletepenghuni` AFTER DELETE on `kostan`.`penghuni`
FOR EACH ROW BEGIN
update pelanggan set status_p=0 where id_pelanggan=old.id_pelanggan;
update Kamar set status_h=0 where id_kamar=old.id_kamar;

END$$

DELIMITER ;$$