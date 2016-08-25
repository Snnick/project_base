<?php include ROOT.'/views/layouts/header.phtml';?>
<section>
    <div id="templatemo_main">
        <h4>Регистрация на сайте</h4><br/>
        <div id="contact_form">

                    <?php if ($result): ?>
                        <p>Вы зарегистрированы! После активации учетной записи Вам придет уведомление на Email: <?php if (isset($userEmail)):?><?=$userEmail?><?php endif; ?></p>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
            <div class="col-lg-4">
                <div class="login-form">
                    <form action="" method="post" enctype="multipart/form-data">

                        <input style="display: inline" type="text" name="name" placeholder="Логин"  value="">

                        <input type="text" name="password" placeholder="Пароль" value="">
                        <br><br>
                        <input style="display: inline" type="text" name="last_name" placeholder="Фамилия" value="">

                        <input type="text" name="first_name" placeholder="Имя" value="">

                        <input type="text" name="name_otches" placeholder="Отчество" value="">

                        <input type="text" name="dob" placeholder="Дата рождения" value="">
                        <br><br>
                        <input type="text" name="skype" placeholder="Скайп" value="">

                        <input type="text" name="e_mail" placeholder="E-mail" value="">

                        <input type="text" name="phone" placeholder="Телефон" value="">

                        <input type="text" name="address" placeholder="Адресс" value="">
                        <br><br>
                        <p>Загрузите фото: </p>
                        <input type="file" name="photo" placeholder="Фото" value="">
                        <br><br>
                        <input type="text" name="work_phone" placeholder="Рабочий телефон" value="">

                        <input type="text" name="inn" placeholder="ИНН" value="">

                        <input type="text" name="passport" placeholder="Серия и номер паспорта" value="">
                        <br/><br/>

                        <select name="department_id">
                                    <option value = "0">Выбор отдела</option>
                            <?php if (is_array($departmentList)): ?>
                                <?php foreach ($departmentList as $department): ?>
                                    <option value="<?php echo $department['id']; ?>">
                                        <?php echo $department['department']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="position_id">
                            <option value = "0">Выбор должности</option>
                            <?php if (is_array($positionList)): ?>
                                <?php foreach ($positionList as $position): ?>
                                    <option value="<?php echo $position['id']; ?>">
                                        <?php echo $position['position']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="country_id">
                            <option value = "0">Выбор страны</option>
                            <?php if (is_array($countryList)): ?>
                                <?php foreach ($countryList as $country): ?>
                                    <option value="<?php echo $country['id']; ?>">
                                        <?php echo $country['country']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>

                        <select name="city_id">
                            <option value = "0">Выбор города</option>
                            <?php if (is_array($cityList)): ?>
                                <?php foreach ($cityList as $city): ?>
                                    <option value="<?php echo $city['id']; ?>">
                                        <?php echo $city['city']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="education_id">
                            <option value = "0">Выбор образования</option>
                            <?php if (is_array($educationList)): ?>
                                <?php foreach ($educationList as $education): ?>
                                    <option value="<?php echo $education['id']; ?>">
                                        <?php echo $education['education']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="man_wuman_id">
                            <option value = "0">Выбор пола</option>
                            <?php if (is_array($manWumanList)): ?>
                                <?php foreach ($manWumanList as $manWuman): ?>
                                    <option value="<?php echo $manWuman['id']; ?>">
                                        <?php echo $manWuman['man_wuman']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>
                        <select name="family_id">
                            <option value = "0">Выбор семейного положения</option>
                            <?php if (is_array($familyList)): ?>
                                <?php foreach ($familyList as $family): ?>
                                    <option value="<?php echo $family['id']; ?>">
                                        <?php echo $family['family']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="smok_id">
                            <option value = "0">Выбор вредных привычек</option>
                            <?php if (is_array($smokList)): ?>
                                <?php foreach ($smokList as $smok): ?>
                                    <option value="<?php echo $smok['id']; ?>">
                                        <?php echo $smok['smok']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="cabinet_id">
                            <option value = "0">Выбор кабинета</option>
                            <?php if (is_array($cabinetList)): ?>
                                <?php foreach ($cabinetList as $cabinet): ?>
                                    <option value="<?php echo $cabinet['id']; ?>">
                                        <?php echo $cabinet['cabinet']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>



                        <br/><br/>



                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                    <?php endif; ?>
                    <br/>
                    <br/>
                </div>
            </div>

    </section>
<?php include ROOT.'/views/layouts/footer.phtml';?>