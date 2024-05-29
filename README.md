# FerroCar 🚗

 Sistema de gestão de estacionamento com atendimento ao público desenvolvido em PHP com PostgreSQL. O projeto inclui funcionalidades de cadastro de clientes, veículos e usuários, além de movimentações e geração de relatórios!

## Descrição ✏️

O projeto "Ferrocar" é um sistema de gestão de estacionamento desenvolvido para fornecer um serviço rápido e eficiente de atendimento ao público. O sistema permite:

- Cadastro e edição de clientes, veículos e usuários.
- Realização de movimentações de entrada e saída de veículos.
- Geração e visualização de relatórios detalhados.
- Ações personalizadas como login, logout e visualização de dados com filtros.

## Índice📍

- [Requisitos](#requisitos)
- [Documentação](#documentação)
- [Protótipo](#protótipo)
- [Prints de Tela](#prints-de-tela)
- [Instalação](#instalação)
  - [Clonar o Repositório](#clonar-o-repositório)
  - [Configuração do Banco de Dados](#configure-o-banco-de-dados)
  - [Crie as tabelas necessárias](#crie-as-tabelas-necessárias)
  - [Execute o Projeto](#execute-o-projeto)
- [Possíveis Erros e Soluções](#resolução-de-problemas)
- [Contribuições](#contribuições)

## Requisitos📖

- PHP 8.3 ou superior
- PostgreSQL 11.4 ou superior
- Servidor web (Apache, Nginx, etc.)


## Documentação📄
Sistema
- Tela de login e cadastro de usuários: Admin e funcionários.
- Home: Opções de cadastrar clientes, veículos, ver horários e fazer movimentações.
- Visualizar e Editar: Clientes, veículos e usuários.
- Movimentação: Check-in e check-out com cálculo de valor, relatórios com possibilidade de filtrar por datas.
- Header e Footer: Personalizados
- Logout: Encerrar sessão.

Banco de dados
- Tabela de Usuários: Para login no sistema.
- Tabela de Clientes: Informações dos clientes.
- Tabela de Veículos: Informações dos veículos.
- Tabela de Movimentos: Registra a movimentação de veículos no estacionamento.

## Protótipo🖌️
O protótipo deste projeto foi desenvolvido para fornecer uma visão geral das interfaces e funcionalidades. É importante notar que este protótipo é de baixa fidelidade e foi criado em uma época em que eu ainda não tinha experiência avançada em UX e UI Design. Ele serve como uma base inicial para o desenvolvimento e pode ser aprimorado conforme necessário.
- <a href="https://www.figma.com/design/2RwIQ9HEOq5DZfwUQXwz4Q/Untitled?node-id=211-2">Figma Desktop</a>
## Prints da Tela
Login e Cadastro
 <td><img src="https://github.com/laycsz/FerroCar/blob/main/capturasdatela/Captura%20de%20tela%202024-05-28%20215110.png" width="850"></td>
  <td><img src="https://github.com/laycsz/FerroCar/blob/main/capturasdatela/Captura%20de%20tela%202024-05-28%20215317.png"  width="850"></td>

## Instalação⚙️

### Clonar o Repositório

```bash
git clone https://github.com/laycsz/FerroCar.git
```
## Instale as Dependências

- Baixe e instale o PHP e extraia para C:\php.
- Adicione C:\php ao PATH do sistema.
- Baixe e instale o PostgreSQL.

## Configure o Banco de Dados

```bash
CREATE DATABASE estacionamento;
```
## Crie as tabelas necessárias

```bash
CREATE TABLE clientes (
    cliente_id SERIAL PRIMARY KEY,
    nome VARCHAR(100),
    cpf VARCHAR(15),
    email VARCHAR(100),
    telefone VARCHAR(15),
    entrada TIME,
    saida TIME
);

CREATE TABLE usuariologin (
    id_login SERIAL PRIMARY KEY,
    nome VARCHAR(100),
    cpf VARCHAR(15),
    email VARCHAR(100),
    senha VARCHAR(100)
);

CREATE TABLE veiculos (
    veiculo_id SERIAL PRIMARY KEY,
    placas VARCHAR(8),
    cor VARCHAR(100),
    modelo VARCHAR(100),
    categoria VARCHAR(14),
    veic_clie_id VARCHAR(100)
);

CREATE TABLE movimento (
    id SERIAL PRIMARY KEY,
    placas VARCHAR(8),
    nome VARCHAR(100),
    modelo VARCHAR(100),
    cor VARCHAR(100),
    vaga VARCHAR(2),
    categoria VARCHAR(14),
    dt_entrada DATE,
    hr_entrada TIME,
    dt_saida DATE,
    hr_saida TIME,
    status BOOLEAN,
    valor VARCHAR(100)
);

```

## Configure a Conexão no Arquivo conexao.php:
Edite o arquivo conexao.php com suas credenciais do banco de dados:

```bash
<?php
try {
    $conn = new PDO("pgsql:host=localhost;dbname=estacionamento", "postgres", "0511");
    echo "Conexao efetuada";
} catch(PDOException $e) {
    echo "Erro com banco de dados: " . $e->getMessage();
}
?>
```
## Execute o Projeto:
Navegue até o diretório do projeto
```bash
cd FerroCar
```
Inicie o servidor PHP:
```bash
php -S localhost:8000
```
Acesse http://localhost:8000 no navegador.

## Resolução de Problemas🔨
<h3>❌ Erro: "php: command not found"</h3>
Solução:
<br>
1. Certifique-se de que o PHP está instalado e adicionado ao PATH do sistema.
<br>
2. Verifique o arquivo php.ini e habilite as extensões pdo_pgsql e pgsql.

<h3>❌ Erro: "could not find driver"</h3>
Solução: 
1. Abra o arquivo php.ini e descomente as linhas:
<br>

```bash
extension=pdo_pgsql
extension=pgsql
```
Reinicie o servidor PHP.

## Contribuições🫱🏼‍🫲🏼
Contribuições são bem-vindas! Por favor, envie um pull request ou abra uma issue para discutir mudanças.

## Como Contribuir:
1. Faça um fork deste repositório.
2. Crie uma branch com a nova feature: git checkout -b minha-nova-feature
3. Commit suas mudanças: git commit -m 'Adicionar nova feature'
4. Push para a branch: git push origin minha-nova-feature
5. Envie um pull request.




