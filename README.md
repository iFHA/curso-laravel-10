# Prática do Curso GRATUITO de Laravel 10.x da EspecializaTI no YouTube

- :movie_camera: [Acessar o Curso](https://www.youtube.com/playlist?list=PLVSNL1PHDWvQ1N6fqhQ5HQzFtN-xrkjNU).

## Passo a passo para rodar o projeto

Clone o projeto
```sh
git clone https://github.com/iFHA/curso-laravel-10.git laravel-10
```
```sh
cd laravel-10/
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize essas variáveis de ambiente no arquivo .env
```dosini
APP_NAME="Curso laravel 10"
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```


Gere a key do projeto Laravel
```sh
php artisan key:generate
``````

Rode as migrations
```sh
php artisan migrate
```

Acesse o projeto
[http://localhost:8989](http://localhost:8989)
