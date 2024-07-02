<?php get_header(); ?>



    <main id="content" class="container single-post container-article">

        <?php
        the_title('<h1 class="is-style-headline">', '</h1>'); ?>




        <?php include(locate_template('/post_meta.php')); ?>



        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('full', ['class' => 'full-width']); ?>
            </div>
        <?php endif; ?>





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
    'posts_per_page' => 3
];

$other_posts = new WP_Query($args);

if ($other_posts->have_posts()):?>
    <aside class="container other-posts">
        <h2><?php esc_html_e('Ähnliche Posts', 'webdev'); ?></h2>
        <div class="posts-wrapper">
            <?php while ($other_posts->have_posts()):
                $other_posts->the_post(); ?>
                <article class="post">
                    <div class="post-image">
                        <?php the_post_thumbnail(); ?>

                        <h3 class="post-title">
                            <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
                        </h3>

                        <!--     <h3><?php echo esc_html(get_the_title()); ?></h3>
                       <a class="btn" href="<?php esc_url(get_the_permalink()); ?>"><?php esc_html_e('Lesen', 'webdev'); ?></a> -->
                    </div>

                </article>


            <?php endwhile; ?>
        </div>
    </aside>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
<?php get_footer();