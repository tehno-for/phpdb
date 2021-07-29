<?php
function likes( $names ) {

    // Your code here...
//     likes [] -- must be "no one likes this"
// likes ["Peter"] -- must be "Peter likes this"
// likes ["Jacob", "Alex"] -- must be "Jacob and Alex like this"
// likes ["Max", "John", "Mark"] -- must be "Max, John and Mark like this"
// likes ["Alex", "Jacob", "Mark", "Max"] -- must be "Alex, Jacob and 2 others like this"

  if(sizeof($names)==0){
    return "no one likes this";
  } elseif(sizeof($names)==1) {
    return "{$names[0]} likes this";
  } elseif(sizeof($names)==2){
    return "{$names[0]} and {$names[1]} likes this";
  } elseif(sizeof($names)==3){
    return "{$names[0]}, {$names[1]} and {$names[2]} likes this";
  } else {
    return "{$names[0]}, {$names[1]} and ".(count($names)-2)." others like this";
  }
}

echo(likes(["Frenk", "JoSh","Lem","Salem"]));

?>
