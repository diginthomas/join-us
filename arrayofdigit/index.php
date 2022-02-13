
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arry of number</title>
</head>
<body>
  <center>
  <form action="" method="post">
    <input type="number" name="number" required>
    <input type="submit" name="submit"></form>
    </body>
</html>

<?php 
if(isset($_POST['submit'])){
$array =toArray($_POST['number']);
echo"<br><b>Output of  ".$_POST['number']."  is:"; 
print_r($array);
}

function toArray($num){
  $num=(String)$_POST['number'];
  $i=0;
while($i<strlen($num)){
$array[$i]=$num[$i];
  $i++;
}
return $array;
}

?>