<?php


class Person
{
    const SHOW_BY_DEFAULT = 4;
    const PAGE_COMMENT = 3;


    public static function deletePersonById($id)
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM person WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }


    public static function getPersonsList()
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT p.id, photo, last_name, first_name, status FROM person AS p
                            JOIN status AS s ON p.status_id = s.id
                            ORDER BY p.id ASC');
        $postsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $postsList[$i]['id'] = $row['id'];
            $postsList[$i]['photo'] = $row['photo'];
            $postsList[$i]['last_name'] = $row['last_name'];
            $postsList[$i]['first_name'] = $row['first_name'];
            $postsList[$i]['status'] = $row['status'];
            $i++;
        }
        return $postsList;
    }


    public static function updatePersonById($id, $options)
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
                cabinet_id = :cabinet_id,
                user_id = :user_id,
                status_id = :status_id

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
        $result->bindParam(':user_id', $options['user_id'], PDO::PARAM_INT);
        $result->bindParam(':status_id', $options['status_id'], PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updatePhotoId($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        $result = $db->query("UPDATE person SET photo = ". "\"$id.jpg\" "
            . 'WHERE id ="'.$id.'"');
        $result->fetch();
    }



    public static function createPerson($options)
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


    public static function getAvailabilityText($availability)
    {
        switch ($availability) {
            case '1':
                return 'Есть';
                break;
            case '0':
                return 'Нет';
                break;
        }
    }


    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с post
        $path = '/template/images/photo/';

        // Путь к изображению post
        $pathToPostImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToPostImage)) {
            // Если изображение для post существует
            // Возвращаем путь изображения post
            return $pathToPostImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }


    public static function getSearchAll()
    {
        // Соединение с БД

        $options['last_name'] = $_POST['last_name'];
        $options['first_name'] = $_POST['first_name'];
        $options['phone'] = $_POST['phone'];
        $options['department_id'] = $_POST['department_id'];
        $options['country_id'] = $_POST['country_id'];
        $options['city_id'] = $_POST['city_id'];
        $options['education_id'] = $_POST['education_id'];
        $options['man_wuman_id'] = $_POST['man_wuman_id'];
        $options['position_id'] = $_POST['position_id'];
        $options['family_id'] = $_POST['family_id'];
        $options['smok_id'] = $_POST['smok_id'];
        $options['cabinet_id'] = $_POST['cabinet_id'];

        $db = DB::getConnection();

        // Текст запроса к БД
        $sql = "SELECT * FROM person AS p
            JOIN department AS d ON p.department_id = d.id
            JOIN position AS po ON p.position_id = po.id

            WHERE
                (:last_name = '' OR last_name = :last_name) AND
                (:first_name = '' OR first_name = :first_name) AND
                (:phone = '' OR phone = :phone) AND
                (:department_id = 0 OR department_id = :department_id) AND
                (:country_id = 0 OR country_id = :country_id) AND
                (:city_id = 0 OR city_id = :city_id) AND
                (:education_id = 0 OR education_id = :education_id) AND
                (:man_wuman_id = 0 OR man_wuman_id = :man_wuman_id) AND
                (:position_id = 0 OR position_id = :position_id) AND
                (:family_id = 0 OR family_id = :family_id) AND
                (:smok_id = 0 OR smok_id = :smok_id) AND
                (:cabinet_id = 0 OR cabinet_id = :cabinet_id)
            ORDER BY rang ASC
            ";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->execute([':last_name' => $options['last_name'],
                        ':first_name' => $options['first_name'],
                        ':phone' => $options['phone'],
                        ':department_id' => $options['department_id'],
                        ':country_id' => $options['country_id'],
                        ':city_id' => $options['city_id'],
                        ':education_id' => $options['education_id'],
                        ':man_wuman_id' => $options['man_wuman_id'],
                        ':position_id' => $options['position_id'],
                        ':family_id' => $options['family_id'],
                        ':smok_id' => $options['smok_id'],
                        ':cabinet_id' => $options['cabinet_id']]);

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }




    public static function getDepartment($departmentId = false, $page = 1){

        if ($departmentId){
            $page = intval($page);
            $offset =($page - 1)*self::SHOW_BY_DEFAULT;

            $db = DB::getConnection();
            $person = array();
            $result = $db->query('SELECT rang, department_id, skype, phone, person.id, dob, last_name, first_name, photo, name_otches, e_mail, position FROM `person`
                                  JOIN position ON person.position_id = position.id '
                . "WHERE department_id = '{$departmentId}' "
                . 'ORDER BY rang ASC '
                . 'LIMIT '.self::SHOW_BY_DEFAULT
                . ' OFFSET '. $offset);
            $i = 0;
            while ($row = $result->fetch()){
                $person[$i]['id'] = $row['id'];
                $person[$i]['last_name'] = $row['last_name'];
                $person[$i]['first_name'] = $row['first_name'];
                $person[$i]['name_otches'] = $row['name_otches'];
                $person[$i]['dob'] = $row['dob'];
                $person[$i]['phone'] = $row['phone'];
                $person[$i]['photo'] = $row['photo'];
                $person[$i]['e_mail'] = $row['e_mail'];
                $person[$i]['position'] = $row['position'];
                $person[$i]['skype'] = $row['skype'];
                $person[$i]['rang'] = $row['rang'];
                $i++;
            }

            return $person;


        }

    }

    public static function getPersonId ($id){
        $id = intval($id);

        if($id) {
            $db = DB::getConnection();
            $result = $db->query('SELECT * FROM `person` WHERE id=' .$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }

    }

    public static function getTotalPersonDepartment($departmentId)
    {

        $db = DB::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM person '
            . 'WHERE department_id ="'.$departmentId.'"');

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $row = $result->fetch();
        return $row['count'];
    }

    public static function getAdministration(){

        $db = DB::getConnection();
        $person = array();
        $result = $db->query('SELECT rang, department_id, skype, phone, p.id, dob, last_name, first_name, photo, name_otches, e_mail, pos.position FROM person AS p
                            JOIN department AS d ON p.department_id = d.id
                            JOIN position AS pos ON p.position_id = pos.id
                            WHERE d.id = 9
                            ORDER BY rang ASC'
        );
        $i = 0;
        while ($row = $result->fetch()){
            $person[$i]['id'] = $row['id'];
            $person[$i]['last_name'] = $row['last_name'];
            $person[$i]['first_name'] = $row['first_name'];
            $person[$i]['name_otches'] = $row['name_otches'];
            $person[$i]['dob'] = $row['dob'];
            $person[$i]['phone'] = $row['phone'];
            $person[$i]['photo'] = $row['photo'];
            $person[$i]['e_mail'] = $row['e_mail'];
            $person[$i]['position'] = $row['position'];
            $person[$i]['skype'] = $row['skype'];
            $person[$i]['rang'] = $row['rang'];
            $i++;
        }

        return $person;


    }

    public static function getAdmDepartment(){

        $db = DB::getConnection();
        $person = array();
        $result = $db->query('SELECT p.photo, p.id, last_name, first_name, photo, name_otches, d.department FROM person AS p
                            JOIN department AS d ON p.department_id = d.id
                            JOIN position AS pos ON p.position_id = pos.id
                            WHERE pos.id = 9
                            ORDER BY d.id ASC'
        );
        $i = 0;
        while ($row = $result->fetch()){
            $person[$i]['id'] = $row['id'];
            $person[$i]['last_name'] = $row['last_name'];
            $person[$i]['first_name'] = $row['first_name'];
            $person[$i]['name_otches'] = $row['name_otches'];
            $person[$i]['department'] = $row['department'];
            $person[$i]['photo'] = $row['photo'];
            $i++;
        }

        return $person;


    }

    public static function getPersonAbout($id){

        $db = DB::getConnection();
        $person = array();
        $result = $db->query('SELECT p.id, last_name, first_name, name_otches, photo, dob, address, phone, e_mail, s.id AS s_id, f.id AS f_id, e.id AS e_id, skype, ci.id AS ci_id, c.id AS c_id, mw.id AS mw_id, man_wuman, family, country, city, education, smok FROM person AS p
                            JOIN man_wuman AS mw ON p.man_wuman_id = mw.id
                            JOIN family AS f ON p.family_id = f.id
                            JOIN country AS c ON p.country_id = c.id
                            JOIN city AS ci ON p.city_id = ci.id
                            JOIN education AS e ON p.education_id = e.id
                            JOIN smok AS s ON p.smok_id = s.id
                            WHERE p.id = '.$id
        );
        $i = 0;
        while ($row = $result->fetch()){
            $person[$i]['id'] = $row['id'];
            $person[$i]['last_name'] = $row['last_name'];
            $person[$i]['first_name'] = $row['first_name'];
            $person[$i]['name_otches'] = $row['name_otches'];
            $person[$i]['dob'] = $row['dob'];
            $person[$i]['phone'] = $row['phone'];
            $person[$i]['photo'] = $row['photo'];
            $person[$i]['e_mail'] = $row['e_mail'];
            $person[$i]['skype'] = $row['skype'];
            $person[$i]['man_wuman'] = $row['man_wuman'];
            $person[$i]['family'] = $row['family'];
            $person[$i]['country'] = $row['country'];
            $person[$i]['city'] = $row['city'];
            $person[$i]['education'] = $row['education'];
            $person[$i]['smok'] = $row['smok'];
            $person[$i]['address'] = $row['address'];
            $person[$i]['mw_id'] = $row['mw_id'];
            $person[$i]['c_id'] = $row['c_id'];
            $person[$i]['ci_id'] = $row['ci_id'];
            $person[$i]['e_id'] = $row['e_id'];
            $person[$i]['f_id'] = $row['f_id'];
            $person[$i]['s_id'] = $row['s_id'];
            $i++;
        }

        return $person;


    }

    public static function getPersonWork($id){

        $db = DB::getConnection();
        $person = array();
        $result = $db->query('SELECT p.id, last_name, first_name, name_otches, photo, `department`, `position`, work_phone, inn, passport, cabinet FROM person AS p
                            JOIN department AS d ON p.department_id = d.id
                            JOIN position AS po ON p.position_id = po.id
                            JOIN cabinet AS c ON p.cabinet_id = c.id
                            WHERE p.id = '.$id
        );
        $i = 0;
        while ($row = $result->fetch()){
            $person[$i]['id'] = $row['id'];
            $person[$i]['last_name'] = $row['last_name'];
            $person[$i]['first_name'] = $row['first_name'];
            $person[$i]['name_otches'] = $row['name_otches'];
            $person[$i]['photo'] = $row['photo'];
            $person[$i]['department'] = $row['department'];
            $person[$i]['position'] = $row['position'];
            $person[$i]['work_phone'] = $row['work_phone'];
            $person[$i]['inn'] = $row['inn'];
            $person[$i]['passport'] = $row['passport'];
            $person[$i]['cabinet'] = $row['cabinet'];

            $i++;
        }

        return $person;


    }



    public static function getTotalPersonManOrWomen($id)
    {

        $db = DB::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM person '
            . 'WHERE man_wuman_id ="'.$id.'"');

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getPersonManOrWomen($id = false, $page = 1){

        if ($id) {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = DB::getConnection();
            $person = array();
            $result = $db->query('SELECT p.id, rang, phone, e_mail, skype, last_name, first_name, name_otches, photo, man_wuman_id, `department`, `position` FROM person AS p
                            JOIN department AS d ON p.department_id = d.id
                            JOIN position AS po ON p.position_id = po.id
                            WHERE man_wuman_id = ' . $id
                . ' ORDER BY rang ASC '
                . ' LIMIT '.self::SHOW_BY_DEFAULT
                . ' OFFSET '. $offset
            );
            $i = 0;
            while ($row = $result->fetch()) {
                $person[$i]['id'] = $row['id'];
                $person[$i]['last_name'] = $row['last_name'];
                $person[$i]['first_name'] = $row['first_name'];
                $person[$i]['name_otches'] = $row['name_otches'];
                $person[$i]['photo'] = $row['photo'];
                $person[$i]['department'] = $row['department'];
                $person[$i]['position'] = $row['position'];
                $person[$i]['man_wuman_id'] = $row['man_wuman_id'];
                $person[$i]['phone'] = $row['phone'];
                $person[$i]['e_mail'] = $row['e_mail'];
                $person[$i]['skype'] = $row['skype'];
                $person[$i]['rang'] = $row['rang'];
                $i++;
            }

            return $person;


        }
    }

    public static function getTotalPersonCountry($id)
    {

        $db = DB::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM person '
            . 'WHERE country_id ="'.$id.'"');

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getPersonCountry ($id = false, $page = 1){

        if ($id) {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = DB::getConnection();
            $person = array();
            $result = $db->query('SELECT p.id, rang, phone, e_mail, skype, last_name, first_name, name_otches, photo, country_id, `department`, `position` FROM person AS p
                            JOIN department AS d ON p.department_id = d.id
                            JOIN position AS po ON p.position_id = po.id
                            WHERE country_id = ' . $id
                . ' ORDER BY rang ASC '
                . ' LIMIT '.self::SHOW_BY_DEFAULT
                . ' OFFSET '. $offset
            );
            $i = 0;
            while ($row = $result->fetch()) {
                $person[$i]['id'] = $row['id'];
                $person[$i]['last_name'] = $row['last_name'];
                $person[$i]['first_name'] = $row['first_name'];
                $person[$i]['name_otches'] = $row['name_otches'];
                $person[$i]['photo'] = $row['photo'];
                $person[$i]['department'] = $row['department'];
                $person[$i]['position'] = $row['position'];
                $person[$i]['country_id'] = $row['country_id'];
                $person[$i]['phone'] = $row['phone'];
                $person[$i]['e_mail'] = $row['e_mail'];
                $person[$i]['skype'] = $row['skype'];
                $person[$i]['rang'] = $row['rang'];
                $i++;
            }

            return $person;


        }
    }

    public static function getTotalPersonCity($id)
    {

        $db = DB::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM person '
            . 'WHERE city_id ="'.$id.'"');

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getPersonCity ($id = false, $page = 1){

        if ($id) {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = DB::getConnection();
            $person = array();
            $result = $db->query('SELECT p.id, rang, phone, e_mail, skype, last_name, first_name, name_otches, photo, city_id, `department`, `position` FROM person AS p
                            JOIN department AS d ON p.department_id = d.id
                            JOIN position AS po ON p.position_id = po.id
                            WHERE city_id = ' . $id
                . ' ORDER BY rang ASC '
                . ' LIMIT '.self::SHOW_BY_DEFAULT
                . ' OFFSET '. $offset
            );
            $i = 0;
            while ($row = $result->fetch()) {
                $person[$i]['id'] = $row['id'];
                $person[$i]['last_name'] = $row['last_name'];
                $person[$i]['first_name'] = $row['first_name'];
                $person[$i]['name_otches'] = $row['name_otches'];
                $person[$i]['photo'] = $row['photo'];
                $person[$i]['department'] = $row['department'];
                $person[$i]['position'] = $row['position'];
                $person[$i]['city_id'] = $row['city_id'];
                $person[$i]['phone'] = $row['phone'];
                $person[$i]['e_mail'] = $row['e_mail'];
                $person[$i]['skype'] = $row['skype'];
                $person[$i]['rang'] = $row['rang'];
                $i++;
            }

            return $person;


        }
    }

    public static function getTotalPersonEducation($id)
    {

        $db = DB::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM person '
            . 'WHERE education_id ="'.$id.'"');

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getPersonEducation ($id = false, $page = 1){

        if ($id) {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = DB::getConnection();
            $person = array();
            $result = $db->query('SELECT p.id, rang, phone, e_mail, skype, last_name, first_name, name_otches, photo, education_id, `department`, `position` FROM person AS p
                            JOIN department AS d ON p.department_id = d.id
                            JOIN position AS po ON p.position_id = po.id
                            WHERE education_id = ' . $id
                . ' ORDER BY rang ASC '
                . ' LIMIT '.self::SHOW_BY_DEFAULT
                . ' OFFSET '. $offset
            );
            $i = 0;
            while ($row = $result->fetch()) {
                $person[$i]['id'] = $row['id'];
                $person[$i]['last_name'] = $row['last_name'];
                $person[$i]['first_name'] = $row['first_name'];
                $person[$i]['name_otches'] = $row['name_otches'];
                $person[$i]['photo'] = $row['photo'];
                $person[$i]['department'] = $row['department'];
                $person[$i]['position'] = $row['position'];
                $person[$i]['education_id'] = $row['education_id'];
                $person[$i]['phone'] = $row['phone'];
                $person[$i]['e_mail'] = $row['e_mail'];
                $person[$i]['skype'] = $row['skype'];
                $person[$i]['rang'] = $row['rang'];
                $i++;
            }

            return $person;


        }
    }

    public static function getTotalPersonFamily($id)
    {

        $db = DB::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM person '
            . 'WHERE family_id ="'.$id.'"');

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getPersonFamily ($id = false, $page = 1){

        if ($id) {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = DB::getConnection();
            $person = array();
            $result = $db->query('SELECT p.id, rang, phone, e_mail, skype, last_name, first_name, name_otches, photo, family_id, `department`, `position` FROM person AS p
                            JOIN department AS d ON p.department_id = d.id
                            JOIN position AS po ON p.position_id = po.id
                            WHERE family_id = ' . $id
                . ' ORDER BY rang ASC '
                . ' LIMIT '.self::SHOW_BY_DEFAULT
                . ' OFFSET '. $offset
            );
            $i = 0;
            while ($row = $result->fetch()) {
                $person[$i]['id'] = $row['id'];
                $person[$i]['last_name'] = $row['last_name'];
                $person[$i]['first_name'] = $row['first_name'];
                $person[$i]['name_otches'] = $row['name_otches'];
                $person[$i]['photo'] = $row['photo'];
                $person[$i]['department'] = $row['department'];
                $person[$i]['position'] = $row['position'];
                $person[$i]['family_id'] = $row['family_id'];
                $person[$i]['phone'] = $row['phone'];
                $person[$i]['e_mail'] = $row['e_mail'];
                $person[$i]['skype'] = $row['skype'];
                $person[$i]['rang'] = $row['rang'];
                $i++;
            }

            return $person;


        }
    }

    public static function getTotalPersonSmok($id)
    {

        $db = DB::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM person '
            . 'WHERE smok_id ="'.$id.'"');

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getPersonSmok ($id = false, $page = 1){

        if ($id) {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = DB::getConnection();
            $person = array();
            $result = $db->query('SELECT p.id, rang, phone, e_mail, skype, last_name, first_name, name_otches, photo, smok_id, `department`, `position` FROM person AS p
                            JOIN department AS d ON p.department_id = d.id
                            JOIN position AS po ON p.position_id = po.id
                            WHERE smok_id = ' . $id
                . ' ORDER BY rang ASC '
                . ' LIMIT '.self::SHOW_BY_DEFAULT
                . ' OFFSET '. $offset
            );
            $i = 0;
            while ($row = $result->fetch()) {
                $person[$i]['id'] = $row['id'];
                $person[$i]['last_name'] = $row['last_name'];
                $person[$i]['first_name'] = $row['first_name'];
                $person[$i]['name_otches'] = $row['name_otches'];
                $person[$i]['photo'] = $row['photo'];
                $person[$i]['department'] = $row['department'];
                $person[$i]['position'] = $row['position'];
                $person[$i]['smok_id'] = $row['smok_id'];
                $person[$i]['phone'] = $row['phone'];
                $person[$i]['e_mail'] = $row['e_mail'];
                $person[$i]['skype'] = $row['skype'];
                $person[$i]['rang'] = $row['rang'];
                $i++;
            }

            return $person;


        }
    }


    public static function getFullListAdmin()
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT p.id, department, position, cabinet, man_wuman, family, country, city, education, smok FROM person AS p
                            JOIN man_wuman AS mw ON p.man_wuman_id = mw.id
                            JOIN family AS f ON p.family_id = f.id
                            JOIN country AS c ON p.country_id = c.id
                            JOIN city AS ci ON p.city_id = ci.id
                            JOIN education AS e ON p.education_id = e.id
                            JOIN smok AS s ON p.smok_id = s.id
                            JOIN position AS po ON p.position_id = po.id
                            JOIN department AS d ON p.department_id = d.id
                            JOIN cabinet AS ca ON p.cabinet_id = ca.id');

        // Получение и возврат результатов
        $fullList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $fullList[$i]['id'] = $row['id'];
            $fullList[$i]['department'] = $row['department'];
            $fullList[$i]['position'] = $row['position'];
            $fullList[$i]['cabinet'] = $row['cabinet'];
            $fullList[$i]['man_wuman'] = $row['man_wuman'];
            $fullList[$i]['family'] = $row['family'];
            $fullList[$i]['country'] = $row['country'];
            $fullList[$i]['city'] = $row['city'];
            $fullList[$i]['education'] = $row['education'];
            $fullList[$i]['smok'] = $row['smok'];
            $i++;
        }
        return $fullList;
    }

    public static function getPersonEmail($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT e_mail FROM person WHERE id = :id';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        // Обращаемся к записи
        $person = $result->fetch();
        if ($person) {
            // Если запись существует, возвращаем e_mail пользователя
            return $person['e_mail'];
        }
        return false;
    }



}