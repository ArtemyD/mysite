<?

if (!$_GET['code']) {
	exit('error code');
}

include 'config.php';
session_start();
$token = json_decode(file_get_contents('https://oauth.vk.com/access_token?client_id='.ID.'&redirect_uri='.URL.'&client_secret='.SECRET.'&code='.$_GET['code']), true);
 $_SESSION['token']=$token;
if (!$token) {
	exit('error token');
}

$data = json_decode(file_get_contents('https://api.vk.com/method/users.get?user_id='.$token['user_id'].'&access_token='.$token['access_token'].'&fields=uid,first_name,last_name,photo_200'), true);

if (!$data) {
	exit('error data');
}

 $mysqli= new mysqli("localhost", "root", "", "polz");
		$mysqli->query ("SET NAMES 'utf8'");

$data = $data['response'][0];
$name=$data["first_name"];
$lastname=$data["last_name"];
$photo=$data["photo_200"];
$idvk1=$data["uid"];


$_SESSION["bool"]=1;
$_SESSION['name']=$name;
$_SESSION["bool"]=1;
$_SESSION['lastname']=$lastname;
//token complete

//echo $_SESSION["bool"];

$result=0;
$result=$mysqli->query("SELECT * FROM users WHERE idvk=$idvk1");
$user1=$result->fetch_assoc();
print_r($result);
if($user1["Id"]==0)
{
	$mysqli->query("INSERT INTO `users` (`Id`, `firstname`, `lastname`, `likes`, `credits`, `Photo`, `institute`, `course`, `idvk`) VALUES (NULL, '$name','$lastname', '0', '0', '$photo', 'dd', '1', '$idvk1')");
	$result=$mysqli->query("SELECT * FROM users WHERE idvk=$idvk1");
		$user1=$result->fetch_assoc();
		$_SESSION["Id"]=$user1["Id"];
		$_SESSION["credits"]=$user1["credits"];

}
else 
{
	$mysqli->query("UPDATE `users` SET `Photo` = $photo WHERE `users`.`idvk`=$idvk1");
	
	$_SESSION["Id"]=$user1["Id"];
	$_SESSION["credits"]=$user1["credits"];
}

$mysqli->close;
//echo '<pre>';
//echo $data["first_name"];
header('location: /');
//echo '</pre>';
?>