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
    <?php
        foreach ($array['products'] as $product){
    ?>
        <form method="post" action="index.php?controller=product&action=update">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            Name: <input type="text" name="name" value="<?= $product['name'] ?>"><br>
            Price: <input type="text" name="price" value="<?= $product['price'] ?>"><br>
            Amount: <input type="number" name="amount" value="<?= $product['amount'] ?>"><br>
            Brand: <select name="brand_id">
                <option value=""> - Choose - </option>
                <?php
                    foreach ($array['brands'] as $brand){
                ?>
                    <option value="<?= $brand['id'] ?>"
                        <?php
                            if($brand['id'] == $product['brand_id']){
                                echo 'selected';
                            }
                        ?>
                    >
                        <?= $brand['name'] ?>
                    </option>
                <?php
                    }
                ?>
            </select><br>
            <button>Update</button>
        </form>
    <?php
        }
    ?>
</body>
</html>