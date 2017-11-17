# Example Symfony Application used API Platform

This example application using Symfony Flex with Symfony 3.3 and a file based SQLite DB to store any persisted Data.

## Requirements

* PHP 7.1
* PHP71-SQLite Extension
* Composer

## Installation

Copy the ``.env.dist`` file in your app root dir and rename it to ``.env`
`
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

## Examples

All configurations are in YAML format. Located in config/mappings

* Declare ApiResources
* Declare SubResources
* Using the Symfony Validation Component
* Using different normalization_context groups for item and collection operations (Single GET and List GET)
* Using denormalization_context to exclude fields for post requests
* Using normalization_context to include relation fields in GET requests
* Define additional Filters
* Add Custom Extension
* Change pagination-configuration for single entities