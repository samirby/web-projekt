<article class="post">
    <h3 class="post-title">
        <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
    </h3>

    <?php include (locate_template('/post_meta.php'));?>

</article>