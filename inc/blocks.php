<?php
add_action('enqueue_block_editor_assets', 'gutenberg_editor_assets');

function gutenberg_editor_assets() {
//    wp_enqueue_style('my-gutenberg-bootstrap-styles', get_theme_file_uri('/assets/css/bootstrap.min.css'), FALSE);
//    wp_enqueue_style('my-gutenberg-editor-styles', get_theme_file_uri('/style.css'), FALSE);
}


add_action('acf/init', 'acf_blocks_register');
function acf_blocks_register() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        //
        acf_register_block_type(array(
            'name'              => 'section__products-list',
            'title'             => __('Products slider'),
            'description'       => __('Slider with products'),
            'render_template'   => 'template-parts/blocks/products/slider.php',
            'category'          => 'products',
            'enqueue_assets' => function(){
                //wp_enqueue_style('homepage_hero_section_css', get_template_directory_uri() . '/template-parts/gutenberg-blocks/homepage_hero_section/homepage_hero_section.css', array(), '1.0.0', false );
                //wp_enqueue_script('homepage_hero_section_js', get_template_directory_uri() . '/template-parts/gutenberg-blocks/homepage_hero_section/homepage_hero_section.js', array(), '1.0.0', false );
            },
        ));

    }
}