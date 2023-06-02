# Desafio Join Tecnologia - Backend

## Stack utilizada

**Back-end:** PHP, Laravel, MySQL, Docker

**Front-end:** Next.Js

## Instalação

Instale o projeto usando o Docker

No Linux rode:

```bash
cp .env.example .env
```

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

Depois, rode:

```bash
alias sail=vendor/bin/sail
sail up -d
sail artisan key:generate
sail artisan migrate
```
