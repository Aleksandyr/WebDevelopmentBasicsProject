<?php if($this->isEditor() || $this->isAdmin()): ?>
    <form action="/admin/addProduct" method="post" class="add-product-in-category-form">
        Product name: <input type="text" name="nameProduct">
        <br />
        Description: <input type="text" name="description">
        <br />
        Price: <input type="number" name="price">
        <br />
        Quantity: <input type="number" name="quantity">
        <br />
        <input type="submit" name="Add product">
    </form>
<?php endif; ?>