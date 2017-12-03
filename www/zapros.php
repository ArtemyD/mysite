       <?php
  function zapr($string){	   
		$mysqli= new mysqli("localhost", "root", "", "polz");
		$mysqli->query ("SET NAMES 'utf8'");
		
		$result=$mysqli->query($string);
		$mysqli->close;
return $result;		
		
		
  
  }
    $mysqli= new mysqli("localhost", "root", "", "polz");
		$mysqli->query ("SET NAMES 'utf8'");
		?>