<?php
function get_full_catalog(){
    include("connect.php");
    try {
        $results = $db->query("SELECT title, category, img FROM Media");
        // echo "Result is ok!";
      } catch(Exception $e) {
        echo "Query is not taked!";
        exit;
      }      
      $catalog = $results->fetchAll(PDO::FETCH_ASSOC);
      return $catalog;
}

function single_catalog_array(){
    include("connect.php");
    try {
        $results = $db->query(
            "SELECT title, category, img, format, year, genre, publisher, isbn  
            FROM Media
            JOIN Genres ON Media.genre_id = Genres.genre_id
            LEFT OUTER JOIN Books ON Media.media_id = Books.media_id" 
            
        );

      } catch(Exception $e) {
        echo "Query is not taked!";
        exit;
      }      
      $catalog = $results->fetch();
      return $catalog;
}
var_dump(single_catalog_array());

function get_item_html($id,$item) {
    $output = "<li><a href='details.php?id="
        . $id . "'><img src='" 
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