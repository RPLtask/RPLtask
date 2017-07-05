DELIMITER $$;

DROP TRIGGER `kostan`.`afterupdatepenghuni`$$

CREATE TRIGGER `kostan`.`afterupdatepenghuni` AFTER UPDATE on `kostan`.`penghuni`
FOR EACH ROW BEGIN

update kamar set status_h=0 where id_kamar =old.id_kamar;
update kamar set status_h=1 where id_kamar =new.id_kamar;


	
END$$

DELIMITER ;$$