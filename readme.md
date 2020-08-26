**Installation Ubuntu 18.04**


	`apt update 
	add-apt-repository -y ppa:ondrej/php 
	apt-get install libapache2-mod-php php-common php-xml php-zip php-mysql unzip php-intl php-curl php-mbstring wget php-redis apache2 composer`
    
**Configuration**

go to `var/www/html & clone this repository`

give permission  `chmod -R 777 /var/www/html/ci_redis/`

install [Predis](https://github.com/predis/predis)

 go to `/application/libraries/codeigniter_predis/
	 go composer install`

configure redis connection :

 go to `/application/config/codeigniter_predis.php 
	change this line`

    'default_server' => 'localhost',        
            'servers' => [
                'localhost' => [
                    'scheme' => 'tcp',                   //tcp, tls
                    'host' => 'localhost'                // ip , domain
                    'port' => 25061, 
                    'password' => 'passsword',           //defult NULL
                    'database' => 0,                     //dbname
                ],
go this [codeigniter-predis](https://github.com/Maykonn/codeigniter-predis) for more information.
create virtualhost `/etc/apache2/sites-available/redis.conf`, seems like this :

	    <VirtualHost *:80>
				 ServerAdmin admin@yourdomain.com
				 DocumentRoot /var/www/html/ci_redis
				 ServerName yourdomain.com/ipaddress
			 <Directory /var/www/html/ci_redis/>
					Options +FollowSymLinks
					AllowOverride All
					Order allow,deny
					allow from all	
			 </Directory>
			 ErrorLog /var/log/apache2/codeigniter-error_log
			 CustomLog /var/log/apache2/codeigniter-access_log common
		</VirtualHost>
enable site

`  a2ensite redis.conf
or 
 a2ensite /etc/apache2/sites-available/redis.conf `

enable rewrite `a2enmod rewrite`
restart service `use whatever control u like`

**Edit your codeigniter apps**
