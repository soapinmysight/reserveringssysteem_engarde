<?php
//database connectie maken
//id ophalen
// een sql query maken om een data uit de database kan verwijderen
// na het voldaan van taak terug naar reservations.php

/** @var $db */
require_once 'includes/connection.php';

$id = mysqli_escape_string($db,$_GET['id']);

$query = "DELETE FROM reservations WHERE id = '$id'";
$result = mysqli_query($db, $query);

header('location: admin_reservations_table.php');
exit();

?>