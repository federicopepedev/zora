## About Zora 

Zora is an open source Content Management System based on Laravel.

## Installation

 Clone repository into your local directory
```
git clone https://github.com/federicopepedev/zora.git projectName
```
Install dependencies 
```
composer install
npm install
```
Copy the .env.example file and rename it into the .env file
```
copy .env.example .env
``` 
Generate a new key
```
php artisan key:generate
``` 
Migrate database
```
php artisan migrate
``` 
Seed database
```
php artisan db:seed
``` 
You can now login using

| Email        | Password           |
| ------------- |:-------------:|
| admin@admin.com      | admin | 

## Contact

Please send an e-mail to Federico Pepe via federicopepedev@gmail.com

