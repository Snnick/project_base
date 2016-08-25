<?php include ROOT.'/views/layouts/header.phtml';?>

<div id="main">
    <div class="wrapper clearfix">

        <!-- posts list -->
        <div id="posts-list" class="single-post">

            <h4 class="page-heading"><span>НОВОСТИ ПО ДАТЕ</span></h4>

            <?php foreach ($postListDate as  $date):?>
                <ul>
                    <li class="cat-item"><a href="/post/<?=$date['id']?>" title="View all tag"><?=$date['name']?></a></li>

                </ul>
            <?php endforeach; ?>
        </div>
        <aside id="sidebar">

            <ul>
                <li class="block">
                    <h4>КАТЕГОРИИ</h4>
                    <?php foreach ($categories as  $categoryItem):?>
                        <ul>
                            <li class="cat-item"><a href="/category/<?=$categoryItem['id']?>" title="View all posts"><?=$categoryItem['name']?></a></li>

                        </ul>
                    <?php endforeach; ?>
                </li>
            </ul>

            <em id="corner"></em>
        </aside>
        <!-- ENDS sidebar -->

    </div>
</div>
<?php include ROOT.'/views/layouts/footer.phtml';?>
