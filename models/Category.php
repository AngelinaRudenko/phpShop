<?php


class Category
{
    public static function getCategoriesList()
    {
        $db = $db = DB::createConnection();

        $categoriesList = array();
        $result = $db->query('select id,name from category order by sort_order asc');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoriesList[$i]['id'] = $row['id'];
            $categoriesList[$i]['name'] = $row['name'];
            $i++;
        }

        return $categoriesList;
    }
}