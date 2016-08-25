<?php


class AdminDepartmentController extends AdminBase
{


    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий
        $departmentsList = Department::getDepartmentsListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_department/index.php');
        return true;
    }


    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $department = $_POST['department'];


            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($department) || empty($department)) {
                $errors[] = 'Заполните поля';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию
                Department::createDepartment($department);

                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/department");
            }
        }

        require_once(ROOT . '/views/admin_department/create.php');
        return true;
    }


    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $department = Department::getDepartmentById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['department'];


            // Сохраняем изменения
            Department::updateDepartmentById($id, $name);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/department");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_department/update.php');
        return true;
    }


    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            Department::deleteDepartmentById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/department");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_department/delete.php');
        return true;
    }

}
