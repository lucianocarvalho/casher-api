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

### ```POST``` **/api/login**

Auth login.

##### Request:

```POST /api/login```
```json
{
	"username":"lucianocarvalho",
	"password":"e10adc3949ba59abbe56e057f20f883e"
}
```

##### :heavy_check_mark: Successful response:
```Status Code: 200```
```json
{
	"status": true,
	"user_id": 1,
	"username": "lucianocarvalho"
}
```

##### :x: Failure response:

```Status Code: 204```
```json
{
	"status": false,
	"error": "Bad login"
}
```

***

### ```POST``` **/api/users**

Register a new user.

##### Request:

```POST /api/users```
```json
{
	"username":"lucianocarvalho",
	"password":"e10adc3949ba59abbe56e057f20f883e"
}
```

##### :heavy_check_mark: Successful response:

```Status Code: 201```
```json
{
	"id": 1,
	"status": true,
	"username":"lucianocarvalho"
}
```

##### :x: Failure response:

```Status Code: 204```
```json
{
	"status": false,
	"error": "Username already exists"
}
```

***

### ```GET``` **/api/users/exists**

Check the existence of a user by your username, used to verify if the user already exists in the user registration.

##### Query parameters:

```?username```: username entered by the user.

##### Request:

```GET /api/users/exists?username=lucianocarvalho```


##### Response:

```Status Code: 201```
```json
{
	"exists": false
}
```

***

### ```DELETE``` **/api/users/{id}**

Delete a specific user.

##### Request:

```DELETE /api/users/1```

##### :heavy_check_mark: Successful response:

```Status Code: 201```
```json
{
	"status": true
}
```

##### :x: Failure response:

```Status Code: 204```
```json
{
	"status": false,
	"error": "This user could not be deleted"
}
```

***

### ```PUT``` **/api/users/{id}**

Update a specific user.

##### Request:

```PUT /api/users/1```
```json
{
	"username":"victoriodev",
	"password":"e10adc3949ba59abbe56e057f20f883e"
}
```

##### :heavy_check_mark: Successful response:

```Status Code: 201```
```json
{
	"id": 1,
	"status": true,
	"username":"victoriodev"
}
```

##### :x: Failure response:

```Status Code: 204```
```json
{
	"status": false,
	"error": "Username can not be updated"
}
```

***

### ```GET``` **/api/summary/{id}**

Displays a user summary (monthly balance, number of entries, etc).

##### Request:

```GET /api/summary/1```

##### Response:

```Status Code: 201```
```json
{
	"balance": 3024.33,
	"positive_balance": true,
	"entries": 23,
	"last_entries": [
		{
			"type": "D",
			"name": "Car repair",
			"value": 200,
			"date": "2019-07-01"
		},
		{
			"type": "C",
			"name": "Salary",
			"value": 5500.27,
			"date": "2019-06-24"
		},
		{
			"type": "D",
			"name": "Lunch",
			"value": 39.90,
			"date": "2019-06-14"
		}
	]
}
```

***

### ```GET``` **/api/movimentations**

List all movimentations of a specific user.

##### Query Parameters:

`?user_id`: specific user **(required field)**

`?order_by`: order by a specific field.

`?start_date`: start with a specific date.

`?end_date`: start with a specific date.

`?type`: list only **C** or **D** movimentations.

##### Request:

```GET /api/movimentations?user_id=1```

##### Response:

```Status Code: 200```

```json
{
	"entries": 23,
	"hits": [
		{
			"id": 3,
			"type": "D",
			"name": "Car repair",
			"value": 200,
			"date": "2019-07-01"
		},
		{
			"id": 2,
			"type": "C",
			"name": "Salary",
			"value": 5500.27,
			"date": "2019-06-24"
		},
		{
			"id": 1,
			"type": "D",
			"name": "Lunch",
			"value": 39.90,
			"date": "2019-06-14"
		}
	]
}
```

***

### ```POST``` **/api/movimentations**

Create a new movimentation.

##### Request:

```POST /api/movimentations```
```json
{
	"user_id": 1,
	"type": "D",
	"name": "Foo bar",
	"value": 99.21,
	"date": "2019-08-20"
}
```

##### Response:
```Status Code: 201```
```json
{
	"status": true,
	"user_id": 1,
	"type": "D",
	"name": "Foo bar",
	"value": 99.21,
	"date": "2019-08-20"
}
```

***

### ```DELETE``` **/api/movimentations/{id}**

Delete a specific movimentation.

##### Request:

```DELETE /api/movimentations/1```

##### Response:
```Status Code: 204```
```json
{
	"status": true
}
```

## Bugs and features:

This project tracks issues and feature requests using the GitHub issue tracker.

Feel free to [create a new issue](https://github.com/lucianocarvalho/casher-api/issues) or [send a pull request](https://github.com/lucianocarvalho/casher-api/pulls).

## Author

Luciano Carvalho (lucianocarvalho.dev) - @lucianocarvalho