<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Brands list</title>
</head>
<body>
    <a href="index.php?controller=brand&action=create">Add a brand</a>
    <table border="1px" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th></th>
            <th></th>
        </tr>
        <?php
            foreach ($brands as $brand){
        ?>
            <tr>
                <td>
                    <?= $brand['id'] ?>
                </td>
                <td>
                    <?= $brand['name'] ?>
                </td>
                <td>
                    <a href="index.php?controller=brand&action=edit&id=<?= $brand['id'] ?>">Edit</a>
                </td>
                <td>
                    <a href="index.php?controller=brand&action=destroy&id=<?= $brand['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>