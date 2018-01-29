<html>
<?php
$out = "*";
$baseString = "                    ";
$col = 0;
$curX = 0;
$curY = 0;
$endX = 20;
$endY = 20;
$board = array("","","","","","","","","","","","","","","","","","","","");

while(curX != 20 && curY != 20){
  if(rand(0,1)) //0 for up, 1 for right
  {
    $board[$curY]=$out;
    $curY++;
    //$out = $out."*";
    
  }
  else //right
  {
    $out = $out . "*";
  }
  echo strlen($out);
  echo "<br>";
  var_dump($board);
}
?>
</html>