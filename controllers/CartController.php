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
}