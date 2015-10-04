<h1>Products</h1>
<table>
    <tr>
        <th>ProductName</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php foreach ($this->products as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product[2]) ?></td>
            <td><?= htmlspecialchars($product[3]) ?></td>
            <td><?= htmlspecialchars($product[4]) ?></td>
            <td><a href="/cart/add/<?= $this->userId[0] ?>/<?= $product[1] ?>/<?= $product[0]?>">[Add to cart]</a></td>
        </tr>
    <?php endforeach; ?>
</table>