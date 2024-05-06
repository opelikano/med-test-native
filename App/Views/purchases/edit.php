
<? if(!empty($data['errors'])) { ?>
    <div class="alert alert-danger" role="alert">
        <? foreach ($data['errors'] as $errText) { ?>
            <span><? echo $errText; ?></span><br>
        <? } ?>
    </div>
<? } ?>

<? if(isset($data['success'])) { ?>
    <div class="alert alert-primary" role="alert">
        <h4>Запис оновлено.</h4>
    </div>
<? } ?>

<form id="purchaseForm" method="POST" action="?page=purchases&action=update">
    <? require_once 'inputs.element.php'; ?>
    <input type="hidden" name="id" value="<? echo $data['id']; ?>">
    <input type="hidden" name="referer" value="<? echo $data['returnUrl']; ?>">
    <input type="submit" name="submit" class="btn btn-primary" value="Зберегти зміни">
</form>