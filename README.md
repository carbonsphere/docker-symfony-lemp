# Docker Symfony LEMP Compose

  Recently I’ve been looking for Symfony in docker. However, I have the worst luck, most of them have some sorts of error on default setting. Not may of them work with symfony 3.0. So, I decided to build my own base on the official PHP & Nginx containers.

## Overall Goal

  Split Nginx/PHP/MYSQL/Symfony into individual containers for better management. By splitting them up also caused a lot of problems.

ex: MySql not available when php container started. I use wait-for-it.sh to solve this problem, You can check it out at https://github.com/vishnubob/wait-for-it

ex: Symfony user cache permissions.

## PHP FPM 5.6 Version
  My development environment uses php 5.6. In the future I’ll test php7. It should be consist with your own development environment’s php version. You can use latest php, additional composer update will have to be run on your data container.
https://hub.docker.com/_/php/

## Data
  This is where your symfony project will reside. This volume will contain your project. All DB parameters are obtained from container’s environment variable. Additional params.php is added in “./app/config/“ to accomplish this.  “Params.php” have default value, besure to change these if environment variables are not set within docker-compose.yml.

## Mysql
  CentOS based mysql server. You can get more info at https://github.com/carbonsphere/dock-mysql.git

## Nginx Version
  I picked latest stable version of nginx for this project. https://hub.docker.com/_/nginx/

## Run Instruction

 1. Download docker-symfony-lemp

```
git clone https://github.com/carbonsphere/docker-symfony-lemp
```

 2. Copy your Symfony project to data/symfony
```
cp -r {yourProject}/* ./data/symfony/.
```

 3. Edit docker-compose.yml  if you wish to change MySql server password or you can leave it default.
    - “MYSQL_PASS” & “CARBON_MYSQL_DB_PASSWORD” must be the same
    - user must be “carbon". For more info at 'https://github.com/carbonsphere/dock-mysql'

 4. Add symfony.dev to /etc/hosts
    - ex:     127.0.0.1        symfony.dev

 5. Run 
```
docker-compose up -d
```
  - It will build data container on the first run. If you have updated your symfony project, you must rebuild data container by running “docker-compose build"
  - After it finishes, you can check your brower by navigating to http://symfony.dev

## Container startup step by step
  The following just gives you a little info on what each container will do before starting.

### PHP
  - Wait for MySql container port 3306 to be ready
  - Wait another 20 seconds for MySql container to start accepting connection.
  - Start php-fpm

### Data
  - This container will open 2 volumes. (/var/www)  & (/var/log) available for other containers.
  - Symfony project is copy under /var/www/html
  - This container is mainly for persisting data. It will not run like other containers.

### Nginx
  - Wait for PHP server port 9000 to be ready

### MySql
  - Create container with a default password set in dock-compose.yml
