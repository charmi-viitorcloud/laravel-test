<h1>laravel-assignment</h1>

# Introduction

It is a laravel 9 demo .

Required :

    PHP ^8.0

# Installation

Clone the repository

    git clone git@github.com:charmi-viitorcloud/laravel-test.git

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env   

Generate a new application key

    php artisan key:generate    

Run the database migration

    php artisan migrate


Start the local development server

    php artisan serve

# Database seeding
   
Open the DatabaseSeeder and set the property values as per your requirement

    database/seeders/DatabaseSeeder.php

Run the database seeder and you're done

    php artisan db:seed  

# Project setup

    git clone git@github.com:charmi-viitorcloud/laravel-test.git
    composer install
    cp .env.example .env   
    php artisan key:generate    
    php artisan serve
    php artisan db:seed  
