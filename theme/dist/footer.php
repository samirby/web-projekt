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

            <div class="box ">
                <h4>Social Media</h4>
                <ul class="social-media-block">
                    <a href="#"><i class="fa fa-facebook"></i>Facebook</a>
                    <a href="#"><i class="fa fa-instagram"></i>Instagram</a>
                    <a href="#"><i class="fa fa-google"></i>Google</a>
                    <a href="#"><i class="fa fa-linkedin"></i>Linkedin</a>
                </ul>


            </div>
        </div>
    </div>
</footer >



</body>
</html>