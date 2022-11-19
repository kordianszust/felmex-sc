<?php
$fields = get_fields();
?>
<pre> <?php print_r($fields); ?> </pre> <?php
$bg = $fields['background-color'];
$width = $fields['container-type'];
if ($width = 'full') {
    $width = "-fluid";
}

$limit = $fields['view']['products_amount'];
if ($fields['content']['prod_source'] == "custom") {
    $limit = 0;
}

switch ($limit) {
    case 0:
        $block_class_suffix = "-custom";
        break;
    case 1:
        $block_class_suffix = "-one";
        break;
    case 2:
        $block_class_suffix = "-two";
        break;
    case 3:
        $block_class_suffix = "-three";
        break;
    case 4:
        $block_class_suffix = "-four";
        break;
}
if ($fields['content']['prods'] != "")

    echo 'test: ' . $prod['prod'];
/*
$prods = $fields['content']['prods'];
$prodsArray = array();
print_r($prods);
foreach ($prods as &$prod) {

    array_push($prodsArray, $prod['prod']);

}
*/
if ($fields['content']['prod_source'] == "custom") {
    $args = array(
        'post_type' => array('product'),
        'post__in' => $prodsArray,
        'orderby' => 'post__in'
    );
    echo 'custom';
} else {
    $args = array(
        'post_type' => array('product'),
        'posts_per_page' => $limit,
        'ignore_sticky_posts' => true,
    );
}
$products = new WP_Query($args);
wp_reset_postdata();
?>

<section id="<?php echo $block['id'] ?>"
         class="container<?php echo $width; ?> block block-slider bg-<?php echo $bg; ?>">
    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="slide swiper-slide slide-dark">
                <div class="slide__wrap">
                    <div class="slide__bg">
                        <img src="https://sklepczekolada.pl/userdata/public/boxes/8a93d03cc52808acf841a344513cefd4.jpg">
                    </div>
                    <div class="container slide__content">
                        <div class="slide__addon">Nowość</div>
                        <h1>Czekolady wegańskie!</h1>
                        <p>
                            Wegańskie, roślinne i bezmleczne czekolady
                            Dairy-Free bez śladowych ilości mleka
                        </p>
                        <a class="btn" href="#">Czytaj więcej</a>
                    </div>
                </div>
            </div>
            <div class="slide swiper-slide">
                <div class="slide__wrap">
                    <div class="slide__bg">
                        <img src="https://sklepczekolada.pl/userdata/public/boxes/36bc47e696f3233cf07f36a902c7cfb2.jpg">
                    </div>
                    <div class="container slide__content">
                        <div class="slide__addon">Nowość</div>
                        <h1>Czekolady wegańskie!</h1>
                        <p>
                            Wegańskie, roślinne i bezmleczne czekolady
                            Dairy-Free bez śladowych ilości mleka
                        </p>
                        <a class="btn" href="#">Czytaj więcej</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <!-- <div class="swiper-scrollbar"></div> -->
    </div>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            // direction: 'vertical',
            loop: true,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
    </script>
</section>

