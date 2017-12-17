
<?    
     $sms = $_POST['Mess'];
	session_start();
	$u_id=$_SESSION["Id"];
	 require "zapros.php";
	
	$result= zapr("SELECT * FROM `messages` WHERE `u_from` ='$u_id'");
	
	for($i=0;$i<20;$i++){
	if(isset($_POST["$i"])){
		$result1= zapr("SELECT * FROM `messages` WHERE `u_to` ='$i' AND `u_from` ='$u_id'");
	 while (($row1=$result1->fetch_assoc())!=false)
		echo $row1["data"]." ". base64_decode($row1["message"])."<br>";
	    
	}
	}
?>
 <html>
    <head>
<title>SFUmash</title>
<!-- Required meta tags -->
    <meta charset="utf-8">
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
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<body>
 
	<p>Сообщения </p>
	
	<form action="" method="post">
    <?while (($row=$result->fetch_assoc())!=false)
	{   $photo12=$row["u_to"];
        if($row["u_to"]==$info){}
        else{
		$photo= zapr("SELECT * FROM `users` WHERE `Id` =$photo12");	
		 $ph=$photo->fetch_assoc();
			 
		print('<button name='.$row["u_to"].' value="'.$row["u_to"].'"> <img  src='.$ph["Photo"].' width="50" height="50";/> </button>' );
		    }
		$info=$row["u_to"];
		
	}
	?>
</form>
		
	  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>