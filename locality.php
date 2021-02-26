<?php include 'layout_start.php' ?>
<?php
include 'db.php';

$stmt = $pdo->prepare('SELECT * FROM locality WHERE region_id = :id');
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$region_id = $_GET['id'];

$array = $stmt->fetchAll();

?>
    <h1>Таблица городов</h1>
<a href="create.php" class="btn btn-success create" data-id="<?= $region_id ?>">Создать</a>
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Имя</th>
            <th>Дествия</th>
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
                                <a class="dropdown-item" href="/" data-region="<?= $region_id ?>" data-locality="<?= $item['id'] ?>">Изменить</a>
                                <a class="dropdown-item" href= "/" data-locality="<?= $item['id'] ?>">Удалить</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

<div id="create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" ></div>

<script type="text/javascript">
    $(function () {

        $(".dropdown-menu :nth-child(1)").click(function(e){  //Выбираем 1-ой пункт - Изменить
            var region_id = $(this).data('region');
            var locality_id = $(this).data('locality');
            e.preventDefault();
            $.ajax({
                url: '/locality/edit.php', // адрес обработчика
                type: 'GET',
                data: {region_id: region_id, locality_id: locality_id},
                success: function(msg) { // получен ответ сервера
                    $('#edit').html(msg).modal('show');
                }
            });
            return false;
        });

        $(".create").click(function(e){  //Выбираем - Создать
            var attr = $('.create').data('id');
            e.preventDefault();
            $.ajax({
                url: '/locality/create.php', // адрес обработчика
                type: 'GET',
                data: {id: attr},
                success: function(msg) { // получен ответ сервера
                    $('#create').html(msg).modal('show');
                }
            });
            return false;
        });

        $(".dropdown-menu :nth-child(2)").click(function(e){  //Выбираем 2-ой пункт - Удалить
            var attr = $(this).data('locality');
            e.preventDefault();
            $.ajax({
                url: 'locality/delete.php', // адрес обработчика
                type: 'POST',
                data: {id: attr},
                success: function(msg) { // получен ответ сервера
                    console.log(msg);
                    location.reload();
                }
            });
            return false;
        });

    })
</script>
<?php include 'layout_end.php' ?>
