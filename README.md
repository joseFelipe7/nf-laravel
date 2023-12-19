<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Gerenciador de Notas Fiscais

# Desafio Técnico - Desenvolvedor backend AZAPFY

## API Rest desenvolvida em:
**PHP 8+**
**Framework Laravel 10+**
**Banco de dados MySql**
**JWT**
**Form request** (na validação de dados enviados na requisição)
**Api Resources** (para declaração das rotas da API de forma padronizada)
**Polices Gates** (para validações de acesso aos métodos e dados dentro do sistema)
**Notifications** (no disparo de novas notas fiscais para o e-mail do usuário logado em Fila para o envio de forma assíncrona)
Testes Automáticos com **PHPUnit**
**Documentação com Postman**

## Bônus realizados do Desafio:
**Docker**
**Pipeline no Github Actions (CI/CD)**

## API
-> Endpoints do **CRUD dos Usuários** do sistema:
Show/index/store/update/destroy de Usuário

-> Endpoints do **CRUD para o gerenciamento das notas fiscais**
Show/index/store/update/destroy de NF

-> Endpoints de **acessos** dos Usuários no sistema (auth):
Login
Logout

_**Todos os endpoints contam com devidos retornos de response e http status code.**_

## Sobre a Autenticação no Sistema
### NF
_Todos os endpoints de Notas Fiscais necessitam de autenticação._
Qualquer nível de usuário pode utilizá-las, tendo _acesso apenas a suas próprias notas fiscais_ cadastradas.

## Users
_Endpoints de usuários possuem autenticação em todas suas rotas._
Necessitando de usuário Admin para Show/index/update/destroy, exceto para o endpoint de criação (store) de novo usuário.

# Como rodar o projeto:
> Primeiro certifique-se de ter o docker e docker compose instalado em sua máquina.

> Copie o conteudo de .env.example para .env e altere os seguintes parâmetros de acordo com o projeto:
```
APP_NAME=nf_laravel 
APP_URL=http://localhost:8989 
 
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=dbname 
DB_USERNAME=root
DB_PASSWORD=root 

CACHE_DRIVER=redis 
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis 
REDIS_HOST=redis 
REDIS_PASSWORD=null
REDIS_PORT=6379 
```

> Para que as Notifications funcionem, é necessário adicionar e configurar as seguintes variáveis no seu env:
```
MAIL_MAILER=smtp 
MAIL_HOST= 
MAIL_PORT= 
MAIL_USERNAME= 
MAIL_PASSWORD= 
MAIL_ENCRYPTION=null 
MAIL_FROM_ADDRESS="hello@example.com" 
MAIL_FROM_NAME="${APP_NAME}"
```
 
> Para executar o projeto no Docker execute os comandos no terminal (necessário estar dentro da raiz do projeto):
```
docker ps (para listar os containers/imagens e poder copiar o id do container do projeto que estará com a imagem de nome _nf-laravel-app_)
docker-compose up -d
docker exec  -it ID_DO_CONTAINER_COPIADO /bin/bash 
 ```

> Dentro do container (após executar o container pelo id ou name do container)
```
composer install 
```

> Para configurar o projeto ainda dentro do container
```
php artisan jwt:secret 
php artisan key:generate 
php artisan migrate
php artisan seed (caso desejar criar um usuário admin)
```

> Para execução dos testes dentro do container
```
php artisan test
```

# Acesse...
- [Documentação Postman aqui](https://laravel.com/docs/routing).
