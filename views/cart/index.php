<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Action</td>
    </tr>
    <?php foreach($this->productsCart as $productCart) : ?>
        <tr>
            <td><?= $productCart[0] ?></td>
            <td><?= htmlspecialchars($productCart[1] )?></td>
            <td><a href="#">[Delete]</a></td>
        </tr>
    <?php endforeach ?>
</table>