<?php

class CabinetController
{

    public function actionIndex()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        // Подключаем вид
        require_once(ROOT . '/views/cabinet/index.php');
        return true;
    }

    public function actionEdit()
    {

        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        // Получаем информацию о пользователе из БД

        // Заполняем переменные для полей формы
        $departmentList = Department::getDepartmentsListAdmin();
        $countryList = Department::getCountryListAdmin();
        $cityList = Department::getCityListAdmin();
        $educationList =Department::getEducationListAdmin();
        $manWumanList = Department::getManWumanListAdmin();
        $positionList = Department::getPositionListAdmin();
        $familyList = Department::getFamilyListAdmin();
        $smokList = Department::getSmokListAdmin();
        $cabinetList = Department::getCabinetListAdmin();

        // Получаем данные о конкретном человеке
        $person = Person::getPersonId($userId);

        // Флаг результата
        $result = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования
            $options['name'] = $_POST['name'];
            $options['password'] = $_POST['password'];
            $options['last_name'] = $_POST['last_name'];
            $options['first_name'] = $_POST['first_name'];
            $options['name_otches'] = $_POST['name_otches'];
            $options['dob'] = $_POST['dob'];
            $options['skype'] = $_POST['skype'];
            $options['e_mail'] = $_POST['e_mail'];
            $options['phone'] = $_POST['phone'];
            $options['address'] = $_POST['address'];
            $options['work_phone'] = $_POST['work_phone'];
            $options['inn'] = $_POST['inn'];
            $options['passport'] = $_POST['passport'];
            $options['department_id'] = $_POST['department_id'];
            $options['country_id'] = $_POST['country_id'];
            $options['city_id'] = $_POST['city_id'];
            $options['education_id'] = $_POST['education_id'];
            $options['man_wuman_id'] = $_POST['man_wuman_id'];
            $options['position_id'] = $_POST['position_id'];
            $options['family_id'] = $_POST['family_id'];
            $options['smok_id'] = $_POST['smok_id'];
            $options['cabinet_id'] = $_POST['cabinet_id'];

            // Флаг ошибок
            $errors = false;
            // Валидируем значения
            if (!User::checkName($options['name'])) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkPassword($options['password'])) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (!User::checkEmail($options['e_mail'])) {
                $errors[] = 'Неправильный email';
            }
            if ($errors == false) {
                // Если ошибок нет, сохраняет изменения профиля
                $result = User::edit($userId, $options);
                if ($result) {

                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/images/photo/{$result}.jpg");
                    }
                };
                Person::updatePhotoId($result);

            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/cabinet/edit.php');
        return true;
    }
}