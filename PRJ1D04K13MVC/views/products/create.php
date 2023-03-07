<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create product</title>
</head>
<body>
    <form method="post" action="index.php?controller=product&action=store">
        Name: <input type="text" name="name"><br>
        Price: <input type="text" name="price"><br>
        Amount: <input type="number" name="amount"><br>
        Brand: <select name="brand_id">
            <option value=""> - Choose - </option>
            <?php
                foreach ($brands as $brand){
            ?>
                <option value="<?= $brand['id'] ?>">
                    <?= $brand['name'] ?>
                </option>
            <?php
                }
            ?>
        </select><br>
        <button>Add</button>
    </form>
</body>
</html>