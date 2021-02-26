<?php include 'db.php' ?>
<!-- Modal -->

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Добавление региона</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" data-id="<?= $_GET['id'] ?>">
            <form action="#" id="my_form">
                <div class="form-group required">
                    <label for="Наименование">Наименование</label>
                    <input class="form-control" required="required" name="name" type="text" value="">
                </div>
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
            var attr = $('.modal-body').data('id');
            var f = $("#my_form");
            e.preventDefault();
            $.ajax({
                url: 'store.php', // адрес обработчика
                type: 'POST',
                data: f.serialize(),
                success: function(msg) { // получен ответ сервера
                    $('#create').modal('hide');
                    location.reload();
                }
            });
            return false;
        });
    });

</script>



