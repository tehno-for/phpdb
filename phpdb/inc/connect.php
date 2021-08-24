<?php

//echo "Hello world!!!<br>";
try {
  $db = new PDO("mysql:host=localhost;dbname=database1;port=3306","admin","Tehno@q123Db");
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (Exception $e){
  echo "Some issue: ".$e->getMessage();
  exit;
}



?>
