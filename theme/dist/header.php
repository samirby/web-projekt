<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >





<body <?php body_class(); ?>>

<nav id="navbar">
    <div class="container">
        <div id="brand">

            <?php
                if(function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
            ?>

        </div>

        <input type="checkbox" id="nav-toggle">
        <label for="nav-toggle" id="nav-button">
            <span id="nav-button-icon" aria-hidden="true"></span>
            <!--   <span class="screen-reader-text">Navigation öffnen/schließen</span> -->
        </label>

      <!--  <ul id="nav-main" class="nav-menu">
            <li class="current-menu-item">
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="wir.html">Wir</a>
            </li>
            <li>
                <a href="services.html">Leistungen</a>
                <ul class="sub-menu">
                    <li>
                        <a href="services/web-design.html">Website</a>
                    </li>
                    <li>
                        <a href="services/coding.html">Grafik Design</a>
                    </li>
                    <li>
                        <a href="services/support.html">Print</a>
                    </li>
                    <li>
                        <a href="services/support.html">IT Support</a>
                    </li>
                    <li>
                        <a href="services/support.html">Online Marketing</a>
                    </li>
                    <li>
                        <a href="services/support.html">Video</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="projects.html">Referenzen</a>
            </li>
            <li>
                <a href="blog.html">Blog</a>
            </li>
            <li>
                <a href="contact.html">Kontakt</a>
            </li>
        </ul> -->

        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container' => false,
            'menu_id' => 'nav-main',
            'menu_class' => 'nav-menu',
            'depth' => 2,
            'fallback_cb' => 'false',
        ])
        ?>




    </div>
</nav>