<?php
  $container->setParameter('database_host', getEnv("CARBON_MYSQL_DB_HOST")?getEnv("CARBON_MYSQL_DB_HOST"):"");
  $container->setParameter('database_port', getEnv("CARBON_MYSQL_DB_PORT")?getEnv("CARBON_MYSQL_DB_PORT"):'');
  $container->setParameter('database_name', getEnv("CARBON_APP_NAME")?getEnv("CARBON_APP_NAME"):"");
  $container->setParameter('database_user', getEnv("CARBON_MYSQL_DB_USERNAME")?getEnv("CARBON_MYSQL_DB_USERNAME"):"");
  $container->setParameter('database_password', getEnv("CARBON_MYSQL_DB_PASSWORD")?getEnv("CARBON_MYSQL_DB_PASSWORD"):"");
?>
