<?php

class UserController
{
    const USER_ID = 2;
    const USER_STATUS_NO_REGISTRATION = 1;

    public function actionRegister()
    {

        $departmentList = Department::getDepartmentsListAdmin();
        $countryList = Department::getCountryListAdmin();
        $cityList = Department::getCityListAdmin();
        $educationList =Department::getEducationListAdmin();
        $manWumanList = Department::getManWumanListAdmin();
        $positionList = Department::getPositionListAdmin();
        $familyList = Department::getFamilyListAdmin();
        $smokList = Department::getSmokListAdmin();
        $cabinetList = Department::getCabinetListAdmin();



        // Переменные для формы
        $options = [];
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
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
            $options['user_id'] = UserController::USER_ID;
            $options['status_id'] = UserController::USER_STATUS_NO_REGISTRATION;
            // Флаг ошибок
            $errors = false;
            // Валидация полей

            if (!User::checkName($options['name'])) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkEmail($options['e_mail'])) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($options['password'])) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (User::checkLastName($options['last_name'])) {
                $errors[] = 'Введите фамилию';
            }
            if (User::checkFirstName($options['first_name'])) {
                $errors[] = 'Введите имя';
            }
            if (User::checkOtherName($options['name_otches'])) {
                $errors[] = 'Введите отчество';
            }
            if (User::checkSkype($options['skype'])) {
                $errors[] = 'Введите скайп';
            }
            if (User::checkRegPhone($options['phone'])) {
                $errors[] = 'Введите телефон';
            }
            if (!User::checkPhoto($_FILES['photo']['name'])) {
                $errors[] = 'Загрузите фото';
            }
            if (User::checkEmailExists($options['e_mail'])) {
                $errors[] = 'Такой email уже используется';
            }
            if (User::checkDepartment($options['department_id'])) {
                $errors[] = 'Введите отдел';
            }
            if (User::checkPosition($options['position_id'])) {
                $errors[] = 'Введите должность';
            }
            if (User::checkCountry($options['country_id'])) {
                $errors[] = 'Введите страну';
            }
            if (User::checkCity($options['city_id'])) {
                $errors[] = 'Введите город';
            }
            if (User::checkEducation($options['education_id'])) {
                $errors[] = 'Введите образование';
            }
            if (User::checkFamily($options['family_id'])) {
                $errors[] = 'Введите семейное положение';
            }
            if (User::checkSmok($options['smok_id'])) {
                $errors[] = 'Введите вредные привычки';
            }
            if (User::checkCabinet($options['cabinet_id'])) {
                $errors[] = 'Введите кабинет';
            }
            if (User::checkWumanMan($options['man_wuman_id'])) {
                $errors[] = 'Введите пол';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Регистрируем пользователя
                $result = User::register($options);
                if ($result) {

                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/images/photo/{$result}.jpg");
                    }
                };
                Person::updatePhotoId($result);
                $userEmail = User::userEmail($result);
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/user/register.php');
        return true;
    }


    public function actionLogin()
    {


        // Переменные для формы
        $email = false;
        $password = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $email = $_POST['e_mail'];
            $password = $_POST['password'];
            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);
            echo $userId;
            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            }elseif(User::userRole($userId)=='1') {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                // Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /admin/");}
            elseif(User::userRole($userId)=='2' AND User::userStatus($userId)=='2') {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                // Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /cabinet/");
                }
            else {
                $statusNoConfirmed = 'Ваша учетная запись еще не активированна';
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    public function actionLogout()
    {
        // Стартуем сессию
        session_start();

        // Удаляем информацию о пользователе из сессии
        unset($_SESSION["user"]);

        // Перенаправляем пользователя на главную страницу
        header("Location: /");
    }
}