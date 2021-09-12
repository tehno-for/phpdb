<?php

//echo "Hello world!!!<br>";
try {
  $db = new PDO("mysql:host=localhost;dbname=database;port=3306","admin","Tehno@q123Db");
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (Exception $e){
  echo "Some issue: ".$e->getMessage();
  exit;
}

<<<<<<< HEAD
try {
  $results = $db->query("SELECT title, category, img FROM Media");
  // echo "Result is ok!";
} catch(Exception $e) {
  echo "Query is not taked!";
  exit;
}
$catalog = $results->fetchAll(PDO::FETCH_ASSOC);
=======

>>>>>>> 0d220daa40d9e2f64d523a05f18febbbdc03c6f1

?>
