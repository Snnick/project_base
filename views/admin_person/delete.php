<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/person">Управление </a></li>
                    <li class="active">Удалить сотрудника</li>
                </ol>
            </div>


            <h4>Удалить post #<?php echo $id; ?></h4>


            <p>Вы действительно хотите удалить сотрудника?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

