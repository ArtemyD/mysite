
 <html>
    <head>
<title>SFUmash</title>
</head>
<body>
 
	<p>Рейтинг </p>
	
	<form action="" method="post">
    <select name="fruits">
        <option value="sfu">СФУ</option>
        <option value="IKIT">ИКИТ</option>
        <option value="YurFak">ЮрФак</option>
    </select>
	<select name="course">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="all">все курсы</option>
    </select>
    <input type="submit" name="send" value="Отправить" />
</form>
		
	
</body>
</html>
<?php
   require "zapros.php";
$country = $_POST['fruits'];
$country1 = $_POST['course'];


$result= zapr("SELECT * FROM `users` ORDER BY `users`.`likes` DESC");
if($country=="sfu")
{ if($country1=="all")
	$result= zapr("SELECT * FROM `users` ORDER BY `users`.`likes` DESC");
  else $result= zapr("SELECT * FROM `users` WHERE `course`='$country1'  ORDER BY `users`.`likes` DESC");
}
else
{  if($country1=="all")
	  $result= zapr("SELECT * FROM `users` WHERE `institute` = '$country' ORDER BY `users`.`likes` DESC");
  else
    $result= zapr("SELECT * FROM `users` WHERE `institute` = '$country' and `course`='$country1' ORDER BY `users`.`likes` DESC ");
}

while (($row=$result->fetch_assoc())!=false)
	{
		echo $row["firstname"]." ".$row["lastname"]." ".$row["likes"]."<br>";
	}


	

 
  ?>