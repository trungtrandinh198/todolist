# To Do List

### Prerequisite
    Server Apache2 or Nginx
    PHP >= 7.4
    PHP extension
        ext-cli
        ext-common
        ext-curl
        ext-gd
        ext-json
        ext-mbstring
        ext-intl
        ext-mysql
        ext-xml
        ext-zip
        ext-fpm
        ext-bcmath
        ext-pdo
    Mysql

### How to install
    Create database
        Access mysql and create database name `db_todolist`
        Import DB in "storage/db_todolist.sql"
    Update file config database with your environment in
        `config.php`
    Run command: `php -S localhost:8000`
    Access browser with domain: `http://localhost:8000`
