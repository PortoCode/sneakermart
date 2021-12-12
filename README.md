# Sneakermart

Aplicação Laravel de e-commerce de sneakers.

# Tecnologias utilizadas

1. PHP
2. Laravel
3. Composer
4. Docker

# Execução passo a passo

## Passo 1:

Você **deve criar** o arquivo .env e definir as variáveis de ambiente. Abaixo você pode ver um exemplo do arquivo .env.

```bash
APP_NAME=Sneakermart
APP_ENV=local
APP_KEY=base64:LApjanHHEjA/y33wGk7twGDmdVOltVqcG0riatlnYLA=
APP_DEBUG=true
APP_URL=http://sneakermart.test
APP_TIMEZONE=America/Sao_Paulo

LOG_CHANNEL=daily
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=database
DB_PORT=3306
DB_DATABASE=sneakermart
DB_USERNAME=root
DB_PASSWORD=root
DB_TIMEZONE=America/Sao_Paulo

BROADCAST_DRIVER=log
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

FILESYSTEM_DRIVER=local
MEDIA_DISK=public
```

## Passo 2:

Utilize o comando abaixo para instalar as dependências do projeto.

```bash
composer install --ignore-platform-reqs
```

## Passo 3:

Em um terminal, utilize os comandos abaixo para subir o servidor, o banco de dados e o redis no Docker.

```bash
docker network create default-docker-network
make up
```

## Passo 4:

Em outro terminal, para iniciar o servidor de desenvolvimento para a aplicação Laravel, execute os comandos abaixo.

```bash
make sh
php artisan migrate:fresh –seed
```

## Passo 4:

Deve-se utilizar o comando key:generate, ele é usado para definir uma nova chave no seu arquivo .env, que esta localizado na pasta inicial, ele seta o valor dentro de .env em APP_KEY.

```bash
php artisan key:generate
```

## Passo 5:

Para aumentar a velocidade do seu aplicativo, você deve armazenar em cache todos os seus arquivos de configuração em um único arquivo usando o comando Artisan config:cache. Isso combinará todas as opções de configuração para seu aplicativo em um único arquivo que pode ser carregado rapidamente pela estrutura.

```bash
php artisan config:cache
```

## Passo 6:

Para iniciar o servidor de desenvolvimento para a aplicação Laravel, execute o comando php artisan serve.

```bash
php artisan serve
```
