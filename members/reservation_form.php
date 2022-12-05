<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reservation_form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<div class="container">
    <h1 class="title">Invulformulier</h1>
    <h2 class="subtitle">Hier kun je je persoonlijke informatie invullen</h2>
        <form action="_" method="post">
            //bij action moet staan dat het naar het database moet maar ik weet nog niet hoe
            <label class = "label" for=firstname">Voornaam</label>
            <input type="text" id="firstname" name="firstname">

            <label class = "label" for="lastname">Achternaam</label>
            <input type="text" id="lastname" name="firstname">

            <label class = "label" for="email">Email-adres</label>
            <input type="text" id="email" name="email">

            <label class = "label" for="phone_number">Telefoonnummer</label>
            <input type="text" id="phone_number" name="phone_number">

            <label class = "label" for="date_reservation">Datum van ophalen</label>
            <input type="text" id="date_reservation" name="date_reservation">

            <label class = "label" for="extra_information">Opmerking (optioneel) </label>
            <input type="text" id="extra_information" name="extra_information">

            <input type="submit" name="submit" value="Versturen">

        </form>
</div>

<div class="container">
    <h2 class="subtitle">Hier kun je je reservatie invullen</h2>
    <form action="_" method="post">
        //bij action moet staan dat het naar het database moet maar ik weet nog niet hoe

            <label class = "label" for="vest-select">Kies een vest:</label>
            <select name="vest" id="vest-select">
                <option value="">--Please choose an option--</option>
                <option value="geen vest">geen vest</option>
                <option value="vest S 1">vest S 1</option>
                <option value="vest S 2">vest S 2</option>
                <option value="vest S 3">vest S 3</option>
                <option value="vest S 4">vest S 4</option>
                <option value="vest M 1">vest M 1</option>
                <option value="vest M 2">vest M 2</option>
                <option value="vest M 3">vest M 3</option>
                <option value="vest M 4">vest M 4</option>
                <option value="vest L 1">vest L 1</option>
                <option value="vest L 2">vest L 2</option>
                <option value="vest L 3">vest L 3</option>
                <option value="vest L 4">vest L 4</option>
            </select>

            <label class = "label" for="handschoen-select">Kies een handschoen:</label>
            <select name="handschoen" id="handschoen-select">
                <option value="">--Please choose an option--</option>
                <option value="geen handschoen">geen handschoen</option>
                <option value="handschoen S 1">handschoen S 1</option>
                <option value="handschoen S 2">handschoen S 2</option>
                <option value="handschoen S 3">handschoen S 3</option>
                <option value="handschoen S 4">handschoen S 4</option>
                <option value="handschoen M 1">handschoen M 1</option>
                <option value="handschoen M 2">handschoen M 2</option>
                <option value="handschoen M 3">handschoen M 3</option>
                <option value="handschoen M 4">handschoen M 4</option>
                <option value="handschoen L 1">handschoen L 1</option>
                <option value="handschoen L 2">handschoen L 2</option>
                <option value="handschoen L 3">handschoen L 3</option>
                <option value="handschoen L 4">handschoen L 4</option>
            </select>

            <label class = "label" for="masker-select">Kies een masker:</label>
            <select name="masker" id="masker-select">
                <option value="">--Please choose an option--</option>
                <option value="geen masker">geen masker</option>
                <option value="masker S 1">masker S 1</option>
                <option value="masker S 2">masker S 2</option>
                <option value="masker S 3">masker S 3</option>
                <option value="masker S 4">masker S 4</option>
                <option value="masker M 1">masker M 1</option>
                <option value="masker M 2">masker M 2</option>
                <option value="masker M 3">masker M 3</option>
                <option value="masker M 4">masker M 4</option>
                <option value="masker L 1">masker L 1</option>
                <option value="masker L 2">masker L 2</option>
                <option value="masker L 3">masker L 3</option>
                <option value="masker L 4">masker L 4</option>
            </select>

            <input type="submit" name="submit" value="Versturen">

        </form>

</div>
    <tfoot>
    <tr>
        <td colspan="6">&copy; invulformulier</td>
    </tr>
    </tfoot>
    </tbody>
</table>
</body>
</html>

