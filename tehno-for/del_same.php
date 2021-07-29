<?php
function arrayDiff(array $a,array $b):array
 {
  // your code here
  if(sizeof($a)==0){
    return $a;
  } elseif(sizeof($b)==0){
    return $a;
  } else {
    $a_length = count($a);
    $b_length = count($b);
    for($i = 0; $i < $b_length; $i++){
      for($j = 0; $j < $a_length; $j++){
        if($b[$i] == $a[$j]){
          unset($a[$j]);
        }
      }
    }

    return array_values($a);
  }
}
var_dump(arrayDiff([], [2,4]));

?>
