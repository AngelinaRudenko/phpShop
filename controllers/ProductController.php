<?php

class ProductController
{
    public function actionView($productId)
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $product = Product::getProductById($productId);

        include_once(ROOT . '/views/product/index.php');
        return true;
    }
}