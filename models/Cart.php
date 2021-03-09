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

    public static function deleteProduct($id)
    {
        $id = intval($id);
        $productInCart = array();
        if (isset($_SESSION['products'])) {
            $productInCart = $_SESSION['products'];
        }
        //если товар есть в корзине
        if (array_key_exists($id, $productInCart)) {
            $productInCart[$id]--;
        }
        $_SESSION['products'] = $productInCart;
    }

    public static function deleteWholeProduct($id)
    {
        $id = intval($id);
        $productInCart = array();
        if (isset($_SESSION['products'])) {
            $productInCart = $_SESSION['products'];
        }
        //если товар есть в корзине
        if (array_key_exists($id, $productInCart)) {
            unset($productInCart[$id]);
        }
        $_SESSION['products'] = $productInCart;
    }

    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
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

    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();
        $total = 0;
        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }
        return $total;
    }
}