## Pré-requisitos

- Configuração básica presente na documentação do [Laravel](https://laravel.com/docs/7.x/installation#installing-laravel)(É recomendado o uso de composer);
- Instalação da base de dados [PostgreSQL 15.1](https://www.enterprisedb.com/downloads/postgres-postgresql-downloads);

## Passos para a execução do Projeto

- Renomear ```.env.example``` para ```.env```
Geração da APP_KEY
```
php artisan key:generate
```

Migração das tabelas e preenchimento das mesmas com dados exemplo
```
php artisan migrate:fresh --seed
```

Execução do servidor
```
php artisan serve
```
