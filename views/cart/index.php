<table>
    <?php if (count($this->productsCart) > 0): ?>
    <tr>
        <td>Category name</td>
        <td>Product name</td>
        <td>Price</td>
        <td>Quantity</td>
        <td>Action</td>
    </tr>
        <?php foreach($this->productsCart as $productCart) : ?>
            <tr>
                <td><?= htmlspecialchars($productCart[6])?></td>
                <td><?= htmlspecialchars($productCart[1])?></td>
                <td><?= htmlspecialchars($productCart[2])?>$</td>
                <td><?= htmlspecialchars($productCart[3])?></td>
                <td><a href="/cart/delete/<?= $productCart[5] ?>/<?= $productCart[0] ?>/<?= $productCart[3] ?>">[Delete]</a></td>
            </tr>
        <?php endforeach ?>
    <?php else: ?>
        <h1 id="cart-is-empty">Cart is empty</h1>
    <?php endif ?>
</table>