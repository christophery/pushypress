<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php bloginfo('name'); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php wp_head(); ?>
    </head>
    <body>
        <!-- Header -->
        <nav class="pushy pushy-left">
            <?php wp_nav_menu( array( 'theme_location' => 'pushy-menu' ) ); ?> 
        </nav>
        <header class="push">
            <!-- Menu Button -->
            <i class="icon-reorder menu-btn"></i>
            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
                <h2><?php bloginfo('name'); ?></h2>
            </a>
        </header>

        <!-- Site Overlay -->
        <div class="site-overlay"></div>

        <!-- Content -->
        <div class="container">
