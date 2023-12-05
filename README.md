# Prática do Curso GRATUITO de Laravel 10.x da EspecializaTI no YouTube

- :movie_camera: <a href="https://www.youtube.com/playlist?list=PLVSNL1PHDWvQ1N6fqhQ5HQzFtN-xrkjNU" target="_blank">Acessar o Curso</a>.

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
composer install && npm install
```


Gere a chave do projeto Laravel
```sh
php artisan key:generate
``````

Rode as migrations
```sh
php artisan migrate
```

<a href="http://localhost:8989" target="_blank">
    Acesse o projeto
</a>

OBS: Nesse projeto fiz 2 containers extras a partir da imagem principal(app), sendo eles o container "fila" e o container "vite", o primeiro fica responsável por processar a fila do projeto, e o segundo fica responsável por executar o vite para que haja o hot-reload, portanto, pode ser que ao executar o último comando listado acima(php artisan migrate) algum desses 2 containers esteja sendo reiniciado, se for esse o caso, basta aguardar que todos os containers estejam com o status "Up" para que a aplicação esteja de fato pronta para uso, para verificar o status pode ser utilizado o comando "docker-compose ps".
