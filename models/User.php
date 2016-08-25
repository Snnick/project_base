<?php

class User
{


    public static function register($options)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'INSERT INTO person '
            . '(name, password, last_name, first_name, name_otches, dob, skype, e_mail, phone, address, work_phone, inn, passport, '
            . 'department_id, country_id, city_id, education_id, man_wuman_id, position_id, family_id, smok_id, cabinet_id, user_id, status_id)'
            . 'VALUES '
            . '(:name, :password, :last_name, :first_name, :name_otches, :dob, :skype, :e_mail, :phone, :address, :work_phone, :inn, :passport, '
            . ':department_id, :country_id, :city_id, :education_id, :man_wuman_id, :position_id, :family_id, :smok_id, :cabinet_id, :user_id, :status_id)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':password', $options['password'], PDO::PARAM_STR);
        $result->bindParam(':last_name', $options['last_name'], PDO::PARAM_STR);
        $result->bindParam(':first_name', $options['first_name'], PDO::PARAM_STR);
        $result->bindParam(':name_otches', $options['name_otches'], PDO::PARAM_STR);
        $result->bindParam(':dob', $options['dob'], PDO::PARAM_STR);
        $result->bindParam(':skype', $options['skype'], PDO::PARAM_STR);
        $result->bindParam(':e_mail', $options['e_mail'], PDO::PARAM_STR);
        $result->bindParam(':phone', $options['phone'], PDO::PARAM_STR);
        $result->bindParam(':address', $options['address'], PDO::PARAM_STR);

