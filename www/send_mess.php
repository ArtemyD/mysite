<?
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
header('location: /');


?>