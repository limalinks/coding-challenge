# Weather Server

This application provides a back end api that communicates with the [DarkSky API]() service in order to serve localised weather information.

It is built using Laravel Lumen.

In order to run it locally:

`composer install`

Copy and then rename `.env.example` to a new `.env` file. Add a Dark Sky API KEY to the `.env` file.

Then run `php -S localhost:8090 -t ./public` from the root of the project.