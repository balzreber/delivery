Delivery
============

Delivery Module

<<<<<<< HEAD
Requires Laravel 5

Installation:
-------------

1. Load  "illuminate/html": "~5.0"
You have to add "illuminate/html": "~5.0" to your main composer.json file to load html/form/validation support.

2. Load Package
Add "balzreber/delivery": "dev-master" to your main composer.json file.

2. Update Composer
Run "composer update" to install illuminate/html and the package itself and all theire dependencies.

3. Add Required Service Provider and Aliases
Add 'Illuminate\Html\HtmlServiceProvider', to the providers array in config/app.php
Add 'Form' => 'Illuminate\Html\FormFacade', and 'Html' => 'Illuminate\Html\HtmlFacade', to the aliases array in config/app.php

4. Database Migrations:
Run "php artisan migrate --path=path/to/migrations" to migrate the db changes.

5. Add Package Service Provider
Add "Balzreber\Delivery\DeliveryServiceProvider" to the provider array in /config/app.php.

6. Extends layout
All views extend the 'layout' template as theire container.
=======

Requires Laravel 5

Installation:

Add "Balzreber\Delivery\DeliveryServiceProvider" to the /config/app.php providers array.

Migrations:
php artisan migrate --path=path/to/migrations
>>>>>>> dbbe69b23e36ad9af0b17aa912353cab19a3f995
