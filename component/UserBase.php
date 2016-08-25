<?php

class UserBase
{
    public static function checkUser()
    {
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();

        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);

        // Если роль текущего пользователя "admin", пускаем его в админпанель
        if ($user['user_id'] == '2' OR $user['user_id'] == '1' AND $user['status_id'] == '2') {
            return true;
        }
        // Иначе завершаем работу с сообщением об закрытом доступе
        header("Location: /user/login/");
    }

}