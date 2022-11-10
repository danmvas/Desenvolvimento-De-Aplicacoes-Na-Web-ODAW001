# Exercício 9

mysql -h localhost -u root
use udesc

## Strings a serem preparadas

### Inserir registros

INSERT INTO agenda_telefonica (nome, telefone, endereco) VALUES ('Joao', '123456789', 'Rua Argentina n20'), ('Maria', '987654321', 'Rua Brasil n10'), ('Jose', '159357456', 'Rua Índia n30'), ('Carlos', '987654321', 'Rua Brasil n153'), ('Lais', '564123789', 'Rua Estados Unidos n3'), ('Miguel', '987654321', 'Rua Brasil n18'), ('Rodrigo', '456789129', 'Rua Europa n420');

SELECT \* FROM lista_telefonica;

### Visualizar registros

SELECT nome FROM lista_telefonica WHERE endereco LIKE '%Brasil%';

### Alterar registros

UPDATE lista_telefonica SET telefone = '000000000' WHERE nome = 'Lais';

SELECT \* FROM lista_telefonica WHERE nome = 'Lais';

### Apagar registros

DELETE FROM lista_telefonica WHERE nome = 'Carlos';

SELECT \* FROM lista_telefonica WHERE nome = 'Carlos';
