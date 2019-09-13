<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package finders
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />

    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon.ico"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="loader-wrapper"></div>

<div id="content-block">
    <?php
    //Get ACF
    $logo = get_field('logo', 'option');
    ?>
    <!-- HEADER -->
    <header class="header">
        <div class="container-full">
            <div class="header__row">
                <div class="btn-burger btn-show" data-rel="menu-wrapper">
                    <div class="icon"></div>
                </div>
                <?php if($logo): ?>
                <a class="logo" href="/">
                    <img data-src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
                </a>
                <?php endif; ?>
                <nav class="nav wr-hidden menu-wrapper">
                    <div class='wrapper-menu no-hidden'>
                        <button class="btn mob-menu btn-hide-mn" data-rel="menu-wrapper"></button>
                        <?php
                        wp_nav_menu( [
                            'theme_location'  => 'adults-header-menu'
                        ] );
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </header>
