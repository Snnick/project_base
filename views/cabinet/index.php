<?php include ROOT.'/views/layouts/header.phtml';?>

    <section>
        <div id="templatemo_main">

            <div id="contact_form">

                <h4>Кабинет пользователя</h4>

                <h6>Добро пожаловать, <?php echo $user['last_name'];?> <?php echo $user['first_name'];?> <?php echo $user['name_otches'];?>!</h6>
                <ul>
                    <li><a href="/cabinet/edit">Редактировать данные</a></li>

                </ul>

            </div>
        </div>
    </section>

<?php include ROOT.'/views/layouts/footer.phtml';?>