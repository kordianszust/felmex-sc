<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
    <div class="container header__columns">
        <div class="col">
            <a class="logo" href="<?php echo get_home_url(); ?>/">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_sklepczekolada.png">
            </a>
        </div>
        <div class="col">
            <div class="header__test">
                <input placeholder="Search">
                <button>Zaloguj się</button>
                <button>Zarejestruj</button>
            </div>
            <div class="header__menu">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id' => 'header__menu',
                    )
                );
                ?>
            </div>
        </div>
    </div>
    </div>
</header>