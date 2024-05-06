<table class="table">
    <thead>
        <th scope="col">#</th>
        <th scope="col">Назва продукту</th>
        <th scope="col">Кількість</th>
        <th scope="col">Одиниці виміру</th>
        <th scope="col">Ціна</th>
        <th scope="col">Дата закупівлі</th>
        <th scope="col"></th>
    </thead>
    <tbody>
<? foreach ($data['purchase'] as $key => $val) { ?>
    <tr>
        <td><? echo $val['id']; ?></td>
        <td><? echo $val['product_name']; ?></td>
        <td><? echo $val['quantity']; ?></td>
        <td><? echo $val['unit']; ?></td>
        <td><? echo $val['price']; ?></td>
        <td><? echo $val['purchase_date']; ?></td>
        <td>
            <a href="?page=purchases&action=edit&id=<? echo $val['id']; ?>" class="btn btn-sm btn-info">Редагувати</a>
            <form action="?page=purchases&action=destroy" method="POST" style="display:inline;">
                <input type="hidden" name="csrf" value="<? echo getToken() ?>">
                <input type="hidden" name="id" value="<? echo $val['id']; ?>">
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Ви впевнені?')">Видалити</button>
            </form>
        </td>
    </tr>
<? }?>
    </tbody>
</table>

<div class="pagination">
    <? for ($i = $data['pagination']['start_page']; $i <= $data['pagination']['end_page']; $i++) {
            if ($i == $data['pagination']['current_page']) { ?>
               <div class="current"><span> <? echo $i ?> </span></div>
            <? } else { ?>
                <a href='?page=index&p=<? echo $i ?>'><? echo $i; ?></a>
           <? }
    } ?>
    <div class="total_pages"><span> | Усього: <? echo $data['pagination']['total_pages']; ?></span></div>
</div>