        $result->bindParam(':work_phone', $options['work_phone'], PDO::PARAM_STR);
        $result->bindParam(':inn', $options['inn'], PDO::PARAM_STR);
        $result->bindParam(':passport', $options['passport'], PDO::PARAM_STR);
        $result->bindParam(':department_id', $options['department_id'], PDO::PARAM_INT);
        $result->bindParam(':country_id', $options['country_id'], PDO::PARAM_INT);
        $result->bindParam(':city_id', $options['city_id'], PDO::PARAM_INT);
        $result->bindParam(':education_id', $options['education_id'], PDO::PARAM_INT);
        $result->bindParam(':man_wuman_id', $options['man_wuman_id'], PDO::PARAM_INT);
        $result->bindParam(':position_id', $options['position_id'], PDO::PARAM_INT);
        $result->bindParam(':family_id', $options['family_id'], PDO::PARAM_INT);
        $result->bindParam(':smok_id', $options['smok_id'], PDO::PARAM_INT);
        $result->bindParam(':cabinet_id', $options['cabinet_id'], PDO::PARAM_INT);
        $result->bindParam(':user_id', $options['user_id'], PDO::PARAM_INT);
        $result->bindParam(':status_id', $options['status_id'], PDO::PARAM_INT);

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    public static function edit($id, $options)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = "UPDATE person
            SET
                name = :name,
                password = :password,
                last_name = :last_name,
                first_name = :first_name,
                name_otches = :name_otches,
                dob = :dob,
                skype = :skype,
                e_mail = :e_mail,
                phone = :phone,
                address = :address,
                work_phone = :work_phone,
                inn = :inn,
                passport = :passport,
                department_id = :department_id,
                country_id = :country_id,
                city_id = :city_id,
                education_id = :education_id,
                man_wuman_id = :man_wuman_id,
                position_id = :position_id,
                family_id = :family_id,
                smok_id = :smok_id,
                cabinet_id = :cabinet_id


            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':password', $options['password'], PDO::PARAM_STR);
        $result->bindParam(':last_name', $options['last_name'], PDO::PARAM_STR);
        $result->bindParam(':first_name', $options['first_name'], PDO::PARAM_STR);
        $result->bindParam(':name_otches', $options['name_otches'], PDO::PARAM_STR);
        $result->bindParam(':dob', $options['dob'], PDO::PARAM_STR);
        $result->bindParam(':skype', $options['skype'], PDO::PARAM_STR);
        $result->bindParam(':e_mail', $options['e_mail'], PDO::PARAM_STR);
        $result->bindParam(':phone', $options['phone'], PDO::PARAM_STR);
        $result->bindParam(':address', $options['address'], PDO::PARAM_STR);
        $result->bindParam(':work_phone', $options['work_phone'], PDO::PARAM_STR);
        $result->bindParam(':inn', $options['inn'], PDO::PARAM_STR);
        $result->bindParam(':passport', $options['passport'], PDO::PARAM_STR);
        $result->bindParam(':department_id', $options['department_id'], PDO::PARAM_INT);
        $result->bindParam(':country_id', $options['country_id'], PDO::PARAM_INT);
        $result->bindParam(':city_id', $options['city_id'], PDO::PARAM_INT);
        $result->bindParam(':education_id', $options['education_id'], PDO::PARAM_INT);
        $result->bindParam(':man_wuman_id', $options['man_wuman_id'], PDO::PARAM_INT);
        $result->bindParam(':position_id', $options['position_id'], PDO::PARAM_INT);
        $result->bindParam(':family_id', $options['family_id'], PDO::PARAM_INT);
        $result->bindParam(':smok_id', $options['smok_id'], PDO::PARAM_INT);
        $result->bindParam(':cabinet_id', $options['cabinet_id'], PDO::PARAM_INT);


        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    public static function checkUserData($email, $password)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM person WHERE e_mail = :e_mail AND password = :password';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':e_mail', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();
        // Обращаемся к записи
        $user = $result->fetch();
        if ($user) {
            // Если запись существует, возвращаем id пользователя
            return $user['id'];
        }
        return false;
    }

    public static function auth($userId)
    {
        // Записываем идентификатор пользователя в сессию

        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()

    {
        // Если сессия есть, вернем идентификатор пользователя

        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }

    public static function isGuest()
    {

        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    public static function checkLastName($value)
    {

        if (!empty($value)) {
            return false;
        }
        return true;
    }

    public static function checkFirstName($value)
    {

        if (!empty($value)) {
            return false;
        }
        return true;
    }

    public static function checkOtherName($value)
    {

        if (!empty($value)) {
            return false;
        }
        return true;
    }

    public static function checkSkype($value)
    {

        if (!empty($value)) {
            return false;
        }
        return true;
    }

    public static function checkRegEmail($value)
    {

        if (!empty($value)) {
            return false;
        }
        return true;
    }

    public static function checkRegPhone($value)
    {

        if (!empty($value)) {
            return false;
        }
        return true;
    }


    public static function checkPhoto($photo)
    {
        if (!empty($photo)) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }



    public static function checkDepartment($value)
    {

        if ($value > 0) {
            return false;
        }
        return true;
    }

    public static function checkPosition($value)
    {

        if ($value > 0) {
            return false;
        }
        return true;
    }

    public static function checkCountry($value)
    {

        if ($value > 0) {
            return false;
        }
        return true;
    }

    public static function checkCity($value)
    {

        if ($value > 0) {
            return false;
        }
        return true;
    }

    public static function checkEducation($value)
    {

        if ($value > 0) {
            return false;
        }
        return true;
    }

    public static function checkFamily($value)
    {

        if ($value > 0) {
            return false;
        }
        return true;
    }

    public static function checkSmok($value)
    {

        if ($value > 0) {
            return false;
        }
        return true;
    }

    public static function checkCabinet($value)
    {

        if ($value > 0) {
            return false;
        }
        return true;
    }

    public static function checkWumanMan($value)
    {

        if ($value > 0) {
            return false;
        }
        return true;
    }

    public static function checkEmailExists($email)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) FROM person WHERE e_mail = :e_mail';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':e_mail', $email, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn())
            return true;
        return false;
    }

    public static function getUserById($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM person WHERE id = :id';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

    public static function userRole($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM person WHERE id = :id';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        // Обращаемся к записи
        $user = $result->fetch();
        if ($user) {
            // Если запись существует, возвращаем role пользователя
            return $user['user_id'];
        }
        return false;
    }

    public static function userStatus($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM person WHERE id = :id';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        // Обращаемся к записи
        $user = $result->fetch();
        if ($user) {
            // Если запись существует, возвращаем role пользователя
            return $user['status_id'];
        }
        return false;
    }

    public static function userEmail($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM person WHERE id = :id';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        // Обращаемся к записи
        $user = $result->fetch();
        if ($user) {
            // Если запись существует, возвращаем role пользователя
            return $user['e_mail'];
        }
        return false;
    }


    public static function getUserCommentList($count = 7){
        $db = DB::getConnection();
        $userCommentList = array();
        $result = $db->query('SELECT c.id, u.name, count(user_id) AS user_add FROM comments AS c
                        JOIN user AS u ON u.id = c.user_id
                        GROUP BY user_id
                        ORDER BY user_add DESC
                        LIMIT '.$count);

        $i = 0;
        while($row = $result->fetch()){
            $userCommentList[$i]['id'] = $row['id'];
            $userCommentList[$i]['name'] = $row['name'];
            $userCommentList[$i]['user_add'] = $row['user_add'];
            $i++;
        }
        return $userCommentList;
    }

}