<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>


<?php while (have_posts()) : ?>
    <?php the_post(); ?>
    <section class="breadcrumbs">
        <div class="container">
            <?php woocommerce_breadcrumb(); ?>
        </div>
    </section>

    <section id="<?php echo $block['id'] ?>"
             class="container-fluid block-content bg-<?php echo $bg; ?>">
        <img class="container__background"
             src="https://cdn.pixabay.com/photo/2017/04/12/16/56/chocolates-2224998_960_720.jpg"
             style="opacity: 0.25;">
        <div class="container">

            <div class="prod__header-cols">
                <div class="col">
                    <?php
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'single-post-thumbnail');
                    ?><img class="prod__image" src="<?php echo $image[0]; ?>">
                </div>
                <div class="col prod__cart">


                    <?php wc_get_template_part('content', 'single-product'); ?>

                    <p class="excerpt">
                        <?php echo get_the_excerpt(); ?>
                    </p>


                </div>
                <div class="col">
                    <?php

                    $taxonomy = 'product_cat';
                    $orderby = 'name';
                    $show_count = 1;      // 1 for yes, 0 for no
                    $pad_counts = 1;      // 1 for yes, 0 for no
                    $hierarchical = 1;      // 1 for yes, 0 for no
                    $title = '';
                    $empty = 1;

                    $args = array(
                        'taxonomy' => $taxonomy,
                        'orderby' => $orderby,
                        'show_count' => $show_count,
                        'pad_counts' => $pad_counts,
                        'hierarchical' => $hierarchical,
                        'title_li' => $title,
                        'hide_empty' => $empty
                    );
                    $all_categories = get_categories($args);
                    foreach ($all_categories as $cat) {
                        if ($cat->category_parent == 0) {
                            $category_id = $cat->term_id;
                            echo '<br /><a href="' . get_term_link($cat->slug, 'product_cat') . '">' . $cat->name . '</a>';

                            $args2 = array(
                                'taxonomy' => $taxonomy,
                                'child_of' => 0,
                                'parent' => $category_id,
                                'orderby' => $orderby,
                                'show_count' => $show_count,
                                'pad_counts' => $pad_counts,
                                'hierarchical' => $hierarchical,
                                'title_li' => $title,
                                'hide_empty' => $empty
                            );
                            $sub_cats = get_categories($args2); ?>
                            <ul>
                                <?php
                                if ($sub_cats) {
                                    foreach ($sub_cats as $sub_category) {
                                        echo '<li>' . $sub_category->name . '</li>';
                                    }
                                }
                                ?>
                            </ul>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>


    <section class="container-fluid">
        <img class="container__background"
             src="https://cdn.pixabay.com/photo/2017/04/12/16/56/chocolates-2224998_960_720.jpg">
        <div class="container">

            <div class="block__content">
                <div class="col">123</div>
                <div class="col">123</div>
            </div>
        </div>
    </section>


    <?php
    /**
     * woocommerce_sidebar hook.
     *
     * @hooked woocommerce_get_sidebar - 10
     */
    // do_action( 'woocommerce_sidebar' );
    ?>

<?php endwhile; // end of the loop. ?>

<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */