<?php
session_start();
//May I visit this page? Check the SESSION
if (!isset($_SESSION['loggedInAdmin'])){
    // Redirect if not logged in
    header("Location: admin_login.php");
    exit;
}
/** @var array $db */
// Setup connection with database
require_once 'includes/connection.php';

//retrieve information:

// check if the 'id' key in the $_GET array is set and is not empty
if (!isset($_GET['id']) || $_GET['id'] === '') {
    header('Location: admin_reservations_details.php');
    exit;
}

// Otherwise, set $reservationId to 'id' from URL (retrieve the GET parameter from the 'Super global')
$reservationId = $_GET['id'];

// Create a query to retrieve reservation user from the database with 'id' from URL
$query = "SELECT * FROM reservations WHERE id = " . $reservationId;
// Execute the query and store the result in $result
$result = mysqli_query($db, $query);

// If there are no results (if the userId doesn't exist), redirect to admin_reservations_table.php
if (mysqli_num_rows($result) == 0) {
    header('Location: admin_reservations_table.php');
    exit;
}

// Otherwise, store the data in $reservation (transform the row in the DB table to a PHP array)
$reservation = mysqli_fetch_assoc($result);

//edit information:

// check if the 'submit' key in the $_POST array is set
if (isset($_POST['submit'])) {
    require_once "includes/database.php";
    // store the values of the 'date', 'vest', 'glove', 'mask' in the $_POST array in variables
    $date   = mysqli_escape_string($db, $_POST['date']);
    $vest = mysqli_escape_string($db, $_POST['vest']);
    $glove  = mysqli_escape_string($db, $_POST['glove']);
    $mask   = mysqli_escape_string($db, $_POST['mask']);

    //Require the form validation file
    require_once "includes/form_validation.php";

    //if errors are empty
    if (empty($errors)) {
        //Require database in this file
        require_once "includes/database.php";

    // create a query to update the reservations table with the values we stored in the variables before
    $query = "UPDATE reservations
    SET date = '$date', vest = '$vest', glove = '$glove', mask = '$mask'
    WHERE id = '$reservationId'";

    // execute the query
    $result = mysqli_query($db, $query)
    or die('Error ' . mysqli_error($db) . ' with query ' . $query);
}}

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
require_once 'includes/admin_navbar.html';
?>
<!--header-->
<header>

</header>
<!--content-->
<main>
    <div class="container px-4">
        <h1 class="title mt-4">Update deze reservering</h1>

        <section class="columns">
            <form class="column is-6" action="" method="post">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="date">Datum van ophalen</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input" id="date" type="date" name="date" value="<?= isset($errors['date']) ? htmlentities($errors['date']):''?><?= $reservation['date'] ?? '';?>"/>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['date'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="vest">Kies een vest</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <select class="input" id="vest" name="vest">
                                <option value="">--Please choose an option--</option>
                                <option value="geen vest" <?= $reservation['vest'] == 'geen vest' ? 'selected' : '';?>>geen vest</option>
                                <option value="vest S Eindhoven" <?= $reservation['vest'] == 'vest S Eindhoven' ? 'selected' : '';?>>vest S Eindhoven</option>
                                <option value="vest M Eindhoven"<?= $reservation['vest'] == 'vest M Eindhoven' ? 'selected' : '';?>>vest M Eindhoven</option>
                                <option value="vest L Eindhoven"<?= $reservation['vest'] == 'vest L Eindhoven' ? 'selected' : '';?>>vest L Eindhoven</option>
                                <option value="vest S Veldhoven"<?= $reservation['vest'] == 'vest S Veldhoven' ? 'selected' : '';?>>vest S Veldhoven</option>
                                <option value="vest M Veldhoven"<?= $reservation['vest'] == 'vest M Veldhoven' ? 'selected' : '';?>>vest M Veldhoven</option>
                                <option value="vest L Veldhoven"<?= $reservation['vest'] == 'vest L Veldhoven' ? 'selected' : '';?>>vest L Veldhoven</option>
                                </select>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['vest'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="glove">Kies een handschoen</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <select class="input" id="glove" name="glove" value="<?= $reservation['glove'] ?? '';?>"/>
                                <option value="">--Please choose an option--</option>
                                <option value="geen handschoen" <?= $reservation['glove'] == 'geen handschoen' ? 'selected' : '';?>>geen handschoen</option>
                                <option value="handschoen S Eindhoven" <?= $reservation['glove'] == 'handschoen S Eindhoven' ? 'selected' : '';?>>handschoen S Eindhoven</option>
                                <option value="handschoen M Eindhoven"<?= $reservation['glove'] == 'handschoen M Eindhoven' ? 'selected' : '';?>>handschoen M Eindhoven</option>
                                <option value="handschoen L Eindhoven"<?= $reservation['glove'] == 'handschoen L Eindhoven' ? 'selected' : '';?>>handschoen L Eindhoven</option>
                                <option value="handschoen S Veldhoven"<?= $reservation['glove'] == 'handschoen S Veldhoven' ? 'selected' : '';?>>handschoen S Veldhoven</option>
                                <option value="handschoen M Veldhoven"<?= $reservation['glove'] == 'handschoen M Veldhoven' ? 'selected' : '';?>>handschoen M Veldhoven</option>
                                <option value="handschoen L Veldhoven"<?= $reservation['glove'] == 'handschoen L Veldhoven' ? 'selected' : '';?>>handschoen L Veldhoven</option>
                                </select>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['glove'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="mask">Kies een masker</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <select class="input" id="mask" type="text" name="mask" value="<?= $reservation['mask'] ?? '';?>"/>
                                <option value="">--Please choose an option--</option>
                                <option value="geen masker" <?= $reservation['mask'] == 'geen masker' ? 'selected' : '';?>>geen masker</option>
                                <option value="masker S Eindhoven" <?= $reservation['mask'] == 'masker S Eindhoven' ? 'selected' : '';?>>masker S Eindhoven</option>
                                <option value="masker M Eindhoven"<?= $reservation['mask'] == 'masker M Eindhoven' ? 'selected' : '';?>>masker M Eindhoven</option>
                                <option value="masker L Eindhoven"<?= $reservation['mask'] == 'masker L Eindhoven' ? 'selected' : '';?>>masker L Eindhoven</option>
                                <option value="masker S Veldhoven"<?= $reservation['mask'] == 'masker S Veldhoven' ? 'selected' : '';?>>masker S Veldhoven</option>
                                <option value="masker M Veldhoven"<?= $reservation['mask'] == 'masker M Veldhoven' ? 'selected' : '';?>>masker M Veldhoven</option>
                                <option value="masker L Veldhoven"<?= $reservation['mask'] == 'masker L Veldhoven' ? 'selected' : '';?>>masker L Veldhoven</option>
                                </select>
                            </div>
                            <p class="help is-danger">
                                <?= $errors['mask'] ?? '' ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal"></div>
                    <div class="field-body">
                        <button class="button is-link is-fullwidth" type="submit" name="submit">Save</button>
                    </div>
                </div>
            </form>
        </section>

        <a class="button mt-4" href="admin_reservations_details.php?id=<?= $reservation['id'] ?>">&laquo; Terug naar detail pagina</a>

</main>
<!--footer-->
<?php
require_once 'includes/footer.html';
?>
</body>
</html>
</body>
</html>
