# haven_coding_challenge
#
# By Erick Cortes
# Address book using Laravel Framework and MySQL DB
#
#
#
# Laravel install instructions
#
# 1. Perform a composer update to download latest vendor libs
php composer.phar update

# 2. Update storage and bootstrap cache directories to be writeable by server
sudo chmod -R a+w storage/ bootstrap/cache

# 3. Set up MySql DB on localhost or RDBMS and obtain credentials.
# 4. copy .env.example to .env and update DB creds with actuals.
#    Update the following parameters to your DB configuration:
#    DB_HOST=
#    DB_PORT=
#    DB_DATABASE=
#    DB_USERNAME=
#    DB_PASSWORD=
#
#    Add the following parameter (and value) for your Google Maps API Key
#    GOOGLE_MAPS_API_KEY=
#
# 5. Save the .env file.
# 6. Generate a new app encryption key
php artisan key:generate

# 7. Run Laravel migrations
php artisan migrate

# 8. Update /etc/httpd/conf/httpd.d DocumentRoot parameter to point to laravel installation public folder 
#    and update AllowOverride from 'None' to 'All' for Document Access and restart httpd
