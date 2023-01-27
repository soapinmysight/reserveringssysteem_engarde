<?php
if(isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "includes/database.php";

    // Get form data
    $firstname = mysqli_escape_string($db,$_POST['firstname']);
    $lastname = mysqli_escape_string($db, $_POST['lastname']);
    $child = mysqli_escape_string($db,$_POST['child']);
    $email = mysqli_escape_string($db,$_POST['email']);
    $phone = mysqli_escape_string($db,$_POST['phone']);
    $password =$_POST['password'];

    print_r($firstname. $lastname. $child. $email. $phone. $password);

    // Server-side validation

    $errors = [];
    if ($firstname == ' '){
        $errors ['firstname'] = 'Please fill in your name.';
    }
    if ($lastname == ''){
        $errors ['lastname'] = 'Please fill in your last name.';
    }
    if ($email == ''){
        $errors  ['email'] = 'Please fill in your email.';
    }
    if ($phone == ''){
        $errors  ['phone'] = 'Please fill in your phone number.';
    }
    if ($password == ''){
        $errors  ['password'] = 'Please fill in the password you want to use.';
    }

    // If data valid
    if (empty($errors)){

        // create a secure password, wisth the PHP function password_hash()
        $password = password_hash($password,PASSWORD_DEFAULT);

        // store the new user in the database.
        $query = "INSERT INTO users (firstname, lastname, child, email, phone, password) 
                  VALUES ('$firstname', '$lastname', '$child','$email','$phone','$password')";
        $result = mysqli_query($db, $query);

        // If query succeeded
        if ($result){

            // Redirect to login page
            header('Location: user_login.php');
            exit;
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
            <h2 class="title">Register</h2>

            <section class="columns">
                <form class="column is-6" action="" method="post">

                    <!-- firstname -->
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label" for="firstname">Voornaam</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input class="input" id="firstname" type="text" name="firstname" value="<?= isset($errors['firstname']) ? htmlentities($errors['firstname']):''?>"/>
                                    <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                </div>
                                <p class="help is-danger">
                                    <?= $errors['firstname'] ?? '' ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- lastname -->
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label" for="lastname">Achternaam</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input class="input" id="lastname" type="text" name="lastname" value="<?= isset($errors['lastname']) ? htmlentities($errors['lastname']):''?>"/>
                                    <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                </div>
                                <p class="help is-danger">
                                    <?= $errors['lastname'] ?? '' ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <p>In het geval dat je ouder/verzorger bent van een of meerdere kinderen die ook lid zijn bij schermvereniging En Garde, wordt u gevraagd de desbetreffende voor- en achternamen in te vullen in het komende veld.</p>


                    <!-- child's name -->
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label" for="child">Naam kind</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input class="input" id="child" type="text" name="child" value="<?= isset($errors['child']) ? htmlentities($errors['child']):''?>" />
                                    <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label" for="email">Email</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input class="input" id="email" type="text" name="email" value="<?= isset($errors['email']) ? htmlentities($errors['email']):''?>" />
                                    <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                </div>
                                <p class="help is-danger">
                                    <?= $errors['email'] ?? '' ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- phone number -->
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label" for="phone">Telefoonnummer</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input class="input" id="phone" type="text" name="phone" value="<?= isset($errors['phone']) ? htmlentities($errors['phone']):''?>" />
                                    <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                </div>
                                <p class="help is-danger">
                                    <?= $errors['phone'] ?? '' ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label" for="password">Password</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input class="input" id="password" type="password" name="password"/>
                                    <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                                </div>
                                <p class="help is-danger">
                                    <?= $errors['password'] ?? '' ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="field is-horizontal">
                        <div class="field-label is-normal"></div>
                        <div class="field-body">
                            <button class="button is-link is-fullwidth" type="submit" name="submit">Register</button>
                        </div>
                    </div>

                </form>
            </section>

        </div>
    </section>

</main>
<!--footer-->
<?php
require_once 'includes/footer.html';
?>
</body>
</html>