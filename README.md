# laravel-angular-bootstrap
Laravel, AngularJS, Bootstrap Boilerplate

version

```
laravel 5
```

```
cd frontend
composer install
```

```
sudo npm install -g gulp
```

```
npm install
```

```
gulp
```



## Database setup

```
DROP DATABASE IF EXISTS sampledb; CREATE DATABASE IF NOT EXISTS sampledb DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
```

In addition, you need the "sampledb" user to have full access to this database:

```
GRANT ALL PRIVILEGES ON sampledb.* TO 'sampledb'@'localhost' IDENTIFIED BY 'sampledb' WITH GRANT OPTION; FLUSH PRIVILEGES;
```


With these settings, you won't need to modify the database.php configuration file.

After completing these steps, run the migration jobs, that fill the database:

```
cd frontend
```

```
php artisan migrate
```
