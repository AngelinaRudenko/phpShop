<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php foreach ($newsList as $newsItem):?>
    <p>Id: <?php echo $newsItem['id'] ;?></p>
    <p>Title: <?php echo $newsItem['title'] ;?></p>
    <p>Author: <?php echo $newsItem['author_name'] ;?></p>
    <p>Date: <?php echo $newsItem['date'];?></p>
    <p>Content: <?php echo $newsItem['short_content'];?></p>
    <hr>
<?php endforeach;?>
</body>
</html>