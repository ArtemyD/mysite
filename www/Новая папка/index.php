<?php 

do {
$id=rand(2,9);
$id1=rand(2,9);
}
while ($id==$id1);

$mysqli= new mysqli("localhost", "root", "", "polz");
setcookie("usersss",$mysqli,10);
$mysqli->query ("SET NAMES 'utf8'"); 
$result=$mysqli->query("SELECT * FROM users WHERE id=$id");

$result1=$mysqli->query("SELECT * FROM users WHERE id=$id1");
$row=$result->fetch_assoc();
$row1=$result1->fetch_assoc();
echo $row[name]." ".$row[family]." ".$row['kol-vo']." ";
echo $row1[name]." ".$row1[family]." ".$row1['kol-vo'];
$like=$row['kol-vo'];
$like1=$row1['kol-vo'];

if(isset($_POST["select1"])){ $mysqli=$_COOKIE["usersss"];
$like++;
$mysqli->query("UPDATE `users` SET `kol-vo` = 0 WHERE `users`.`id` = $id"); }
if(isset($_POST["select2"])){ $like1++;
$mysqli->query("UPDATE `users` SET `kol-vo` =$like1 WHERE `users`.`id` = $id1"); }
  

$mysqli->close();
?>


<html>
    <head>
        <meta charset="utf8_general_ci" />
<title>SFUmash</title>
</head>
<body>
 <p>Who a hot? </p>
 <form name="Select" action="" method="post">
  <input type="submit" name="select1" value="it`s hot" />
  <input type="submit" name="select2" value="it`s hot" />
 </form>
  
 
</body>
</html>
