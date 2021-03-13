<?php


class User
{
    public static function register($name, $email, $password)
    {
        //:name, :email, :password - плейсхолдеры. Нужны, чтоб избежать взлома иньекциями
        $db = DB::createConnection();
        $sql = 'insert into user (login, email, password) values (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkName($name)
    {
        if (strlen($name) >= 5) {
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

    public static function checkEmailExists($email)
    {
        $db = DB::createConnection();
        $sql = 'select count(id) as count from user where email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {
            return true; //запись есть
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

    public static function checkUserData($email, $password)
    {
        $db = DB::createConnection();
        $sql = 'select * from user where email = :email and password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }
        return false;
    }

    public static function auth($userId)
    {
        //session_start();
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        //session_start();
        //если сессия есть,вернем id
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        //переадресация, если не авторизован
        header("Location: /user/login");
    }

    public static function isGuest()
    {
        //session_start();
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function getUserById($id)
    {
        if ($id) {
            $db = DB::createConnection();
            $sql = 'select * from user where id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_STR);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

    public static function edit($id, $email, $name, $surname, $country, $password)
    {
        $db = DB::createConnection();
        $sql = 'update user set email = :email, name = :name, surname = :surname, country = :country, '.
            'password = :password where id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':country', $country, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        print_r($result);
        return $result->execute();
    }

    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }
}