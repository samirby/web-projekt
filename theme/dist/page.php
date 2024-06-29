<?php get_header(); ?>


<main id="content" class="container">
    <?php



    if(have_posts()){
        while(have_posts()){
            the_post();
            the_content(); //Inhalt des Gutenberg-Editors
        }
    }

    ?>
</main>



<?php /*
// Kthej titullin e faqes nga ACF
$page_title = get_field('page_title');

// Shfaqni titullin e faqes në header
if ($page_title) {
    echo '<header class="site-header">';
    echo '<div class="container">';
    echo '<h1 class="site-title">' . esc_html($page_title) . '</h1>';
    echo '</div>';
    echo '</header>';
} */
?>


<?php get_footer(); ?>



