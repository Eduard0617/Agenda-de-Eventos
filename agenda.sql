create  database defaultBase;
use defaultBase;

CREATE TABLE evento (
  id_evento           int(10) NOT NULL,
  nome_evento         varchar(50) NOT NULL,
  data_evento         date NOT NULL,
  inicio_evento       time DEFAULT NULL,
  fim_evento          time DEFAULT NULL,
  desc_evento         varchar(100) DEFAULT NULL,
  local_evento        varchar(200) DEFAULT NULL,
  responsavel_evento  varchar(50) DEFAULT NULL
)

