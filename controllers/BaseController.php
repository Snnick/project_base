<?php


class BaseController extends UserBase
{

    public function actionIndex(){
        // Проверка доступа
        self::checkUser();

        $departments = array();
        $departments = Department::getDepartmentListWithLimit();

        $administration = array();
        $administration = Person::getAdministration();

        require_once (ROOT.'/views/base/index.phtml');
        return true;

    }


    public function actionContact()
    {
        // Проверка доступа
        self::checkUser();

        $departments = array();
        $departments = Department::getDepartmentListWithLimit();
        // Подключаем вид
        require_once(ROOT . '/views/base/contact.php');
        return true;
    }


    public function actionAbout()
    {

        // Проверка доступа
        self::checkUser();

        $departments = array();
        $departments = Department::getDepartmentListWithLimit();


        // Подключаем вид
        require_once(ROOT . '/views/base/about.php');
        return true;
    }

    public function actionSearch()
    {
        // Проверка доступа
        self::checkUser();

        $departmentList = Department::getDepartmentsListAdmin();
        $countryList = Department::getCountryListAdmin();
        $cityList = Department::getCityListAdmin();
        $educationList =Department::getEducationListAdmin();
        $manWumanList = Department::getManWumanListAdmin();
        $positionList = Department::getPositionListAdmin();
        $familyList = Department::getFamilyListAdmin();
        $smokList = Department::getSmokListAdmin();
        $cabinetList = Department::getCabinetListAdmin();

        //получаем данные через $_POST
        //var_dump(Person::getSearchAll());
            if (!empty($_POST) AND isset($_POST['submit'])) {
                $search = array();
                $search = Person::getSearchAll();
            }

        // Подключаем вид
        require_once(ROOT . '/views/base/search.php');
        return true;
    }



}