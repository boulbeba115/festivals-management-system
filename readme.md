## Description
this is a festivale manegment system made with laravel,mysql 
the project composed by 2 part :
- dashborad where you can add and manage many festivale
- a front end for reservation and showing festival details
## features
- manage festivals with all it's releavent data 
- manage users
- manage reservations
- payment verification (no api related only cc validation)
## installation
1- create an new database with the name 'pfa' or create a database with the name you.  
wanted then change the DB_DATABASE in the .env (make needed change to you database connection parameters).  
2- import the file called pfa.sql in mysql database ( or run php artisan migrate for an empty database).  
3- run 'php artisan cache:clear' to clear the cache.  
3- run 'php composer install' to install need packages.  
4- run 'php artisan storage:link' to create storage link to public folder (this cmd is required to make images load).  
5- run 'php artisan serve' to run the project .  
## Develloper  
Boulbeba Bouaziz 2018
