
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

<style>
.acts {
  list-style-type: circle;
  font-size: 20px;
  font-family:Times;
}
.user_name, .user_email, .telno, .activiteit {
  font-size: 15px;
}

</style>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">Camping Village</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.html" accesskey="1" title="">Homepage</a></li>
				<li class="current_page_item"><a href="#" accesskey="2" title="">Reserveren</a></li>
				<li><a href="activiteiten.html" accesskey="3" title="">Faciliteiten</a></li>
				<li><a href="admin.php" accesskey="4" title="">Admin</a></li>
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

      <form  method="POST" action="reserveringen.php">
      
        <h1>Reserveringsformulier</h1>
        
        
          <legend><span class="number">1</span>Informatie over u zelf</legend>
          <label for="name">Naam:</label>
          <input type="text" id="name" name="user_name">
          
          <label for="mail">Email:</label>
          <input type="email" id="mail" name="user_email">
        
          <label for="telno">telno:</label>
          <input type="text" id="mail" name="telno">
          
          <label for="act">Kies en activiteit:</label>
          <input type="text" id="mail" name="activiteit">
          <div class="activiteiten">
             <ul class="acts">
              <li>Mountainbiken</li>
              <li>Knutselen</li>
              <li>Jeu de Boele wedstrijd</li>
              <li>Water Aerobics</li>
              </ul> 
          </div>

        <button type="submit" name="submit">Verzenden</button>
      </form>
      </body>
</html>

  <?php
  
  include_once "database.php";
  $db = new database();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST["user_name"];
    $email = $_POST["user_email"];
    $telno = $_POST["telno"];
    $actNaam = $_POST["activiteit"];

    $sql = "INSERT INTO ingeschereven (klantNaam, email, telno, actNaam) 
            VALUES (:user_name, :user_email, :telno, :activiteit)";
   $placeholders = [
    'user_name'=> $name,
    'user_email'=> $email, 
    'telno'=>$telno,
    'activiteit'=>$actNaam ];
  
    $db->select($sql, $placeholders);

    if(isset($name,$email,$telno,$actNaam)) {
      echo "<script type='text/javascript'>alert('U HEBT AANGEMELD');</script>";
    } else {
      echo "All fields required";
    }
   

  }

  ?>


