<?php


class AdminPersonController extends AdminBase
{


    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список постов
        $personList = Person::getPersonsList();

        // Подключаем вид
        require_once(ROOT . '/views/admin_person/index.php');
        return true;
    }


    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $departmentsList = Department::getDepartmentsListAdmin();
        $countryList = Department::getCountryListAdmin();
        $cityList = Department::getCityListAdmin();
        $educationList =Department::getEducationListAdmin();
        $manWumanList = Department::getManWumanListAdmin();
        $positionList = Department::getPositionListAdmin();
        $familyList = Department::getFamilyListAdmin();
        $smokList = Department::getSmokListAdmin();
        $cabinetList = Department::getCabinetListAdmin();
        $userList = Department::getUserListAdmin();
        $statusList = Department::getStatusListAdmin();


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
            $options['user_id'] = $_POST['user_id'];
            $options['status_id'] = $_POST['status_id'];


            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['last_name']) || empty($options['last_name'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый пост
                $id = Person::createPerson($options);
                echo $id;

                // Если запись добавлена
                if ($id) {

                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/images/photo/{$id}.jpg");
                    }
                };
                Person::updatePhotoId($id);
                // Перенаправляем пользователя на страницу управлениями постами
               header("Location: /admin/person");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_person/create.php');
        return true;
    }


    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $departmentList = Department::getDepartmentsListAdmin();
        $countryList = Department::getCountryListAdmin();
        $cityList = Department::getCityListAdmin();
        $educationList =Department::getEducationListAdmin();
        $manWumanList = Department::getManWumanListAdmin();
        $positionList = Department::getPositionListAdmin();
        $familyList = Department::getFamilyListAdmin();
        $smokList = Department::getSmokListAdmin();
        $cabinetList = Department::getCabinetListAdmin();
        $userList = Department::getUserListAdmin();
        $statusList = Department::getStatusListAdmin();

        // Получаем данные
        $person = Person::getPersonId($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
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
            $options['user_id'] = $_POST['user_id'];
            $options['status_id'] = $_POST['status_id'];

            // Сохраняем изменения

            if (Person::updatePersonById($id, $options)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                   move_uploaded_file($_FILES["photo"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/images/photo/{$id}.jpg");
                }
            }

            // Перенаправляем пользователя на страницу управлениями постами
            header("Location: /admin/person");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_person/update.php');
        return true;
    }


    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем пост
            Person::deletePersonById($id);

            // Перенаправляем пользователя на страницу управлениями постами
            header("Location: /admin/person");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_person/delete.php');
        return true;
    }

}
