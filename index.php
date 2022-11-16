<?php
$info =
    [
        [
            'name' => 'Jayden',
            'lastname' => 'Blom',
            'email' => 'jaydenblom@gmail.com',
            'rentorborrow' => 'lenen',
            'childoradult' => 'kind'
        ],
        [
            'name' => 'Cesiana',
            'lastname' => 'Poels',
            'email' => '10@hr.nl',
            'rentorborrow' => 'huren',
            'childoradult' => 'volwassene'
        ],
        [
            'name' => 'Dieuwe',
            'lastname' => 'van Rijnswou',
            'email' => 'dvr@gmail.com',
            'rentorborrow' => 'huren',
            'childoradult' => 'volwassene'
        ],
    ];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>invulformulier</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<h1>invulformulier</h1>
<hr/>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Naam</th>
        <th>Achternaam</th>
        <th>Email</th>
        <th>Huren of lenen</th>
        <th>Kind of Volwassene</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="6">&copy; invulformulier</td>
    </tr>
    </tfoot>
        <?php foreach ($info as $index => $item): ?>
        <tr>
            <td><?= $index +1?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['lastname'] ?></td>
            <td><?= $item['email'] ?></td>
            <td><?= $item['rentorborrow'] ?></td>
            <td><?= $item['childoradult'] ?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
</body>
</html>

