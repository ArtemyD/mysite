
<?    
    
	session_start();
	$u_id=$_SESSION["Id"];
	 require "zapros.php";
	
	$result= zapr("SELECT * FROM `favor` WHERE `IdTo` ='$u_id'");
	
	for($i=0;$i<20;$i++){
	if(isset($_POST["$i"])){
		$result1= zapr("SELECT * FROM `favor` WHERE `IdFrom` ='$i' AND `IdTo` ='$u_id'");
	 while (($row1=$result1->fetch_assoc())!=false)
		echo $row1[""]." ".$row1["message"]."<br>";
	    
	}
	}
?>
 <html>
    <head>
<title>SFUmash</title>
</head>
<body>
 
	<p>Сообщения </p>
	
	<form action="" method="post">
    <?while (($row=$result->fetch_assoc())!=false)
	{   $photo12=$row["IdFrom"];
        
		$photo= zapr("SELECT * FROM `users` WHERE `Id` =$photo12");	
		 $ph=$photo->fetch_assoc();
			 
		print('<button name='.$row["IdFrom"].' value="'.$row["IdFrom"].'"> <img  src='.$ph["Photo"].' width="50" height="50";/> </button>' );
		    
		
		
	}
	?>
</form>
		
	
</body>
</html>