<section id="<?php echo $block['id'] ?>"
         class="container<?php echo $width; ?> block block__boxes bg-<?php echo $bg; ?>">

    <div class="block__content columns-two-one">
        <div class="col">
            <div class="border">
                <a href="#" class="btn">Nowe czekolady</a>
            </div>
            <img class="box__background" src="<?php echo wp_get_attachment_image_url($fields['bg_image'], 'full'); ?>">
            <div class="box__content">

            </div>
        </div>
        <div class="col">
            <img class="box__background" src="<?php echo wp_get_attachment_image_url($fields['bg_image'], 'full'); ?>">
            <div class="box__content">
                <h1>Nowe czekolady</h1>
                <p>
                    Nam eu molestie leo. Nam sed justo laoreet metus congue ornare a id purus. Vestibulum ante ipsum
                    primis
                    in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas commodo sem vel molestie
                    eleifend.
                </p>
            </div>
        </div>
    </div>


    <div class="block__content columns-two-one">
        <div class="col">
            <img class="box__background" src="<?php echo wp_get_attachment_image_url($fields['bg_image'], 'full'); ?>">
            <div class="box__content">
                <h1>Nowe czekolady</h1>
                <p>
                    Nam eu molestie leo. Nam sed justo laoreet metus congue ornare a id purus.
                </p>
                <a class="btn" href="#">Czytaj więcej</a>
            </div>
        </div>
        <div class="col">
            <img class="box__background" src="<?php echo wp_get_attachment_image_url($fields['bg_image'], 'full'); ?>">
            <div class="box__content box__content-dark">
                <h1>Nowe czekolady</h1>
                <p>
                    Nam eu molestie leo. Nam sed justo laoreet metus congue ornare a id purus.
                </p>
                <a class="btn" href="#">Czytaj więcej</a>
            </div>
        </div>
    </div>
    <div class="block__content columns-one-two">
        <div class="col">
            <img class="box__background" src="<?php echo wp_get_attachment_image_url($fields['bg_image'], 'full'); ?>">
            <div class="box__content box__content-dark-alternative">
                <h1>Nowe czekolady</h1>
                <p>
                    Nam eu molestie leo. Nam sed justo laoreet metus congue ornare a id purus.
                </p>
                <a class="btn" href="#">Czytaj więcej</a>
            </div>
        </div>
        <div class="col">
            <img class="box__background" src="<?php echo wp_get_attachment_image_url($fields['bg_image'], 'full'); ?>">
            <div class="box__content box__content-solid">
                <h1>Nowe czekolady</h1>
                <p>
                    Nam eu molestie leo. Nam sed justo laoreet metus congue ornare a id purus.
                </p>
                <a class="btn" href="#">Czytaj więcej</a>
            </div>
        </div>
    </div>
    <div class="block__content columns-two">
        <div class="col">
            <img class="box__background" src="<?php echo wp_get_attachment_image_url($fields['bg_image'], 'full'); ?>">
            <div class="box__content">
                <h1>Nowe czekolady</h1>
                <p>
                    Nam eu molestie leo. Nam sed justo laoreet metus congue ornare a id purus.
                </p>
                <a class="btn" href="#">Czytaj więcej</a>
            </div>
        </div>
        <div class="col">
            <img class="box__background" src="<?php echo wp_get_attachment_image_url($fields['bg_image'], 'full'); ?>">
            <div class="box__content">
                <h1>Nowe czekolady</h1>
                <p>
                    Nam eu molestie leo. Nam sed justo laoreet metus congue ornare a id purus.
                </p>
                <a class="btn" href="#">Czytaj więcej</a>
            </div>
        </div>
    </div>
    <div class="block__content columns-three">
        <div class="col">
            <img class="box__background" src="<?php echo wp_get_attachment_image_url($fields['bg_image'], 'full'); ?>">
            <div class="box__content box__content-dark">
                <h1>Nowe czekolady</h1>
                <p>
                    Nam eu molestie leo. Nam sed justo laoreet metus congue ornare a id purus.
                </p>
                <a class="btn" href="#">Czytaj więcej</a>
            </div>
        </div>
        <div class="col">
            <img class="box__background" src="<?php echo wp_get_attachment_image_url($fields['bg_image'], 'full'); ?>">
            <div class="box__content box__content-dark-alternative">
                <h1>Nowe czekolady</h1>
                <p>
                    Nam eu molestie leo. Nam sed justo laoreet metus congue ornare a id purus.
                </p>
                <a class="btn" href="#">Czytaj więcej</a>
            </div>

        </div>
        <div class="col">
            <img class="box__background" src="<?php echo wp_get_attachment_image_url($fields['bg_image'], 'full'); ?>">
            <div class="box__content box__content-solid">
                <h1>Nowe czekolady</h1>
                <p>
                    Nam eu molestie leo. Nam sed justo laoreet metus congue ornare a id purus.
                </p>
                <a class="btn" href="#">Czytaj więcej</a>
            </div>
        </div>
    </div>
</section>

