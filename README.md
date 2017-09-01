# WEB CSR
## System CSR Web Based Laravel

![alt tag](https://img.shields.io/badge/Developedby-DanangIstu-red.svg)
### Requirement
- Composer
- PHP 5.6 or above
- Laravel 5.3

### How to Install


A. Clone the project

```sh
    using ssh :
    git clone git@github.com:danangistu/webcsr.git

    using https :
    git clone https://github.com/danangistu/webcsr.git

```

B. Setting Database Connection in .env file

```sh
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=dbName
    DB_USERNAME=dbUsername
    DB_PASSWORD=dbPassword

```

C. composer install
```sh

    composer install

```

D. Publish vendor

```sh

    php artisan vendor:publish

```

Finish


Login User

|  Username  |  Email  |      Password      |  Role |
|:--------:|:--------:|:-------------:|------:|
|superadmin |superadmin@admin.com |  admin123 | Super Admin |
