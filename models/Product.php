<?php


class Product
{
    const show_by_default = 6;

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
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }

    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/products/';

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

    public static function getProdustsByIds($idsArray)
    {
        // Соединение с БД
        $db = Db::createConnection();

        // Превращаем массив в строку для формирования условия в запросе
        $idsString = implode(',', $idsArray);

        // Текст запроса к БД
        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }

    public static function getProductsList()
    {
        // Соединение с БД
        $db = Db::createConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, name, price FROM product ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }

    public static function deleteProductById($id)
    {
        // Соединение с БД
        $db = Db::createConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM product WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateProductById($id, $options)
    {
        // Соединение с БД
        $db = Db::createConnection();

        // Текст запроса к БД
        $sql = "UPDATE product
            SET name = :name, 
                price = :price, 
                category_id = :category_id, 
                description = :description, 
                is_new = :is_new, 
                status = :status
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    public static function createProduct($options)
    {
        // Соединение с БД
        $db = Db::createConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO product '
            . '(name, price, category_id, '
            . 'description, is_new, status) '
            . 'VALUES '
            . '(:name, :price, :category_id, '
            . ':description, :is_new, :status)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    public static function getAvailabilityText($availability)
    {
        switch ($availability) {
            case '1':
                return 'В наличии';
                break;
            case '0':
                return 'Под заказ';
                break;
        }
    }
}