<section id="<?php echo $block['id'] ?>"
         class="container<?php echo $width; ?> block block-products-slider bg-<?php echo $bg; ?>">
    <!-- <img class="block__background" src="<?php echo wp_get_attachment_image_url($fields['bg_image'], 'full'); ?>"> -->
    <img class="block__background" src="https://cdn.pixabay.com/photo/2017/04/12/16/56/chocolates-2224998_960_720.jpg" style="opacity: 0.25;">
    <div class="block__background-overlay"></div>
    <div class="block__content">
        <div class="block__header">
            <h3><?php echo $fields['header']; ?></h3>

        </div>
        <div class="block__products columns<?php echo $block_class_suffix; ?>">
            <?php
            // The Loop
            $currencySymbol = get_woocommerce_currency_symbol();
            if ($products->have_posts()) {
                while ($products->have_posts()) {
                    $products->the_post();
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail');
                    //temp
                    $image = "https://sklepczekolada.pl/environment/cache/images/500_500_productGfx_3462/CAL-NXT-Pack-Dark_4.png";
                    ?>
                    <div class="prod">
                        <!-- <img class="prod__image" src="<?php echo $image[0]; ?>"> -->
                        <img class="prod__image" src="<?php echo $image; ?>">
                        <div class="prod__info">
                            <div class="prod__title"><? echo get_the_title(); ?><? echo get_the_title(); ?></div>
                            <div class="prod__price">
                                <?php
                                $product = wc_get_product(get_the_ID());
                                $priceRegular = $product->get_regular_price();
                                $priceSale = $product->get_sale_price();
                                if ($priceSale == "") {
                                    echo $priceSale;
                                } else {
                                    echo $priceRegular;
                                }
                                ?>
                                <span><?php echo $currencySymbol; ?></span>
                            </div>
                            <a href="<?php echo get_permalink();?>" class="btn prod__link"><img src="<?php echo get_template_directory_uri();?>/assets/img/icons/cart.svg"></a>
                        </div>
                    </div>
                    <?
                }
            } else {
                // no posts found
                echo "Brak produktów";
            }
            ?></div>
    </div>
</section>

<section id="<?php echo $block['id'] ?>"
         class="container<?php echo $width; ?> block block-content bg-<?php echo $bg; ?>">
    <img class="block__background" src="<?php echo wp_get_attachment_image_url($fields['bg_image'], 'full'); ?>">
    <div class="block__content">
        <div class="block__header">
            <h3><?php echo $fields['header']; ?></h3>
        </div>
        <div class="block__products columns-one">
            <div class="col">
                <p>
                    Nam eu molestie leo. Nam sed justo laoreet metus congue ornare a id purus. Vestibulum ante ipsum
                    primis
                    in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas commodo sem vel molestie
                    eleifend.
                    Proin non quam ipsum. Vivamus at condimentum elit. Class aptent taciti sociosqu ad litora torquent
                    per
                    conubia nostra, per inceptos himenaeos. Sed dapibus nisi quis nunc egestas auctor. Curabitur a
                    blandit
                    erat. Pellentesque eleifend ligula a bibendum dictum. Suspendisse at tortor erat.
                </p>
            </div>
        </div>
</section>

<section id="<?php echo $block['id'] ?>"
         class="container<?php echo $width; ?> block block-content block-content-dark bg-<?php echo $bg; ?>">
    <img class="block__background" src="<?php echo wp_get_attachment_image_url($fields['bg_image'], 'full'); ?>">
    <div class="block__content">
        <div class="block__header">
            <h3><?php echo $fields['header']; ?></h3>
        </div>
        <div class="block__products columns-two">
            <div class="col">
                <img src="https://sklepczekolada.pl/environment/cache/images/300_300_productGfx_961/Chocolate-for-fountains-milk-GPC.jpg">
            </div>
            <div class="col"><p>
                    Nam eu molestie leo. Nam sed justo laoreet metus congue ornare a id purus. Vestibulum ante ipsum
                    primis
                    in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas commodo sem vel molestie
                    eleifend.
                    Proin non quam ipsum. Vivamus at condimentum elit. Class aptent taciti sociosqu ad litora torquent
                    per
                    conubia nostra, per inceptos himenaeos. Sed dapibus nisi quis nunc egestas auctor. Curabitur a
                    blandit
                    erat. Pellentesque eleifend ligula a bibendum dictum. Suspendisse at tortor erat.
                </p>
            </div>
        </div>
</section>