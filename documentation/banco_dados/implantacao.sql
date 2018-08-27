-- -----------------------------------------------------
-- Schema 
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table localidade
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS localidade (
  id_ibge INT NOT NULL,
  nome VARCHAR(45) NULL,
  tipo VARCHAR(45) NULL,
  PRIMARY KEY (id_ibge));

-- -----------------------------------------------------
-- Table regiao
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS regiao (
  sigla VARCHAR(5) NULL,
  localidade_id INT NOT NULL,
  PRIMARY KEY (localidade_id),
  CONSTRAINT fk_regiao_localidade1
    FOREIGN KEY (localidade_id)
    REFERENCES localidade (id_ibge)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table uf
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS uf (
  sigla VARCHAR(5) NULL,
  localidade_id INT NOT NULL,
  regiao_localidade_id INT NOT NULL,
  PRIMARY KEY (localidade_id),
  CONSTRAINT fk_uf_localidade1
    FOREIGN KEY (localidade_id)
    REFERENCES localidade (id_ibge)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_uf_regiao1
    FOREIGN KEY (regiao_localidade_id)
    REFERENCES regiao (localidade_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table mesorregiao
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS mesorregiao (
  localidade_id INT NOT NULL,
  uf_localidade_id INT NOT NULL,
  PRIMARY KEY (localidade_id),
  CONSTRAINT fk_mesorregiao_localidade1
    FOREIGN KEY (localidade_id)
    REFERENCES localidade (id_ibge)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_mesorregiao_uf1
    FOREIGN KEY (uf_localidade_id)
    REFERENCES uf (localidade_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table microrregiao
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS microrregiao (
  localidade_id INT NOT NULL,
  mesorregiao_localidade_id INT NOT NULL,
  PRIMARY KEY (localidade_id),
  CONSTRAINT fk_microregiao_localidade1
    FOREIGN KEY (localidade_id)
    REFERENCES localidade (id_ibge)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_microrregiao_mesorregiao1
    FOREIGN KEY (mesorregiao_localidade_id)
    REFERENCES mesorregiao (localidade_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table municipio
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS municipio (
  microregiao_id INT NOT NULL,
  localidade_id INT NOT NULL,
  microrregiao_localidade_id INT NOT NULL,
  PRIMARY KEY (localidade_id),
  CONSTRAINT fk_municipio_localidade1
    FOREIGN KEY (localidade_id)
    REFERENCES localidade (id_ibge)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_municipio_microrregiao1
    FOREIGN KEY (microrregiao_localidade_id)
    REFERENCES microrregiao (localidade_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table usuario
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS usuario (
  id INT NOT NULL,
  nome VARCHAR(45) NULL,
  senha VARCHAR(45) NULL,
  PRIMARY KEY (id));


-- -----------------------------------------------------
-- Table projecao
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS projecao (
  id INT NOT NULL,
  data_consulta DATE NULL,
  populacao INT NULL,
  incremento VARCHAR(100) NULL,
  obito VARCHAR(100) NULL,
  nascimento VARCHAR(100) NULL,
  usuario_id INT NOT NULL,
  localidade_id INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_projecao_usuario1
    FOREIGN KEY (usuario_id)
    REFERENCES usuario (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_projecao_localidade1
    FOREIGN KEY (localidade_id)
    REFERENCES localidade (id_ibge)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);