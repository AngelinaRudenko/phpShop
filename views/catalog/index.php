<?php include ROOT . '/views/layouts/header.php'; ?>



    <section>
        <div class="container">
            <div class="row">
                <?php include ROOT . '/views/layouts/categoriesList.php'; ?>


<!--                <div class="mainmenu pull-left">-->
<!--                    <ul class="nav navbar-nav collapse navbar-collapse">-->
<!--                        <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>-->
<!--                            <ul role="menu" class="sub-menu">-->
<!--                                <li><a href="/catalog/">Каталог товаров</a></li>-->
<!--                                <li>-->
<!--                                    <a href="/cart/">Корзина<span id="cart-count"> (--><?php //echo Cart::countItems();?><!--)</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Последние товары</h2>

                        <?php foreach ($products as $product): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img class="product-img-preview" src="<?php echo Product::getImage($product['id']); ?>" alt="" />
                                            <h2>
                                                <?php echo $product['price']; ?>
                                            </h2>
                                            <p>
                                                <a href="/product/<?php echo $product['id']; ?>">
                                                    <?php echo $product['name']; ?>
                                                </a>
                                            </p>
                                            <!--href="/cart/add/<?php echo $product['id']; ?>" синхронный-->
                                            <a href="/cart/addAjax/<?php echo $product['id']; ?>"
                                               data-id="<?php echo $product['id']; ?>"
                                               class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В
                                                корзину</a>
                                        </div>
                                        <?php if ($product['is_new']): ?>
                                            <img src="/template/images/home/new.png" class="new">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>