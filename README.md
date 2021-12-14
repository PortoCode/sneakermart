# Sneakermart

Aplicação Laravel de e-commerce de sneakers.

# Tecnologias utilizadas

1. Laravel (framework PHP)
2. Docker
3. Redis
4. MySQL
5. Bootstrap

# Execução passo a passo

Esse tutorial mostra passo a passo como executar o projeto em um sistema operacional Linux.

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
DB_HOST=localhost
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

REDIS_HOST=localhost
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

Em um terminal, utilize os comandos abaixo para subir o servidor, o banco de dados e o redis no Docker.

```bash
docker network create default-docker-network
make up
```

## Passo 3:

Em outro terminal, para instalar as dependências do projeto e iniciar o servidor de desenvolvimento para a aplicação Laravel, execute os comandos abaixo.

```bash
make sh
composer install
php artisan migrate:fresh –seed
php artisan serve
```
