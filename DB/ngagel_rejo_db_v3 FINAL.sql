-- MySQL Script generated by MySQL Workbench
-- Sun Dec 11 15:59:54 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`desa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`desa` ;

CREATE TABLE IF NOT EXISTS `mydb`.`desa` (
  `desa_id` INT NOT NULL,
  `desa_sejarah` VARCHAR(500) NOT NULL,
  `desa_visi` VARCHAR(500) NOT NULL,
  `desa_misi` VARCHAR(500) NOT NULL,
  `desa_nama` VARCHAR(200) NOT NULL,
  `desa_alamat` VARCHAR(250) NOT NULL,
  `desa_telp` FLOAT NOT NULL,
  `desa_ig` VARCHAR(500) NULL,
  `video_link` VARCHAR(500) NULL,
  `desa_foto` BLOB NULL,
  `desa_foto2` BLOB NULL,
  PRIMARY KEY (`desa_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`users` ;

CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `user_id` INT NOT NULL,
  `desa_id` INT NOT NULL,
  `user_name` VARCHAR(250) NOT NULL,
  `username` VARCHAR(200) NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `password` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`user_id`),
  INDEX `fk_users_desa_idx` (`desa_id` ASC),
  CONSTRAINT `fk_users_desa`
    FOREIGN KEY (`desa_id`)
    REFERENCES `mydb`.`desa` (`desa_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`usaha_layanan`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`usaha_layanan` ;

CREATE TABLE IF NOT EXISTS `mydb`.`usaha_layanan` (
  `usaha_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `usaha_nama` VARCHAR(200) NOT NULL,
  `usaha_alamat` VARCHAR(200) NOT NULL,
  `usaha_telp` FLOAT NOT NULL,
  `usaha_deskripsi` VARCHAR(200) NOT NULL,
  `usaha_sejarah` VARCHAR(500) NOT NULL,
  `usaha_tipe` VARCHAR(200) NOT NULL COMMENT 'Dinamo, Layanan Masyarakat, UMKM, Bratang Market',
  `usaha_range_harga` VARCHAR(500) NULL,
  `usaha_img` BLOB NULL DEFAULT NULL,
  `usaha_img2` BLOB NULL,
  `usaha_img3` BLOB NULL,
  `usaha_video` VARCHAR(500) NULL,
  PRIMARY KEY (`usaha_id`),
  INDEX `fk_pelaku_usaha_admin_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_pelaku_usaha_admin_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`berita`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`berita` ;

CREATE TABLE IF NOT EXISTS `mydb`.`berita` (
  `berita_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `berita_name` VARCHAR(150) NOT NULL,
  `berita_deskripsi` VARCHAR(500) NOT NULL,
  `berita_lokasi` VARCHAR(200) NULL DEFAULT NULL,
  `berita_jam` DATETIME NULL DEFAULT NULL,
  `berita_dll` VARCHAR(200) NULL DEFAULT NULL,
  `berita_foto` BLOB NULL,
  `berita_foto2` BLOB NULL,
  `berita_foto3` BLOB NULL,
  `berita_video` VARCHAR(500) NULL,
  PRIMARY KEY (`berita_id`),
  INDEX `fk_berita_admin_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_berita_admin_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ecommerce`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`ecommerce` ;

CREATE TABLE IF NOT EXISTS `mydb`.`ecommerce` (
  `ecommerce_id` INT NOT NULL,
  `ecommerce_name` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`ecommerce_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`rekomendasi`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`rekomendasi` ;

CREATE TABLE IF NOT EXISTS `mydb`.`rekomendasi` (
  `rekomendasi_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `rekomendasi_name` VARCHAR(200) NOT NULL,
  `rekomendasi_subname` VARCHAR(200) NULL,
  `rekomendasi_deskripsi` VARCHAR(200) NOT NULL,
  `rekomendasi_img` BLOB NULL,
  PRIMARY KEY (`rekomendasi_id`),
  INDEX `fk_rekomendasi_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_rekomendasi_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`produk_layanan`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`produk_layanan` ;

CREATE TABLE IF NOT EXISTS `mydb`.`produk_layanan` (
  `item_id` INT NOT NULL,
  `usaha_id` INT NOT NULL,
  `item_name` VARCHAR(250) NOT NULL,
  `item_deskripsi` VARCHAR(500) NOT NULL,
  `item_harga` VARCHAR(250) NOT NULL,
  `item_dll` VARCHAR(200) NULL,
  `item_img` BLOB NULL,
  `item_img2` BLOB NULL,
  `item_img3` BLOB NULL,
  `item_video` VARCHAR(500) NULL,
  PRIMARY KEY (`item_id`),
  INDEX `fk_produk_layanan_usaha_layanan1_idx` (`usaha_id` ASC),
  CONSTRAINT `fk_produk_layanan_usaha_layanan1`
    FOREIGN KEY (`usaha_id`)
    REFERENCES `mydb`.`usaha_layanan` (`usaha_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`produk_ecommerce`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`produk_ecommerce` ;

CREATE TABLE IF NOT EXISTS `mydb`.`produk_ecommerce` (
  `product_ecommerce_id` INT NOT NULL,
  `item_id` INT NOT NULL,
  `ecommerce_id` INT NOT NULL,
  `produk_ecommerce_link` VARCHAR(500) NULL DEFAULT NULL,
  INDEX `fk_produk_layanan_has_ecommerce_ecommerce1_idx` (`ecommerce_id` ASC),
  INDEX `fk_produk_layanan_has_ecommerce_produk_layanan1_idx` (`item_id` ASC),
  PRIMARY KEY (`product_ecommerce_id`),
  CONSTRAINT `fk_produk_layanan_has_ecommerce_produk_layanan1`
    FOREIGN KEY (`item_id`)
    REFERENCES `mydb`.`produk_layanan` (`item_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produk_layanan_has_ecommerce_ecommerce1`
    FOREIGN KEY (`ecommerce_id`)
    REFERENCES `mydb`.`ecommerce` (`ecommerce_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
