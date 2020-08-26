###################
Installation Ubuntu 18.04
###################

apt update 
add-apt-repository -y ppa:ondrej/php //repository php

apt-get install libapache2-mod-php php-common php-xml php-zip php-mysql unzip php-intl php-curl php-mbstring wget php-redis apache2 composer


*******************
Configuration
*******************

 go to var/www/html & clone this repository

 chmod -R 777 /var/www/html/ci_redis/  //give permission

 install predis: 
	 go to /application/libraries/codeigniter_predis/
	 go composer install 
	
 configure redis connection :
	 go to /application/config/codeigniter_predis.php 
	change this line
	<code> 
		 'default_server' => 'localhost',
            'servers' => [
                'localhost' => [
                    'scheme' => 'tcp', // tcp/tls
                    'host' => 'localhost' // ip / domain
                    'port' => 25061, 
                    'password' => 'passsword', //defult NULL
                    'database' => 0, //dbname
                ],
	</code>
	go to this [repository](https://github.com/Maykonn/codeigniter-predis), for more guide
- create virtualhost <em>nano /etc/apache2/sites-available/redis.conf</em>
	<code> 
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
	</code>
- enable site <em> a2ensite redis.conf // /etc/apache2/sites-available/redis.conf </em>
- enable rewrite <em> a2enmod rewrite </em>
- restart service <em> use whatere control u like  </em>
