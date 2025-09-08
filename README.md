
# Education-Management-System

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

About The Project

The Education Management System (EMS) is a comprehensive solution aimed at automating and managing various administrative functions within educational institutions. From student enrollment to grading and attendance tracking, EMS simplifies complex processes, ensuring efficiency and accuracy.

Built With

Laravel – PHP framework for web artisans

Bootstrap – Front-end component library

MySQL – Relational database management system

Composer – Dependency management tool for PHP

Getting Started

To get a local copy up and running, follow these steps.

Prerequisites

Ensure you have the following installed:

PHP (version 8.x or higher)

Composer

MySQL or MariaDB

Node.js (for frontend assets)

Installation

Clone the repository:

git clone https://github.com/ChalakaEcls/ems.git
cd ems


Install PHP dependencies:

composer install


Copy the example environment file:

cp .env.example .env


Generate the application key:

php artisan key:generate


Set up your database in the .env file:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ems
DB_USERNAME=root
DB_PASSWORD=


Run database migrations:

php artisan migrate


Install frontend dependencies and compile assets:

npm install
npm run dev


Serve the application:

php artisan serve

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
 924bc24 (Initial commit)
