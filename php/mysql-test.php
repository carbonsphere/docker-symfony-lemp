<?php
# Environment variables should be consisten within docker-compose.yml

$dbname = $_ENV["CARBON_APP_NAME"];
$dbuser = $_ENV["CARBON_MYSQL_DB_USERNAME"];
$dbpass = $_ENV["CARBON_MYSQL_DB_PASSWORD"];
$dbhost = $_ENV["CARBON_MYSQL_DB_HOST"];
$dbport = $_ENV["CARBON_MYSQL_DB_PORT"];
$connect = false;
$count = 0;
$limit = 60;

if(strtolower($dbport) == 'null') {
  $dbport = 3306;
}

while(!$connect) {
  echo "Connecting $dbhost : $dbport / $dbuser - $dbpass";
  $connect = mysqli_connect($dbhost . ":" . $dbport, $dbuser, $dbpass);
  if($connect) {
      echo "Connection success.";
      break;
  } else {
      if($count >= $limit) {
        echo "Limit reached.";
        break;
      }
      echo "Error, retrying connection.";
      $count++;
      sleep(1);
  }

}

?>
