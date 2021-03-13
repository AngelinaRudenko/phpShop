<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <?php include ROOT . '/views/layouts/categoriesList.php'; ?>

                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <img class="product-img-full" src="<?php echo Product::getImage($product['id']); ?>"/>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="product-information"><!--/product-information-->
                                    <?php if ($product['is_new']) :?>
                                        <img src="/template/images/product-details/new.jpg" class="newarrival" alt=""/>
                                    <?php endif;?>
                                    <h2><?php echo $product['name']; ?></h2>
                                    <span>
                                            <span>US $<?php echo $product['price']; ?></span>
                                            <button type="button" class="btn btn-default cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                В корзину
                                            </button>
                                    </span>
<!--                                    <p><b>Производитель:</b>--><?php //echo $product['brand']; ?><!--</p>-->
                                </div><!--/product-information-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5>Описание товара</h5>
                                <p><?php echo $product['description']; ?></p>
                            </div>
                        </div>
                    </div><!--/product-details-->

                </div>
            </div>
        </div>
    </section>


    <br/>
    <br/>

<?php include ROOT . '/views/layouts/footer.php'; ?>