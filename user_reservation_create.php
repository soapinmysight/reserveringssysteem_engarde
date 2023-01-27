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

//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    require_once "includes/database.php";
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $date   = mysqli_escape_string($db, $_POST['date']);
    $vest = mysqli_escape_string($db, $_POST['vest']);
    $glove  = mysqli_escape_string($db, $_POST['glove']);
    $mask   = mysqli_escape_string($db, $_POST['mask']);
    $users_id = mysqli_escape_string($db, $_POST['users_id']);

    //Require the form validation handling
    require_once "includes/form_validation.php";

    if (empty($errors)) {
        //Require database in this file & image helpers
        require_once "includes/database.php";

        //Save the record to the database
        $query = "INSERT INTO reservations (date, vest, glove, mask, users_id)
                  VALUES ('$date', '$vest', '$glove', '$mask', $users_id)";
//        echo $query;
//        exit;
        $result = mysqli_query($db, $query) or die('Error: '.mysqli_error($db). ' with query ' . $query);
        //Close connection
        mysqli_close($db);

        // Redirect to user_thankyou.php
        header('Location: user_thankyou.php');
        exit;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>Muziekalbums - Create</title>
</head>
<body>
<!--navbar-->
<?php
require_once 'includes/user_navbar.php';
?>
    <h1 class="title mt-4">Maak een reservatie</h1>

    <section class="columns">
        <form class="column is-6" action="" method="post">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="date">Datum van ophalen</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input" id="date" type="date" name="date" value="<?= isset($date) ? htmlentities($date):''?>"/>
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
                            <select class="input" id="vest" type="text" name="vest" />
                            <option value="">--Please choose an option--</option>
                            <option value="geen vest"<?= isset($vest) && $vest == 'geen vest' ? 'selected' : '' ?>>geen vest</option>
                            <option value="vest S Eindhoven"<?= isset($vest) && $vest == 'vest S Eindhoven' ? 'selected' : '' ?>>vest S Eindhoven</option>
                            <option value="vest M Eindhoven"<?= isset($vest) && $vest == 'vest M Eindhoven' ? 'selected' : '' ?>>vest M Eindhoven</option>
                            <option value="vest L Eindhoven"<?= isset($vest) && $vest == 'vest L Eindhoven' ? 'selected' : '' ?>>vest L Eindhoven</option>
                            <option value="vest S Veldhoven"<?= isset($vest) && $vest == 'vest S Veldhoven' ? 'selected' : '' ?>>vest S Veldhoven</option>
                            <option value="vest M Veldhoven"<?= isset($vest) && $vest == 'vest M Veldhoven' ? 'selected' : '' ?>>vest M Veldhoven</option>
                            <option value="vest L Veldhoven"<?= isset($vest) && $vest == 'vest L Veldhoven' ? 'selected' : '' ?>>vest L Veldhoven</option>
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
                        <select class="input" id="glove" type="text" name="glove"/>
                            <option value="">--Please choose an option--</option>
                            <option value="geen handschoen"<?= isset($glove) && $glove = 'geen handschoen' ? 'selected' : '' ?>>geen handschoen</option>
                            <option value="handschoen S Eindhoven"<?= isset($glove) && $glove == 'handschoen S Eindhoven' ? 'selected' : '' ?>>handschoen S Eindhoven</option>
                            <option value="handschoen M Eindhoven"<?= isset($glove) && $glove == 'handschoen M Eindhoven' ? 'selected' : '' ?>>handschoen M Eindhoven</option>
                            <option value="handschoen L Eindhoven"<?= isset($glove) && $glove == 'handschoen L Eindhoven' ? 'selected' : '' ?>>handschoen L Eindhoven</option>
                            <option value="handschoen S Veldhoven"<?= isset($glove) && $glove == 'handschoen S Veldhoven' ? 'selected' : '' ?>>handschoen S Veldhoven</option>
                            <option value="handschoen M Veldhoven"<?= isset($glove) && $glove == 'handschoen M Veldhoven' ? 'selected' : '' ?>>handschoen M Veldhoven</option>
                            <option value="handschoen L Veldhoven"<?= isset($glove) && $glove == 'handschoen L Veldhoven' ? 'selected' : '' ?>>handschoen L Veldhoven</option>
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
                            <select class="input" id="mask" type="text" name="mask"/>
                            <option value="">--Please choose an option--</option>
                            <option value="geen masker"<?= isset($mask) && $mask == 'geen masker' ? 'selected' : '' ?>>geen masker</option>
                            <option value="masker S Eindhoven"<?= isset($mask) && $mask == 'masker S Eindhoven' ? 'selected' : '' ?>>masker S Eindhoven</option>
                            <option value="masker M Eindhoven"<?= isset($mask) && $mask == 'masker M Eindhoven' ? 'selected' : '' ?>>masker M Eindhoven</option>
                            <option value="masker L Eindhoven"<?= isset($mask) && $mask == 'masker L Eindhoven' ? 'selected' : '' ?>>masker L Eindhoven</option>
                            <option value="masker S Veldhoven"<?= isset($mask) && $mask == 'masker S Veldhoven' ? 'selected' : '' ?>>masker S Veldhoven</option>
                            <option value="masker M Veldhoven"<?= isset($mask) && $mask == 'masker M Veldhoven' ? 'selected' : '' ?>>masker M Veldhoven</option>
                            <option value="masker L Veldhoven"<?= isset($mask) && $mask == 'masker L Veldhoven' ? 'selected' : '' ?>>masker L Veldhoven</option>
                            </select>
                        </div>
                        <p class="help is-danger">
                            <?= $errors['mask'] ?? '' ?>
                        </p>
                    </div>
                </div>
            </div>

            <input type="hidden" name="users_id" value="<?= $_SESSION['loggedInUser']['id'] ?>">

            <div class="field is-horizontal">
                <div class="field-label is-normal"></div>
                <div class="field-body">
                    <button class="button is-link is-fullwidth" type="submit" name="submit">Save</button>
                </div>
            </div>
        </form>
        <img class="productspicture" src="img/products.jpg">
    </section>
    <!--footer-->
    <?php
    require_once 'includes/footer.html';
    ?>
</body>
</html>
