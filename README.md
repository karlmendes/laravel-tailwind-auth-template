# Nome do Sistema

Sistema desenvolvido em **Laravel** com **TailwindCSS**, utilizando uma estrutura moderna para desenvolvimento web, com foco em organização, performance e facilidade de manutenção.

---

## Sobre o projeto

Este projeto tem como objetivo disponibilizar uma aplicação web construída com Laravel no backend e TailwindCSS no frontend.

A estrutura foi pensada para facilitar o desenvolvimento, a instalação local, a manutenção e a publicação em ambientes de homologação ou produção.

---

## Tecnologias utilizadas

- PHP
- Laravel
- Composer
- Node.js
- NPM
- TailwindCSS
- Vite
- Banco de dados relacional

---

## Pré-requisitos

Antes de iniciar a instalação, certifique-se de ter instalado em sua máquina:

```bash
php -v
composer -V
node -v
npm -v
```

Também é necessário possuir um banco de dados configurado, como:

- MySQL
- PostgreSQL
- SQL Server
- SQLite
- Outro banco compatível com Laravel

---

## Instalação completa do projeto

### 1. Clonar o repositório

```bash
git clone URL_DO_REPOSITORIO
cd NOME_DO_PROJETO
```

---

### 2. Instalar dependências PHP

```bash
composer install
```

---

### 3. Instalar dependências frontend

```bash
npm install
```

---

### 4. Criar o arquivo de ambiente

Linux/macOS:

```bash
cp .env.example .env
```

Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

---

### 5. Configurar o arquivo `.env`

Abra o arquivo `.env` e configure os dados principais da aplicação:

```env
APP_NAME="Nome do Sistema"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000
```

Configure também a conexão com o banco de dados:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

Exemplo usando PostgreSQL:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

---

### 6. Gerar a chave da aplicação

```bash
php artisan key:generate
```

Este comando irá preencher automaticamente a variável `APP_KEY` no arquivo `.env`.

---

### 7. Executar as migrations

```bash
php artisan migrate
```

Caso o projeto possua seeders:

```bash
php artisan migrate --seed
```

Para recriar toda a base em ambiente local:

```bash
php artisan migrate:fresh --seed
```

> Atenção: o comando `migrate:fresh` apaga todas as tabelas antes de recriá-las.

---

### 8. Executar o servidor Laravel

```bash
php artisan serve
```

Por padrão, o sistema ficará disponível em:

```text
http://localhost:8000
```

---

### 9. Executar o Vite

Em outro terminal, execute:

```bash
npm run dev
```

Esse comando compila os arquivos frontend em modo desenvolvimento e permite visualizar as alterações de CSS e JavaScript em tempo real.

---

### 10. Acessar o sistema

Acesse no navegador:

```text
http://localhost:8000
```

---

## Instalação rápida

Use este bloco caso queira executar os comandos principais em sequência.

Linux/macOS:

```bash
git clone URL_DO_REPOSITORIO
cd NOME_DO_PROJETO
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run dev
php artisan serve
```

Windows PowerShell:

```powershell
git clone URL_DO_REPOSITORIO
cd NOME_DO_PROJETO
composer install
npm install
Copy-Item .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run dev
php artisan serve
```

---

## Executando o projeto

Para executar o backend Laravel:

```bash
php artisan serve
```

Para executar o frontend com TailwindCSS e Vite:

```bash
npm run dev
```

Acesse:

```text
http://localhost:8000
```

---

## Build de produção

Para gerar os arquivos otimizados de frontend:

```bash
npm run build
```

Em ambiente de produção, instale as dependências PHP sem pacotes de desenvolvimento:

```bash
composer install --no-dev --optimize-autoloader
```

Execute as otimizações do Laravel:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

Execute as migrations em produção:

```bash
php artisan migrate --force
```

---

## Variáveis de ambiente importantes

Abaixo estão algumas das principais variáveis utilizadas no arquivo `.env`:

```env
APP_NAME="Nome do Sistema"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

Caso o sistema utilize envio de e-mail, configure também:

```env
MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="${APP_NAME}"
```

---

## Comandos úteis

Limpar todos os caches da aplicação:

```bash
php artisan optimize:clear
```

Limpar cache de configuração:

```bash
php artisan config:clear
```

Limpar cache de rotas:

```bash
php artisan route:clear
```

Limpar cache de views:

```bash
php artisan view:clear
```

Listar rotas disponíveis:

```bash
php artisan route:list
```

Executar migrations:

```bash
php artisan migrate
```

Reverter a última migration:

```bash
php artisan migrate:rollback
```

Recriar o banco em ambiente local:

```bash
php artisan migrate:fresh --seed
```

Executar servidor local:

```bash
php artisan serve
```

Executar frontend em modo desenvolvimento:

```bash
npm run dev
```

Gerar build frontend:

```bash
npm run build
```

---

## Estrutura principal do projeto

```text
app/
├── Http/
│   ├── Controllers/
│   └── Middleware/
├── Models/
└── Providers/

