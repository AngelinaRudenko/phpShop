<?php


class CartController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        $productsInCart = false;
        $productsInCart = Cart::getProducts();
        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);
            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once(ROOT . '/views/cart/index.php');
        return true;
    }

    //синхронный запрос
    //он не используется, но пусть будет для наглядности
//    public function actionAdd($id)
//    {
//        Cart::addProduct($id);
//        $referrer = $_SERVER['HTTP_REFERER'];
//        header("Location: $referrer");
//    }

    //асинхронный запрос
    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);
        return true;
    }

    public function actionDelete($id)
    {
        Cart::deleteProduct($id);
        header("Location: /cart/");
    }

    public function actionDeleteWholeProduct($id)
    {
        Cart::deleteWholeProduct($id);
        header("Location: /cart/");
    }

    public function actionClear()
    {
        Cart::clear();
        header("Location: /cart/");
    }

    public function actionCheckout()
    {
        $result = false; //cтатус оформления заказа

        //форма отправлена
        if (isset($_POST['submit'])) {
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            $errors = false;
            if (!User::checkName($userName))
                $errors[] = 'Неправильное имя';
            if (!User::checkPhone($userPhone))
                $errors[] = 'Неправильный телефон';

            if ($errors == false) {
                $productsInCart = Cart::getProducts();
                if (User::isGuest()) {
                    $userId = 0; //не авторизован
                } else {
                    $userId = User::checkLogged();
                }

                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

                if ($result) {
                    Cart::clear();
                }
            } else {
                //форма заполнена некорректно
                $productsInCart = Cart::getProducts();
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();
            }
        } else {
            //форма не отправлена
            $productsInCart = Cart::getProducts();

            if ($productsInCart == false) {
                header("Location: /");
            } else {
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $userName = false;
                $userPhone = false;
                $userComment = false;

                if (!User::isGuest()) {
                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);
                    $userName = $user['name'];
                }
            }
        }
        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }
}