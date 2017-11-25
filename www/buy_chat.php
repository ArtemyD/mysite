<?
	function buy_chat($Id, $Id1)
	{
		require "zapros.php";
		
		$result=$mysqli->query("SELECT * FROM users WHERE Id=$Id");
		$user1=$result->fetch_assoc();
		
		$result1=$mysqli->query("SELECT * FROM users WHERE Id=$Id1");
		$user2=$result1->fetch_assoc();
		
		
		
		
		
		
	}




?>