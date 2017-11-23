<html>
    <head>
<title>Message</title>
</head>
<body>
 
	<p>Диалог </p>
	
	session_start();
<form action="send_mess.php" method="post" enctype="multipart/form-data">
	Адресат: <br />
	<?
	session_start();
	echo $_SESSION["To"];
	?>
	
	
	Текст сообщения: <br /><textarea name="message"></textarea><br />
	<input type="submit"  value="Отправить" />
</form>
		
	
</body>
</html>


<?php


	

 
 ?>