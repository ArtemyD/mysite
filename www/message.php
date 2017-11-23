<html>
    <head>
<title>Message</title>
</head>
<body>
 
	<p>Диалог </p>
	
<form action="send_mess.php" method="post" enctype="multipart/form-data">
	Адресат: <br />
	<?
	session_start();
	echo $_SESSION["To"];
	
	echo $message1['value']; 
		echo $message1; 
	?>
	
	
	Текст сообщения: <br /><textarea name="message"></textarea><br />
	<input type="submit"  value="Отправить" />
</form>
		
	
</body>
</html>


<?php


	

 
 ?>