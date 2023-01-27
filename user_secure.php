<?php
/** @var mysqli $db */

//check if logged in:
session_start();
//May I visit this page? Check the SESSION
if (!isset($_SESSION['loggedInUser']['id'])){
    // Redirect if not logged in
    header("Location: user_login.php");
    exit;
}
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
            <H1>Welkom</H1>
            <p>In de navigatie bar staan nieuwe optie's nu je bent ingelogd.
                Om terug naar de normale website te gaan kan je op het logo klikken.</p>
                <img src="img/1point.png">
        </div>
    </section>
</main>
<!--footer-->
<?php
require_once 'includes/footer.html';
?>
</body>
</html>
</body>
</html>
