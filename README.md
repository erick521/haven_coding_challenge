# haven_coding_challenge
#
# Address book using Laravel Framework and MySQL DB
# By Erick Cortes
#
# Laravel install instructions
# 
# Assumptions:
#    a. A host machine is already set up with httpd, php with correct versions for Laravel 5.6.
#    b. A mysql server is already installed with credentials and a blank database
#
# Instructions:
#
# 1. Perform a composer installed to download latest vendor libs
php composer.phar install

# 2. Update storage and bootstrap cache directories to be writeable by server
sudo chmod -R a+w storage/ bootstrap/cache

# 3. Set up MySql DB on localhost or RDBMS and obtain credentials.
#
# 4. Copy .env.example to .env 
#    Edit the .env file and update the following parameters with your DB configuration:
#    DB_HOST=
#    DB_PORT=
#    DB_DATABASE=
#    DB_USERNAME=
#    DB_PASSWORD=
#
#    Add the following parameter (and actual value) for your Google Maps API Key
#    GOOGLE_MAPS_API_KEY=
#
# 5. Save the .env file.
# 6. Generate a new app encryption key
php artisan key:generate

# 7. Run Laravel database migrations
php artisan migrate

# 8. Optional depending on httpd setup: Update /etc/httpd/conf/httpd.d DocumentRoot parameter
#    to point to laravel installation public folder and update AllowOverride from 'None' to 'All'
#    for Document Access and restart httpd
