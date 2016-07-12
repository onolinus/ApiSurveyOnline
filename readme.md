# ApiSurvey for litbang

Api service used by site <https://github.com/onolinus/SurveyOnline>

## Installation

### Requirements
- redis-server, <http://redis.io/>
- composer, <https://getcomposer.org/>

### How to start
1. Install all the requirements
2. `$ git clone git@github.com:onolinus/SurveyOnline`
3. `$ cd SurveyOnline`
4. `$ composer install`
make sure all composer packages dependencies is sucessfully installed
```
Generating autoload files
> Illuminate\Foundation\ComposerScripts::postInstall
> php artisan optimize
Generating optimized class loader
> php artisan survey:warmup all --reset=0 --keepoldcache=0
Generate Cache build-number:2 for "researchfields, socioeconomics"
```
#### Note
For `production` mode running composer using `--no-dev` option
```
$ composer install --no-dev
```
Then start your web server
```
$ php artisan serve --port=8000
Laravel development server started on http://localhost:8000/
```

## How to run the unit test
After successfully run `composer install` without using `--no-dev` option, then try run this command below
```
$  ./vendor/bin/phpunit -c phpunit.xml --debug tests/app/
```

## How to run db migrate & seed database
After successfully run `composer install`, then try run this command below
```
$  php artisan migrate:refresh --seed
```

## About

### Submitting bugs and feature requests
Harry Osmar Sitohang - <harry@olx.co.id> - <https://github.com/harryolx><br />
See also the list of [contributors](https://github.com/olxindonesia/oneweb/contributors) which participated in this project