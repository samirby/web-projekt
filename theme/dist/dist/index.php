<body>
<?php get_header(); ?>


<main id="content" class="container">


    <?php $pagePosts = get_option('page_for_posts'); ?>
    <h1 class="is-style-headline"><?php echo get_the_title($pagePosts); ?></h1>

    <?php the_archive_description( '<p>', '</p>' ); ?>

<div class="blog-container">



    <?php

    if (have_posts()):
        while (have_posts()):
            the_post(); ?>

            <article class="post">
                <div class="post-image">
                    <?php the_post_thumbnail(' '); // Ose 'large', 'medium', etj. ?>
                </div>

                <h3 class="post-title">
                    <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
                </h3>

                <div class="meta">
                    <time class="date vija" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d.m.Y'); ?></time>

                    <span class="vija">   <?php the_category(', '); ?></span>
                     <?php the_author_posts_link(  );?>
                </div>

            </article>

        <?php
        endwhile;

    else:?>

        <h2><?php _e('Leider keine Posts gefunden', 'webdev'); ?></h2>

    <?php endif;
    ?>

</div>

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
</body>


