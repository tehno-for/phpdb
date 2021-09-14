<?php
function get_full_catalog(){
    include("connect.php");
    try {
        $results = $db->query("SELECT media_id, title, category, img FROM Media");
        // echo "Result is ok!";
      } catch(Exception $e) {
        echo "Query is not taked!";
        exit;
      }      
      $catalog = $results->fetchAll(PDO::FETCH_ASSOC);
      return $catalog;
}

function single_catalog_array($id){
    include("connect.php");
    try {
        $results = $db->prepare(
            "SELECT title, category, img, format, year, genre, publisher, isbn  
            FROM Media
            JOIN Genres ON Media.genre_id = Genres.genre_id
            LEFT OUTER JOIN Books ON Media.media_id = Books.media_id
            WHERE Media.media_id = ?"
        );
        $results->bindParam(1, $id, PDO::PARAM_INT);
        $results->execute();

      } catch(Exception $e) {
        echo "Query is not taked!";
        exit;
      }      
      
      $item = $results->fetch();
      if(empty($item)) return $item;
      try {
        $results = $db->prepare(
            "SELECT fullname, role  
            FROM Media_People
            JOIN People ON Media_People.people_id = Genres.genre_id
            LEFT OUTER JOIN Books ON Media.media_id = Books.media_id
            WHERE Media_People.people_id = ?"
        );
        $results->bindParam(1, $id, PDO::PARAM_INT);
        $results->execute();

      } catch(Exception $e) {
        echo "Query is not taked!";
        exit;
      }   
      while($row = $results->fetch(PDO::FETCH_ASSOC)){
        $item[$row["role"]][] = $item["fullname"];
      }
      return $item;
}


function get_item_html($id,$item) {
    $output = "<li><a href='details.php?id="
        . $item["media_id"] . "'><img src='" 
        . $item["img"] . "' alt='" 
        . $item["title"] . "' />" 
        . "<p>View Details</p>"
        . "</a></li>";
    return $output;
}

function array_category($catalog,$category) {
    $output = array();
    
    foreach ($catalog as $id => $item) {
        if ($category == null OR strtolower($category) == strtolower($item["category"])) {
            $sort = $item["title"];
            $sort = ltrim($sort,"The ");
            $sort = ltrim($sort,"A ");
            $sort = ltrim($sort,"An ");
            $output[$id] = $sort;            
        }
    }
    
    asort($output);
    return array_keys($output);
}