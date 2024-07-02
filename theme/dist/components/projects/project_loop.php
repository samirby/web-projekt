<figure class="project">
    <div class="image-refe">
        <?php if (has_post_thumbnail()): ?>
            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                <?php the_post_thumbnail(); ?>
            </a>
        <?php else: ?>
            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/placeholder.png'; ?>"
                     alt="<?php esc_attr_e('Placeholder Bild', 'webdev'); ?>">
            </a>
        <?php endif; ?>
    </div>
    <figcaption class="project-caption">
        <h3 class="project-title">
            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                <?php echo esc_html(get_the_title()); ?>
            </a>
        </h3>
    </figcaption>
</figure>