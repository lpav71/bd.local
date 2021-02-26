<?php
include '../db.php';
$stmt = $pdo->prepare('SELECT * FROM locality WHERE id = :id');
$stmt->bindParam(':id', $_GET['locality_id']);
$stmt->execute();

$rec = $stmt->fetchAll();

//echo '<pre>'.print_r($rec[0],true).'</pre>';
echo '<pre>'.print_r($_GET['locality_id'],true).'</pre>';
?>
<!-- Modal -->

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Изменение региона</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="#" id="my_form">
                <div class="form-group required">
                    <label for="ID">ID</label>
                    <input class="form-control" required="required" name="id" readonly type="text" value="<?= $rec[0]['id'] ?>">
                </div>
                <div class="form-group required">
                    <label for="Наименование">Наименование</label>
                    <input class="form-control" required="required" name="name" type="text" value="<?= $rec[0]['name'] ?>">
                </div>
                <input type="hidden" name="region_id" value="<?= $_GET['region_id'] ?>">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="save">Сохранить</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $("#save").click(function(e){
            var f = $("#my_form");
            e.preventDefault();
            $.ajax({
                url: 'locality/update.php', // адрес обработчика
                type: 'POST',
                data: f.serialize(),
                success: function(msg) { // получен ответ сервера
                    $('#win_one').modal('hide');
                    location.reload();
                }
            });
            return false;
        });
    });

</script>




