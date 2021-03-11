<?php include ROOT . '/views/layouts/header.php' ?>

    <section id="cart_items">
        <div class="container">
            <h2 class="title text-center">Корзина</h2>

            <?php if ($productsInCart): ?>

                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Код товара</td>
                            <td class="description">Название</td>
                            <td class="price">Стоимость</td>
                            <td class="quantity">Количество</td>
                            <td class="total"></td>
                        </tr>
                        </thead>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td class="cart_product">
                                    <a href=""><?php echo $product['code']; ?><img height="100px" src="<?php echo Product::getImage($product['id']); ?>"></a>
                                </td>

                                <td class="cart_description">
                                    <h4><a href="">
                                            <?php echo $product['name']; ?>
                                        </a></h4>
                                </td>
                                <td class="cart_price"><p><?php echo $product['price']; ?></p></td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up add-to-cart"
                                           href="/cart/addAjax/<?php echo $product['id']; ?>"
                                           data-id="<?php echo $product['id']; ?>"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity"
                                               value="<?php echo $productsInCart[$product['id']]; ?>"
                                               autocomplete="off"
                                               size="2">
                                        <a class="cart_quantity_down delete-from-cart"
                                           href="/cart/delete/<?php echo $product['id']; ?>"
                                           data-id="<?php echo $product['id']; ?>"> - </a>
                                    </div>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete"
                                       href="/cart/deleteWholeProduct/<?php echo $product['id']; ?>">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td class="cart_description" colspan="2">
                                <h4>Общая стоимость</h4>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"><?php echo $totalPrice; ?></p>
                            </td>
                            <td><a href="/cart/clear/">Очистить корзину</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <a class="btn btn-default checkout" href="/cart/checkout/"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
            <?php else: ?>
                <h4>Корзина пуста</h4>
                <a class="btn btn-default checkout" href="/"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a>
            <?php endif; ?>
        </div>

    </section> <!--/#cart_items-->

<?php include ROOT . '/views/layouts/footer.php' ?>