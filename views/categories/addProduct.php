<?php if($this->isEditor() || $this->isAdmin()): ?>
    <form action="/admin/addProductInCategory" method="post" class="add-product-in-category-form">
        Product name: <input type="text" name="nameProduct">
        Description: <input type="text" name="description">
        Price: <input type="number" name="price">
        Quantity: <input type="number" name="quantity">
        <input type="submit" name="Add product">
    </form>
<?php endif; ?>