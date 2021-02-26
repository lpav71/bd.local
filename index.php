<?php include 'layout_start.php' ?>
<?php
include 'db.php';

$stmt = $pdo->query('SELECT * FROM region');

$array = $stmt->fetchAll();

?>
<h1>Основная таблица</h1>
<a href="create.php" class="btn btn-success create">Создать</a>
    <table class="table">
                    <thead>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Действия</th>
                    </thead>
                    <tbody>
<?php  foreach ($array as $item) { ?>
                        <tr>
                            <td> <?php echo $item['id'] ?> </td>
                            <td> <?php echo $item['name'] ?> </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Действия
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/locality.php?id=<?php echo $item['id'] ?>">К списку населённых пунктов</a>
                                        <a class="dropdown-item" href="#" data-id="<?php echo $item['id'] ?>" data-toggle="modal" data-target="#edit">Изменить</a>
                                        <a class="dropdown-item" href="#" data-id="<?php echo $item['id'] ?>">Удалить</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
<?php } ?>
                    </tbody>
                </table>
<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
<div id="create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>

<script type="text/javascript">
    $(function(){

        $(".dropdown-menu :nth-child(2)").click(function(e){  //Выбираем 2-ой пункт - Изменить
            var attr = $(this).data('id');
            e.preventDefault();
            $.ajax({
                url: 'edit.php', // адрес обработчика
                type: 'GET',
                data: {id: attr},
                success: function(msg) { // получен ответ сервера
                    $('#edit').html(msg).modal('show');
                }
            });
            return false;
        });

        $(".create").click(function(e){  //Выбираем - Создать
            e.preventDefault();
            $.ajax({
                url: 'create.php', // адрес обработчика
                type: 'GET',
                success: function(msg) { // получен ответ сервера
                    $('#edit').html(msg).modal('show');
                }
            });
            return false;
        });

        $(".dropdown-menu :nth-child(3)").click(function(e){  //Выбираем 3-ой пункт - Удалить
            var attr = $(this).data('id');
            e.preventDefault();
            $.ajax({
                url: 'delete.php', // адрес обработчика
                type: 'POST',
                data: {id: attr},
                success: function(msg) { // получен ответ сервера
                    console.log(msg);
                    location.reload();
                }
            });
            return false;
        });

    });
</script>

<?php include 'layout_end.php' ?>
