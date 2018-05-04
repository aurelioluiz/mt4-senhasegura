# MT4 - senhasegura
Desenvolvimento de um pequeno sistema web com recursos básicos de controle de dispositivos remotos e integração.

## Recursos
- CRUD dispositivos
- Conexão e envio de comandos via SSH
- Criptografia/descriptografia de um texto utilizando crifra de césar e AES-256
- Criação de hash de um texto utilizando SHA512 e HMAC, com SALT

### Configurações
Para iniciar o projeto é necessário editar apenas um arquivo, de conexão com o banco de dados MySQL **config/connection.php** linha 12:

``` 
new PDO('mysql:host=localhost;dbname=mt4_senhasegura', 'root', 'root', $pdo_options);
```

Mais opções consulte a documentação [PDO](http://php.net/manual/en/class.pdo.php).

### Banco de dados
Utilize o arquivo **db.sql** para criar o banco de dados e a única tabela de dispositivos.

### Rotas
O arquivo **config/routes.php** define as rotas aceitas na aplicação. 

### Autor
Aurélio Luiz - https://github.com/aurelioluiz
