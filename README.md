# Example Symfony Application used API Platform

This Example use an file based SQLite DB to store any persisted Data.

## Requirements

* PHP 7.1
* PHP71-SQLite Extension

## Installation

Install dependencies

``
composer install
``

Init the SQLite DB

``
php bin/console doctrine:schema:create
``

Load Example Fixtures
``
php bin/console doctrine:fixtures:load
``

Start the Application:

``
php -S 127.0.0.1:8000 -t public
``