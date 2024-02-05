# Simple Login/Signup/Logout System

## Overview

This project is a simple PHP-based login, signup, and logout system using OOP principles, PDO for database interactions, and sessions for user authentication.

## Installation Instructions

1. Clone the repository:
```bash
git clone <repository-url>
 ```
2. Change directory:
```bash
cd <project-directory>
```
3. Create the database using MySQL or PhpMyAdmin:
```SQL
CREATE TABLE users {
    id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    username TINYTEXT not null,
    password LONGTEXT not null,
    email TINYTEXT not null
}
```
4. Start the PHP built-in server in the same directory of `index.php`:
```bash
php -S localhost:8080
```
5. Open your web browser and navigate to http://localhost:8080.

## Features

- User Registration
- User Login
- User Logout

## Technologies Used

- PHP
- MySQL
- PDO
- Sessions

## Folder Structure

- **/includes:** Includes PHP files (e.g., database connection, user authentication).
- **/classes:** Contains PHP classes .

## Database Schema

- **users:**
  - id (int, auto_increment, primary key)
  - username (TINYTEXT, not null)
  - password (LONGTEXT, not null)
  - email (TINYTEXT, not null)

## Usage

Visit [http://localhost:8080](http://localhost:8080) in your web browser to access the system after following the `Installation Instructions`.

---

This README provides concise installation instructions and a brief overview of the project. Feel free to customize it further according to your preferences.


---
