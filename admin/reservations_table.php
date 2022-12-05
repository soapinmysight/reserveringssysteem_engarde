<?php
/** @var array $db */
// Setup connection with database
require_once 'includes/connection.php';


// Select all the users from the database
$query = "SELECT * FROM reservations";

$result = mysqli_query($db, $query)
or die('Error '.mysqli_error($db).' with query '.$query);


//// Store the users in an array
$reservations_user = [];
while($row = mysqli_fetch_assoc($result))
{
    $reservations_user[] = $row;
}

mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>En Garde Reservations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<div class="container px-4">
    <h1 class="title mt-4">Reservations</h1>
    <hr>
    <table class="table is-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>email</th>
            <th>phone_number</th>
            <th>date_reservation</th>
            <th>extra_information</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="6" class="has-text-centered">&copy; En Garde</td>
        </tr>
        </tfoot>
        <tbody>
        <?php foreach ($reservations_user as $reservation) { ?>
            <tr>
                <td><?= $reservation['id'] ?></td>
                <td><?= $reservation['firstname'] ?></td>
                <td><?= $reservation['lastname'] ?></td>
                <td><?= $reservation['email'] ?></td>
                <td><?= $reservation['phone_number'] ?></td>
                <td><?= $reservation['date_reservation'] ?></td>
                <td><?= $reservation['extra_information'] ?></td>
                <td><a href="../admin/reservations_details.php?id=<?= $reservation['id'] ?>">Details</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>