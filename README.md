# Education-Management-System

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

## Education Management System (EMS)

An intuitive and scalable web application designed to streamline administrative tasks in educational institutions.

![EMS Dashboard](https://via.placeholder.com/1200x400.png?text=EMS+Dashboard)

## Table of Contents

- [About The Project](#about-the-project)
- [Built With](#built-with)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Acknowledgments](#acknowledgments)

## About The Project

The Education Management System (EMS) is a comprehensive solution aimed at automating and managing various administrative functions within educational institutions. From student enrollment to grading and attendance tracking, EMS simplifies complex processes, ensuring efficiency and accuracy.

## Built With

- Laravel – PHP framework for web artisans
- Bootstrap – Front-end component library
- MySQL – Relational database management system
- Composer – Dependency management tool for PHP

## Getting Started

To get a local copy up and running, follow these steps.

### Prerequisites

- PHP (version 8.x or higher)
- Composer
- MySQL or MariaDB
- Node.js (for frontend assets)

### Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/ChalakaEcls/ems.git
    cd ems
    ```
2. Install PHP dependencies:
    ```bash
    composer install
    ```
3. Copy the example environment file:
    ```bash
    cp .env.example .env
    ```
4. Generate the application key:
    ```bash
    php artisan key:generate
    ```
5. Set up your database in the `.env` file:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ems
    DB_USERNAME=root
    DB_PASSWORD=
    ```
6. Run database migrations:
    ```bash
    php artisan migrate
    php artisan db:seed
    ```
7. Install frontend dependencies and compile assets:
    ```bash
    npm install
    npm run dev
    ```
8. Serve the application:
    ```bash
    php artisan serve
    ```

## Usage

**Authentication**: Use the default credentials to log in:

- Email: `admin@example.com`
- Password: `password123`

**Features:**

- Student enrollment and management
- Course creation and assignment
- Attendance tracking
- Grade management
- User roles and permissions

## License

Distributed under the MIT License. See `LICENSE` for more information.

## Acknowledgments

- [Laravel](https://laravel.com/) – The PHP framework used
- [Bootstrap](https://getbootstrap.com/) – Front-end framework
- [MySQL](https://www.mysql.com/) – Database management system
