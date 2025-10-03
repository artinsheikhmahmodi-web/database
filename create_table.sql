CREATE TABLE
    `school_db`.`student` (
        `code_meli` INT (11) NOT NULL COMMENT 'کد ملی دانش آموز',
        `firstname` VARCHAR(50) NOT NULL COMMENT 'نام',
        `lastname` VARCHAR(100) NOT NULL COMMENT 'نام خانوادگی',
        `father` VARCHAR(50) NOT NULL COMMENT 'پدر',
        `jenseiat` TINYINT NOT NULL COMMENT 'جنسیت',
        `tarikh_tavalod` DATE NOT NULL COMMENT 'تاریخ تولد',
        `moadel` FLOAT NOT NULL COMMENT 'معدل',
        `tozihat` TEXT NOT NULL COMMENT 'توضیحات'
    ) ENGINE = InnoDB;