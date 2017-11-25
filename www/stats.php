
 <html>
    <head>
<title>SFUmash</title>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
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
		
	  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
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