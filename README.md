# Example Symfony Application used API Platform

This Example use an file based SQLite DB to store any persisted Data.

## Installation

Init the SQLite DB`
``
php bin/console doctrine:schema:create
``

Start the Application:

``
php -S 127.0.0.1:8000 -t public
``