<?php get_header(); ?>
    <main id="content" class="container">

        <?php
        the_title('<h1 class="is-style-headline">', '</h1>'); ?>

        <?php if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_content(); //Inhalt des Gutenberg-Editors
            }
        }
        ?>

    </main>

<?php
$args = [
    'post_type' => 'project',
    'posts_per_page' => 3
];

$other_projects = new WP_Query($args);

if ($other_projects->have_posts()):?>
    <aside class="container other-posts">
        <h2><?php esc_html_e('Ähnliche Projekte', 'webdev'); ?></h2>

        <div class="posts-wrapper">
            <?php while ($other_projects->have_posts()):
                $other_projects->the_post(); ?>

                <article class="post">

                    <div class="image-refe-post">
                    <?php the_post_thumbnail(); ?>

                        <h3 class="post-title">
                            <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
                        </h3>

                </article>

            <?php endwhile; ?>
        </div>
    </aside>
<?php endif; ?>

<?php wp_reset_postdata(); ?>


<?php get_footer();