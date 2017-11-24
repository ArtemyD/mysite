<?     include 'config.php' ;
      session_start();
	function update_likes($Id, $count_likes,$stats,$stats1,$Id1)
	{   $reyt = rand(40,50);
		$mysqli= new mysqli("localhost", "root", "", "polz");
		$mysqli->query ("SET NAMES 'utf8'");
		$mysqli->query("UPDATE `users` SET `likes` = $count_likes WHERE `users`.`Id`=$Id");
		if($stats>$stats1)
		{
	    $write1= ($stats+$reyt-10);
		$write2=($stats1 - $reyt+10);
		$mysqli->query("UPDATE `users` SET `stats` = $write1 WHERE `users`.`Id`=$Id");
		$mysqli->query("UPDATE `users` SET `stats` = $write2  WHERE `users`.`Id`=$Id1");
		}
        if($stats<$stats1)
		{    $write1= ($stats+$reyt+10);
		     $write2=($stats1 - $reyt -10);
        $mysqli->query("UPDATE `users` SET `stats` = $write1 WHERE `users`.`Id`=$Id");
		$mysqli->query("UPDATE `users` SET `stats` = $write2 WHERE `users`.`Id`=$Id1");			
		}
		 if($stats==$stats1)
		{    $write1= ($stats+$reyt);
		     $write2=($stats1 - $reyt);
        $mysqli->query("UPDATE `users` SET `stats` = $write1 WHERE `users`.`Id`=$Id");
		$mysqli->query("UPDATE `users` SET `stats` = $write2 WHERE `users`.`Id`=$Id1");			
		}
		
		$mysqli->close();
	}
	
	
	
	
	if(isset($_POST["message1"]))
		{
		$_SESSION["To"]=$_POST["message1"];
		header("location: message.php");
		}
		
	if(isset($_POST["message2"]))
		{
			$_SESSION["To"]=$_POST["message2"];
			header("location: message.php");
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
	
	

	if(isset($_POST["exit"]))
		{
			session_destroy();
			header('location: /');
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
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
     <header>
	 <form name="Select1" action="" method="post"> <button type="submit" name="select3" value="Выбрать2"><img  src="<?="tri.png";?>"width="40" height="27";/></button> </form> 
	  
	  
	  
	  
	  <form name="exit" action="" method="post">
			<button type="submit" name="exit" value="Выход">Выход</button>
	  </form>
	
	
	  <div id="logtext"> <img id="logo" src="logotext.png" /> </div>
	  <div id="vk"> <a href="https://oauth.vk.com/authorize?client_id=<?=ID?>&display=page&redirect_uri=<?=URL?>&response_type=code" target="_blank"><img src="vk.png" height="50" width="60"/>  </a></div>
	 </header>
	
	 <div>
	<form name="Select" action="" method="post">
		
		 <div id="block1">   <button id="photo1" type="submit" name="select1" value="Выбрать1"> <img  src="<?=$user1["Photo"];?>" width="265" height="265"; alt="<?=$user1["Id"];?>"/> </button> 
		 <p id="info1"><? echo $user1[firstname];echo $_SESSION["name"];echo $_SESSION["Id"];?></p> </div> 
		  <div id="or"> <img src="or.png" height="50" width="60" /> </div>
		 <div id="block2"> <button id="photo2" type="submit" name="select2" value="Выбрать2"><img  src="<?=$user2["Photo"];?>"width="265" height="265"; alt="<?=$user2["Id"];?>"/></button>      
	      <p id="info2"><?=$user2[firstname];?></p> </div>
		  
		  
	</form>
	
	
	<form name="mes" action="" method="post">
		
		<button name="message1" type="submit" value="<?=$user1["Id"];?>" > Сообщение1 </button>
		<button name="message2" type="submit" value="<?=$user2["Id"];?>" > Сообщение2 </button>
	</form>
	<a href="print_mes.php"><input type="button" value="Мои сообщения" name=buttonmess onClick="print_mes.php"></a>

	  
	  
	</div>
	
	
	
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>