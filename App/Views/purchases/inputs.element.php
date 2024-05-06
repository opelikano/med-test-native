
<div class="form-group">
    <label for="product_name">Назва продукту:</label>
    <input type="text" minlength="3" id="product_name" class="form-control" name="product_name" required value="<? echo isset($data['product_name']) ? $data['product_name'] : '' ; ?>">
</div>
<div class="form-group">
    <label for="quantity">Кількість:</label>
    <input type="number" id="quantity" name="quantity" class="form-control" required value="<? echo isset($data['quantity']) ? $data['quantity'] : ''; ?>">
</div>
<div class="form-group">
    <label for="unit">Одиниці виміру:</label>
    <input type="text" minlength="1" id="unit" class="form-control" name="unit" required value="<? echo isset($data['unit']) ? $data['unit'] : ''; ?>">
</div>
<div class="form-group">
    <label for="price">Ціна:</label>
    <input type="number" step="0.01" id="price" class="form-control" name="price" required value="<? echo isset($data['price']) ? $data['price'] : ''; ?>">
</div>
<div class="form-group">
    <label for="purchase_date">Дата закупки:</label>
    <input type="date" id="purchase_date" class="form-control" name="purchase_date" required value="<? echo isset($data['purchase_date']) ? $data['purchase_date'] : ''; ?>">
</div>
<input type="hidden" name="csrf" value="<? echo getToken(); ?>">