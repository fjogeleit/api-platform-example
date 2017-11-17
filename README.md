# Example Symfony Application used API Platform

This example application using Symfony Flex with Symfony 3.3 and a file based SQLite DB to store any persisted Data.

## Requirements

* PHP 7.1
* PHP71-SQLite Extension
* Composer

## Installation

Copy the ``.env.dist`` file in your app root dir and rename it to ``.env``
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
* Implement Authorization with JWT
* Implement custom Action
* Override default CRUD Actions (implement softdelete)

## Authorization

Use the ``users/login`` action in Swagger UI to call authorized API calls.

Test-User:
- username: user@api-example.de password: phpdd_ug2017
- username: admin@api-example.de password: phpdd_ug2017

Authrorize with the generated Token and the Bearer-Prefix.
Example:
``Bearer E1MTA5MzU0MDAsImV4cCI6MTUxMTAyMTgwMH0.ndbQig_-Tmou_zGRTcF1ERnr__XwDkVqoUm14QjmfxBAVuu-uPoSSjSia5gjbJMH5ouBBnLu91LMgc4A95TARACgt3sxpbfSQlj_FXmFLQgxh3o8LT...``