<?php
$bg = get_field('background-color');
$width = get_field('background-color');

$limit = get_field('products_amount');

// WP_Query arguments
$args = array(
    'post_type'              => array( 'product' ),
    'posts_per_page'         => $limit,
    'ignore_sticky_posts'    => true,
);

// The Query
$products = new WP_Query( $args );



// Restore original Post Data
wp_reset_postdata();


?>

<style>
    .bg-primary {background: red;}
    .wp-block {max-width: 100%; width: 100% !important;}
    .products-slider {
        display: grid;
grid-template-columns: 1fr 1fr 1fr 1fr;
    }
    .prod {display}
</style>

<section id="<?php echo $block['id'] ?>" class="container products products-slider bg-<?php echo $bg;?>">
    <?php
    // The Loop
    if ( $products->have_posts() ) {
        while ( $products->have_posts() ) {
            $products->the_post();
            ?>
            <div class="prod">
                <img src="https://sklepczekolada.pl/environment/cache/images/500_500_productGfx_961/Chocolate-for-fountains-milk-GPC.jpg">
                <? echo get_the_title();

                $product = wc_get_product( get_the_ID() );
                echo $product->get_regular_price();
                echo $product->get_sale_price();
                echo $product->get_price();
                ?>
            </div>
     <?
        }
    } else {
        // no posts found
        echo "Brak produktów";
    }
    ?>
</section>

