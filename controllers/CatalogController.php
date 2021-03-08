<?php

class CatalogController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $products = array();
        $products = Product::getLatestProducts(20);

        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }

    public function actionCategory($categoryId, $page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $products = array();
        $products = Product::getProductsListByCategory($categoryId, $page);

        $total = Product::getTotalProductsInCategory($categoryId);
        $pagination = new Pagination($total, $page, Product::show_by_default, 'page-');

        require_once(ROOT . '/views/catalog/category.php');
        return true;
    }
}