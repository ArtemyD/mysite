<?   
	function update_likes($Id, $count_likes)
	{
		$mysqli= new mysqli("localhost", "root", "", "polz");
		$mysqli->query ("SET NAMES 'utf8'");
		$mysqli->query("UPDATE `users` SET `likes` = $count_likes WHERE `users`.`Id`=$Id");
		
		$mysqli->close();
	}
	
	if(isset($_POST["select1"])===false&&isset($_POST["select2"])===false)
	{    do{
				$rand=rand(1,13);
				$rand1=rand(1,13);
	      }
		while($rand==$rand1);
		 $mysqli= new mysqli("localhost", "root", "", "polz");
		$mysqli->query ("SET NAMES 'utf8'");
		 
		$result=$mysqli->query("SELECT * FROM users WHERE id=$rand");
		$user1=$result->fetch_assoc();
		
		$photo1=$user1["Photos"];
		
		$result2=$mysqli->query("SELECT * FROM users WHERE id=$rand1");
		$user2=$result2->fetch_assoc();
		
		$photo2=$user2["Photos"];
		
		$mysqli->close();
		
		$json1 = json_encode($user1);
		$json2 = json_encode($user2);
		
		setcookie("user1", $json1, time()+20);
		setcookie("user2", $json2, time()+20);
		
		
	}
	
	
	if(isset($_POST["select1"]))
		{
			$array = json_decode($_COOKIE['user1'], true); 
			update_likes($array["Id"],$array[likes]+1);
			header('Location:/');
		}
	if(isset($_POST["select2"]))
	{
		$array = json_decode($_COOKIE['user2'], true); 
			update_likes($array["Id"],$array[likes]+1);
			header('Location:/');
	}
	if(isset($_POST["select3"]))
	{
			header('Location:stats.php');
	}
?>

<html>
    <head>
<title>SFUmash</title>
<link rel="stylesheet" type="text/css" href="style1.css" />
</head>
<body>
     <header>
	 <form name="Select1" action="" method="post"> <button type="submit" name="select3" value="Выбрать2"><img  src="<?="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWFguZrfpxs_KeGb-LJYBrxzFhQImSQzaVFbCjUy4Qw1rW89oaFQ";?>"width="50" height="30";/></button> </form> 
	 <img id="logo" src="logo.png"/>
	  <img id="logoN" src="name.png" />
	 </header>
	
	 <div>
	<form name="Select" action="" method="post">
		
		 <button id="photo1" type="submit" name="select1" value="Выбрать1"> <img  src="<?=$user1["Photo"];?>" width="280" height="350"; alt="<?=$user1["Id"];?>"/> </button> 
		 <button id="photo2" type="submit" name="select2" value="Выбрать2"><img  src="<?=$user2["Photo"];?>"width="280" height="350"; alt="<?=$user2["Id"];?>"/></button>  
	     
	</form>
	
	   <div id="user1text"> <? echo $user1[firstname]." ".$user1[lastname]." ".$user1[likes] ?> </div>      <div id="user2text"> <?=$user2[firstname]." ".$user2[lastname]." ".$user2[likes];?> </div>
		
	   <div id="text1"> <p><h1>Кто самый горячий? </h1></p></div>
	</div>
</body>
</html>