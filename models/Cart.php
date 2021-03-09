<?php


class Cart
{
    public static function addProduct($id)
    {
        $id = intval($id);
        $productInCart = array();
        if (isset($_SESSION['products'])) {
            $productInCart = $_SESSION['products'];
        }
        //если товар есть в корзине, но был добавлен еще раз
        if (array_key_exists($id, $productInCart)) {
            $productInCart[$id]++;
        } else {
            $productInCart[$id] = 1;
        }
        $_SESSION['products'] = $productInCart;
        //вывод для дебага
//        echo '<pre>';
//        print_r($_SESSION['products']);
//        die();
        return self::countItems(); //эта строка нужна для асинхронного запроса
    }

    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }
}