<?
	session_start();

	function buy_chat($Id, $price)
	{
		if($Id===NULL||$price===NULL)
			return 0;
		if($price == 0)
			return 1;
		
		$mysqli= new mysqli("localhost", "root", "", "polz");
		$mysqli->query ("SET NAMES 'utf8'");
		
		$result=$mysqli->query("SELECT * FROM users WHERE Id=$Id");
		$user=$result->fetch_assoc();
	
		if($user["credits"]>=$price)
		{
			$credits=$user["credits"]-$price;
			$mysqli->query("UPDATE `users` SET `credits` = $credits WHERE `users`.`Id`=$Id");
			$mysqli->close();
			return 1;
		}
		
		$mysqli->close();
		return 0;
	}
?>