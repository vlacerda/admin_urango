SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';



-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NULL ,
  `password` VARCHAR(64) NULL ,
  `active` BIT NULL ,
  `logins` INT NULL ,
  `last_login` INT NULL ,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `roles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `chris_evert`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `description` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chris_evert`.`roles_users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `roles_users` (
  `user_id` INT NULL ,
  `role_id` INT NULL ,
  INDEX `FK_roles_users_users` (`user_id` ASC) ,
  INDEX `FK_roles_users_roles` (`role_id` ASC) ,
  CONSTRAINT `FK_roles_users_users`
    FOREIGN KEY (`user_id` )
    REFERENCES `chris_evert`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_roles_users_roles`
    FOREIGN KEY (`role_id` )
    REFERENCES `chris_evert`.`roles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chris_evert`.`sections`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `chris_evert`.`sections` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `controller` VARCHAR(45) NULL ,
  `screen_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chris_evert`.`roles_sections`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `chris_evert`.`roles_sections` (
  `id_role` INT NULL ,
  `id_section` INT NULL ,
  INDEX `FK_roles_sections_roles` (`id_role` ASC) ,
  INDEX `FK_roles_sections_sections` (`id_section` ASC) ,
  CONSTRAINT `FK_roles_sections_roles`
    FOREIGN KEY (`id_role` )
    REFERENCES `chris_evert`.`roles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_roles_sections_sections`
    FOREIGN KEY (`id_section` )
    REFERENCES `chris_evert`.`sections` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
