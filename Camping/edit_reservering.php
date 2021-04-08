<?php
    include_once "database.php";
    $db = new database();
   
  
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $resid = $_POST['resid'];
            $klantnaam = $_POST['klantnaam'];
            $email = $_POST['email'];
            $telno = $_POST['telno'];
            $actnaam = $_POST['actnaam'];

            $sql = "UPDATE ingeschereven SET klantnaam=:klantnaam, email=:email, telno=:telno,actnaam=:actnaam
             WHERE resNo=:resid";

            $placeholders = [
                'resid' => $resid,
                'klantnaam' => $klantnaam,
                'email' => $email,
                'telno' => $telno,
                'actnaam' => $actnaam
            ];
            $db->edit($sql,$placeholders, "admin_page.php");

        }
    
        ?>

        
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

        <form action="edit_reservering.php" method="POST">
                <!-- doorgaan met setten van value met ternary operator -->
        <input type="hidden" name="resid" value="<?php echo $_GET['id'] ?>">
        <input type="text" name="klantnaam" placeholder="klantNaam">
        <input type="text" name="email" placeholder='email'>
        <input type="text" name="telno" placeholder='telno'>
        <input type="text" name="actnaam" placeholder='actNaam'>
        <input type="submit" name="submit" value="Wijzig">
    </form>