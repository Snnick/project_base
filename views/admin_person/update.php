<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/person">Управление сотрудниками</a></li>
                    <li class="active">Редактировать сотрудника</li>
                </ol>
            </div>


            <h4>Редактировать сотрудника #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="" method="post" enctype="multipart/form-data">

                        <p>Логин</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $person['name']; ?>">

                        <p>Пароль</p>
                        <input type="text" name="password" placeholder="" value="<?php echo $person['password']; ?>">

                        <p>Фамилия</p>
                        <input type="text" name="last_name" placeholder="" value="<?php echo $person['last_name']; ?>">

                        <p>Имя</p>
                        <input type="text" name="first_name" placeholder="" value="<?php echo $person['first_name']; ?>">

                        <p>Отчество</p>
                        <input type="text" name="name_otches" placeholder="" value="<?php echo $person['name_otches']; ?>">

                        <p>Фото сотрудника</p>
                        <img src="<?php echo Person::getImage($person['id']); ?>" width="200" alt="" />
                        <input type="file" name="photo" placeholder="" value="<?php echo $person['photo']; ?>">

                        <p>Год рождения</p>
                        <input type="text" name="dob" placeholder="" value="<?php echo $person['dob']; ?>">

                        <p>Skype</p>
                        <input type="text" name="skype" placeholder="" value="<?php echo $person['skype']; ?>">


                        <p>E-mail</p>
                        <input type="text" name="e_mail" placeholder="" value="<?php echo $person['e_mail']; ?>">

                        <p>Телефон</p>
                        <input type="text" name="phone" placeholder="" value="<?php echo $person['phone']; ?>">

                        <p>Адрес</p>
                        <input type="text" name="address" placeholder="" value="<?php echo $person['address']; ?>">

                        <p>Рабочий телефон</p>
                        <input type="text" name="work_phone" placeholder="" value="<?php echo $person['work_phone']; ?>">

                        <p>ИНН</p>
                        <input type="text" name="inn" placeholder="" value="<?php echo $person['inn']; ?>">

                        <p>Паспорт</p>
                        <input type="text" name="passport" placeholder="" value="<?php echo $person['passport']; ?>">



                        <p>Отдел</p>
                        <select name="department_id">
                            <?php if (is_array($departmentList)): ?>
                                <?php foreach ($departmentList as $department): ?>
                                    <option value="<?php echo $department['id']; ?>"
                                        <?php if ($person['department_id'] == $department['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $department['department']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="position_id">
                            <?php if (is_array($positionList)): ?>
                                <?php foreach ($positionList as $position): ?>
                                    <option value="<?php echo $position['id']; ?>"
                                        <?php if ($person['position_id'] == $position['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $position['position']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="country_id">
                            <?php if (is_array($countryList)): ?>
                                <?php foreach ($countryList as $country): ?>
                                    <option value="<?php echo $country['id']; ?>"
                                        <?php if ($person['country_id'] == $country['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $country['country']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="city_id">
                            <?php if (is_array($cityList)): ?>
                                <?php foreach ($cityList as $city): ?>
                                    <option value="<?php echo $city['id']; ?>"
                                        <?php if ($person['city_id'] == $city['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $city['city']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="education_id">
                            <?php if (is_array($educationList)): ?>
                                <?php foreach ($educationList as $education): ?>
                                    <option value="<?php echo $education['id']; ?>"
                                        <?php if ($person['education_id'] == $education['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $education['education']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="man_wuman_id">
                            <?php if (is_array($manWumanList)): ?>
                                <?php foreach ($manWumanList as $manWuman): ?>
                                    <option value="<?php echo $manWuman['id']; ?>"
                                        <?php if ($person['man_wuman_id'] == $manWuman['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $manWuman['man_wuman']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>
                        <select name="family_id">
                            <?php if (is_array($familyList)): ?>
                                <?php foreach ($familyList as $family): ?>
                                    <option value="<?php echo $family['id']; ?>"
                                        <?php if ($person['family_id'] == $family['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $family['family']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="smok_id">
                            <?php if (is_array($smokList)): ?>
                                <?php foreach ($smokList as $smok): ?>
                                    <option value="<?php echo $smok['id']; ?>"
                                        <?php if ($person['smok_id'] == $smok['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $smok['smok']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="cabinet_id">
                            <?php if (is_array($cabinetList)): ?>
                                <?php foreach ($cabinetList as $cabinet): ?>
                                    <option value="<?php echo $cabinet['id']; ?>"
                                        <?php if ($person['cabinet_id'] == $cabinet['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $cabinet['cabinet']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="user_id">
                            <?php if (is_array($userList)): ?>
                                <?php foreach ($userList as $user): ?>
                                    <option value="<?php echo $user['id']; ?>"
                                        <?php if ($person['user_id'] == $user['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $user['role']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
                        <select name="status_id">
                            <?php if (is_array($statusList)): ?>
                                <?php foreach ($statusList as $status): ?>
                                    <option value="<?php echo $status['id']; ?>"
                                        <?php if ($person['status_id'] == $status['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $status['status']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/><br/>
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

