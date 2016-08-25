<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление сотрудниками</li>
                </ol>
            </div>

            <a href="/admin/person/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить сотрудника</a>
            
            <h4>Список сотрудников</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID поста</th>
                    <th >Фото</th>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Статус</th>
                    <th>Правка</th>
                    <th>Удалить</th>

                </tr>
                <?php foreach ($personList as $person): ?>
                    <tr>
                        <td><?php echo $person['id']; ?></td>
                        <td> <img style="height: 80px; width: 80px" src="/template/images/photo/<?php echo $person['photo']; ?>"></td>
                        <td><?php echo $person['last_name']; ?></td>
                        <td><?php echo $person['first_name']; ?></td>
                        <?php if ($person['status'] == 'Ждет подтверждения'): ?>
                        <td style="color: #990000"><?php echo $person['status']; ?></td>
                        <?php else: ?>
                        <td style="color: #0033cc"><?php echo $person['status']; ?></td>
                        <?php endif ?>
                        <td><a href="/admin/person/update/<?php echo $person['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/person/delete/<?php echo $person['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

