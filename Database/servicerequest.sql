-- MySQL Script generated by MySQL Workbench
-- 08/14/17 21:38:31
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema servicemanagement
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema servicemanagement
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `servicemanagement` DEFAULT CHARACTER SET utf8 ;
USE `servicemanagement` ;

-- -----------------------------------------------------
-- Table `servicemanagement`.`hotelguest`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servicemanagement`.`hotelguest` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `guest_lastname` VARCHAR(45) NULL,
  `guest_firstname` VARCHAR(45) NULL,
  `guest_contactno` VARCHAR(11) NULL,
  `guest_email` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `servicemanagement`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servicemanagement`.`employee` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `servEmployee_lname` VARCHAR(45) NULL,
  `servEmployee_fname` VARCHAR(45) NULL,
  `servEmployee_status` VARCHAR(20) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `servicemanagement`.`servicerequest`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servicemanagement`.`servicerequest` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `request_title` VARCHAR(45) NULL,
  `request_details` VARCHAR(45) NULL,
  `request_category` VARCHAR(45) NULL,
  `room_no` VARCHAR(20) NULL,
  `request_status` VARCHAR(20) NULL,
  `date_started` DATETIME NULL,
  `date_finished` DATETIME NULL,
  `hotelguest_id` INT NOT NULL,
  `employee_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_service request_hotel guest_idx` (`hotelguest_id` ASC),
  INDEX `fk_service request_employee1_idx` (`employee_id` ASC),
  CONSTRAINT `fk_service request_hotel guest`
    FOREIGN KEY (`hotelguest_id`)
    REFERENCES `servicemanagement`.`hotelguest` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service request_employee1`
    FOREIGN KEY (`employee_id`)
    REFERENCES `servicemanagement`.`employee` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `servicemanagement`.`room`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servicemanagement`.`room` (
  `id` INT NOT NULL,
  `room_type` VARCHAR(45) NULL,
  `hotelguest_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_room_hotel guest1_idx` (`hotelguest_id` ASC),
  CONSTRAINT `fk_room_hotel guest1`
    FOREIGN KEY (`hotelguest_id`)
    REFERENCES `servicemanagement`.`hotelguest` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `servicemanagement`.`customerservicedept`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servicemanagement`.`customerservicedept` (
  `id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `servicemanagement`.`customerservicedept_has_employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `servicemanagement`.`customerservicedept_has_employee` (
  `customerservicedept_id` INT NOT NULL,
  `employee_id` INT NOT NULL,
  PRIMARY KEY (`customerservicedept_id`, `employee_id`),
  INDEX `fk_customerservicedept_has_employee_employee1_idx` (`employee_id` ASC),
  INDEX `fk_customerservicedept_has_employee_customerservicedept1_idx` (`customerservicedept_id` ASC),
  CONSTRAINT `fk_customerservicedept_has_employee_customerservicedept1`
    FOREIGN KEY (`customerservicedept_id`)
    REFERENCES `servicemanagement`.`customerservicedept` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_customerservicedept_has_employee_employee1`
    FOREIGN KEY (`employee_id`)
    REFERENCES `servicemanagement`.`employee` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
