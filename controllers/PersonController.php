<?php

include ROOT.'/models/Department.php';
include ROOT.'/models/Person.php';
class PersonController extends UserBase
{
    public function actionView($personId, $page = 1){

        // Проверка доступа
        self::checkUser();

        $categories = array();
        $categories = Department::getDepartmentListNoLimit();

        $person = Person::getPersonId($personId);

        // Переменные для формы
        $name = false;
        $email = false;
        $userText = false;
        $result = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $userText = $_POST['message'];
            // Флаг ошибок
            $errors = false;
            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Отправляем письмо сотруднику
                $personEmail = Person::getPersonEmail($personId);
                $message = "Текст: {$userText}. Пользователь: {$name} E-mail: {$email}";
                $subject = 'Тема письма';
                $result = mail($personEmail, $subject, $message);
                $result = true;
                header("Location: /person/".$personId);
            }
        }

        $personList = array();
        $personList = Person::getPersonAbout($personId);

        $personWork = array();
        $personWork = Person::getPersonWork($personId);


        require_once (ROOT.'/views/person/view.phtml');
        return true;
    }


    public function actionMan ($manId, $page = 1) {

        // Проверка доступа
        self::checkUser();

        $departments = array();
        $departments = Department::getDepartmentListWithLimit();

        $admDepartment = array();
        $admDepartment = Person::getAdmDepartment();

        $manOrWomanTitle = Department::getManOrWomanTitle($manId);

        $personManOrWomen = array();
        $personManOrWomen  = Person::getPersonManOrWomen($manId, $page);

        $total = Person::getTotalPersonManOrWomen($manId);

        $pagination = new Pagination($total, $page, Person::SHOW_BY_DEFAULT, 'page-');

        require_once (ROOT.'/views/person/man.php');
        return true;
    }

    public function actionCountry ($countryId, $page = 1) {

        // Проверка доступа
        self::checkUser();

        $departments = array();
        $departments = Department::getDepartmentListWithLimit();

        $admDepartment = array();
        $admDepartment = Person::getAdmDepartment();

        $countryTitle = Department::getCountryTitle($countryId);

        $personCountry = array();
        $personCountry  = Person::getPersonCountry($countryId, $page);

        $total = Person::getTotalPersonCountry($countryId);

        $pagination = new Pagination($total, $page, Person::SHOW_BY_DEFAULT, 'page-');

        require_once (ROOT.'/views/person/country.php');
        return true;
    }

    public function actionCity ($cityId, $page = 1) {

        // Проверка доступа
        self::checkUser();

        $departments = array();
        $departments = Department::getDepartmentListWithLimit();

        $admDepartment = array();
        $admDepartment = Person::getAdmDepartment();

        $cityTitle = Department::getCityTitle($cityId);

        $personCity = array();
        $personCity  = Person::getPersonCity($cityId, $page);

        $total = Person::getTotalPersonCity($cityId);

        $pagination = new Pagination($total, $page, Person::SHOW_BY_DEFAULT, 'page-');

        require_once (ROOT.'/views/person/city.php');
        return true;
    }

    public function actionEducation ($educationId, $page = 1) {

        // Проверка доступа
        self::checkUser();

        $departments = array();
        $departments = Department::getDepartmentListWithLimit();

        $admDepartment = array();
        $admDepartment = Person::getAdmDepartment();

        $educationTitle = Department::getEducationTitle($educationId);

        $personEducation = array();
        $personEducation  = Person::getPersonEducation($educationId, $page);

        $total = Person::getTotalPersonEducation($educationId);

        $pagination = new Pagination($total, $page, Person::SHOW_BY_DEFAULT, 'page-');

        require_once (ROOT.'/views/person/education.php');
        return true;
    }

    public function actionFamily ($familyId, $page = 1) {

        // Проверка доступа
        self::checkUser();

        $departments = array();
        $departments = Department::getDepartmentListWithLimit();

        $admDepartment = array();
        $admDepartment = Person::getAdmDepartment();

        $familyTitle = Department::getFamilyTitle($familyId);

        $personFamily = array();
        $personFamily  = Person::getPersonFamily($familyId, $page);

        $total = Person::getTotalPersonFamily($familyId);

        $pagination = new Pagination($total, $page, Person::SHOW_BY_DEFAULT, 'page-');

        require_once (ROOT.'/views/person/family.php');
        return true;
    }

    public function actionSmok ($smokId, $page = 1) {

        // Проверка доступа
        self::checkUser();

        $departments = array();
        $departments = Department::getDepartmentListWithLimit();

        $admDepartment = array();
        $admDepartment = Person::getAdmDepartment();

        $smokTitle = Department::getSmokTitle($smokId);

        $personSmok = array();
        $personSmok  = Person::getPersonSmok($smokId, $page);

        $total = Person::getTotalPersonSmok($smokId);

        $pagination = new Pagination($total, $page, Person::SHOW_BY_DEFAULT, 'page-');

        require_once (ROOT.'/views/person/smok.php');
        return true;
    }



}