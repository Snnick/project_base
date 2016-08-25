
<?php include ROOT.'/views/layouts/header.phtml';?>

<div id="templatemo_main">
    <div id="content">
    </div>

    <div id="sidebar">
        <h3>Отделы</h3>
        <ul class="templatemo_list">
            <?php foreach ($departments as  $departmentItem):?>
                <li><a href="/department/<?=$departmentItem['id']?>"><?=$departmentItem['department']?></a></li>
            <?php endforeach; ?>
        </ul>
        <div class="cleaner h30"></div>
    </div> <!-- end of sidebar -->

    <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->

<?php include ROOT.'/views/layouts/footer.phtml';?>