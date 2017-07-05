DELIMITER $$;

DROP TRIGGER `kostan`.`afterinsertpenghuni`$$

CREATE TRIGGER `kostan`.`afterinsertpenghuni` AFTER INSERT on `kostan`.`penghuni`
FOR EACH ROW BEGIN

update pelanggan set status_p=1 where id_pelanggan=new.id_pelanggan;
update Kamar set status_h=1 where id_kamar=new.id_kamar;
insert into bayar values ('',new.id_penghuni,now(),0,0,1);

END$$

DELIMITER ;$$