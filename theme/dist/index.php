<?php get_header(); ?>


<main id="content" class="container">


    <?php $pagePosts = get_option('page_for_posts'); ?>
    <h1 class="is-style-headline"><?php echo get_the_title($pagePosts); ?></h1>

    <?php the_archive_description( '<p>', '</p>' ); ?>



    <?php

    if (have_posts()):
        while (have_posts()):
            the_post(); ?>

            <article class="post">
                <div class="post-image">
                    <img src="assets/img/digital-marketing-5816304_1280.jpg">
                </div>
                <h3 class="post-title">
                    <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
                </h3>
                <div class="meta">
                    <time class="date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d.m.Y'); ?></time>

                    <?php the_category(', '); ?>

                </div>

                <div class="meta">
                    <?php the_author('');?>
                </div>
            </article>

        <?php
        endwhile;

    else:?>

        <h2><?php _e('Leider keine Posts gefunden', 'webdev'); ?></h2>

    <?php endif;
    ?>


    <nav class="pagination">
        <?php

        echo paginate_links([
            'prev_text' => '<span class="icon-arrow-left" aria-label="' . __('Vorherige Seite', 'webdev') . '"></span>',
            'next_text' => '<span class="icon-arrow-right" aria-label="' . __('Nächste Seite', 'webdev') .  '"></span>'
        ]);

        ?>

    </nav>

</main>


<?php get_footer(); ?>



