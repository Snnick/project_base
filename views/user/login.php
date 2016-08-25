<?php include ROOT.'/views/layouts/header.phtml';?>
    <section>
        <div id="templatemo_main">
            <h4>Вход на сайт</h4><br/>
            <?php if (isset($statusNoConfirmed)):?>
            <p><?=$statusNoConfirmed?></p>
            <?php endif; ?>
            <div id="contact_form">

                <div>

                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div><!--sign up form-->

                        <form method="post" action="">
                            <input class="required input_field" type="email" name="e_mail" placeholder="E-mail" value="<?php echo $email; ?>"/><br/><br/>
                            <input class="required input_field" type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/><br/><br/>
                            <div style="margin-top: -15px; margin-left: 138px"><a style="color: #4A73A7" href="/user/register/">Регистрация</a></div>
                            <input class="submit_btn float_l" type="submit" name="submit" value="Вход" />
                        </form>
                        <div><!--/sign up form-->


                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </section>
    <?php include ROOT.'/views/layouts/footer.phtml';?>
