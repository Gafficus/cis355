<html>
<?php
$out = "";
$charToUse = "*";
$col = 0;
$curX = 0;
$curY = 0;
$endX = 20;
$endY = 20;
for($curY = 0; $curY<$endY; $curY++){
  if(rand(0,1)) //0 for down, 1 for right
  {
    $curX++;
    $out = $out."*";
  }
  else //down
  {
    //$out = $out.$charToUse;
    $out . "<br>";
  }
  echo $out;
}
?>
</html>