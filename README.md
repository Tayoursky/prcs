### Пишу мысли... для понимания процесса и чтобы не скучно было :)
1) создаем директорию и запускаем создание базового шаблона Yii2 через composer 
2) composer create-project --prefer-dist yiisoft/yii2-app-basic basic
3) инициализируем репозиторий git init
4) Открываем проект в phpStorm и настраиваем среду разработки для проекта
5) Создаем токен на github для vagrant  и пробуем поднять среду разработки vagrant up
6) Антивирус ругается на vagrant, создаются подключения безопасные для скачивания образа для vagrant
разрешаем всё...
7) Пока качается образ просмотрел конфиги vagrant и увидел что добавили установку composer в образ
т.е. теперь можно на чистой системе поставить только vagrant and virtualbox  и вжууух!
8) Ждём... Ждём.. Ждём... Значит развернется рабочий сервер для базового приложения Yii2
на основе Ubuntu 18.04 с nginx и php-fpm 7.2 и mysql по адресу yii2basic.test
9) Так, ну похоже готово. Пробуем... Congratulations! Готово.
10) Теперь настроим базу, на vagrant в phpStorm. Готово. Смотрим по заданию, что нужно.
11) Компании с Названием ИНН Ген.директор Адрес... странно конечно, вывает вопрос колонка с Адресом
    атомарность я так понимаю в этом задании не важна... и адрес будет не есть как через запятую
    и поиском по адресу и сортировками по этим данным не планируется)) ну ладно... дальше
12) Пользователи Админ, Гость. Создать пользователей можно вручную в базе... Ну мы их создадим при регистрации и сделаем админа через базу в поле роли...
    нам помогут миграции...
13) Гость просматривает инфу админ добавляет и редактирует, Доступ неавторизованым запрещён...-куда?
    запрещён? ну примерно ясно... но это не точно...
14) Технологии: php, Yii2 понятно.... jQuery? дак он из коробки же работает вроде не?..., сторонние библиотеки по желанию.... понятно.
15) Верстка желательно bootstrap 4.... А в Yii вообще вшит бутстрап только вот я не уверен что это 4..
    проверим... vendor/bower-asset/bootstrap где-то здесь наверно... о боже 3.4.1... и как обновить?..
    может через pakagist как-то.. гуглим... Ну вроде есть что то ставим через composer пакет с 
    bootstrap4, ну точно ставил я его было дело... потом просто этот класс юзаем вместо того...
16) дальше база данных mysql ну это есть...    
17) Создать таблицы в БД для хранения данных.... круто... создадим....
18) Вход для админов и юзеров... можно наверно взять из advanced приложения...
19) Базовая верстка и функционал:
    а) Список компаний 
        a.a) Гость видит список 
        а.а) Админ тоже
    б) Просмотр страницы одной компании для гостя
    в) Для админа просмотр отдельной компании совмещен с её редактированием.
    г) Опционально: страница редактирования пользователей (роль, логин, пароль)
        я так понимаю админу можно будет сделать управление пользователями....
        а зачем пароль?... надежнее хранить в хэше и менять через почту по запросу...
        сделаем наверно минимально.... хоть и не обязательно...
20) Реализация через ajax без перезагрузки страницы.
итого: есть вопросы к заданию по атомарности адреса ну наверно это придирки к тесту, необходимости rbac для юзеров если они только смотрят, хоть это и опционально... Ну да ладно.... выделим сущности
    

пользователи - Users (используем из advanced)
компании     - Companies (id, name, inn, boss, address)
сделаем commit.... 

создаем таблицу миграций в базе php yii migrate
создаем директорию для миграций в корне migrations
создаем таблицу юзеров php yii migrate/create create_users_table
дальше копипастим из advanced приложения и убирем лишнее... готово... 
rbac для этого слишком жирновато и не оправдано. Просто будем использовать поле role.

Пойдем кушать и спать... завтра доделаем... подготовка отняла много времени...
    



Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.6.0.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
composer create-project --prefer-dist yiisoft/yii2-app-basic basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](http://www.yiiframework.com/download/) to
a directory named `basic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

You can then access the application through the following URL:

~~~
http://localhost/basic/web/
~~~


### Install with Docker

Update your vendor packages

    docker-compose run --rm php composer update --prefer-dist
    
Run the installation triggers (creating cookie validation code)

    docker-compose run --rm php composer install    
    
Start the container

    docker-compose up -d
    
You can then access the application through the following URL:

    http://127.0.0.1:8000

**NOTES:** 
- Minimum required Docker engine version `17.04` for development (see [Performance tuning for volume mounts](https://docs.docker.com/docker-for-mac/osxfs-caching/))
- The default configuration uses a host-volume in your home directory `.docker-composer` for composer caches


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.


TESTING
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](http://codeception.com/).
By default there are 3 test suites:

- `unit`
- `functional`
- `acceptance`

Tests can be executed by running

```
vendor/bin/codecept run
```

The command above will execute unit and functional tests. Unit tests are testing the system components, while functional
tests are for testing user interaction. Acceptance tests are disabled by default as they require additional setup since
they perform testing in real browser. 


### Running  acceptance tests

To execute acceptance tests do the following:  

1. Rename `tests/acceptance.suite.yml.example` to `tests/acceptance.suite.yml` to enable suite configuration

2. Replace `codeception/base` package in `composer.json` with `codeception/codeception` to install full featured
   version of Codeception

3. Update dependencies with Composer 

    ```
    composer update  
    ```

4. Download [Selenium Server](http://www.seleniumhq.org/download/) and launch it:

    ```
    java -jar ~/selenium-server-standalone-x.xx.x.jar
    ```

    In case of using Selenium Server 3.0 with Firefox browser since v48 or Google Chrome since v53 you must download [GeckoDriver](https://github.com/mozilla/geckodriver/releases) or [ChromeDriver](https://sites.google.com/a/chromium.org/chromedriver/downloads) and launch Selenium with it:

    ```
    # for Firefox
    java -jar -Dwebdriver.gecko.driver=~/geckodriver ~/selenium-server-standalone-3.xx.x.jar
    
    # for Google Chrome
    java -jar -Dwebdriver.chrome.driver=~/chromedriver ~/selenium-server-standalone-3.xx.x.jar
    ``` 
    
    As an alternative way you can use already configured Docker container with older versions of Selenium and Firefox:
    
    ```
    docker run --net=host selenium/standalone-firefox:2.53.0
    ```

5. (Optional) Create `yii2basic_test` database and update it by applying migrations if you have them.

   ```
   tests/bin/yii migrate
   ```

   The database configuration can be found at `config/test_db.php`.


6. Start web server:

    ```
    tests/bin/yii serve
    ```

7. Now you can run all available tests

   ```
   # run all available tests
   vendor/bin/codecept run

   # run acceptance tests
   vendor/bin/codecept run acceptance

   # run only unit and functional tests
   vendor/bin/codecept run unit,functional
   ```

### Code coverage support

By default, code coverage is disabled in `codeception.yml` configuration file, you should uncomment needed rows to be able
to collect code coverage. You can run your tests and collect coverage with the following command:

```
#collect coverage for all tests
vendor/bin/codecept run --coverage --coverage-html --coverage-xml

#collect coverage only for unit tests
vendor/bin/codecept run unit --coverage --coverage-html --coverage-xml

#collect coverage for unit and functional tests
vendor/bin/codecept run functional,unit --coverage --coverage-html --coverage-xml
```

You can see code coverage output under the `tests/_output` directory.
