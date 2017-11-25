
<?  session_start();

	function buy_chat($Id, $Id1)
	{    
		 $mysqli= new mysqli("localhost", "root", "", "polz");
		$mysqli->query ("SET NAMES 'utf8'");
		
		if($Id==$Id1)
			return 0;
		
		$result=$mysqli->query("SELECT * FROM users WHERE Id=$Id");
		$user1=$result->fetch_assoc();
		
		$result1=$mysqli->query("SELECT * FROM users WHERE Id=$Id1");
		$user2=$result1->fetch_assoc();
		$mysqli->close();
		
		$diff=abs($user1["stats"]-$user2["stats"]);
		if($user1["stats"]==$user2["stats"])
		{
			$price_chat=10;
		}
		else
		if($user1["stats"]>$user2["stats"])
		{
			if($diff<100)
			{
				$price_chat=10;
				
			}
			else if($diff<150)
			{
				$price_chat=11;
				
			}
			else if($diff<250)
			{
				$price_chat=12;
				
			}
			else if($diff<280)
			{
				$price_chat=13;
				
			}
			else if($diff<340)
			{
				$price_chat=14;
				
			}
			else if($diff<380)
			{
				$price_chat=15;
				
			}
			else if($diff<440)
			{
				$price_chat=16;
				
			}
			else if($diff<490)
			{
				$price_chat=17;
				
			}
			else if($diff<510)
			{
				$price_chat=18;
				
			}
			else if($diff<520)
			{
				$price_chat=19;
				
			}
			else 
				$price_chat=20;
			
		}
		else
		if($user1["stats"]<$user2["stats"])
		{
			if($diff<100)
			{
				$price_chat=10;
				
			}
			else if($diff<200)
			{
				$price_chat=9;
				
			}
			else if($diff<250)
			{
				$price_chat=8;
				
			}
			else if($diff<300)
			{
				$price_chat=7;
				
			}
			else if($diff<340)
			{
				$price_chat=6;
				
			}
			else if($diff<380)
			{
				$price_chat=5;
				
			}
			else if($diff<440)
			{
				$price_chat=4;
				
			}
			else if($diff<490)
			{
				$price_chat=17;
				
			}
			else if($diff<530)
			{
				$price_chat=2;
				
			}
			else if($diff<540)
			{
				$price_chat=1;
				
			}
			else 
				$price_chat=0;
			
		}
		
		return $price_chat;
		
	}

/* if($user1["credits"]>$price_chat)
		{
			$user1["credits"]=$user1["credits"]-$price_chat;
			$result=$mysqli->query("UPDATE `users` SET `credits` = $user1[credits] WHERE `users`.`Id`=$Id");
			return 1;
		}
		else 
			return 0; */
?>

