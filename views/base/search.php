<?php include ROOT . '/views/layouts/header.phtml'; ?>



    <div id="templatemo_main">
        <h4>Поиск контакта</h4>
        <div id="contact_form">
            <form method="post" action="">

                <label style="display: inline">Фамилия:</label> <input style="display: inline-block" type="text" name="last_name" class="required input_field" />
                <label style="display: inline; margin-left: 10px">Имя:</label> <input style="margin-left: 26px" type="text" name="first_name" class="required input_field" />

                <label style="display: inline; margin-left: 10px">Телефон:</label> <input  type="text" name="phone" class="required input_field" />



                <label style="display: inline">Отдел:</label>
                <select style="margin-left: 15px" name="department_id" id="subject" class="input_field" >
                    <option selected value="0" >Выберите должность</option>
                    <?php if (is_array($departmentList)): ?>
                        <?php foreach ($departmentList as $department): ?>
                            <option value="<?php echo $department['id']; ?>">
                                <?php echo $department['department']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>

                <label style="display: inline; margin-left: 22px">Должность:</label>
                <select style="margin-left: -2px" name="position_id" id="subject" class="input_field" >
                    <option selected value="0" >Выберите должность</option>
                    <?php if (is_array($positionList)): ?>
                        <?php foreach ($positionList as $position): ?>
                            <option value="<?php echo $position['id']; ?>">
                                <?php echo $position['position']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>

                <label style="display: inline; margin-left: 12px">Страна:</label>
                <select style="margin-left: 20px" name="country_id" id="subject" class="input_field" >
                    <option selected value="0" >Выберите страну</option>
                    <?php if (is_array($countryList)): ?>
                        <?php foreach ($countryList as $country): ?>
                            <option value="<?php echo $country['id']; ?>">
                                <?php echo $country['country']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <label style="display: inline">Город:</label>
                <select style="margin-left: 15px" name="city_id" id="subject" class="input_field" >
                    <option selected value="0" >Выберите город</option>
                    <?php if (is_array($cityList)): ?>
                        <?php foreach ($cityList as $city): ?>
                            <option value="<?php echo $city['id']; ?>">
                                <?php echo $city['city']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <label style="display: inline; margin-left: 22px">Образование:</label>
                <select style="margin-left: -11px" name="education_id" id="subject" class="input_field" >
                    <option selected value="0" >Выберите образование</option>
                    <?php if (is_array($educationList)): ?>
                        <?php foreach ($educationList as $education): ?>
                            <option value="<?php echo $education['id']; ?>">
                                <?php echo $education['education']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <label style="display: inline; margin-left: 13px">Пол:</label>
                <select style="margin-left: 36px" name="man_wuman_id" id="subject" class="input_field" >
                    <option selected value="0" >Выберите пол</option>
                    <?php if (is_array($manWumanList)): ?>
                        <?php foreach ($manWumanList as $manWuman): ?>
                            <option value="<?php echo $manWuman['id']; ?>">
                                <?php echo $manWuman['man_wuman']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <label style="display: inline">Кабинет:</label>
                <select style="margin-left: 3px" name="cabinet_id" id="subject" class="input_field" >
                    <option selected value="0" >Выберите кабинет</option>
                    <?php if (is_array($cabinetList)): ?>
                        <?php foreach ($cabinetList as $cabinet): ?>
                            <option value="<?php echo $cabinet['id']; ?>">
                                <?php echo $cabinet['cabinet']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <label style="display: inline; margin-left: 22px">Вредные привычки:</label>
                <select style="margin-left: -11px; width:165px" name="smok_id" id="subject" class="input_field" >
                    <option selected value="0" >Выберите вредные привычки</option>
                    <?php if (is_array($smokList)): ?>
                        <?php foreach ($smokList as $smok): ?>
                            <option value="<?php echo $smok['id']; ?>">
                                <?php echo $smok['smok']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <label style="display: inline; margin-left: 12px">Семейное положение:</label>
                <select style="margin-left: -11px; width:149px" name="family_id" id="subject" class="input_field" >
                    <option selected value="0" >Выберите семейное положение</option>
                    <?php if (is_array($familyList)): ?>
                        <?php foreach ($familyList as $family): ?>
                            <option value="<?php echo $family['id']; ?>">
                                <?php echo $family['family']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <br>
                <input type="submit" value="Поиск" name="submit" class="submit_btn float_l" />
            </form>

            <div class="cleaner h30"></div>
            <?php if (!empty($_POST) AND isset($search)): ?>
            <?php foreach ($search as  $s):?>
                <div class="about_box">
                    <img style="width: 150px; height: 150px" src="/template/images/photo/<?=$s['photo']?>" alt="User 01" />
                    <h4><?=$s['last_name']?>  <?=$s['first_name']?>  <?=$s['name_otches']?></h4>
                    <p class="position"><?=$s['position']?></p>
                    <p> Телефон: <?=$s['phone']?> <br>
                        E-mail: <?=$s['e_mail']?> <br>
                        Skype: <?=$s['skype']?>
                    </p>
                    <p><a href="/person/<?=$s['id']?>">Полная информация...</a> </p>
                    <div class="cleaner"></div>
                </div>
            <?php endforeach; ?>
            <?php endif ?>
        </div>
    </div> <!-- END of templatemo_main -->
<?php include ROOT . '/views/layouts/footer.phtml'; ?>