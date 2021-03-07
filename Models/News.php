<?php

include_once ROOT. ('/components/Db.php');

class News
{
    public static function getNewsItemById($id)
    {
        $id = intval($id);

        if ($id)
        {
            echo "hi";
            $db = DB::createConnection();

            $result = $db->query("select * from news where id = $id");

            //$result->setFetchMode(PDO::FETCH_NUM);//индексы в виде номеров
            $result->setFetchMode(PDO::FETCH_ASSOC);//индексы в виде названий

            $newsItem = $result->fetch();

            return $newsItem;
        }
    }

    public static function getNewsList()
    {
        $db =  $db = DB::createConnection();

        $newsList = array();
        $result = $db->query('select * from news');

        $i = 0;
        while ($row = $result->fetch())
        {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $newsList;
    }
}