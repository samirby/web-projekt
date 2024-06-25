<footer class="alignfull ">

    <div class="container">
        <div class="footer-container">
            <div class="box logo-footer info-bus box-logo">
                <?php
                if(function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                ?>
                <p>
                    <span>Proactively envisioned multimedia based expertise and cross-media growth strategies seamlessly.</span>
                </p>
            </div>


            <div class="box">
                <h4>Unternehmen</h4>
                <?php
                wp_nav_menu([
                    'menu' => 'info',
                    'theme_location' => 'footer-menu',
                    'container' => false,
                    'menu_id' => 'footer-menu',
                    'menu_class' => 'box',
                    'depth' => 1,
                    'fallback_cb' => 'false',
                ])
                ?>
            </div>

            <div class="box box-info">
                <h4>Leistungen</h4>
                <?php
                wp_nav_menu([
                    'menu' => 'service',
                    'theme_location' => 'footer-menu',
                    'container' => false,
                    'menu_id' => 'footer-menu',
                    'menu_class' => 'box',
                    'depth' => 1,
                    'fallback_cb' => 'false',
                ])
                ?>
            </div>

            <div class="box social-links column box">
                <h4>Social Media</h4>     <!--<ul class="social-media-block"> -->
                <?php
                $social_links = array('linkedin', 'instagram', 'facebook', 'github');

                foreach ($social_links as $item):
                    $link = get_theme_mod($item); ?>

                    <?php if ($link): ?>

                    <a href="<?php echo esc_url($link); ?>" target="_blank">

                        <?php // sprintf - 1. Wert = String (Im String können Variablen definiert werden - %1$s)
                        //2. Wert = Inhalt für Variable (%1$s)
                        ?>
                        <span class="icon-<?php echo $item; ?>" role="img"
                              aria-label="<?php echo sprintf(__('Folge uns auf %1$s', 'webdev'), ucfirst($item)); ?>"></span>

                        <!--    Alternative Variante            -->
                        <!--                <span>-->
                        <!--                    class="icon---><?php //echo $item; ?><!--" role="img"-->
                        <!--                      aria-label="--><?php //echo __('Folge uns auf ', 'webdev') . $item; ?><!--"-->
                        <!--                    -->
                        <!--                </span>-->

                    </a>

                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</footer >

<div class="copyright column">
    <?php
        echo sprintf(__('&copy; %1$s, %2$s', 'webdev'), date('Y'), get_bloginfo('name'));
    ?>
</div>

<div id="to-top" class="show"><?php _e('Top', 'webdev'); ?></div>

</body>
</html>

