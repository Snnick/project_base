<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/person/">Управление сотрудниками</a></li>
                    <li class="active">Редактировать сотрудника</li>
                </ol>
            </div>


            <h4>Добавить нового сотрудника</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p >Логин</p>
                        <input style="display: inline" type="text" name="name" placeholder="" value="">
                        <p>Пароль</p>
                        <input type="text" name="password" placeholder="" value="">
                        <p >Фамилия</p>
                        <input style="display: inline" type="text" name="last_name" placeholder="" value="">
                        <p>Имя</p>
                        <input type="text" name="first_name" placeholder="" value="">
                        <p>Отчество</p>
                        <input type="text" name="name_otches" placeholder="" value="">
                        <p>Дата рождения</p>
                        <input type="text" name="dob" placeholder="" value="">
                        <p>Скайп</p>
                        <input type="text" name="skype" placeholder="" value="">
                        <p>E-mail</p>
                        <input type="text" name="e_mail" placeholder="" value="">
                        <p>Телефон</p>
                        <input type="text" name="phone" placeholder="" value="">
                        <p>Адресс</p>
                        <input type="text" name="address" placeholder="" value="">
                        <p>Фото</p>
                        <input type="file" name="photo" placeholder="" value="">
                        <p>Рабочий телефон</p>
                        <input type="text" name="work_phone" placeholder="" value="">
                        <p>ИНН</p>
                        <input type="text" name="inn" placeholder="" value="">
                        <p>Серия и номер паспорта</p>
                        <input type="text" name="passport" placeholder="" value="">

                        <p>Отдел</p>
                        <select name="department_id">
                            <?php if (is_array($departmentsList)): ?>
                                <?php foreach ($departmentsList as $department): ?>
                                    <option value="<?php echo $department['id']; ?>">
                                        <?php echo $department['department']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="position_id">
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
                            <?php if (is_array($cabinetList)): ?>
                                <?php foreach ($cabinetList as $cabinet): ?>
                                    <option value="<?php echo $cabinet['id']; ?>">
                                        <?php echo $cabinet['cabinet']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="user_id">
                            <?php if (is_array($userList)): ?>
                                <?php foreach ($userList as $user): ?>
                                    <option value="<?php echo $user['id']; ?>">
                                        <?php echo $user['role']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="status_id">
                            <?php if (is_array($statusList)): ?>
                                <?php foreach ($statusList as $status): ?>
                                    <option value="<?php echo $status['id']; ?>">
                                        <?php echo $status['status']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>


                        <br/><br/>



                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

