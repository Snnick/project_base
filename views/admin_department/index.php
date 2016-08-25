<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление отделами</li>
                </ol>
            </div>

            <a href="/admin/department/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить отдел</a>
            
            <h4>Список отделов</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID отдела</th>
                    <th>Название отдела</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($departmentsList as $department): ?>
                    <tr>
                        <td><?php echo $department['id']; ?></td>
                        <td><?php echo $department['department']; ?></td>
                        <td><a href="/admin/department/update/<?php echo $department['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/department/delete/<?php echo $department['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

