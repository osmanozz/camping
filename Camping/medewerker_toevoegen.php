<?php
include_once "database.php";
    $db = new database();
   
    if(isset($_POST['submit'])) {

            $medid = $_POST['id'];
            $username = $_POST['username'];
            $password = $_POST['password'];
        

            $sql = "INSERT INTO medewerker (username, password) VALUES (:username, :password);";

            $placeholders = [
                'username'=>$username,
                'password'=>$password,
            ];
            $db->add($sql,$placeholders, "admin_page.php");
    }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
input[type=text, password], select {
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


<form action="medewerker_toevoegen.php" method="POST">
<input type="hidden" name="id">
    
		<label>Username</label>
		<input id="username" type="text" name="username">
		<label>Password</label>
		<input type="password" name="password">
		<button type="submit" name="submit">Toevoegen</button>
	
	

</form>
</head>
</html>