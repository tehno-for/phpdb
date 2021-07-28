<?php
function findUniq($a) {
  // Do Magic :)
  foreach($a as $k=>$v){
    $un2 = 0;
    if($k==0){
      $un = $v;
      echo $k;
    } elseif($un == $v && $un2 == 0) {
      echo $k;
      continue;
    } elseif($un!==$v) {
      $un2 = $v;
      echo $k."+"."<p>".$un2."<p><br>";
    } elseif($un2 == $v){
      echo $k."-";
      return $un;
    } else {
      return $un2;
    }
  }
}

echo (findUniq([ 1, 1, 1, 2, 1, 1 ]))."<br>";
//echo (findUniq([ 0, 0, 0.55, 0, 0 ]))."<br>";
echo "Hello";

 ?>
