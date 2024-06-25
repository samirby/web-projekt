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


<?php get_footer(); ?>



