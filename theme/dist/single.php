<?php get_header(); ?>



    <main id="content" class="container single-post">

        <?php
        the_title('<h1 class="is-style-headline">', '</h1>'); ?>


        <div class="header-meta header-cat">
            <?php the_category(' | '); ?>
        </div>


        <?php include(locate_template('/post_meta.php')); ?>

        <?php if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_content(); //Inhalt des Gutenberg-Editors
            }
        }
        ?>

        <?php the_tags('<div class="meta tags">#', ' #', '</div>'); ?>
    </main>








<?php

$args = [
    'post_type' => 'post',
    'orderby' => 'rand',
    'posts_per_page' => 2
];

$other_posts = new WP_Query($args);

if ($other_posts->have_posts()):?>
    <aside class="container other-posts">
        <h2><?php esc_html_e('Ähnliche Posts', 'webdev'); ?></h2>
        <div class="posts-wrapper">
            <?php while ($other_posts->have_posts()):
                $other_posts->the_post(); ?>
                <article class="post">
                    <h3><?php echo esc_html(get_the_title()); ?></h3>
                    <?php the_post_thumbnail(); ?>
                    <a class="btn" href="<?php esc_url(get_the_permalink()); ?>"><?php esc_html_e('Zum Beitrag', 'webdev'); ?></a>
                </article>

            <?php endwhile; ?>
        </div>
    </aside>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
<?php get_footer();