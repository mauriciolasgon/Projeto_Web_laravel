
# Laravel Template
Feito por:
```sh
Mauricio Lasca Gonçales
Murilo Croce
Gustavo Mota
André Costa
```
### Passo a passo
Clone Repositório criado a partir do template, entre na pasta e execute os comandos abaixo:

Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=Laravel
APP_URL=http://localhost:8080

DB_PASSWORD=root
```


Suba os containers do projeto
```sh
docker compose up -d
```


Acessar o container
```sh
docker compose exec app bash
```


Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate
```
Gerar o banco do projeto 
```sh
php artisan migrate:fresh --seed
```


Acesse o projeto
[http://localhost:8080](http://localhost:8080)

Conta para fazer login
```sh
Secretaria
email:secretaria@gmail.com
Senha=123456789
```
```sh
ADM
email:adm@gmail.com
Senha=123456789
```


Acesse o phpmyadmin
[http://localhost:8081](http://localhost:8081)


