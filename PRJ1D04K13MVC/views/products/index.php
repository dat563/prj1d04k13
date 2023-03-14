<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
</head>
<body>
    <a href="index.php?controller=product&action=create">Add a product</a>
    <table border="1px" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Brand</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php
            foreach ($products as $product){
        ?>
                <tr>
                    <td>
                        <?= $product['id'] ?>
                    </td>
                    <td>
                        <?= $product['name'] ?>
                    </td>
                    <td>
                        <?= $product['price'] ?>
                    </td>
                    <td>
                        <?= $product['amount'] ?>
                    </td>
                    <td>
                        <?= $product['brand_name'] ?>
                    </td>
                    <td>
                        <a href="index.php?controller=product&action=edit&id=<?= $product['id'] ?>">Edit</a>
                    </td>
                    <td>
                        <a href="index.php?controller=product&action=destroy&id=<?= $product['id'] ?>">Delete</a>
                    </td>
                    <td>
                        <a href="index.php?controller=product&action=add_cart&id=<?= $product['id'] ?>">Add to cart</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
    <a href="index.php?controller=product&action=view_cart">View cart</a>
</body>
</html>