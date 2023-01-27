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
            <H1>Bedankt voor je reservatie!</H1>
            <p>Je reservatie wordt verwerkt in het systeem. Mochten er problemen zijn wordt er contact met je opgenomen.

            Heb je vragen? Zet het in de groepsapp!</p>
            <img src="img/thankyou.png">
        </div>
    </section>
</main>
<!--footer-->
<?php
require_once 'includes/footer.html';
?>
</body>
</html>