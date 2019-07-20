# Casher API

Casher is an app to control all your bills.

This project is being developed in conjunction with the [@VictorioDev](https://github.com/VictorioDev) for study purposes and it is separated into 3 completely different parts.

- **Casher API (RESTful API): [lucianocarvalho/casher-api](https://github.com/lucianocarvalho/casher-api)**
- **Casher App (web application): [lucianocarvalho/casher-app](https://github.com/lucianocarvalho/casher-app)**
- **Flutter (iOS/Android application): [VictorioDev/CasherApp](https://github.com/VictorioDev/CasherApp)**

> :warning: This repository contains only the REST API, not the complete application. Check the other repositories.

## Table of contents:

* **[About](#about)**
* **[Endpoints](#endpoints)**
* **[Bugs and features](#bugs-and-features)**
* **[Author](#author)**

## About

#### Requirements:
- **[PHP (^7.2)](https://php.net/releases/)**
- **[Composer (^1.8.4)](https://getcomposer.org/)**
- **[MySQL (^5.7)](https://dev.mysql.com/doc/relnotes/mysql/5.7/en/)**

#### Database schema:

<img id="casher-api" src="database-schema.png" alt="Casher Database Schema">


#### Installation:

1. Clone the repository:
```bash
git clone https://github.com/lucianocarvalho/casher-api
```

2. Install the dependencies:
```bash
cd casher-api && composer install
```

3. Rename .env file:
```bash
mv .env-example .env
```

4. Configure .env file:
```bash
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Run the migrations:
```bash
php artisan migrate
```

7. Run the database seeds:
```bash
php artisan db:seed
```

8. Start the server:
```bash
php artisan serve
```

9. **Make REST requests at http://localhost:8000**.

## Endpoints

WIP

## Bugs and features:

This project tracks issues and feature requests using the GitHub issue tracker. Feel free to [create a new issue](https://github.com/lucianocarvalho/casher-api/issues) or [send a pull request](https://github.com/lucianocarvalho/casher-api/pulls).

## Author

Luciano Carvalho (lucianocarvalho.dev) - @lucianocarvalho