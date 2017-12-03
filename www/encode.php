<?
	function encode($String, $Password)
	{
		$Salt='BGuxLWQtKweKEMV4'; 
		$StrLen = strlen($String);
		$Seq = $Password;
		$Gamma = '';
		while (strlen($Gamma)<$StrLen)
		{
			$Seq = pack("H*",sha1($Seq.$Salt)); //в PHP5 эту строку можно заменить на $Seq = sha1($Seq.$Salt, true);
			$Gamma.=substr($Seq,0,8);
		}
		
		return $String^$Gamma;
	} 

/*echo $code=encode("Hello trfyghu poiuyh 3456 !@#$% ?>,привет как дела?:","1");
echo "</br>";
echo encode($code,"1");
echo "</br>"; */

?>