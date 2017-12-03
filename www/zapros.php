       <?php
  function zapr($string){	   
		$mysqli= new mysqli("localhost", "root", "", "polz");
		$mysqli->query ("SET NAMES 'utf8'");
		
		$result=$mysqli->query($string);
return $result;		
		$mysqli->close;
		
  
  }
    $mysqli= new mysqli("localhost", "root", "", "polz");
		$mysqli->query ("SET NAMES 'utf8'");
		?>