# Desafio de Código - Sistema de Amigo Secreto

## Descrição

Este projeto é um sistema de amigo secreto, onde os usuários podem cadastrar amigos, realizar sorteios, e gerenciar informações dos amigos. A aplicação é construída em PHP e segue o padrão MVC (Model-View-Controller).

## Funcionalidades

- **Cadastrar Amigos**: Permite que o usuário registre novos amigos.
- **Editar Amigos**: Permite que o usuário edite as informações de amigos já cadastrados.
- **Excluir Amigos**: Permite que o usuário exclua amigos do sistema.
- **Listar Amigos**: Mostra a lista de amigos cadastrados.
- **Sorteio de Amigos**: Realiza sorteios onde cada amigo sorteado não pode ser ele mesmo.

## Tecnologias Utilizadas

- PHP
- MySQL
- HTML/CSS

## Estrutura do Projeto

```plaintext
├── app
│   ├── controllers
│   │   ├── HomeController.php
│   │   └── RegistrarController.php
│   ├── models
│   │   └── Amigo.php
│   └── views
│       ├── Editar.php
│       ├── Home.php
│       ├── Registro.php
│       └── Sortear.php
├── public
│   ├── edit.php
│   ├── excluir.php
│   ├── index.php
│   ├── registrar.php
│   └── Sorteio.php
├── README.md
```
### Como Executar

Instale o XAMPP, PHPMYADMIN ou algum outro software que consiga fazer algum servidor local de sua preferencia.
Necessário ter um banco de dados.

Clone o repositório, no caso do XAMPP é necessário instalar no local de instalação na pasta htdocs,  no meu caso C:xampp\htdocs:

```plaintext
    git clone https://github.com/Joaohvr1/PHP-DesafioDoAmigoSecreto.git
    cd PHP-DesafioDoAmigoSecreto
```

   


## Configure o banco de dados:

Criando um banco de dados MySQL.

```plaintext 
    CREATE DATABASE amigosecreto;
    USE  amigosecreto;
    CREATE TABLE IF NOT EXISTS sorteio(
    	ID INTEGER PRIMARY KEY auto_increment,
        nome VARCHAR(100),
        email VARCHAR(100)
    )
```
Altere as configurações de conexão:

Edite o arquivo os arquivos de public com as credenciais do seu banco de dados.
Inicie o servidor local:

Acesse a aplicação:


Abra seu navegador e acesse http://localhost/PHP-DesafioDoAmigoSecreto/app/public/index.php


CÓDIGO EM DESENVOLVIMENTO
