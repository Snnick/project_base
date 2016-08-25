<?php

class Menu
{
    public static function getMenu()
    {
        // Соединение с БД
        $db = DB::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT * FROM menu');

        // Получение и возврат результатов
        $menu = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $menu[$i]['id'] = $row['id'];
            $menu[$i]['name'] = $row['name'];
            $menu[$i]['link'] = $row['link'];
            $i++;
        }
        return $menu;
    }

    public static function getLink($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT link FROM menu WHERE id = :id';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        // Обращаемся к записи
        $menu = $result->fetch();
        if ($menu) {
            // Если запись существует, возвращаем e_mail пользователя
            return $menu['link'];
        }
        return false;
    }



}