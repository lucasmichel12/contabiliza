-- MySQL Script generated by MySQL Workbench
-- Thu Jun  4 22:19:29 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema bdcontabiliza
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bdcontabiliza
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bdcontabiliza` DEFAULT CHARACTER SET utf8mb4 ;
USE `bdcontabiliza` ;

-- -----------------------------------------------------
-- Table `bdcontabiliza`.`centro_custo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdcontabiliza`.`centro_custo` (
  `idcentro_custo` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NOT NULL,
  `cnpj` VARCHAR(14) NOT NULL,
  `ativo` TINYINT(4) NOT NULL,
  PRIMARY KEY (`idcentro_custo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `bdcontabiliza`.`despesa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdcontabiliza`.`despesa` (
  `id_despesa` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NOT NULL,
  `valor_definido` TINYINT(4) NOT NULL,
  `ativo` TINYINT(4) NOT NULL,
  `valor` FLOAT NULL DEFAULT NULL,
  PRIMARY KEY (`id_despesa`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `bdcontabiliza`.`regiao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdcontabiliza`.`regiao` (
  `id_regiao` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NOT NULL,
  `percentual` INT(11) NOT NULL,
  `ativo` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_regiao`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `bdcontabiliza`.`status_solicitacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdcontabiliza`.`status_solicitacao` (
  `id_status` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NOT NULL,
  PRIMARY KEY (`id_status`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `bdcontabiliza`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdcontabiliza`.`usuario` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` TEXT NOT NULL,
  `admin` TINYINT(4) NOT NULL,
  `ativo` TINYINT(4) NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `bdcontabiliza`.`solicitacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdcontabiliza`.`solicitacao` (
  `id_solicitacao` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NOT NULL,
  `data` DATE NOT NULL,
  `valor_total` FLOAT NOT NULL,
  `usuario_id_usuario` INT(11) NOT NULL,
  `centro_custo_idcentro_custo` INT(11) NOT NULL,
  `status_solicitacao_id_status` INT(11) NOT NULL,
  PRIMARY KEY (`id_solicitacao`),
  INDEX `fk_solicitacao_usuario_idx` (`usuario_id_usuario` ASC),
  INDEX `fk_solicitacao_centro_custo1_idx` (`centro_custo_idcentro_custo` ASC),
  INDEX `fk_solicitacao_status_solicitacao1_idx` (`status_solicitacao_id_status` ASC),
  CONSTRAINT `fk_solicitacao_centro_custo1`
    FOREIGN KEY (`centro_custo_idcentro_custo`)
    REFERENCES `bdcontabiliza`.`centro_custo` (`idcentro_custo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitacao_status_solicitacao1`
    FOREIGN KEY (`status_solicitacao_id_status`)
    REFERENCES `bdcontabiliza`.`status_solicitacao` (`id_status`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitacao_usuario`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `bdcontabiliza`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `bdcontabiliza`.`roteiro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdcontabiliza`.`roteiro` (
  `id_roteiro` INT(11) NOT NULL AUTO_INCREMENT,
  `destino` TEXT NOT NULL,
  `descricao` TEXT NOT NULL,
  `inicio` DATETIME NOT NULL,
  `termino` DATETIME NOT NULL,
  `solicitacao_id_solicitacao` INT(11) NOT NULL,
  PRIMARY KEY (`id_roteiro`),
  INDEX `fk_roteiro_solicitacao1_idx` (`solicitacao_id_solicitacao` ASC),
  CONSTRAINT `fk_roteiro_solicitacao1`
    FOREIGN KEY (`solicitacao_id_solicitacao`)
    REFERENCES `bdcontabiliza`.`solicitacao` (`id_solicitacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `bdcontabiliza`.`solicitacao_despesa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdcontabiliza`.`solicitacao_despesa` (
  `id_solicitacao_despesa` INT(11) NOT NULL AUTO_INCREMENT,
  `solicitacao_id_solicitacao` INT(11) NOT NULL,
  `despesa_id_despesa` INT(11) NOT NULL,
  `regiao_id_regiao` INT(11) NULL,
  `valor` FLOAT NOT NULL,
  PRIMARY KEY (`id_solicitacao_despesa`),
  INDEX `fk_solicitacao_has_despesa_despesa1_idx` (`despesa_id_despesa` ASC),
  INDEX `fk_solicitacao_has_despesa_solicitacao1_idx` (`solicitacao_id_solicitacao` ASC),
  INDEX `fk_solicitacao_despesa_regiao1_idx` (`regiao_id_regiao` ASC),
  CONSTRAINT `fk_solicitacao_has_despesa_despesa1`
    FOREIGN KEY (`despesa_id_despesa`)
    REFERENCES `bdcontabiliza`.`despesa` (`id_despesa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitacao_has_despesa_solicitacao1`
    FOREIGN KEY (`solicitacao_id_solicitacao`)
    REFERENCES `bdcontabiliza`.`solicitacao` (`id_solicitacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitacao_despesa_regiao1`
    FOREIGN KEY (`regiao_id_regiao`)
    REFERENCES `bdcontabiliza`.`regiao` (`id_regiao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
