<?php include ROOT.'/views/layouts/header.php';?>

    <section>
        <div class="container">
            <div class="row">

                <?php include ROOT.'/views/layouts/categoriesListSelected.php';?>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Последние товары</h2>

                        <?php foreach ($products as $productItem): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="/template/images/home/product1.jpg" alt="" />
                                            <h2>
                                                <?php echo $productItem['price'];?>
                                            </h2>
                                            <p>
                                                <a href="/product/<?php echo $productItem['id'];?>">
                                                    <?php echo $productItem['name'];?>
                                                </a>
                                            </p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <?php if ($productItem['is_new']):?>
                                            <img src="/template/images/home/new.png" class="new">
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>
                </div><!--features_items-->
            </div>
        </div>
        </div>
    </section>

<?php include ROOT.'/views/layouts/footer.php';?>