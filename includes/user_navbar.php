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
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item "href="index.php">
            <img src="img/En-Garde-schermvereniging.png">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbar" class="navbar-menu">
        <div class="navbar-start">
            <div class="navbar-item is-hoverable">
                <a class="navbar-link" href="user_account.php?id=<?= $users['id'] ?>">
                    Mijn account
                </a>
                <a class="navbar-link" href="user_information.php?id=<?= $users['id'] ?>">
                    Puducten reserveren
                </a>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary" href="user_logout.php">
                        Log Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
</body>
</html>
</body>
</html>