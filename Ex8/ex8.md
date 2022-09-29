# Exercício 8 - ODAW

## Daniella Vasconcellos

- **Criar uma base de dados;**

CREATE DATABASE mecanica;

- **Criar pelo menos uma tabela com pelo menos 3 campos;**

CREATE TABLE veiculos (
id_veiculo int NOT NULL,
cor varchar(20),
kmtragem int,
qtd_rodas int,
tipo varchar(10),
combustivel varchar(30),
PRIMARY KEY (id_veiculo)
);

CREATE TABLE mecanico (
id_mec int NOT NULL,
nome varchar(100),
idade int,
salario int,
endereco varchar(300),
PRIMARY KEY (id_mec)
);

### Executar comandos SQL para

- **Inserir dados;**

INSERT INTO veiculos (id_veiculo, cor, kmtragem, qtd_rodas, tipo, combustivel)
VALUES (0, "Vermelho", 100, 4, "Carro", "Gasolina");

INSERT INTO mecanico (id_mec, nome, idade, salario, endereco)
VALUES (0, "Fulano", 60, 15000, "Rua Floricultura - 15");

- **Alterar dados;**

UPDATE mecanico
SET nome = "Fulano de Tal"
WHERE nome = "Fulano";

- **Visualizar dados;**

SELECT \* FROM veiculos;

(OU... Exemplo especifico de visualização de veículos de cor vermelha)

CREATE VIEW visualizacao_veiculos AS
SELECT \*
FROM veiculos
WHERE cor == 'Vermelho';

- **Apagar dados;**

DELETE FROM mecanico WHERE idade > 60;

- **Apagar tabela;**

DROP TABLE mecanico;

- **Apagar base de dados;**

DROP DATABASE mecanica;
