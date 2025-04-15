CodeIgniter 3 Phonebook CRUD (Docker Setup)
A simple single-page CRUD Phonebook CodeIgniter 3 and MySQL, running in Docker.

Features
Add, Edit, Delete, View phonebook entries

Fields: Name, Phone, Status

Built-in migration controller to create the table

Dockerized for CI/CD

Stack
Backend: CodeIgniter 3 (PHP)

Database: MySQL

Server: Apache

Environment: Docker

Setup Guide

1. Clone the project
git clone https://github.com/chunmeng95/unitytest.git

2. Run Docker containers
Ensure you have Docker installed. Then run:
docker compose up -d
App will be available at: http://localhost:8080

3. Configure Apache to remove .php from URLs
Edit .htaccess in the root of your CodeIgniter app:
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]

In config/config.php, update:
$config['index_page'] = '';

4. Run Migration from Browser
Navigate to:
http://localhost:8080/migrate
This will create the phonebook table.

5. Fix Apache Write Permissions (for sessions)
Set session save path in config/config.php:
$config['sess_save_path'] = sys_get_temp_dir();

Sample Data to Insert (Manually via MySQL)
INSERT INTO phonebook (name, phone, status) VALUES
('Alice', '0123456789', 'active'),
('Bob', '0987654321', 'inactive');

Directory Highlights
application/controllers/Welcome.php: Main CRUD logic

application/models/Phonebook_model.php: DB operations

application/views/welcome_message.php: HTML UI

application/controllers/Migrate.php: Migration controller
