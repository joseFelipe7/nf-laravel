<p align="center">
    <a href="https://laravel.com" target="_blank"><img src="https://www.azapfy.com.br/wp-content/uploads/2020/07/logo_Prancheta-1-1536x1022.png" width="200" alt="Laravel Logo"></a>
    <h3 align="center">velocidade para fazer!</h3>
</p>

<p align="center">
<img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
<img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
<img src="https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
</p>

# Gerenciador de Notas Fiscais 📈

# Desafio Técnico - Desenvolvedor backend AZAPFY

## 🚀 API Rest desenvolvida em:<br/>
✔️**PHP 8+**<br/>
✔️**Framework Laravel 10+**<br/>
✔️**Banco de dados MySql**<br/>
✔️**JWT**<br/>
✔️**Form request** (na validação de dados enviados na requisição)<br/>
✔️**Api Resources** (para declaração das rotas da API de forma padronizada)<br/>
✔️**Polices Gates** (para validações de acesso aos métodos e dados dentro do sistema)<br/>
✔️**Notifications** (no disparo de novas notas fiscais para o e-mail do usuário logado em Fila para o envio de forma assíncrona)<br/>
✔️Testes Automáticos com **PHPUnit**<br/>
✔️**Documentação com Postman**<br/>

## 🚀 Bônus realizados do Desafio:<br/>
🎉**Docker**🐋<br/> 

## 🚀 API
-> Endpoints do **CRUD dos Usuários** do sistema:
Show/index/store/update/destroy de Usuário

-> Endpoints do **CRUD para o gerenciamento das notas fiscais**
Show/index/store/update/destroy de NF

-> Endpoints de **acessos** dos Usuários no sistema (auth):
Login
Logout

_**Todos os endpoints contam com devidos retornos de response e http status code.**_

## 🚀 Sobre a Autenticação no Sistema
### NF
_Todos os endpoints de Notas Fiscais necessitam de autenticação._
Qualquer nível de usuário pode utilizá-las, tendo _acesso apenas a suas próprias notas fiscais_ cadastradas.

## Users
_Endpoints de usuários possuem autenticação em todas suas rotas._
Necessitando de usuário Admin para Show/index/update/destroy, exceto para o endpoint de criação (store) de novo usuário.

# 🚀 Como rodar o projeto:
> Primeiro certifique-se de ter o docker e docker compose instalado em sua máquina.<br/><br/>

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
<br/><br/>
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
 <br/><br/>
> Para executar o projeto no Docker execute os comandos no terminal (necessário estar dentro da raiz do projeto):
```
docker ps (para listar os containers/imagens e poder copiar o id do container do projeto que estará com a imagem de nome _nf-laravel-app_)
docker-compose up -d
docker exec  -it ID_DO_CONTAINER_COPIADO /bin/bash 
 ```
<br/><br/>
> Dentro do container (após executar o container pelo id ou name do container)
```
composer install 
```
<br/><br/>
> Para configurar o projeto ainda dentro do container
```
php artisan jwt:secret 
php artisan key:generate 
php artisan migrate
php artisan seed (caso desejar criar um usuário admin)
```
<br/><br/>
> Para execução dos testes dentro do container
```
php artisan test
```
<br/><br/>
# 🚀 Acesse...
- [Documentação Postman aqui](https://documenter.getpostman.com/view/12476316/2s9YkoeMhB#a7bd3a9a-188d-403c-a777-3e87ec85c892).

<p align="center">
    <a href="https://laravel.com" target="_blank"><img src="https://www.azapfy.com.br/wp-content/uploads/2020/08/NOVA-LOGO-AZAPFY_03-212x62.png" width="150" alt="Laravel Logo"></a>
    <h5 align="center">Desenvolvido com ♥ por JF - 2023</h5>
</p>
