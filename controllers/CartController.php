<?php


class CartController
{
    //синхронный запрос
    //он не используется, но пусть будет для наглядности
    public function actionAdd($id)
    {
        Cart::addProduct($id);
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    //асинхронный запрос
    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);
        return true;
    }
}