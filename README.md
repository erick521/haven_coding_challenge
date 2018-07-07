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
sudo chmod -R a+x storage/ bootstrap/cache

# 3. Assuming Mysql DB is set up with empty database, update .env file with credentials
# 4. Run Laravel migrations
php artisan migrate

# 5. Update /etc/httpd/conf/httpd.d DocumentRoot parameter to point to laravel installation public folder 
#    and update AllowOverride from 'None' to 'All' for Document Access
