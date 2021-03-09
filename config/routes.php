<?php
//маршруты
return array(
    'product/([0-9]+)' => 'product/view/$1',

    'catalog' => 'catalog/index',

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',

    //'cart/add/([0-9]+)' => 'cart/add/$1', //синхронный
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',   //асинхронный
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/deleteWholeProduct/([0-9]+)' => 'cart/deleteWholeProduct/$1',
    'cart/clear' => 'cart/clear',
    'cart' => 'cart/index',

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    '' => 'site/index' // actionIndex в SiteController
);