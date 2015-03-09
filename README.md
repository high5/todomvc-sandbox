# todomvc-sandbox
laravel app set todomvc-sandbox 

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
DROP DATABASE IF EXISTS todomvc; CREATE DATABASE IF NOT EXISTS todomvc DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
```

In addition, you need the "todomvc" user to have full access to this database:

```
GRANT ALL PRIVILEGES ON todomvc.* TO 'todomvc'@'localhost' IDENTIFIED BY 'todomvc' WITH GRANT OPTION; FLUSH PRIVILEGES;
```


With these settings, you won't need to modify the database.php configuration file.

After completing these steps, run the migration jobs, that fill the database:

```
cd frontend
```

```
php artisan migrate
```


## flux-todomvc setup

```
cd frontend/public/flux-todomvc
```

install module

```
npm install
```

start script(see package.json)

```
npm start
```








