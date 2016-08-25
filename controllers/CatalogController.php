<?php



class CatalogController extends UserBase
{


    public function actionIndex(){

        // Проверка доступа
        self::checkUser();

        $departments = array();
        $departments = Department::getDepartmentListWithLimit();

        $admDepartment = array();
        $admDepartment = Person::getAdmDepartment();

        require_once (ROOT.'/views/catalog/index.phtml');
        return true;

    }


    public function actionDepartment($departmentId, $page = 1){

        // Проверка доступа
        self::checkUser();

        $departments = array();
        $departments = Department::getDepartmentListWithLimit();

        $admDepartment = array();
        $admDepartment = Person::getAdmDepartment();

        $departmentName = Department::getDepartmentName($departmentId);

        $departmentsPerson = array();
        $departmentsPerson  = Person::getDepartment($departmentId, $page);

        $total = Person::getTotalPersonDepartment($departmentId);
        $pagination = new Pagination($total, $page, Person::SHOW_BY_DEFAULT, 'page-');
        require_once (ROOT.'/views/catalog/department.phtml');
        return true;

    }

}