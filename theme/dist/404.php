<?php get_header();?>

    <main id="content" class="container">

        <h1>Test per 404 Laptop Lokal</h1>
        <h3>Test nga PC DESKTOP Per Laptop und Host</h3>
        <h1 class="is-style-headline"><?php _e('Oops, du bist falsch abgebogen', 'webdev') ?></h1>

        <p><?php _e('Diese Seite ist aktuell nicht online, versuche es später noch einmal', 'webdev'); ?></p>

        <a href="<?php echo home_url(); ?>" class="btn"><?php _e('Zur Startseite', 'webdev') ?></a>
    </main>
<?php get_footer(); ?>