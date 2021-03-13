<?php


class CabinetController
{
    public function actionIndex()
    {
        //ограниченный доступ
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        require_once(ROOT . '/views/cabinet/index.php');
        return true;
    }

    public function actionEdit()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        $result = false;
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $country = $_POST['country'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkEmail($email))
            {
                $errors[] = 'Не правильно указан адрес электронной почты';
            }
            if (!User::checkName($name) && !User::checkName($surname)) {
                $errors[] = 'Имя и фамилия не должны быть короче 5-и символов';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-и символов';
            }
            if ($errors == false) {
                $result = User::edit($userId, $email, $name, $surname, $country, $password);
            }
        }
        require_once(ROOT . '/views/cabinet/edit.php');
        return true;
    }
}