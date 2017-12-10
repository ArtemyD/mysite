
 <html>
    <head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>SFUmash</title>

<nav class="navbar navbar-expand-lg navbar-dark"style="background-color: #2d7f96; height:50px" >
    <!-- Image and text -->
        <a class="navbar-brand" href="#">
            <img src="logotext.png" style="margin-bottom:0px;" width="289px" height="46px" class="d-inline-block align-top" alt="">
        </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"onClick="index.php">Home<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
 

	<h4 class="text-left">Рейтинг </h4>
	
	<form action="" method="post">
    <select class="custom-select" name="fruits">
        <option selected>Выберите институт</option>
        <option value="sfu">СФУ</option>
        <option value="IKIT">ИКИТ</option>
        <option value="YurFak">ЮрФак</option>
    </select>
   
    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="course">
        <option selected>Курс</option>
        <option value="1">1 курс</option>
        <option value="2">2 курс</option>
        <option value="3">3 курс</option>
        <option value="4">4 курс</option>
		<option value="5">5 курс</option>
		<option value="all">Все курсы</option>
    </select>

	<input type="submit" name="send" value="Вывести рейтинг" class="btn btn-info" />
</form>
		
	  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
<?php
   require "zapros.php";
$country = $_POST['fruits'];
$country1 = $_POST['course'];


$result= zapr("SELECT * FROM `users` ORDER BY `users`.`stats` DESC");
if($country=="sfu")
{ if($country1=="all")
	$result= zapr("SELECT * FROM `users` ORDER BY `users`.`stats` DESC");
  else $result= zapr("SELECT * FROM `users` WHERE `course`='$country1'  ORDER BY `users`.`stats` DESC");
}
else
{  if($country1=="all")
	  $result= zapr("SELECT * FROM `users` WHERE `institute` = '$country' ORDER BY `users`.`stats` DESC");
  else
    $result= zapr("SELECT * FROM `users` WHERE `institute` = '$country' and `course`='$country1' ORDER BY `users`.`stats` DESC ");
}

while (($row=$result->fetch_assoc())!=false)
	{
		echo $row["firstname"]." ".$row["lastname"]." ".$row["stats"]."<br>";
	}

 
  ?>