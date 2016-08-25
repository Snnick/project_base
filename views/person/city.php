
<?php include ROOT.'/views/layouts/header.phtml';?>

<div id="templatemo_main">

    <div id="content">
        <h2><?=$cityTitle['city']?></h2>
        <div class="cleaner h30"></div>
        <?php foreach ($personCity as  $city):?>
            <div class="about_box">
                <img style="width: 150px; height: 150px" src="/template/images/photo/<?=$city['photo']?>" alt="User 01" />
                <h4><?=$city['last_name']?>  <?=$city['first_name']?>  <?=$city['name_otches']?></h4>
                <p class="position"><?=$city['position']?></p>
                <p> Телефон: <?=$city['phone']?> <br>
                    E-mail: <?=$city['e_mail']?> <br>
                    Skype: <?=$city['skype']?>
                </p>
                <p><a href="/person/<?=$city['id']?>">Полная информация...</a> </p>
                <div class="cleaner"></div>
            </div>
        <?php endforeach; ?>
        <div class="pagging">
            <ul>
                <li><a href="#">Назад</a></li>
                <?=$pagination->get()?>
                <li><a href="#">Вперед</a></li>

            </ul>
        </div>
    </div>


    <div id="sidebar">
        <h3>Отделы</h3>

        <ul class="templatemo_list">
            <?php foreach ($departments as  $departmentItem):?>
                <li><a href="/department/<?=$departmentItem['id']?>"><?=$departmentItem['department']?></a></li>
            <?php endforeach; ?>
        </ul>

        <div class="cleaner h30"></div>

        <h3>Руководители отделов</h3>
        <ul class="templatemo_list">
            <?php foreach ($admDepartment as  $admDepartmentItem):?>
                <div style="margin-bottom: 20px" class="about_box">
                    <a href="/person/<?=$admDepartmentItem['id']?>"><img style="width: 50px; height: 50px" src="/template/images/photo/<?=$admDepartmentItem['photo']?>"/></a>
                    <h4><a href="/person/<?=$admDepartmentItem['id']?>"><?=$admDepartmentItem['last_name']?>  <?=$admDepartmentItem['first_name']?>  <?=$admDepartmentItem['name_otches']?></a></h4>
                    <p class="position"><?=$admDepartmentItem['department']?></p>
                    <div class="cleaner"></div>
                </div>
            <?php endforeach; ?>
        </ul>
    </div> <!-- end of sidebar -->

    <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->

<?php include ROOT.'/views/layouts/footer.phtml';?>