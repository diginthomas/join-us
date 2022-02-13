<?php 
$ar= array(1,2,3,4,5,6,7);
$rotate=3;
echo "<br> Input Array";
print_r($ar);
$length=sizeof($ar);
for($i=0;$i<$rotate;$i++){
	$ar[$length]=$ar[$i];
	$length++;
}
$ar=array_reverse($ar);
for($i=0;$i<$rotate;$i++){
   array_pop($ar);
}
$ar=array_reverse($ar);
echo "<br><br>The Rotated Array <br> ";
print_r($ar);

?>