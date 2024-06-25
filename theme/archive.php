<?php get_header(); ?>


    <main id="content" class="container">

        <?php $pagePosts = get_option('page_for_posts'); ?>

        <h1 class="is-style-headline">

            <?php

            if (is_category()) {
                single_cat_title();
            } else {
                the_archive_title();
            }
            ?>



        </h1>

        <?php the_archive_description('<p>', '</p>'); ?>


        <?php

        if (have_posts()):
            while (have_posts()):
                the_post();

                include(locate_template('/post_loop.php'));

            endwhile;

        else:?>




        <?php endif;
        ?>


        <nav class="pagination">
            <?php

            echo paginate_links([
                'prev_text' => '<span class="icon-arrow-left" aria-label="' . __('Vorherige Seite', 'webdev') . '"></span>',
                'next_text' => '<span class="icon-arrow-right" aria-label="' . __('Nächste Seite', 'webdev') . '"></span>'
            ]);

            ?>

        </nav>
    </main>


<?php get_footer(); ?>