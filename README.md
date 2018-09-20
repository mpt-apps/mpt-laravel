# mpt-laravel

Web App in laravel. 

### Running 

* Clone this repo
```
git clone https://github.com/mpt-apps/mpt-laravel.git
```

* Go into mpt-laravel folder
```
cd mpt-laravel
```

* Create a .env file like .env.example with Mysql connection.


* Install libraries
```
composer install
npm install 
```

* Build DataBase
```
php artisan migrate:refresh --seed
```

* Run it
```
npm run watch
```