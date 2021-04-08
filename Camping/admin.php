
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="styleReserveringen.css" rel="stylesheet" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">Camping Village</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.html" accesskey="1" title="">Homepage</a></li>
				<li><a href="reserveringen.php" accesskey="2" title="">Reserveren</a></li>
				<li><a href="activiteiten.html" accesskey="3" title="">Activitetien</a></li>
				<li class="current_page_item"><a href="#" accesskey="4" title="">Admin</a></li>
			</ul>
		</div>
	</div>
	<div id="header-featured">
		<div id="banner-wrapper">

	</div>
</div>
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">	
			
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>

	<?php

	
	?>

      <form  method="post">
      
        <h1>Inloggen admin</h1>
        
        <fieldset>
          <label for="name">Gebruikersnaam:</label>
          <input type="text" id="name" name="username">
          
          <label for="password">Wachtwoord:</label>
          <input type="password" id="mail" name="password">
        
        <button type="submit" name="submit">Verzenden</button>
      </form>

	  <?php

	  ini_set('display_errors', 1);
	  ini_set('display_startup_errors', 1);
	  error_reporting(E_ALL);

session_start();  
$host = "localhost";  
$username = "root";  
$password = "";  
$database = "campingdb";  
$message = "";  

$log_file = "./log.txt"; 
$date = $time = date('m/d/y h:iA');
$ip = $_SERVER['REMOTE_ADDR'];
$log_message= " ";
// logging error message to given log file 
error_log($log_message, 3, $log_file); 

try  
{  
	 $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
	 $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
	 if(isset($_POST["submit"]))  
	 {  
			   $query = "SELECT * FROM medewerker WHERE username = :username AND password = :password";  
			   $statement = $connect->prepare($query);  
			   $statement->execute(  
					array(  
						 'username'     =>     $_POST["username"],  
						 'password'     =>     $_POST["password"]  
					)  
			   );  
			   $count = $statement->rowCount();  
			   if($count > 0)  
			   {  
				   $message = "Logged in";
				   $log_message = "De gebruiker heeft geprobeerd in " . $date . " om in te loggen met ip adres van " . $ip . " en met correct username van " . $_POST["username"]. " De login is successfull! " . "\n" ;
				   error_log($log_message, 3, $log_file); 
					header("location:admin_page.php");  
			   }  
			   else  
			   {  
				$log_message = "De gebruiker heeft geprobeerd in " . $date . " om in te loggen met ip adres van " . $ip . " met incorrect username van " . $_POST["username"] . " De log in is unsuccesfull ". "\n" ; 
				error_log($log_message, 3, $log_file); 
					echo '<label>Wrong Data</label>';  

			   }  
		  }  
	 }  
 
catch(PDOException $error)  
{  
	 $message = $error->getMessage();  
}  

	  ?>
	
</body>
</html>

<?php
