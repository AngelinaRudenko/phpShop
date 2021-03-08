<?php

class SiteController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $products = array();
        $products = Product::getLatestProducts(6);

        require_once(ROOT . '/views/site/index.php');
        return true;
    }
}