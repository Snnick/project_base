<?php


class Department
{

    public static function getDepartmentsListAdmin()
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, department FROM department');

        // Получение и возврат результатов
        $departmentList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $departmentList[$i]['id'] = $row['id'];
            $departmentList[$i]['department'] = $row['department'];
            $i++;
        }
        return $departmentList;
    }

    public static function getCountryListAdmin()
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, country FROM country');

        // Получение и возврат результатов
        $countryList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $countryList[$i]['id'] = $row['id'];
            $countryList[$i]['country'] = $row['country'];
            $i++;
        }
        return $countryList;
    }

    public static function getCityListAdmin()
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, city FROM city');

        // Получение и возврат результатов
        $cityList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $cityList[$i]['id'] = $row['id'];
            $cityList[$i]['city'] = $row['city'];
            $i++;
        }
        return $cityList;
    }

    public static function getEducationListAdmin()
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, education FROM education');

        // Получение и возврат результатов
        $educationList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $educationList[$i]['id'] = $row['id'];
            $educationList[$i]['education'] = $row['education'];
            $i++;
        }
        return $educationList;
    }

    public static function getManWumanListAdmin()
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, man_wuman FROM man_wuman');

        // Получение и возврат результатов
        $manWumanList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $manWumanList[$i]['id'] = $row['id'];
            $manWumanList[$i]['man_wuman'] = $row['man_wuman'];
            $i++;
        }
        return $manWumanList;
    }

    public static function getPositionListAdmin()
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, position FROM position');

        // Получение и возврат результатов
        $positionList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $positionList[$i]['id'] = $row['id'];
            $positionList[$i]['position'] = $row['position'];
            $i++;
        }
        return $positionList;
    }

    public static function getFamilyListAdmin()
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, family FROM family');

        // Получение и возврат результатов
        $familyList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $familyList[$i]['id'] = $row['id'];
            $familyList[$i]['family'] = $row['family'];
            $i++;
        }
        return $familyList;
    }

    public static function getSmokListAdmin()
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, smok FROM smok');

        // Получение и возврат результатов
        $smokList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $smokList[$i]['id'] = $row['id'];
            $smokList[$i]['smok'] = $row['smok'];
            $i++;
        }
        return $smokList;
    }

    public static function getCabinetListAdmin()
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, cabinet FROM cabinet');

        // Получение и возврат результатов
        $cabinetList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $cabinetList[$i]['id'] = $row['id'];
            $cabinetList[$i]['cabinet'] = $row['cabinet'];
            $i++;
        }
        return $cabinetList;
    }

    public static function getUserListAdmin()
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, `role` FROM `user`');

        // Получение и возврат результатов
        $userList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $userList[$i]['id'] = $row['id'];
            $userList[$i]['role'] = $row['role'];
            $i++;
        }
        return $userList;
    }
    public static function getStatusListAdmin()
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Запрос к БД
        $result = $db->query('SELECT id, `status` FROM `status`');

        // Получение и возврат результатов
        $statusList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $statusList[$i]['id'] = $row['id'];
            $statusList[$i]['status'] = $row['status'];
            $i++;
        }
        return $statusList;
    }



    public static function deleteDepartmentById($id)
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM department WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }


    public static function updateDepartmentById($id, $department)
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE department
            SET
                department = :department
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':department', $department, PDO::PARAM_STR);
        return $result->execute();
    }


    public static function getDepartmentById($id)
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM department WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }


    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }


    public static function createDepartment($name)
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO department (department) '
            . 'VALUES (:department)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':department', $name, PDO::PARAM_STR);
        return $result->execute();
    }


    public static function getManOrWomanTitle ($id){
        $id = intval($id);

        if($id) {
            $db = DB::getConnection();
            $result = $db->query('SELECT * FROM `man_wuman` WHERE id=' .$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }

    }
    public static function getCountryTitle ($id){
        $id = intval($id);

        if($id) {
            $db = DB::getConnection();
            $result = $db->query('SELECT * FROM `country` WHERE id=' .$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }

    }

    public static function getCityTitle ($id){
        $id = intval($id);

        if($id) {
            $db = DB::getConnection();
            $result = $db->query('SELECT * FROM `city` WHERE id=' .$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }

    }

    public static function getEducationTitle ($id){
        $id = intval($id);

        if($id) {
            $db = DB::getConnection();
            $result = $db->query('SELECT * FROM `education` WHERE id=' .$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }

    }

    public static function getFamilyTitle ($id){
        $id = intval($id);

        if($id) {
            $db = DB::getConnection();
            $result = $db->query('SELECT * FROM `family` WHERE id=' .$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }

    }

    public static function getSmokTitle ($id){
        $id = intval($id);

        if($id) {
            $db = DB::getConnection();
            $result = $db->query('SELECT * FROM `smok` WHERE id=' .$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }

    }


    public static function getDepartmentName ($id){
        $id = intval($id);

        if($id) {
            $db = DB::getConnection();
            $result = $db->query('SELECT `department` FROM `department` WHERE id=' .$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }

    }

    public static function getDepartmentListNoLimit(){
        $db = DB::getConnection();
        $departmentList = array();
        $result = $db->query('SELECT * FROM `department`');

        $i = 0;
        while($row = $result->fetch()){
            $departmentList[$i]['id'] = $row['id'];
            $departmentList[$i]['department'] = $row['department'];
            $i++;
        }
        return $departmentList;


    }

    public static function getDepartmentListWithLimit(){
        $db = DB::getConnection();
        $departmentList = array();
        $result = $db->query('SELECT * FROM `department` WHERE id < 9');

        $i = 0;
        while($row = $result->fetch()){
            $departmentList[$i]['id'] = $row['id'];
            $departmentList[$i]['department'] = $row['department'];
            $i++;
        }
        return $departmentList;


    }

}