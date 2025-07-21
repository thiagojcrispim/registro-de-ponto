# 🕒 Registro de Ponto

Sistema web simples para controle de registro de ponto eletrônico, desenvolvido com Laravel e MySQL, como parte de um desafio técnico.

---

## 📋 Funcionalidades

-   Autenticação de usuários (login, troca de senha)
-   Cadastro de funcionários com associação a gestores
-   Registro de ponto com um clique
-   Listagem de registros com filtros por data e funcionário
-   Relatório completo com SQL puro (conforme exigência do teste)
-   Telas desenvolvidas em Blade com DataTables e Select2
-   Controle de acesso com permissões por perfil (Administrador, Gerente, Funcionário)

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

⚠️ **Configure a conexão com o banco MySQL no `.env`**:

```env
DB_DATABASE=registro_ponto
DB_USERNAME=root
DB_PASSWORD=secret
```

> Crie manualmente o banco com o nome informado.

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

Acesse: [http://localhost:8000](http://localhost:8000)

---

## 🎨 (Opcional) Desenvolvimento de Frontend

Caso deseje personalizar ou compilar os arquivos CSS/JS:

```bash
npm install
npm run build
```

---

## 🔐 Usuários de Teste

Usuários criados automaticamente pelo seeder:

-   **Administrador**

    -   Email: `admin@teste.com`
    -   Senha: `senha123`

-   **Gerente de RH**

    -   Email: `gerenterh@teste.com`
    -   Senha: `senha123`

-   **Gerente Comercial**

    -   Email: `gerentecomercial@teste.com`
    -   Senha: `senha123`

-   **Funcionários**
    -   `funcionario1@teste.com`
    -   `funcionario2@teste.com`
    -   `funcionario3@teste.com`
    -   `funcionario4@teste.com`
    -   Senha padrão: `senha123`

---

## 📄 Sobre os Commits

Todo o projeto foi desenvolvido localmente antes da criação do repositório. Embora tenha sido realizado um único commit final, em contextos profissionais adoto:

-   Commits pequenos e descritivos
-   Versionamento semântico
-   Branches por feature
-   Entregas contínuas

---

## 🌐 Demonstração Online

🔗 [https://app-ponto.thiagocrispim.com.br](https://app-ponto.thiagocrispim.com.br)

---

## 📁 Licença

Este projeto foi desenvolvido exclusivamente para fins de avaliação técnica.

---

## 👤 Autor

**Thiago Jorge Crispim**

📧 thiagojcrispim@gmail.com  
🔗 [LinkedIn](https://www.linkedin.com/in/thiagojcrispim)  
🔗 [GitHub](https://github.com/thiagojcrispim)
