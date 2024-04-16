# Laravel Backend Library API

This project is a Laravel-based backend API for managing a library system. It provides endpoints for CRUD operations on books and user authentication. 

## Getting Started

### Prerequisites
- PHP >= 7.3
- Composer
- Laravel CLI
- MySQL or any other compatible database

### Installation
1. Clone the repository to your local machine:
git clone https://github.com/MostafaGhidanM/library

2. Navigate to the project directory:
cd library

3. Install dependencies using Composer:
composer install

4. Copy the `.env.example` file to `.env`:
cp .env.example .env

5. Generate application key:
php artisan key:generate

6. Configure your database connection in the `.env` file:
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

Run database migrations:
php artisan migrate

Start the development server:
php artisan serve

The API server will start running at http://localhost:8000.
Usage
Authentication
To log in, send a POST request to /handleLogin with email and password in the request body.
To register, send a POST request to /handleRegister with name, email, and password in the request body.
To log out, send a POST request to /logout.
Books
To retrieve all books, send a GET request to /books.
To retrieve a specific book, send a GET request to /books/show/{id} where {id} is the book's ID.
To store a new book, send a POST request to /books/store with book data in the request body.
To update an existing book, send a POST request to /books/update/{id} where {id} is the book's ID, with updated book data in the request body.
To delete a book, send a GET request to /books/delete/{id} where {id} is the book's ID.
