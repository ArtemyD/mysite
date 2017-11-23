
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
		
	
</body>
</html>