bootstrap/
└── cache/

config/

database/
├── migrations/
├── seeders/
└── factories/

public/
└── index.php

resources/
├── css/
├── js/
└── views/

routes/
├── web.php
└── api.php

storage/
├── app/
├── framework/
└── logs/
```

---

## Permissões em ambiente Linux

Em servidores Linux, pode ser necessário liberar permissão de escrita para os diretórios abaixo:

```bash
chmod -R 775 storage bootstrap/cache
```

Dependendo da configuração do servidor web:

```bash
chown -R www-data:www-data storage bootstrap/cache
```

---

## Possíveis problemas

### Erro: `No application encryption key has been specified`

Execute:

```bash
php artisan key:generate
```

---

### Erro de conexão com banco de dados

Verifique as configurações no arquivo `.env`:

```env
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Depois execute:

```bash
php artisan config:clear
```

---

### Alterei o `.env`, mas o sistema não reconheceu

Execute:

```bash
php artisan optimize:clear
```

---

### TailwindCSS não atualiza as alterações

Verifique se o Vite está rodando:

```bash
npm run dev
```

Confirme também se o layout principal do Laravel possui a diretiva:

```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

---

### Erro ao instalar dependências do NPM

Remova as dependências antigas e instale novamente.

Linux/macOS:

```bash
rm -rf node_modules package-lock.json
npm install
```

Windows PowerShell:

```powershell
Remove-Item -Recurse -Force node_modules
Remove-Item package-lock.json
npm install
```

---

### Erro ao instalar dependências do Composer

Tente limpar o cache do Composer:

```bash
composer clear-cache
composer install
```

Caso necessário, atualize as dependências:

```bash
composer update
```

---

### Página sem estilo CSS

Verifique se o Vite está em execução:

```bash
npm run dev
```

Ou gere o build de produção:

```bash
npm run build
```

Também confirme se os arquivos estão sendo chamados no layout principal:

```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

---

## Checklist de instalação

- [ ] Repositório clonado
- [ ] Dependências PHP instaladas
- [ ] Dependências frontend instaladas
- [ ] Arquivo `.env` criado
- [ ] Banco de dados configurado
- [ ] Chave da aplicação gerada
- [ ] Migrations executadas
- [ ] Seeders executados, se necessário
- [ ] Servidor Laravel iniciado
- [ ] Vite executando
- [ ] Sistema acessível no navegador

---

## Fluxo recomendado de desenvolvimento

1. Criar uma nova branch:

```bash
git checkout -b minha-alteracao
```

2. Realizar as alterações necessárias.

3. Executar os testes ou validações locais.

4. Fazer o commit:

```bash
git add .
git commit -m "Descrição da alteração"
```

5. Enviar a branch para o repositório:

```bash
git push origin minha-alteracao
```

6. Abrir um Pull Request.

---

## Boas práticas

- Não versionar o arquivo `.env`.
- Manter o arquivo `.env.example` atualizado.
- Não subir senhas, tokens ou chaves privadas no repositório.
- Executar `php artisan optimize:clear` após alterações importantes de ambiente.
- Utilizar branches para novas funcionalidades e correções.
- Revisar migrations antes de executar em produção.
- Rodar `npm run build` antes de publicar o frontend em produção.

---

## Deploy em produção

Checklist recomendado para publicação:

- [ ] Atualizar código no servidor
- [ ] Instalar dependências PHP de produção
- [ ] Instalar dependências frontend
- [ ] Gerar build com Vite
- [ ] Configurar `.env` de produção
- [ ] Executar migrations com `--force`
- [ ] Limpar caches antigos
- [ ] Gerar novos caches
- [ ] Validar permissões de diretório
- [ ] Testar acesso ao sistema

Comandos principais:

```bash
composer install --no-dev --optimize-autoloader
npm install
npm run build
php artisan migrate --force
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

---

## Segurança

Antes de publicar o projeto, verifique:

- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_URL` configurado com a URL correta
- Banco de dados configurado corretamente
- Arquivo `.env` protegido
- Permissões adequadas nos diretórios `storage` e `bootstrap/cache`
- Chaves e tokens fora do controle de versão

---

## Licença

Este projeto é de uso interno. Verifique com o responsável pelo projeto antes de copiar, distribuir ou reutilizar qualquer parte do código.

---

## Autor

Desenvolvido por **Karl Daniel Mendes**.