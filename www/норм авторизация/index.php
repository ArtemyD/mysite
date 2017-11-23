<?php
require_once('config.php');
if(empty($_SESSION['token']))
{ echo 
" <a href='https://oauth.vk.com/authorize?client_id=".$appid."&display=page&redirect_uri=".$redirect_uri."&scope=".$scope."&response_type=code&v=5.68'>Автризация.</a>
";

}
else {
	 echo
	 "авторизировались<br> Токен: ".$_SESSION['token']."<br>
	 ID: ".$_SESSION['first_name']."<br>
	 name: ".$_SESSION['photo_50']."<br>
	                                   
	  <a href ='logout.php'>Выход</a>";
	  }
?>