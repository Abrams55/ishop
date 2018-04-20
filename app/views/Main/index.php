<?php
use ishop\App;
$currencis = App::$app->getProperty('currenci');
?>

<!--banner-starts-->
<div class="bnr" id="home">
    <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
            <li>
                <img src="/images/bnr-1.jpg" alt=""/>
            </li>
            <li>
                <img src="/images/bnr-2.jpg" alt=""/>
            </li>
            <li>
                <img src="/images/bnr-3.jpg" alt=""/>
            </li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>
<!--banner-ends-->

<!--about-starts-->
<?php if(!empty($brands)) : ?>
<div class="about">
    <div class="container">
        <div class="about-top grid-1">
            <?php foreach ($brands as $brand) : ?>
            <div class="col-md-4 about-left">
                <figure class="effect-bubba">
                    <img class="img-responsive" src="/images/<?= $brand->img; ?>" alt="<?= $brand->title; ?>"/>
                    <figcaption>
                        <h2><?= $brand->title; ?></h2>
                        <p><?= $brand->description; ?></p>
                    </figcaption>
                </figure>
            </div>
            <?php endforeach; ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php endif; ?>
<!--about-end-->
<!--product-starts-->
<?php if (!empty($hit_product)) : ?>
<div class="product">
    <div class="container">
        <div class="product-top">
            <div class="product-one">
                <?php foreach ($hit_product as $product) : ?>
                <div class="col-md-3 product-left">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="/product/<?= $product->alias; ?>" class="mask"><img class="img-responsive zoom-img" src="/images/<?= $product->img; ?>" alt="<?= $product->title; ?>" /></a>
                        <div class="product-bottom">
                            <h3><a href="/product/<?= $product->alias; ?>" class="mask"><?= $product->title; ?></a></h3>
                            <p>Explore Now</p>
                            <h4><a class="add-to-cart" href="#"><i></i></a> <span class=" item_price"><?= $currencis['symbol_left'] ?><?= $product->price * $currencis['value']; ?><?= $currencis['symbol_right'] ?></span></h4><?= $product->old_price * $currencis['value']; ?>
                        </div>

                        <?php if ($product->old_price) :
                        $diferent = $product->price - $product->old_price;
                        $percent = number_format( $diferent / $product->price * 100, 0, '.', '' );
                        ?>
                        <div class="srch">
                            <span><?= $percent; ?>%</span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<!--product-end-->
