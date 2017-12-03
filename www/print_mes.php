
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
		echo $row1["data"]." ".$row1["message"]."<br>";
	    
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