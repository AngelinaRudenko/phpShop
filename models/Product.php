<?php


class Product
{
    const show_by_default = 2;

    public static function getLatestProducts($count = self::show_by_default)
    {
        $count = intval($count);

        $db = DB::createConnection();

        $productsList = array();
        $result = $db->query('select id,name,price,image,is_new from product where status="1" order by id desc limit ' . $count);

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }

    public static function getProductsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {
            $page = intval($page);
            $offset = ($page - 1) * self::show_by_default;

            $db = DB::createConnection();

            $productsList = array();
            $result = $db->query('select id,name,price,image,is_new from product where status="1" and category_id = '
                . $categoryId . ' order by id desc limit ' . self::show_by_default
                . ' offset ' . $offset);

            $i = 0;
            while ($row = $result->fetch()) {
                $productsList[$i]['id'] = $row['id'];
                $productsList[$i]['name'] = $row['name'];
                $productsList[$i]['image'] = $row['image'];
                $productsList[$i]['price'] = $row['price'];
                $productsList[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $productsList;
        }
    }

    public static function getProductById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = DB::createConnection();

            $result = $db->query("select * from product where id = $id");

            //$result->setFetchMode(PDO::FETCH_NUM);//индексы в виде номеров
            $result->setFetchMode(PDO::FETCH_ASSOC);//индексы в виде названий

            $product = $result->fetch();

            return $product;
        }
    }

    public static function getTotalProductsInCategory($categoryId)
    {
        $db = DB::createConnection();

        $result = $db->query('select count(id) as count from product where status="1" and category_id = ' . $categoryId);

        //$result->setFetchMode(PDO::FETCH_NUM);//индексы в виде номеров
        $result->setFetchMode(PDO::FETCH_ASSOC);//индексы в виде названий

        $product = $result->fetch();

        return $product['count'];
    }

    public static function getProductsByIds($idsArray)
    {
        $products = array();
        $db = DB::createConnection();
        $idsString = implode(',', $idsArray);

        $result = $db->query("select * from product where status='1' and id in ($idsString)");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }
}