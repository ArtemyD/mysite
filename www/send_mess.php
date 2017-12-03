<?
	session_start();
	
	$to=(int)$_SESSION["To"];
	$from=$_SESSION["Id"];
	
	$message= htmlspecialchars($_POST['message']);
	//require "encode.php";
	//$message = encode($message, $from);
	$message=base64_encode($message);
	  
	  
	 require "price_chat.php";
	$price = price_chat($from, $to);
	  
	require "buy_chat.php";
	if(buy_chat($from, $price)==1)
	{
		$mysqli= new mysqli("localhost", "root", "", "polz");
		$mysqli->query ("SET NAMES 'utf8'");
			 
		echo $to;echo"<br/>";
		echo $from;echo"<br/>";
		echo $message;echo"<br/>"; 
			 
		$result= $mysqli->query("INSERT INTO `messages` (`data`, `u_from`, `u_to`, `message`, `flag`) VALUES (CURRENT_TIMESTAMP, '$from', '$to', '$message', '0');");
		$mysqli->close;
		//header('location: /');
	}
	else
		echo "Ошибка! Необходимо авторизоватся, либо недостаточно кредитов:(";
	
?>