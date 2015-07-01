/*[2:17:09][778 ms]*/ ALTER TABLE `new_kpptsp`.`t_sib` CHANGE `id_bidang_sib` `bidang_usaha` VARCHAR(100) NULL; 
/*[17:45:01][73 ms]*/ INSERT INTO `new_kpptsp`.`t_sub_modul` (`id_modul`, `id_sub_modul`, `nama_sub_modul`) VALUES ('17', '172', 'sib_perpanjangan'); 

/*[9:31:03][756 ms]*/ ALTER TABLE `new_kpptsp`.`t_fo` ADD COLUMN `sikb_perubahan_no_sk` VARCHAR(50) NULL AFTER `sikb_perpanjangan_status_perubahan`; 