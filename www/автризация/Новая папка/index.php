<?php
require_once('config');
if(empty($_SESSION['token']))
{ echo 
"
        <a href=' https://oauth.vk.com/authorize?client_id=".$appid."1&display=page&redirect_uri=".$redirect_uri."&scope=".$scope."&response_type=code&v=5.68'>Автризация.</a>
";

}
else {
	 echo"
	 авторизировались
	 <br>
	 Токен: "$_SESSION['token']."<br>
	 <a href ='logout.php'>Выход</a>
	 ""
	 

?>