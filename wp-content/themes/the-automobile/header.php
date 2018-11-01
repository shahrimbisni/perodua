<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The Automobile
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="preloader"></div>
<!-- full-screen-layout/boxed-layout -->
<?php if (the_automobile_get_option('homepage_layout_option') == 'full-width') {
    $the_automobile_homepage_layout = 'full-screen-layout';
} elseif (the_automobile_get_option('homepage_layout_option') == 'boxed') {
    $the_automobile_homepage_layout = 'boxed-layout';
} ?>
<div id="page" class="site site-bg <?php echo esc_attr($the_automobile_homepage_layout); ?>">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'the-automobile'); ?></a>
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-4">
                    <div class="pull-left">
                        <?php if (the_automobile_get_option('social_icon_style') == 'circle') {
                            $the_automobile_social_icon = 'bordered-radius';
                        } else {
                            $the_automobile_social_icon = '';
                        } ?>
                        <div class="social-icons <?php echo esc_attr($the_automobile_social_icon); ?>">
                            <?php
                            wp_nav_menu(
                                array('theme_location' => 'social',
                                    'link_before' => '<span>',
                                    'link_after' => '</span>',
                                    'menu_id' => 'social-menu',
                                    'fallback_cb' => false,
                                    'menu_class' => false
                                )); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <div class="top-bar-info">
                        <ul class="top-bar-list">
                            <?php
                            $the_automobile_top_header_location = esc_html(the_automobile_get_option('top_header_location'));
                            if (!empty($the_automobile_top_header_location)) { ?>
                                <li>
                                    <div class="grid-box icon-box">
                                        <i class="icon twp-icon ion-ios-location-outline"></i>
                                    </div>
                                    <div class="grid-box icon-box-content">
                                        <span
                                            class="icon-box-subtitle"><?php echo esc_html(the_automobile_get_option('top_header_location')); ?></span>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php
                            $the_automobile_top_header_telephone = esc_attr(the_automobile_get_option('top_header_telephone'));
                            if (!empty($the_automobile_top_header_telephone)) { ?>
                                <li>
                                    <div class="grid-box icon-box">
                                        <i class="icon twp-icon ion-ios-telephone-outline"></i>
                                    </div>
                                    <div class="grid-box icon-box-content">
                                        <a href="<?php echo esc_url( 'tel:' . preg_replace('/\D+/', '', esc_attr(the_automobile_get_option('top_header_telephone')))); ?>">
                                             <span class="icon-box-subtitle">
                                                <?php echo esc_attr(the_automobile_get_option('top_header_telephone')); ?>
                                             </span>
                                        </a>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php
                            $the_automobile_top_header_email = the_automobile_get_option('top_header_email');
                            if (!empty($the_automobile_top_header_email)) { ?>
                                <li>
                                    <div class="grid-box icon-box">
                                        <i class="icon twp-icon ion-ios-email-outline"></i>
                                    </div>
                                    <div class="grid-box icon-box-content">
                                        <a href="<?php echo esc_url( 'mailto:' .the_automobile_get_option('top_header_email')); ?>">
                                            <span class="icon-box-subtitle">
                                                <?php echo esc_attr(antispambot(the_automobile_get_option('top_header_email'))); ?>
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--    Topbar Ends-->
    <header id="masthead" class="site-header" role="banner">
        <?php if (has_nav_menu('top')) { ?>
            <div class="auxiliary-bar secondary-bgcolor">
                <div class="container">
                    <div class="row">
                        <div id="top-nav" class="col-md-8 col-sm-6 col-xs-12 auxiliary-nav collapse in">
                            <?php wp_nav_menu(array(
                                'theme_location' => 'top',
                                'menu_id' => 'top-menu',
                                'depth' => 1,
                                'container' => 'div',
                                'menu_class' => false
                            )); ?>
                            <ul class="top-woocommerce-nav pull-right">
                                <li class="links">
                                    <?php if (function_exists('the_automobile_wishlist')) { ?>
                                        <span class="wishlist">
                                            <?php the_automobile_wishlist(); ?>
                                        </span>
                                    <?php } ?>
                                </li>

                                <?php if (is_user_logged_in()) { ?>
                                    <li class="myaccount">
                                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                                            <i class="meta-icon ion-person-stalker"></i>
                                            <span><?php esc_html_e('My Account', 'the-automobile'); ?></span>
                                        </a>
                                    </li>

                                    <li class="login">
                                        <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>">
                                            <i class="meta-icon ion-ios-unlocked"></i>
                                            <span><?php esc_html_e('Log Out', 'the-automobile'); ?></span>
                                        </a>
                                    </li>

                                     <?php } else { ?>

                                    <li class="login">
                                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                                            <i class="meta-icon ion-ios-locked"></i>
                                            <span><?php esc_html_e('Log In', 'the-automobile'); ?></span>
                                        </a>
                                    </li>

                                    <li class="login">
                                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                                            <i class="meta-icon ion-person-stalker"></i>
                                            <span><?php esc_html_e('Register', 'the-automobile'); ?></span>
                                        </a>
                                    </li>

                                <?php } ?>


                                <?php if (class_exists('woocommerce')) { ?>
                                    <li class="top-cart-contain">
                                        <div class="mini-cart">
                                            <a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>">
                                                <i class="meta-icon ion-ios-cart"></i>
                                                <span class="cart-title">
                                                    <?php esc_html_e('Shopping Cart', 'the-automobile'); ?>
                                                    ( <?php echo WC()->cart->get_cart_contents_count(); ?> )
                                                </span>
                                            </a>
                                                <div class="top-cart-content">
                                                    <div class="block-subtitle">
                                                        <?php esc_html_e('Recently added item(s)', 'the-automobile'); ?>
                                                    </div>
                                                    <?php the_widget('WC_Widget_Cart', 'title='); ?>
                                                </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="top-header">
            <div class="container">
                <div class="site-branding">
                    <div class="twp-site-branding alt-bgcolor">
                        <div class="branding-center">
                            <?php
                            if (is_front_page() && is_home()) : ?>
                                <span class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                            rel="home"><?php bloginfo('name'); ?></a></span>
                            <?php else : ?>
                                <span class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                            rel="home"><?php bloginfo('name'); ?></a></span>
                                <?php
                            endif;
                            the_automobile_the_custom_logo();
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) : ?>
                                <p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
                                <?php
                            endif; ?>
                        </div>
                    </div>
                </div><!-- .site-branding -->
                <div class="twp-nav ">
                    <ul class="navbar-extras">
                        <li class="hidden-md hidden-lg">
                            <a data-toggle="collapse" data-target="#top-nav">
                                <i class="ion-android-more-vertical"></i>
                            </a>
                        </li>
                        <li class="primary-bgcolor">
                            <a href="#" class="search-button">
                                <span class="tcon-search__item" aria-hidden="true"></span>
                            </a>
                        </li>
                    </ul>
                </div>

                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <a id="nav-toggle" href="#" aria-controls="primary-menu" aria-expanded="false">
                        <span class="screen-reader-text">
                            <?php esc_html_e('Primary Menu', 'the-automobile'); ?>
                        </span>
                        <span class="icon-bar top"></span>
                        <span class="icon-bar middle"></span>
                        <span class="icon-bar bottom"></span>
                    </a>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'container' => 'div',
                        'container_class' => 'menu'
                    )); ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
    </header>
    <!-- #masthead -->
    <div class="search-box secondary-bgcolor">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-xs-12 pull-right">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div><!--Searchbar Ends-->
    <!-- Innerpage Header Begins Here -->
    <?php
    if (is_front_page() && !is_home()) {
        // Added for Design Purpose only
    } else {
        do_action('the-automobile-page-inner-title');
    }
    ?>
    <!-- Innerpage Header Ends Here -->
    <div id="content" class="site-content">