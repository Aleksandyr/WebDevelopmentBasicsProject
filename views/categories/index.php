<h1>Categories</h1>
<form action="/products/index" method="post">
    <label for="category_num">Enter your choice:</label>
    <input id="category_num" type="text" name="category_num">
    <input type="submit" value="Find" />
</form>
<ul class="all-categories">
    <p>Categories:</p>
    <?php foreach ($this->categories as $category): ?>
        <li><?= htmlspecialchars($category[1])?> - <?= htmlspecialchars($category[0])?></li>
    <?php endforeach; ?>
</ul>
