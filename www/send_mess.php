<?
<<<<<<< HEAD
	session_start();
	/**
	 * ��������� �������� ������. ������� ��������� �� html �����
	 * � �������� id ���������� � ���� integer
	 */
	$message= htmlspecialchars($_POST['message']);
	$message=base64_encode($message);
	$to=(int)$_SESSION["To"];
=======
session_start();
/**
 * ��������� �������� ������. ������� ��������� �� html �����
 * � �������� id ���������� � ���� integer
 */
$message= htmlspecialchars($_POST['message']);
$to=(int)$_SESSION["To"];

  $from=$_SESSION["Id"];
 require "zapros.php";
 
$result= zapr("INSERT INTO `messages` (`data`, `u_from`, `u_to`, `message`, `flag`) VALUES (CURRENT_TIMESTAMP, '$from', '$to', '$message', '0');");
echo $result;
//header('location: /');

>>>>>>> parent of e970249... Я в деле

	  $from=$_SESSION["Id"];
	  
	  
	 require "price_chat.php";
	$price = price_chat($from, $to);
	  
	require "buy_chat.php";
	if(buy_chat($from, $price)==1)
	{
		require "zapros.php";
			 
		//echo $to;echo"<br/>";
		//echo $from;echo"<br/>";
		//echo $message;echo"<br/>"; 
			 
		$result= zapr("INSERT INTO `messages` (`data`, `u_from`, `u_to`, `message`, `flag`) VALUES (CURRENT_TIMESTAMP, '$from', '$to', '$message', '0');");
		header('location: /');
	}
	
	echo "Error! Not enough credits:(";
	
?>