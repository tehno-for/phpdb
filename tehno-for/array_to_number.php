<?php

function createPhoneNumber($numbersArray) {
  // your code here
  // createPhoneNumber([1,2,3,4,5,6,7,8,9,0]); // => returns "(123) 456-7890"
  $word;
  foreach($numbersArray as $k=>$v){
    switch($k){
      case 0:   $word = "(".$v;     break;
      case 2:   $word .= $v.") ";   break;
      case 5:   $word .= $v."-";    break;
      default:  $word .= $v;        break;
    }

    }
  return $word;
}
echo (createPhoneNumber([1,2,3,4,5,6,7,8,9,0])); // => returns "(123) 456-7890"
?>
