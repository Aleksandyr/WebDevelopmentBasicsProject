<h1><?= htmlspecialchars($this->title) ?></h1>

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
                <td><?= $productCart[6] ?></td>
                <td><?= $productCart[1] ?></td>
                <td><?= $productCart[2] ?>$</td>
                <td><?= htmlspecialchars($productCart[3])?></td>
                <td><a href="/cart/delete/<?= $productCart[5] ?>/<?= $productCart[0] ?>/<?= $productCart[3] ?>">[Delete]</a></td>
            </tr>
        <?php endforeach ?>
    <?php endif ?>
</table>