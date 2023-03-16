<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>
    <table border="1px" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <th>Product's ID</th>
            <th>Product's name</th>
            <th>Product's price</th>
            <th>Product's amount</th>
            <th></th>
        </tr>
        <?php
            foreach ($infor['cart'] as $product_id => $value){
        ?>
            <tr>
                <td>
                    <?= $product_id; ?>
                </td>
                <td>
                    <?= $value['product_name']; ?>
                </td>
                <td>
                    <?= $value['price']; ?>
                </td>
                <td>
                    <form method="post" action="index.php?controller=product&action=change_amount">
                        <input type="number" name="amount[<?= $product_id ?>]" value="<?= $value['amount']; ?>">
                        <button>Change amount</button>
                    </form>
                </td>
                <td>
                    <a href="index.php?controller=product&action=delete_product_in_order&id=<?= $product_id; ?>">Delete</a>
                </td>
            </tr>
        <?php
            }
        ?>
        <tr>
            <td colspan="5">
                <a href="index.php?controller=product&action=delete_cart">Delete cart</a>
            </td>
        </tr>
    </table>
    <form method="post" action="index.php?controller=product&action=add_order_to_db">
        Customer: <select name="customer_id">
            <?php
                foreach ($infor['customer'] as $customer){
            ?>
                <option value="<?= $customer['id'] ?>">
                    <?= $customer['name'] ?>
                </option>
            <?php
                }
            ?>
        </select>
        <button>Order</button>
    </form>
    <a href="index.php?controller=product">Back to product's list</a>

</body>
</html>