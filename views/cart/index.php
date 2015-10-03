<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <tr>
        <td>product Id</td>
        <td>Name</td>
        <td>Quantity</td>
        <td>Cart id</td>
        <td>Category ID</td>
        <td>Action</td>
    </tr>
    <?php foreach($this->productsCart as $productCart) : ?>
        <tr>
            <td><?= $productCart[0] ?></td>
            <td><?= $productCart[1] ?></td>
            <td><?= htmlspecialchars($productCart[2])?></td>
            <td><?= htmlspecialchars($productCart[3])?></td>
            <td><?= htmlspecialchars($productCart[4])?></td>
            <td><a href="/cart/delete/<?= $productCart[4] ?>/<?= $productCart[0] ?>/<?= $productCart[2] ?>">[Delete]</a></td>
        </tr>
    <?php endforeach ?>
</table>