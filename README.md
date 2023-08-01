#Red_it (a fake social media app)

![image](https://github.com/IslamEssam01/Red_it/assets/135740521/96344a08-a9d8-4ffc-8c06-e86d72674c02)

A Simple social media app that has all the basic functionalities 
Like Adding/showing/Deleting post, comments, and likes

## Technologies Used

- HTML5: Used for structuring the website's content.
- CSS3: Used for styling and layout.
- Laravel/PHP : Used for the backend.


## Getting started

### Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x/installation)


Clone the repository

    git clone git@github.com:IslamEssam01/Red_it.git

Switch to the repo folder

    cd Red_it

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env
    
Generate a new application key

    php artisan key:generate
    
Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve



## Design
Design heavily influenced by: Amir Morad

Amir's portoflio : [behance](https://www.behance.net/AmirMoradMohammad) , [mostaql](https://mostaql.com/u/Amir69/portfolio)
