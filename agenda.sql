CREATE DATABASE defaultBase;
USE defaultBase;

CREATE TABLE evento (
  id_evento           INT(10) NOT NULL AUTO_INCREMENT,
  nome_evento         VARCHAR(50) NOT NULL,
  data_evento         DATE NOT NULL,
  inicio_evento       TIME DEFAULT NULL,
  fim_evento          TIME DEFAULT NULL,
  desc_evento         VARCHAR(100) DEFAULT NULL,
  local_evento        VARCHAR(200) DEFAULT NULL,
  responsavel_evento  VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (id_evento)
);
