# Twitch Client App

Lightweight Search Engine for finding stream on Twitch.tv.

> *Twitch is a live streaming video platform owned by Twitch Interactive, a subsidiary of Amazon. Introduced in June 2011
as a spin-off of the general-interest streaming platform, Justin.tv, the site primarily focuses on video game live
streaming, including broadcasts of eSports competitions, in addition to creative content, "in real life" streams, and 
more recently, music broadcasts. Content on the site can either be viewed live or via video on demand.<br><br>*
**Source: [Wikipedia](https://en.wikipedia.org/wiki/Twitch.tv)**


## Installation

This is an application built with Laravel 5.6, so you might want to [check the documentation for further information.](https://laravel.com/docs/5.6/installation)

After you have cloned this repository, use npm and composer to install the dependencies.

    composer install
    npm install


## Setting up the environment

In the repository's root, you'll find a file named .env.example. Change its name to just .env.

In this file you will find 3 environment variables that you must fill to set up your Twitch API credentials:

    TWITCH_KEY=
    TWITCH_SECRET=
    TWITCH_REDIRECT_URI=

 

## Unit and Feature Testing

To run the tests, type the following command on your terminal:

    ./vendor/bin/phpunit
    
If this doesn't work, you can try this:

    phpunit
    