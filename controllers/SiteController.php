<?php

class SiteController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $products = array();
        $products = Product::getLatestProducts(6);

        $sliderProducts = array();
        $sliderProducts = Product::getRecommendedProducts();

        require_once(ROOT . '/views/site/index.php');
        return true;
    }
}