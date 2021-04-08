<?php
include "database.php";
$db = new database();

if (isset($_GET['id'])) {

    $resid = $_GET['id'];
    $sql = "DELETE FROM ingeschereven WHERE resNo=:id";
    $placeholder = [
        'id'=> $resid
    ];
    $db->delete($sql, $placeholder, "admin_page.php");
}



?>