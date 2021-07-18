<?php

echo "Hello world!!!<br>";
try{
  $db = new PDO("sqlite:".__DIR__."/database.db");
  var_dump($db);
} catch (Exception $e){
  echo "Some issue with :".__DIR__."/database.db";
  echo $e->getMessage();
  exit;
}




echo "Hello world!!!<br>";

?>
