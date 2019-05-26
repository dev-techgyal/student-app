# Student-App

This repository contains a sample application for adding system users,students and also uploading certificates and images related to them.

## How To Install
Download the project from git using *git clone https://github.com/TechGyal/student-app.git*


- Copy .env.example to .env *run* *cp .env.example .env*
- Run *composer install* 
- Change this in .env file for the database - 
- *DB_DATABASE=student-app* 
- *DB_USERNAME=homestead*
- *DB_PASSWORD=secret* 
- Run *php artisan migrate:refresh --seed*
- Run *php artisan serve*
- To access admin *login http://hostname/admin* *credentials - email ['admin@test.com'] ,password ['admin@test.com']*


Maintained By *TechGyal*.
