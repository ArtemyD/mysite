<?     include 'config.php' ;
      session_start();
	function update_likes($Id, $Id1)
	{   
		$reyt = rand(40,50);
		
		$mysqli= new mysqli("localhost", "root", "", "polz");
		$mysqli->query ("SET NAMES 'utf8'");
		
		$result=$mysqli->query("SELECT * FROM users WHERE Id=$Id");
		$user1=$result->fetch_assoc();
		//print_r($user1);
		$stats=$user1["stats"];
		
		$result1=$mysqli->query("SELECT * FROM users WHERE Id=$Id1");
		$user2=$result1->fetch_assoc();
		//print_r($user2);
		$stats1=$user2["stats"];
		
		$user1["likes"]=$user1["likes"]+1;
		$mysqli->query("UPDATE `users` SET `likes` = $user1[likes] WHERE `users`.`Id`=$Id");
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
		if(isset($_POST["f1"]))
		{    $u_id=$_SESSION["Id"];
	         $to_id=$_POST["f1"];
	        $mysqli= new mysqli("localhost", "root", "", "polz");
		    $mysqli->query ("SET NAMES 'utf8'");
					
			$fav=$mysqli->query("SELECT * FROM favor WHERE IdTo=$u_id AND IdFrom=$to_id");
			
			$mysqli->query("INSERT INTO `favor` (`IdTo`, `IdFrom`) VALUES ('$u_id', '$to_id')");
		}
		
	if(isset($_POST["f2"]))
		{    $u_id=$_SESSION["Id"];
	         $to_id=$_POST["f2"];
	         $mysqli= new mysqli("localhost", "root", "", "polz");
		    $mysqli->query ("SET NAMES 'utf8'");
					
			$fav=$mysqli->query("SELECT * FROM favor WHERE IdTo=$u_id AND IdFrom=$to_id");
			
			$mysqli->query("INSERT INTO `favor` (`IdTo`, `IdFrom`) VALUES ('$u_id', '$to_id')");
		}
		
	if(isset($_POST["select1"])===false&&isset($_POST["select2"])===false)
	{    
		
		 $mysqli= new mysqli("localhost", "root", "", "polz");
		$mysqli->query ("SET NAMES 'utf8'");
		 
			$co=$mysqli->query("SELECT COUNT(*) FROM users");
		$total=$co->fetch_array();
			//echo $total[0];

	do{
				$rand=rand(1,$total[0]);
				$rand1=rand(1,$total[0]);
	      }
		while($rand==$rand1);
		 
		 
		$result=$mysqli->query("SELECT * FROM users WHERE id=$rand");
		$user1=$result->fetch_assoc();
		
		$photo1=$user1["Photos"];
		
		$result2=$mysqli->query("SELECT * FROM users WHERE id=$rand1");
		$user2=$result2->fetch_assoc();
		
		$photo2=$user2["Photos"];
		
		$mysqli->close();
		
		$_SESSION["select1"]=$user1["Id"];
		$_SESSION["select2"]=$user2["Id"];
		
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
		
		//echo $_SESSION["likes"];
	
	if(isset($_POST["select1"]))
		{
			$array = json_decode($_COOKIE['user1'], true);
			update_likes($_SESSION["select1"], $_SESSION["select2"]);
			if($_SESSION["bool"]===1)
			{     $likes=$_SESSION["likes"];
		          $_SESSION["likes"]=$likes+1;
		         if($_SESSION["likes"]===5){
					 $_SESSION["likes"]=0;
		         $mysqli= new mysqli("localhost", "root", "", "polz");
		    $mysqli->query ("SET NAMES 'utf8'");
			$u_id=$_SESSION["Id"];
			$result2=$mysqli->query("SELECT * FROM users WHERE id=$u_id");
			$user1=$result2->fetch_assoc();
			$cr=$user1["credits"]+1;
			$mysqli->query("UPDATE `users` SET `credits` = $cr WHERE `users`.`Id`=$u_id");
			}
			$mysqli= new mysqli("localhost", "root", "", "polz");
		    $mysqli->query ("SET NAMES 'utf8'");
			$from_id = $_POST["select1"];
			$result3=$mysqli->query("SELECT * FROM users WHERE id=$from_id");
			$user2=$result3->fetch_assoc();
			$cr1=$user2["credits"]+5;
			$mysqli->query("UPDATE `users` SET `credits` = $cr1 WHERE `users`.`Id`=$from_id");
		    
			}
			header('Location:/');
		}
	if(isset($_POST["select2"]))
	{
		$array = json_decode($_COOKIE['user2'], true); 
			update_likes($_SESSION["select2"], $_SESSION["select1"]);
if($_SESSION["bool"]===1)
			{     $likes=$_SESSION["likes"];
		          $_SESSION["likes"]=$likes+1;
		         if($_SESSION["likes"]===5){
					 $_SESSION["likes"]=0;
		         $mysqli= new mysqli("localhost", "root", "", "polz");
		    $mysqli->query ("SET NAMES 'utf8'");
			$u_id=$_SESSION["Id"];
			$result2=$mysqli->query("SELECT * FROM users WHERE id=$u_id");
			$user1=$result2->fetch_assoc();
			$cr=$user1["credits"]+1;
			$mysqli->query("UPDATE `users` SET `credits` = $cr WHERE `users`.`Id`=$u_id");
			}
			    $mysqli= new mysqli("localhost", "root", "", "polz");
		    $mysqli->query ("SET NAMES 'utf8'");
		     	$from_id = $_SESSION["select2"];
			$result3=$mysqli->query("SELECT * FROM users WHERE id=$from_id");
			$user2=$result3->fetch_assoc();
			$cr1=$user2["credits"]+5;
			$mysqli->query("UPDATE `users` SET `credits` = $cr1 WHERE `users`.`Id`=$from_id");
			}
			header('Location:/');
	}
	if(isset($_POST["select3"]))
	{
			header('Location:stats.php');
	}

	if(isset($_POST["mymessages"]))
	{
			header('Location:print_mes.php');
	}

	if($_SESSION["bool"]===1){
	require_once "price_chat.php";
	$price1= price_chat($_SESSION["Id"], $user1["Id"]);
	$price2= price_chat($_SESSION["Id"], $user2["Id"]);
	$key_mess1=" "; $key_mess2=" ";
	//if($price1 > $_SESSION["credits"])
		//$key_mess1="disabled";
	
	//if($price2 > $_SESSION["credits"])
		//$key_mess2="disabled";
	}
	
	if($_SESSION["bool"]===1)
			{ 
	$mysqli= new mysqli("localhost", "root", "", "polz");
		$mysqli->query ("SET NAMES 'utf8'");
	      $gId = $_SESSION["Id"];
		$autuser1=$mysqli->query("SELECT * FROM users WHERE Id=$gId");
		$autuser=$autuser1->fetch_assoc();
		$_SESSION["credits"]=$autuser["credits"];
			}
	$mysqli->close;
	
	
?>

<html>
	<meta charset="utf-8">
   <head>
<title>SFUmash</title>
<link rel="stylesheet" type="text/css" href="style1.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<nav class="navbar navbar-expand-lg navbar-dark"style="background-color: #2d7f96; height:50px" >
    <!-- Image and text -->
        <a class="navbar-brand" href="index.php"onClick="index.php">
            <img src="logotext.png" style="margin-bottom:0px;" width="289px" height="46px" class="d-inline-block align-top" alt="">
        </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    	<li class="nav-item active">
        	<a class="nav-link" href="stats.php"onClick="stats.php">Рейтинг</a>
      	</li>
      	<li class="nav-item active">
     		<a class="nav-link" href="print_mes.php"onClick="print_mes.php">Сообщения</a>
     	 </li>
      	<li class="nav-item active">
       	 	<a class="nav-link" href="izbr.php"onClick="izbr.php">Избранное</a>
     	</li>
	</ul>

    <form class="form-inline my-2 my-lg-0">
    	<div class="form-group">
          <input type="text" readonly class="form-control-plaintext" id="credits" value="Кредиты: <?echo $_SESSION["credits"];?>$" style="color:white">
        </div>
 	</form>
    
	<div id="vk" class "log_in-out"> 
		<a href="https://oauth.vk.com/authorize?client_id=<?=ID?>&display=page&redirect_uri=<?=URL?>&response_type=code" target="_blank">
		<img src="vk.png" height="50" width="60"/></a>
	</div>

	<div id="log_out" class="nav justify-content-end">
		<form  class="nav-item" name="exit" action="" method="post">
			<button class="btn btn-light" type="submit" style = "background-color: #2d7f96; color:white;" name="exit" value="Выход">Выход</button>
	 	</form>
	</div>
    
  </div>
</nav>

<body>
    
	
	<div>
		<form name="Select" action="" method="post">
			<!--<a  href="izbr.php"><input type="button" class="btn btn-info my-4 my-sm-0" value="Избранное" id="fav"name=buttonmess onClick="izbr.php"></a>-->
			<div id="block1">   
			 	<button id="photo1" type="submit" name="select1" value="<?=$user1["Id"];?>"> 
			 		<img  src="<?=$user1["Photo"];?>" width="265" height="265"; alt="<?=$user1["Id"];?>"/> 
				</button> 
			
				<p id="info1"><? echo $user1[firstname]; ?></p>
			
				<button class="btn btn-info btn-lg btn-block" name="message1" type="submit" value="<?=$user1["Id"];?>" <?=$key_mess1;?>> Сообщение <?echo $price1?>$</button>
			
				<button class="btn btn-info btn-lg btn-block" name="f1" type="submit" value="<?=$user1["Id"];?>" > добавить в избранное </button>
		 	
			</div> 
		 
			<div id="or"> <img src="or.png" height="50" width="60" /> </div>
		  
		 	<div id="block2"> 
			 	<button id="photo2" type="submit" name="select2" value="<?=$user2["Id"];?>">
			 		<img  src="<?=$user2["Photo"];?>"width="265" height="265"; alt="<?=$user2["Id"];?>"/>
				</button> 

			 	<p id="info2"><?=$user2[firstname];?></p> 
			  	<button class="btn btn-info btn-lg btn-block" name="message2" type="submit" value="<?=$user2["Id"];?>" <?=$key_mess2;?>> Сообщение  <?echo $price2?>$</button>
			 
			  	<button class="btn btn-info btn-lg btn-block" name="f2" type="submit" value="<?=$user2["Id"];?>" > добавить в избранное </button>
		  	
			</div>
		  		  
		</form>
 
	</div>
	
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>