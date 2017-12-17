       <?php
  function zapr($string){	   
		$mysqli= new mysqli("localhost", "u30867_pasha", "11223344Ar", "u30867_polz");
		$mysqli->query ("SET NAMES 'utf8'");
		
		$result=$mysqli->query($string);
		$mysqli->close;
return $result;		
		
		
  
  }