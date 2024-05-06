
<? if(!empty($data['errors'])) { ?>
    <div class="alert alert-danger" role="alert">
        <? foreach ($data['errors'] as $errText) { ?>
            <span><? echo $errText; ?></span><br>
        <? } ?>
    </div>
<? } ?>

<? if(isset($data['success'])) { ?>
    <div class="alert alert-primary" role="alert">
        <h4>Запис збережено.</h4>
    </div>
<? } ?>

<form id="purchaseForm" method="POST">
    <? require_once 'inputs.element.php'; ?>

    <input type="submit" name="submit" class="btn btn-primary" value="Додати закупку">
</form>