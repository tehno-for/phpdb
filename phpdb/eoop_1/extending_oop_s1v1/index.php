<?php
include 'inc/config.php';

$filter = ['status'=>'active'];
if (isset($_GET['status'])) {
    $filter['status'] = filter_input(
        INPUT_GET, 
        'status', 
        FILTER_SANITIZE_STRING
    );
}
$directory->selectListings($filter);

$test = new ListingPremium();
$test->setDescription('My description!!!');
var_dump($test)."<br><br>";
var_dump(get_class($test));
var_dump(is_a($test, 'ListingBasic'));


$title = "PHP Conferences";
require 'inc/header.php';

foreach ($directory->listings as $listing) {
    include 'views/list_item.php';
}

require 'inc/footer.php';