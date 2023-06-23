CREATE database if not EXISTS `infant`;
CREATE TABLE if not exists `cbtp`.`users` (
  `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `f_name` VARCHAR(45) NOT NULL,
  `m_name` VARCHAR(45) NOT NULL,
  `l_name` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `phone_number` VARCHAR(15) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `role` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`user_id`));

CREATE TABLE if not exists `cbtp`.`mother_table` (
  `m_id` INT NOT NULL,
  `f_name` VARCHAR(45) NOT NULL,
  `m_name` VARCHAR(45) NOT NULL,
  `l_name` VARCHAR(45) NOT NULL,
  `bithdate` DATE NOT NULL,
  `photo_url`  VARCHAR(255),
  `blood_type` VARCHAR(5) NULL,
  `m_phone` VARCHAR(15) NULL,
  `zone` VARCHAR(45) NULL,
  `wereda` VARCHAR(45) NULL,
  `kebele` VARCHAR(45) NULL,
  PRIMARY KEY (`m_id`));

CREATE TABLE if not exists `cbtp`.`child_table` (
  `c_id` INT NOT NULL,
  `m_id` INT NOT NULL,
  `f_name` VARCHAR(45) NOT NULL,
  `m_name` VARCHAR(45) NOT NULL,
  `l_name` VARCHAR(45) NOT NULL,
  `bithdate` DATE not NULL,  
  PRIMARY KEY (`c_id`),
    FOREIGN KEY (`m_id`)
    REFERENCES `cbtp`.`mother_table` (`m_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE if not exists `cbtp`.`mother_vaccin` (
  `mv_id` INT NOT NULL,
   `m_id` INT NOT NULL,
  `tt1` TINYINT NULL,
  `tt2` TINYINT NULL,
  `tt3` TINYINT NULL,
  `tt4` TINYINT NULL,
  `tt5` TINYINT NULL,
  `rh` TINYINT NULL,
  PRIMARY KEY (`mv_id`),
    FOREIGN KEY (`m_id`)
    REFERENCES `cbtp`.`mother_table` (`m_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE if not exists `cbtp`.`child_vaccine` (
  `cv_id` INT NOT NULL,
  `c_id` INT NOT NULL,
  `r1` TINYINT NULL,
  `r2` TINYINT NULL,
  `r3` TINYINT NULL,
  `r4` TINYINT NULL,
  `r5` TINYINT NULL,
  PRIMARY KEY (`cv_id`),
    FOREIGN KEY (`c_id`)
    REFERENCES `cbtp`.`child_table` (`c_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
create table if not exists cbtp.post (post_id int auto_increment primary key, tittle varchar(100) not null, catagory varchar(50) not null, description Text not null, date_of_post datetime not null);
create table if not exists cbtp.post_img (post_img_id int auto_increment primary key,post_id int ,image_url varchar(255) , foreign key(post_id) references post(post_id));









CREATE TABLE cbtp.post_img (
  post_img_id INT auto_increment not null,
  post_id INT not null,
  img_url VARCHAR(255) not null,
  PRIMARY KEY (post_img_id),
  FOREIGN KEY (post_id) REFERENCES cbtp.post (post_id)
);

