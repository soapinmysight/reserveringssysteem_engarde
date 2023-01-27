<?php
session_start();

$login = false;
if (isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "includes/database.php";

// Is user logged in?
    if (isset($_POST['submit'])) {

// Get form data
        $email = mysqli_escape_string($db, $_POST['email']);
        $password = $_POST['password'];

        // Server-side validation
        if ($email == '') {
            $errors ['email'] = 'Please fill in your email.';

        }
        if ($password == '') {
            $errors  ['password'] = 'Please fill in your password.';
        }

        // If data valid
        if (empty($errors)) {
            // SELECT the user from the database, based on the email address.
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($db, $query);
            // check if the user exists
            if (mysqli_num_rows($result) == 1) {
                // Get user data from result
                $user = mysqli_fetch_assoc($result);

                // Check if the provided password matches the stored password in the database
                if (password_verify($password, $user['password'])) {
                    // Store the user in the session
                    $_SESSION['loggedInUser'] = [
                        'id' => $user['id'],
                        'name' => $user['name'],
                    ];
                    // Redirect to secure page
                    header('Location: user_secure.php');
                    exit;
                } else {
                    // Credentials not valid (IF the provided password doesn't match the stored password in the database)
                    //Write email back to the input field (leave password empty)
                    //staat in html: ( value="<?= $email ?? '' ? >" )  ?? is if-else statement
                    //Create error message "credentials do not match"
                    $errors ['loginFailed'] = 'The provided credentials do not match.';
                }
            } else {
                //IF the user doesn't exist
                //Write an email back to the input field (leave password empty)
                //staat in html: ( value="<?= $email ?? '' ? >" )  ?? is if-else statement
                //create error message: "credentials do not match"
                $errors ['loginFailed'] = 'The provided credentials do not match.';
            }
        }
    }
    mysqli_close($db);
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
<!--navbar-->
<?php
require_once 'includes/index_navbar.html';
?>
<!--header-->
<header>

</header>
<!--content-->
<main>
    <section class="section">
        <div class="container content">
            <h1 class="title">Log in</h1>

            <?php if ($login) { ?>
                <p>Je bent ingelogd!</p>
                <p><a href="user_logout.php">Uitloggen</a> / <a href="user_secure.php">Naar secure page (user homepage)</a></p>
            <?php } else { ?>

                <section class="columns">
                    <form class="column is-6" action="" method="post">

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label" for="email">Email</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control has-icons-left">
                                        <input class="input" id="email" type="text" name="email"
                                               value="<?= isset($errors['email']) ? htmlentities($errors['email']):''?>"/>
                                        <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <p class="help is-danger">
                                        <?= $errors['email'] ?? '' ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label" for="password">Password</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control has-icons-left">
                                        <input class="input" id="password" type="password" name="password"/>
                                        <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>

                                        <?php if (isset($errors['loginFailed'])) { ?>
                                            <div class="notification is-danger">
                                                <button class="delete"></button>
                                                <?= $errors['loginFailed'] ?>
                                            </div>
                                        <?php } ?>

                                    </div>
                                    <p class="help is-danger">
                                        <?= $errors['password'] ?? '' ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal"></div>
                            <div class="field-body">
                                <button class="button is-link is-fullwidth" type="submit" name="submit">Log in With Email
                                </button>
                            </div>
                        </div>

                    </form>
                </section>

            <?php } ?>

            <H2>Heb je nog geen account?</H2>
            <div class="buttons">
                <a class="button is-primary" href="user_register.php">
                    Registreer je
                </a>
            </div>

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