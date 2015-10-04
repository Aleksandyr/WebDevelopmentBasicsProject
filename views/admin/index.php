<h1>Categories and Products</h1>
<form action="/admin/addProductInCategory" method="post">
    <label for="category_num">Enter category:</label>
    <input id="category_num" type="text" name="category_num">
    <label for="product_num">Enter product:</label>
    <input id="product_num" type="text" name="product_num">
    <input type="submit" name="submit" value="ADD">
</form>
<ul class="all-categories">
    <p>Categories:</p>
    <?php foreach ($this->categories as $category): ?>
        <li><?= htmlspecialchars($category[1])?> - <?= htmlspecialchars($category[0])?></li>
    <?php endforeach; ?>
</ul>
<ul class="all-products">
    <p>Products:</p>
    <?php foreach ($this->products as $product): ?>
        <li><?= htmlspecialchars($product[1])?> - <?= htmlspecialchars($product[0])?></li>
    <?php endforeach; ?>
</ul>


