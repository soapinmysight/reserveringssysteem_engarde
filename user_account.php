<?php
//check if logged in:
session_start();
//May I visit this page? Check the SESSION
if (!isset($_SESSION['loggedInUser']['id'])){
    // Redirect if not logged in
    header("Location: user_login.php");
    exit;
}
//Require database in this file
/** @var $db */
require_once "includes/database.php";

// Otherwise, set $reservation_userId to 'id' from URL (retrieve the GET parameter from the 'Super global')
$userId = $_SESSION['loggedInUser']['id'];

// Create a query to retrieve reservation user from the database with 'id' from URL
$query = "SELECT * FROM users WHERE id = " . $userId;
// Execute the query and store the result in $result
$result = mysqli_query($db, $query);

// If there are no results (if the userId doesn't exist), redirect to user_secure.php
if (mysqli_num_rows($result) == 0) {
    header('Location: user_secure.php');
    exit;
}

// Otherwise, store the user in $user (transform the row in the DB table to a PHP array)
$user = mysqli_fetch_assoc($result);

//Close connection
mysqli_close($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <title>En Garde</title>
</head>
<body>
<!--navbar-->
<?php
require_once 'includes/user_navbar.php';
?>
<!--header-->
<header>

</header>
<!--content-->
<main>
    <section class="pocket">
        <div class="box">

    <div class="container px-4">
        <h1 class="title mt-4"> Details van <?= $user['firstname'] ?> <a> </a> <?= $user['lastname'] ?></h1>
        <section class="content">
            <ul>
                <li>Voornaam: <?= $user['firstname'] ?></li>
                <li>Achternaam: <?= $user['lastname'] ?></li>
                <li>Kind(eren) op dit account: <?= $user['child'] ?></li>
                <li>Email: <?= $user['email'] ?></li>
                <li>Telefoonnummer: <?= $user['phone'] ?></li>
            </ul>
        </section>
    </div>

        </div>
    </section>
<!--footer-->
<?php
require_once 'includes/footer.html';
?>
</body>
</html>
</body>
</html>