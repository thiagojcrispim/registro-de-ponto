# 🕒 Registro de Ponto

Sistema web simples para controle de registro de ponto eletrônico, desenvolvido com Laravel e MySQL, como parte de um desafio técnico.

---

## 📋 Funcionalidades

-   Autenticação de usuários (login, troca de senha)
-   Cadastro de funcionários com associação a gestores
-   Registro de ponto com um clique
-   Listagem de registros com filtros por data e funcionário
-   Relatório completo com SQL puro (conforme exigência do teste)
-   Telas em Blade com DataTables e Select2
-   Acesso e permissões diferenciadas por perfil (Administrador, Gerente, Funcionário)

---

## ⚙️ Tecnologias Utilizadas

-   PHP 8.2
-   Laravel 12
-   MySQL 8+
-   Eloquent ORM
-   Blade + Bootstrap
-   jQuery, DataTables, Select2

---

## 🚀 Como Executar Localmente

### 1. Clone o repositório

```bash
git clone https://github.com/thiagojcrispim/registro-de-ponto.git
cd registro-de-ponto
```

### 2. Instale as dependências PHP

```bash
composer install
```

### 3. Copie e configure o `.env`

```bash
cp .env.example .env
```

⚠️ **Não esqueça de configurar a conexão com o banco de dados MySQL** no `.env`:

```env
DB_DATABASE=registro_ponto
DB_USERNAME=root
DB_PASSWORD=secret
```

> **Crie o banco manualmente no seu MySQL** com o nome informado acima.

### 4. Gere a chave da aplicação

```bash
php artisan key:generate
```

### 5. Rode as migrations e seeders

```bash
php artisan migrate --seed
```

### 6. Inicie o servidor local

```bash
php artisan serve
```

Acesse via: [http://localhost:8000](http://localhost:8000)

## (Opcional) Ambiente de desenvolvimento do frontend

Caso deseje customizar os arquivos CSS/JS e gerar novos builds:

````bash
npm install
npm run build

---

## 🔐 Usuários padrão

Você pode acessar o sistema com os usuários criados automaticamente pelo seeder:

-   **Admin**

    -   Email: `admin@teste.com`
    -   Senha: `senha123`

-   **Gerente RH**

    -   Email: `gerenterh@teste.com`
    -   Senha: `senha123`

-   **Funcionario 1**

    -   Email: `funcionario1@teste.com`
    -   Senha: `senha123`

-   **Funcionario 2**

    -   Email: `funcionario2@teste.com`
    -   Senha: `senha123`

    **Gerente Comercial**

    -   Email: `gerentecomercial@teste.com`
    -   Senha: `senha123`

-   **Funcionario 3**

    -   Email: `funcionario3@teste.com`
    -   Senha: `senha123`

-   **Funcionario 4**
    -   Email: `funcionario4@teste.com`
    -   Senha: `senha123`

---

## 📄 Sobre os Commits

Todo o projeto foi desenvolvido localmente antes da criação do repositório.
Reconheço e pratico diariamente boas práticas de versionamento, incluindo:

-   Commits pequenos e descritivos
-   Uso de branches por feature
-   Entregas contínuas

Por questões de foco e gestão de tempo durante o desafio, concentrei o desenvolvimento local e realizei um único commit final.

---

## 🌐 (Opcional) Deploy online

> Se você publicar o projeto online, adicione aqui o link:

```md
🔗 Acesse: https://app-ponto.thiagocrispim.com.br
````

---

## 📁 Licença

Este projeto é apenas para fins de avaliação técnica.

## 👤 Autor

**Thiago Jorge Crispim**  
📧 thiagojcrispim@gmail.com  
🔗 [LinkedIn](https://www.linkedin.com/in/thiagojcrispim)  
🔗 [GitHub](https://github.com/thiagojcrispim/registro-de-ponto)
