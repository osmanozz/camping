<?php
include_once "database.php";
    $db = new database();
   
    if(isset($_POST['submit'])) {

            $resid = $_POST['id'];
            $klantnaam = $_POST['klantnaam'];
            $email = $_POST['email'];
            $telno = $_POST['telno'];
            $actnaam = $_POST['actnaam'];

            $sql = "INSERT INTO ingeschereven (klantNaam, email, telno, actNaam) VALUES (:klantnaam, :email, :telno, :actnaam);";

            $placeholders = [
                'klantnaam'=>$klantnaam,
                'email'=>$email,
                'telno'=>$telno,
                'actnaam'=>$actnaam
            ];
            $db->add($sql,$placeholders, "admin_page.php");
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

          <style>
              input[type=text], select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
              }

              input[type=submit] {
                width: 100%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
              }

              input[type=submit]:hover {
                background-color: #45a049;
              }
          </style>


<form action="reservering_toevoegen.php" method="POST">
<input type="hidden" name="id">
    
		<label>klantnaam</label>
		<input id="fname" type="text" name="klantnaam">
	
		<label>email</label>
		<input type="text" name="email">
	
 
		<label>telno</label>
		<input type="text" name="telno">
	
    
		<label>actNaam</label>
		<input type="text" name="actnaam">

		<button type="submit" name="submit">Toevoegen</button>
	
	

</form>
</head>
</html>