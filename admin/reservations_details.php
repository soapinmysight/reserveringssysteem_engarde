<?php
//Require database in this file
/** @var $db */
require_once "includes/database.php";

//If the ID isn't given, redirect to the homepage
if (!isset($_GET['id']) || $_GET['id'] === '') {
    header('Location: index.php');
    exit;
}

//Retrieve the GET parameter from the 'Super global'
$reservationId = $_GET['id'];

//Get the record from the database result
$query = "SELECT * FROM reservations_user WHERE id = " . $reservationId;
$result = mysqli_query($db, $query);

//If the album doesn't exist, redirect back to the homepage
if (mysqli_num_rows($result) == 0) {
    header('Location: index.php');
    exit;
}

//Transform the row in the DB table to a PHP array
$reservation = mysqli_fetch_assoc($result);

//Close connection
mysqli_close($db);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservations Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<div class="container px-4">
    <h1 class="title mt-4"> Details van <?= $reservation['firstname'] ?> <a> </a> <?= $reservation['lastname'] ?></h1>
    <section class="content">
        <ul>
            <li>Id:<?= $reservation['id'] ?></li>
            <li>Voornaam: <?= $reservation['firstname'] ?></li>
            <li>Achternaam: <?= $reservation['lastname'] ?></li>
            <li>Email: <?= $reservation['email'] ?></li>
            <li>Telefoonnummer: <?= $reservation['phone_number'] ?></li>
            <li>Datum van ophalen: <?= $reservation['date_reservation'] ?></li>
            <li>Opmerking: <?= $reservation['extra_information'] ?></li>
        </ul>
        <a class="button" href="index.php">Go back to the list</a>
    </section>
</div>
</body>
</html>