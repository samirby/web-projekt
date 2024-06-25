<?php get_header(); ?>
    <main id="content" class="container">

        <?php if (have_posts()): ?>
            <section class="projects">
                <h2 class="is-style-headline"><?php esc_html_e('Letzte Projekte', 'webdev'); ?></h2>
                <div class="projects-grid">
                    <?php while (have_posts()):
                        the_post(); ?>
                        <div class="item">
                            <?php include(locate_template('components/projects/project_loop.php'));?>

                        </div>
                    <?php endwhile; ?>
                </div>
            </section>

        <?php endif; ?>
    </main>

    <nav class="pagination">
        <?php

        echo paginate_links([
            'prev_text' => '<span class="icon-arrow-left" aria-label="' . __('Vorherige Seite', 'webdev') . '"></span>',
            'next_text' => '<span class="icon-arrow-right" aria-label="' . __('Nächste Seite', 'webdev') .  '"></span>'
        ]);

        ?>

    </nav>

<?php get_footer();