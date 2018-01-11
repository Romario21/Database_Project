SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Roster`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Roster` (
  `Roster_id` INT NOT NULL,
  PRIMARY KEY (`Roster_id`));


-- -----------------------------------------------------
-- Table `mydb`.`Team`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Team` (
  `Team_Name` VARCHAR(45) NOT NULL,
  `Stadium` VARCHAR(50) NOT NULL,
  `Roster_Roster_id` INT NOT NULL,
  `Wins` INT NOT NULL,
  `Loss` INT NOT NULL,
  `Draws` INT NOT NULL,
  PRIMARY KEY (`Team_Name`),
  INDEX `fk_Team_Roster1_idx` (`Roster_Roster_id` ASC),
  CONSTRAINT `fk_Team_Roster1`
    FOREIGN KEY (`Roster_Roster_id`)
    REFERENCES `mydb`.`Roster` (`Roster_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `mydb`.`Player`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Player` (
  `Player_id` INT NOT NULL,
  `DOB` DATE NOT NULL,
  `Position` VARCHAR(2) NOT NULL,
  `Roster_Roster_id` INT NOT NULL,
  `goals_scored` INT NOT NULL,
  PRIMARY KEY (`Player_id`),
  INDEX `fk_Player_Roster_idx` (`Roster_Roster_id` ASC),
  CONSTRAINT `fk_Player_Roster`
    FOREIGN KEY (`Roster_Roster_id`)
    REFERENCES `mydb`.`Roster` (`Roster_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `mydb`.`League`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`League` (
  `League_Name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`League_Name`));


-- -----------------------------------------------------
-- Table `mydb`.`Footbal_Club`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Footbal_Club` (
  `League_Name` VARCHAR(40) NOT NULL,
  `Team_Team_Name` VARCHAR(45) NOT NULL,
  `League_League_Name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`League_Name`, `Team_Team_Name`),
  INDEX `fk_Footbal_Club_Team1_idx` (`Team_Team_Name` ASC),
  INDEX `fk_Footbal_Club_League1_idx` (`League_League_Name` ASC),
  CONSTRAINT `fk_Footbal_Club_Team1`
    FOREIGN KEY (`Team_Team_Name`)
    REFERENCES `mydb`.`Team` (`Team_Name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Footbal_Club_League1`
    FOREIGN KEY (`League_League_Name`)
    REFERENCES `mydb`.`League` (`League_Name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `mydb`.`Tournament`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Tournament` (
  `Tournament_Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Tournament_Name`));


-- -----------------------------------------------------
-- Table `mydb`.`National_Team`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`National_Team` (
  `World_rank` INT NOT NULL,
  `Team_Team_Name` VARCHAR(45) NOT NULL,
  `Tournament_Tournament_Name` INT NOT NULL,
  PRIMARY KEY (`Team_Team_Name`),
  INDEX `fk_National_Team_Tournament1_idx` (`Tournament_Tournament_Name` ASC),
  CONSTRAINT `fk_National_Team_Team1`
    FOREIGN KEY (`Team_Team_Name`)
    REFERENCES `mydb`.`Team` (`Team_Name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_National_Team_Tournament1`
    FOREIGN KEY (`Tournament_Tournament_Name`)
    REFERENCES `mydb`.`Tournament` (`Tournament_Name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `mydb`.`Game`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Game` (
  `Game_id` INT NOT NULL,
  `date` DATE NOT NULL,
  `Hometeam_name` VARCHAR(50) NOT NULL,
  `Awayteam_name` VARCHAR(50) NOT NULL,
  `hometeam_score` INT NOT NULL,
  `Awayteam_score` INT NOT NULL,
  `Team_Team_Name` VARCHAR(45) NOT NULL,
  `Team_Team_Name1` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Game_id`),
  INDEX `fk_Game_Team1_idx` (`Team_Team_Name` ASC),
  INDEX `fk_Game_Team2_idx` (`Team_Team_Name1` ASC),
  CONSTRAINT `fk_Game_Team1`
    FOREIGN KEY (`Team_Team_Name`)
    REFERENCES `mydb`.`Team` (`Team_Name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Game_Team2`
    FOREIGN KEY (`Team_Team_Name1`)
    REFERENCES `mydb`.`Team` (`Team_Name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `mydb`.`Player_Game_Stats`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Player_Game_Stats` (
  `Player_id` INT NOT NULL,
  `Goals_Scored` INT NOT NULL,
  `Game_Game_id` INT NOT NULL,
  `Player_Player_id` INT NOT NULL,
  PRIMARY KEY (`Player_id`, `Game_Game_id`, `Player_Player_id`),
  INDEX `fk_Player_Game_Stats_Game1_idx` (`Game_Game_id` ASC),
  INDEX `fk_Player_Game_Stats_Player1_idx` (`Player_Player_id` ASC),
  CONSTRAINT `fk_Player_Game_Stats_Game1`
    FOREIGN KEY (`Game_Game_id`)
    REFERENCES `mydb`.`Game` (`Game_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Player_Game_Stats_Player1`
    FOREIGN KEY (`Player_Player_id`)
    REFERENCES `mydb`.`Player` (`Player_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
